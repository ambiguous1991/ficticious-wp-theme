<?php

include "themeFeatures/customize.php";
include "themeFeatures/post-types.php";
include "themeFeatures/utilities.php";

function files_to_include() {
    wp_enqueue_script('jquery-3.4.1', '//code.jquery.com/jquery-3.4.1.min.js', NULL, NULL, false);
    wp_enqueue_script('jquery-validate-1.19.1', '//cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js', NULL, NULL, false);
    wp_enqueue_script('popper-js', '//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', NULL, NULL, true);
    wp_enqueue_script('bootstrap-js', '//stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', [ 'jquery', 'popper-js' ], NULL, true);
    wp_enqueue_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css');
    wp_enqueue_style('bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');
    wp_enqueue_style('fonts', '//fonts.googleapis.com/css?family=Montserrat:400,900|Open+Sans:400,700|Roboto+Condensed:400,700&display=swap&subset=latin-ext');
    wp_enqueue_style('welcome-page-style', get_template_directory_uri() . '/resources/css/main.css', false, '1.0', 'all');
    wp_enqueue_script('index-js', get_theme_file_uri('/resources/js/main.js'), NULL, '1.0', true);
}
add_action('wp_enqueue_scripts', 'files_to_include');

function ficticious_login_files_to_include() {
    wp_enqueue_style('login-stylesheet', get_template_directory_uri() . '/resources/css/login.css', false, '1.0', 'all');
    wp_enqueue_script('login-script', get_theme_file_uri('/resources/js/login.js'), NULL, '1.0', true);
}
add_action('login_enqueue_scripts', 'ficticious_login_files_to_include');

function theme_features() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menu('header_menu', 'Header title menu');
    register_nav_menu('footer_media_location', 'Footer Social Media');
    add_image_size('page-banner', 1600, 500, true);
}
add_action('after_setup_theme', 'theme_features');

function register_navwalker() {
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');