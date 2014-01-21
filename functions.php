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

    register_sidebar(wp_parse_args(array(
        'name' => 'Main Right Sidebar',
        'id' => 'main_sidebar'
    ), $hths_widget_wrapper_args));
}
add_action( 'widgets_init', 'hths_widgets_init' );