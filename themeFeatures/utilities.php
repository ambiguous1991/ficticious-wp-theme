<?php
function generatePageBanner( $args ) {
    ?>
    <header class="header header--small"
            style="background-image: url('<?php
            $PAGE_BANNER = get_field('page_banner')[ 'sizes' ][ 'page-banner' ];
            if ($PAGE_BANNER) {
                print_r($PAGE_BANNER);
            } else echo esc_url(get_theme_mod('ficticious_header_bg')); ?>');">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="<?php echo site_url(); ?>">
                    <h2><?php echo get_bloginfo('name'); ?></h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <small>rozwiń </small><i class="fa fa-caret-down"></i>
                </button>
                <?php generate_nav('header_menu', true); ?>
            </div>
        </nav>
        <div class="header__punchline header__punchline--small header__punchline--right container">
            <h1><?php
                if ($args[ 'title' ]) {
                    echo $args[ 'title' ];
                } else the_title() ?></h1>
        </div>
    </header>
    <?php
}

function generate_nav( $theme_location, $dropdowns, $container = 'div', $containerClass = 'collapse navbar-collapse justify-content-end' ) {
    $menuArgs = array(
        'theme_location' => $theme_location,
        'depth' => $dropdowns ? 2 : 1,
        'menu_class' => 'nav navbar-nav mr-0',
        'container_class' => $containerClass,
        'container_id' => 'navbarSupportedContent',
        'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
        'walker' => new WP_Bootstrap_Navwalker(),
        'container' => $container,
    );

    return wp_nav_menu($menuArgs);
}
