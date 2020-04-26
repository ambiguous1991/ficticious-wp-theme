<?php
// generic page template
get_header(); ?>

<?php
while (have_posts()) {
    the_post(); ?>

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
            <h1><?php the_title(); ?></h1>
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
                    <?php include "contact-form.php"?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }
get_footer();
?>