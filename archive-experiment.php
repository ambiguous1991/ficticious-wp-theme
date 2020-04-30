<?php
//powers generic blog listing
generatePageBanner(array(
    'title' => 'Eksperymenty',
    'subtitle' => 'próbki kodu i działające projekty demonstracyjne',
    'default-page-banner' => true
));
get_header();
?>

    <div class="container">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb-container">
                <li class="breadcrumb-container__item">
                    <div class="breadcrumb-content"><a href="<?php echo site_url(); ?>"><i
                                    class="fas fa-home"></i><span>strona główna</span></a></div>
                </li>
                <li class="breadcrumb-container__item">
                    <div class="breadcrumb-content"><a href="<?php echo get_post_type_archive_link('experiment') ?>">eksperymenty</a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>

    <div class="container flex-grow-1">
        <div class="section section--small-padding-top text-justify section--generic">
            <?php
            while ( have_posts() ) {
                the_post(); ?>
                <div class="container">
                    <div class="row">
                        <div class="text-center d-flex col-12 col-md-2 col-lg-3 align-items-center justify-content-center mb-3">
                            <?php if (get_the_post_thumbnail_url()) { ?>
                                <img alt="<?php echo get_the_post_thumbnail_caption() ?>" class="img-fluid"
                                     src="<?php echo get_the_post_thumbnail_url(); ?>"/>
                            <?php } else {
                                ?>
                                <div class="post-thumbnail text-center">
                                    <div class="rounded-circle thumbnail-icon">
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
                                    opublikowano <?php the_time('j F Y'); ?> r.
                                </small>
                            </div>
                            <div class="row">
                                <?php the_excerpt(); ?>
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