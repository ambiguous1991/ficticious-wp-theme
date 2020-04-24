<?php

//powers generic blog listing

get_header(); ?>

    <header class="header header--small"
            style="background-image: url('<?php echo esc_url(get_theme_mod('ficticious_header_bg')); ?>');">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="<?php echo site_url(); ?>"><h2><?php echo get_bloginfo('name'); ?></h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <small>rozwiń </small><i class="fa fa-caret-down"></i>
                </button>

                <?php
                generate_nav('header_menu', true);
                ?>

            </div>
        </nav>

        <div class="header__punchline header__punchline--small header__punchline--right container">
            <h1 style="margin-bottom: 0;">Eksperymenty</h1>
            <h3 style="margin-bottom: 16px">próbki kodu i działające projekty demonstracyjne</h3>
        </div>
    </header>

    <div class="container">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb-container">
                <li class="breadcrumb-container__item">
                    <div class="breadcrumb-content"><a href="<?php echo site_url(); ?>"><i
                                    class="fas fa-home"></i><span>strona główna</span></a></div>
                </li>
                <li class="breadcrumb-container__item">
                    <div class="breadcrumb-content"><a href="<?php echo site_url('/experiment') ?>">eksperymenty</a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>

    <div class="container flex-grow-1">
        <div class="section section--small-padding-top text-justify section--generic">
            <?php
            while (have_posts()) {
                the_post(); ?>
                <div class="container">
                    <div class="row">
                        <div class="text-center d-flex col-12 col-md-2 col-lg-3 align-items-center justify-content-center mb-3">
                            <?php if (get_the_post_thumbnail_url()) { ?>
                                <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url(); ?>"/>
                            <?php } else {
                                ?>
                                <div class="post-thumbnail text-center">
                                    <div class="rounded-circle thumbnail-icon">
                                        <i class="fas fa-image"></i>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-12 col-md-10 col-lg-9">
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