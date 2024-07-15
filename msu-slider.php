<?php
/**
 * Plugin Name: Makoh slider
 * Description: A simple slider plugin similar to Slider Revolution.
 * Version: 1.0
 * Author: Samuel Makoholi
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

//include the slider file
require_once plugin_dir_path(__FILE__) . 'includes/slider.php';


// Enqueue slider scripts and styles
function mkhs_slider_enqueue_scripts()

{
    wp_enqueue_style('mkhs_slider-style', plugin_dir_url(__FILE__) . 'css/style.css');
    wp_enqueue_script('mkhs_slider-script', plugin_dir_url(__FILE__) . 'js/msu_slider.js', array('jquery'), '1.0', true);
}
//add hook action
add_action('wp_enqueue_scripts', 'mkhs_slider_enqueue_scripts');

