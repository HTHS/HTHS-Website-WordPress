<?php
/**
 * Register navigation menu in header.
 */
function register_my_menu() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

global $hths_widget_wrapper_args;
/**
 * Global defaults for the fancybox widget wrapper markup.
 */
$hths_widget_wrapper_args = array(
    'before_widget' => '<div class="fancybox">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="fancytitle">',
    'after_title' => '</h2>'
);

/**
 * Register sidebars, widgetized areas, and custom widgets.
 */
function hths_widgets_init() {
    global $hths_widget_wrapper_args;

    require('widgets/HTHS_Calendar_Widget.php');
    register_widget('HTHS_Calendar_Widget');

    require('widgets/HTHS_Weather_Widget.php');
    register_widget('HTHS_Weather_Widget');

    require('widgets/HTHS_Social_Feed_Widget.php');
    register_widget('HTHS_Social_Feed_Widget');

    require('widgets/HTHS_Stay_Connected_Widget.php');
    register_widget('HTHS_Stay_Connected_Widget');

    require('widgets/HTHS_Recent_News_Widget.php');
    register_widget('HTHS_Recent_News_Widget');

    require('widgets/HTHS_One_Call_Now_Widget.php');
    register_widget('HTHS_One_Call_Now_Widget');

    register_sidebar(wp_parse_args(array(
        'name' => 'Main Right Sidebar',
        'id' => 'main_sidebar'
    ), $hths_widget_wrapper_args));

    register_sidebar(wp_parse_args(array(
        'name' => 'Homepage Left Column',
        'id' => 'home_left'
    ), $hths_widget_wrapper_args));

    register_sidebar(wp_parse_args(array(
        'name' => 'Homepage Right Column',
        'id' => 'home_right'
    ), $hths_widget_wrapper_args));
}
add_action( 'widgets_init', 'hths_widgets_init' );


/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_stylesheet_directory() . '/lib/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );

function my_theme_register_required_plugins() {
    $plugins = array(
        array(
            'name' => 'WP-Filebase Download Manager',
            'slug' => 'wp-filebase',
            'required' => true,
        ),
    );

    $config = array(
        'default_path' => get_stylesheet_directory() . '/lib/plugins/',
    );

    tgmpa( $plugins, $config );
}
