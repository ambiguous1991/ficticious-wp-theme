<?php
function captcha_verify( $response ) {
    global $RECAPTCHA_API_KEY;

    $gCaptchaPostResponse = wp_remote_post('https://www.google.com/recaptcha/api/siteverify',
        array(
            'method' => 'POST',
            'body' => array(
                'secret' => $RECAPTCHA_API_KEY,
                'response' => $response
            )
        )
    );

    if ($gCaptchaPostResponse[ 'body' ]) {
        $responseBody = json_decode($gCaptchaPostResponse[ 'body' ], true);
        if ($responseBody[ 'success' ]) {
            return true;
        }
    }
    return false;
}

function register_message ( $name, $email, $type, $message ) {
    return wp_insert_post(array(
        'post_type'=>'message',
        'post_title'=>'Nowa wiadomość od ' . $email,
        'post_category'=>array(get_cat_ID($type)),
        'post_content'=>$name . ' pisze: ' . $message,
        'post_status'=>'private',
        'comment_status'=>'closed',
    ));
}

function send_email( $address, $name, $message_type ) {

    $site_name = get_bloginfo('name');
    $subject = $site_name . ': ' . $name . ', dziękuję za kontakt';

    return wp_mail(
        $address,
        $subject,
        render_email($name, $subject, $message_type),
        array( 'Content-Type: text/html; charset=UTF-8' ),
        ''
    );
}

function process_submitted_contact_form( WP_REST_Request $request ) {

    $params = $request->get_body_params();

    $name = $params[ 'name' ];
    $email = $params[ 'email' ];
    $type = $params[ 'type' ] == 0 ? 'Oferta pracy' : 'Inne wiadomości';
    $message = $params [ 'message' ];
    $gRecaptchaResponse = $params[ 'g-recaptcha-response' ];

    if (!$name || !$email || !$type || !$message) {
        return new WP_Error('form_data_incomplete', 'Not all required fields submitted!', array(
            'code'=>400
        ));
    }

    if (!$gRecaptchaResponse) {
        return new WP_Error('no_captcha', 'No captcha supplied!', array(
            'code' => 403
        ));
    }
    if (!captcha_verify($gRecaptchaResponse)) {
        return new WP_Error('captcha_error', 'Captcha verification failed', array(
            'code' => 403
        ));
    }

    $messageRegisteredSuccess = register_message($name, $email, $type, $message);
    if (!$messageRegisteredSuccess) {
        return new WP_Error(
            'email_error',
            'Podczas wysyłania wiadomości wystąpił problem. Spróbuj ponownie później.',
            array(
                'code' => 500
            )
        );
    }

    $emailSentSuccess = send_email($email, $name, $type);
    if (!$emailSentSuccess) {
        return new WP_Error(
            'email_error',
            'Podczas wysyłania wiadomości wystąpił problem. Spróbuj ponownie później.',
            array(
                'code' => 500
            )
        );
    }

    return new WP_REST_Response('OK', 200);
}
add_action('rest_api_init', function () {
    register_rest_route('ficticious/v1', '/contact', array(
        'methods' => 'POST',
        'callback' => 'process_submitted_contact_form',
    ));
});