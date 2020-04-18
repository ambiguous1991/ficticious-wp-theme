<?php

function files_to_include () {
    wp_enqueue_script('jquery-3.4.1', '//code.jquery.com/jquery-3.4.1.min.js', NULL, NULL, true);
    wp_enqueue_script('popper-js', '//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', NULL, NULL, true);
    wp_enqueue_script('bootstrap-js', '//stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', ['jquery', 'popper-js'], NULL, true);
    wp_enqueue_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css');
    wp_enqueue_style('bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');
    wp_enqueue_style('fonts', '//fonts.googleapis.com/css?family=Montserrat:400,900|Open+Sans:400,700|Roboto+Condensed:400,700&display=swap&subset=latin-ext');
    wp_enqueue_style('welcome-page-style', get_template_directory_uri() . '/resources/css/main.css', false, '1.0', 'all');
    wp_enqueue_script('index-js', get_theme_file_uri('/resources/js/bundle.js'), NULL, '1.0', true);
}

add_action('wp_enqueue_scripts', 'files_to_include');

function theme_features () {
    add_theme_support('title-tag');
    register_nav_menu('header_menu', 'Header title menu');
    register_nav_menu('footer_media_location', 'Footer Social Media');
}

add_action('after_setup_theme', 'theme_features');
show_admin_bar(false);

function register_navwalker(){
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );
add_theme_support('post-thumbnails');

function generate_nav($theme_location, $dropdowns, $container='div', $containerClass='collapse navbar-collapse justify-content-end') {
    $menuArgs = array(
        'theme_location'=>$theme_location,
        'depth' => $dropdowns ? 2 : 1,
        'menu_class'=>'nav navbar-nav mr-0',
        'container_class'=>$containerClass,
        'container_id'=>'navbarSupportedContent',
        'fallback_cb'=> 'WP_Bootstrap_Navwalker::fallback',
        'walker'=> new WP_Bootstrap_Navwalker(),
        'container'=>$container,
    );

    return wp_nav_menu($menuArgs);
}

function ficticious_create_panel ( $wp_customize ){
    $wp_customize->add_panel('ficticious_panel', array(
        'title'=>__('Motyw Ficticious'),
        'description'=>'Ustawienia motywu',
        'priority'=>20
    ));
}
add_action('customize_register', 'ficticious_create_panel');

function ficticious_change_head_bg( $wp_customize ) {
    include 'settings.php';
    $wp_customize->add_section( 'ficticious_header_bg_section' , array(
        'title'       => __( 'Tło nagłówka' ),
        'priority'    => 40,
        'description' => 'Obraz wyświetlany w nagłówku strony',
        'panel'=>'ficticious_panel'
    ) );
    $wp_customize->add_setting( $FICTICIOUS_HEADER_BACKGROUND_IMAGE );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ficticious_header_bg', array(
        'label'    => __( 'Obraz tła' ),
        'section'  => 'ficticious_header_bg_section',
        'settings' => 'ficticious_header_bg',
    ) ) );

}
add_action('customize_register', 'ficticious_change_head_bg');

function addSettingToSection ( $wp_customize, $setting_name, $setting_default, $setting_type, $setting_section, $label, $choices) {
    $wp_customize->add_setting( $setting_name, array(
        'default'=>$setting_default,
    ) );
    $wp_customize->add_control( $setting_name, array (
        'label'=> __($label),
        'type'=>$setting_type,
        'section'=>$setting_section,
        'choices'=>$choices
    ));
}

function ficticious_header($wp_customize ) {
    include 'settings.php';
    $heading_section = 'heading_section';
    $panel_name= 'ficticious_panel';

    $wp_customize->add_section($heading_section, array(
        'title'=> 'Treści w nagłówku',
        'description'=>'Określ treści, jakie mają być widoczne w nagłówku strony',
        'panel'=>$panel_name
    ));

    addSettingToSection(
        $wp_customize,
        $FICTICIOUS_HEADER_HEADLINE,
        'Jestem nagłówkiem',
        'text',
        $heading_section,
        'Tekst nagłówka',
        null
    );

    addSettingToSection(
        $wp_customize,
        $FICTICIOUS_HEADER_SUBHEADLINE,
        'Jestem nagłówkiem drugiego poziomu',
        'text',
        $heading_section,
        'Tekst nagłówka drugiego poziomu',
        null
    );

    addSettingToSection(
        $wp_customize,
        $FICTICIOUS_HEADER_BUTTONS_ENABLED,
        0,
        'radio',
        $heading_section,
        'Przyciski',
        array (
            0=>'wyłączone',
            1=>'włączone'
        )
    );

    addSettingToSection(
        $wp_customize,
        $FICTICIOUS_HEADER_BUTTON_1_LABEL,
        'Jestem przyciskiem',
        'text',
        $heading_section,
        'Treść przycisku 1',
        null
    );

    addSettingToSection(
        $wp_customize,
        $FICTICIOUS_HEADER_BUTTON_1_HREF,
        'https://someaddress',
        'text',
        $heading_section,
        'Adres przekierowania przycisku 1',
        null
    );

    addSettingToSection(
        $wp_customize,
        $FICTICIOUS_HEADER_BUTTON_2_LABEL,
        'Również jestem przyciskiem',
        'text',
        $heading_section,
        'Treść przycisku 2',
        null
    );

    addSettingToSection(
        $wp_customize,
        $FICTICIOUS_HEADER_BUTTON_2_HREF,
        'https://someaddress',
        'text',
        $heading_section,
        'Adres przekierowania przycisku 2',
        null
    );
}
add_action('customize_register', 'ficticious_header');

function ficticious_white_intro( $wp_customize ) {
    include 'settings.php';
    $intro_section = 'intro_section';
    $panel_name= 'ficticious_panel';

    $wp_customize->add_section($intro_section, array(
        'title'=> 'Sekcja intro',
        'description'=>'Określ treści, jakie mają być widoczne w sekcji intro',
        'panel'=>$panel_name
    ));

    addSettingToSection(
        $wp_customize,
        $FICTICIOUS_INTRO_ENABLED,
        1,
        'radio',
        $intro_section,
        'Sekcja intro',
        array(
            0=>'wyłączone',
            1=>'włączone',
        )
    );

    addSettingToSection(
        $wp_customize,
        $FICTICIOUS_INTRO_TITLE,
        'miło Cię tutaj widzieć',
        'text',
        $intro_section,
        'Nagłówek',
        null
    );

    addSettingToSection(
        $wp_customize,
        $FICTICIOUS_INTRO_INTRODUCTION,
        'Nazywam się Jakub Bartusiak',
        'text',
        $intro_section,
        'Wstęp',
        null
    );

    addSettingToSection(
        $wp_customize,
        $FICTICIOUS_INTRO_CONTENT,
        'Jestem absolwentem Politechniki Wrocławskiej i programistą o szerokich zainteresowaniach.
        Staram się stale rozwijać swoje umiejętności i codziennie uczyć się czegoś nowego.',
        'textarea',
        $intro_section,
        'Zawartość',
        null
    );
}
add_action('customize_register', 'ficticious_white_intro');