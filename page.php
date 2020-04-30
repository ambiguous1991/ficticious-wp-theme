<?php
//powers single page
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
                    <div class="breadcrumb-content"><a href="<?php echo site_url('/blog') ?>"><?php the_title(); ?></a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>

    <div class="container flex-grow-1">
        <div class="section section--small-padding-top text-justify section--generic">
            <div class="container">
                <div class="row mb-2">
                    <small class="text-muted">
                        opublikowano <?php the_time('j F Y'); ?> r.
                    </small>
                </div>
                <div class="row">
                    <div class="singular-post-content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }
get_footer();
?>