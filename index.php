<?php
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

        <div class="header__punchline header__punchline--small header__punchline--right container">
            <h1><?php the_title(); ?></h1>
        </div>
    </header>

    <div class="container flex-grow-1">
        <div class="section text-justify">
            <div class="section__box rounded">
                    <h3 class="section__title">Przeglądaj</h3>
            </div>
            <?php
            while (have_posts()) {
                the_post(); ?>
                <div class="container">
                    <h2>
                    </h2>
                    <?php the_content(); ?>
                </div>
            <?php } ?>
        </div>
    </div>
<?php
get_footer();
?>