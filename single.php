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
                <small>show </small><i class="fa fa-caret-down"></i>
            </button>

            <?php
            generate_nav('header_menu', true);
            ?>

        </div>
    </nav>

<?php
while (have_posts()) {
    the_post(); ?>

    <div class="header__punchline header__punchline--small header__punchline--right container">
        <h1><?php the_title() ?></h1>
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
                    <div class="breadcrumb-content"><a href="<?php echo site_url('/blog') ?>">blog</a></div>
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
            <?php the_content(); ?>
        </div>
        <div class="row justify-content-end">
            <div class="blockquote-footer section__author">
                <span><?php the_author_posts_link(); ?></span>
                <i class="fas fa-user-circle"></i>
            </div>
        </div>
    </div>
<?php } ?>
    </div>
    </div>
<?php
get_footer();
?>