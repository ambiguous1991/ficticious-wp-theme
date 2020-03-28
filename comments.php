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
        <div class="comments-title">
            komentarze do '<?php echo get_the_title() ?>'
        </div>

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
        'class_submit' => 'btn btn-primary',
        'comment_field' => '<div class="form-group"><textarea class="form-control" id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea></div>'
    )); ?>

</div><!-- #comments -->