<?php

/** @var array $args = [
 *     'title' => 'Some title', //page title to use
 *     'subtitle' => 'Some subtitle', //page subtitle to use
 *     'bg-image-url' => 'https://my-image.jpg/', //image url to use in banner
 *     'large' => false //whether to use small banner variant
 * ] */
function generatePageBanner( array $args ) {
    $PAGE_BANNER = get_field('page_banner')[ 'sizes' ][ 'page-banner' ];
    $FALLBACK_PAGE_BANNER = esc_url(get_theme_mod('ficticious_header_bg'));

    $TITLE = get_the_title();
    $SUBTITLE = get_field('subtitle');
    $BANNER_LARGE = false;

    if ($args[ 'bg-image-url' ]) $PAGE_BANNER = $args[ 'bg-image-url' ];
    if ($args[ 'title' ]) $TITLE = $args[ 'title' ];
    if ($args[ 'subtitle' ]) $SUBTITLE = $args[ 'subtitle' ];
    if ($args[ 'large' ]) $BANNER_LARGE = true;

    ?>
    <header class="header <?php if (!$BANNER_LARGE) echo 'header--small' ?>"
            style="background-image: url('<?php
            if ($PAGE_BANNER) echo $PAGE_BANNER;
            else echo $FALLBACK_PAGE_BANNER;
            ?>');">
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
            <h1><?php echo $TITLE; ?></h1>
            <h3><?php echo $SUBTITLE ?></h3>
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
