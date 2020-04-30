<?php
//powers generic blog listing
generatePageBanner(array(
    'title' => 'Blog',
    'default-page-banner' => true,
));
get_header();
?>

    <div class="container flex-grow-1">
        <div class="section section--small-padding-top text-justify section--generic">
            <?php
            while ( have_posts() ) {
                the_post(); ?>
                <div class="container">
                    <div class="row">
                        <div class="d-flex col-12 col-md-2 col-lg-3 align-items-center justify-content-center mb-3">
                            <?php if (get_the_post_thumbnail_url()) { ?>
                                <div class="post-thumbnail">
                                    <img alt="<?php echo get_the_post_thumbnail_caption() ?>"
                                         class="thumbnail-icon-image" src="<?php echo get_the_post_thumbnail_url(); ?>">
                                </div>
                            <?php } else {
                                ?>
                                <div class="post-thumbnail text-center">
                                    <div class="thumbnail-icon">
                                        <i class="fas fa-image"></i>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-12 offset-md-1 col-md-9 col-lg-8">
                            <div class="row">
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            </div>
                            <div class="row mb-2">
                                <small class="text-muted">
                                    opublikowano <?php the_time('j F Y'); ?> r. w
                                    kategorii <?php echo get_the_category_list(', ') ?>
                                </small>
                            </div>
                            <div class="row">
                                <?php the_excerpt(); ?>
                            </div>
                            <div class="row justify-content-end">
                                <div class="blockquote-footer section__author">
                                    <span><?php the_author_posts_link(); ?></span>
                                    <i class="fas fa-user-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="container">
                <?php echo paginate_links(); ?>
            </div>
        </div>
    </div>
<?php
get_footer();
?>