<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if (post_password_required())
    return;
?>

<div class="comments-area">
    <?php if (have_comments()) : ?>
        <h3 class="comments-title">
            komentarze na tej stronie
        </h3>
        <ul class="comment-list">
            <?php
            wp_list_comments(array(
                'style' => 'li',
                'short_ping' => true,
                'avatar_size' => 25,
            ));
            ?>
        </ul><!-- .comment-list -->
        <?php
        // Are there comments to navigate through?
        if (get_comment_pages_count() > 1 && get_option('page_comments')) :
            ?>
            <nav class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text section-heading"><?php _e('Comment navigation', 'twentythirteen'); ?></h1>
                <div class="nav-previous"><?php previous_comments_link(__('&amp;larr; Older Comments', 'twentythirteen')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Comments &amp;rarr;', 'twentythirteen')); ?></div>
            </nav><!-- .comment-navigation -->
        <?php endif; // Check for comment navigation ?>

        <?php if (!comments_open() && get_comments_number()) : ?>
            <p class="no-comments"><?php _e('Comments are closed.', 'twentythirteen'); ?></p>
        <?php endif; ?>

    <?php endif; // have_comments() ?>

    <?php comment_form(array(
        'fields' => array(
            'author' =>
                '<div class="form-group row">
                    <label for="author" class="col-12 col-form-label col-md-3">Podpis *</label>
                    <div class="col-12 col-md-9"><input class="form-control" id="author" name="author" type="text" value="" size="30" maxlength="245" required="required"></div>
                </div>',
            'email' =>
                '<div class="form-group row">
                    <label for="email" class="col-12 col-form-label col-md-3">Adres e-mail *</label>
                    <div class="col-12 col-md-9"><input class="form-control" id="email" name="email" type="text" value="" size="30" maxlength="100" aria-describedby="email-notes" required="required"></div>
                </div>',
            'url' =>
                '<div class="form-group row">
                    <label for="url" class="col-12 col-form-label col-md-3">adres strony</label>
                    <div class="col-12 col-md-9"><input class="form-control" id="url" name="url" type="text" value="" size="30" maxlength="200"></div>
                </div>',
            'cookies' =>
                '<div class="form-group form-check">
                    <input class="form-check-input" id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes">
                    <label class="form-check-label" for="wp-comment-cookies-consent">Zapamiętaj moje dane w tej przeglądarce podczas pisania kolejnych komentarzy</label>
                </div>'
        ),
        'class_submit' => 'btn btn-success btn-sm',
        'comment_field' => '<div class="form-group"><textarea class="form-control" id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea></div>',
        'submit_field' => '<p class="form-submit text-center">%1$s %2$s</p>'
    )); ?>

</div><!-- #comments -->

<script>
    $(function () {
        $('#commentform')
            .parsley()
            .on('field:validated', function () {
                console.log('validation lala')
            })
            .on('form:submit', function () {
                return false;
            })
    });
</script>