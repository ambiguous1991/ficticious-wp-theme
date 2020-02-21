<?php

function files_to_include () {
    wp_enqueue_script('jquery-3.4.1', '//code.jquery.com/jquery-3.4.1.min.js', NULL, NULL, true);
    wp_enqueue_script('popper-js', '//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', NULL, NULL, true);
    wp_enqueue_script('bootstrap-js', '//stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', ['jquery', 'popper-js'], NULL, true);
    wp_enqueue_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css');
    wp_enqueue_style('bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');
    wp_enqueue_style('fonts', '//fonts.googleapis.com/css?family=Montserrat:400,900|Open+Sans:400,700|Roboto+Condensed:400,700&display=swap&subset=latin-ext');
    wp_enqueue_style('welcome-page-style', get_template_directory_uri() . '/css/home.css', false, '1.0', 'all');
    wp_enqueue_script('index-js', get_theme_file_uri('/js/index.js'), NULL, '1.0', true);
}

add_action('wp_enqueue_scripts', 'files_to_include');

function theme_features () {
    add_theme_support('title-tag');
    register_nav_menu('header_menu', 'Header title menu');
    register_nav_menu('footer_media_location', 'Footer Social Media');
}

add_action('after_setup_theme', 'theme_features');
show_admin_bar(false);

function register_navwalker(){
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

function generate_nav($theme_location, $dropdowns, $container='div', $containerClass='collapse navbar-collapse justify-content-end') {
    $menuArgs = array(
        'theme_location'=>$theme_location,
        'depth' => $dropdowns ? 2 : 1,
        'menu_class'=>'nav navbar-nav mr-0',
        'container_class'=>$containerClass,
        'container_id'=>'navbarSupportedContent',
        'fallback_cb'=> 'WP_Bootstrap_Navwalker::fallback',
        'walker'=> new WP_Bootstrap_Navwalker(),
        'container'=>$container,
    );

    return wp_nav_menu($menuArgs);
}

function ficticious_change_head_bg( $wp_customize ) {
    $wp_customize->add_section( 'ficticious_header_bg_section' , array(
        'title'       => __( 'Header Background', 'ficticious' ),
        'priority'    => 40,
        'description' => 'Enter your description that will show up in the theme customizer section of the dashboard',
    ) );
    $wp_customize->add_setting( 'ficticious_header_bg' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ficticious_header_bg', array(
        'label'    => __( 'Background Image', 'ficticious' ),
        'section'  => 'ficticious_header_bg_section',
        'settings' => 'ficticious_header_bg',
    ) ) );
}
add_action('customize_register', 'ficticious_change_head_bg');