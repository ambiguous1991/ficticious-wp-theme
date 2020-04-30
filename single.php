<?php
//powers single page post
while ( have_posts() ) {
    the_post();
    get_header();
    generatePageBanner(array());
    ?>

    <div class="container">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb-container">
                <li class="breadcrumb-container__item">
                    <div class="breadcrumb-content"><a href="<?php echo site_url(); ?>"><i
                                    class="fas fa-home"></i><span>strona główna</span></a></div>
                </li>
                <li class="breadcrumb-container__item">
                    <div class="breadcrumb-content"><a href="<?php echo get_post_type_archive_link('post') ?>">blog</a>
                    </div>
                </li>
                <li class="breadcrumb-container__item active" aria-current="page">
                    <div class="breadcrumb-content">
                        <?php the_title() ?>
                    </div>
                </li>
            </ul>
        </nav>
    </div>

    <div class="container flex-grow-1">
    <div class="section section--small-padding-top text-justify section--generic">

    <div class="container">
        <div class="row mb-3">
            <small class="text-muted">
                opublikowano <?php the_time('j F Y'); ?> r. w
                kategorii <strong><?php echo get_the_category_list(', ') ?></strong>
            </small>
        </div>
        <div class="row">
            <div class="singular-post-content">
                <?php the_content(); ?>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="blockquote-footer section__author">
                <span><?php the_author_posts_link(); ?></span>
                <i class="fas fa-user-circle"></i>
            </div>
        </div>
    </div>
    <?php
    if (comments_open() || get_comments_number()) :
        comments_template();
    endif;
} ?>
    </div>
    </div>
<?php
get_footer();
?>