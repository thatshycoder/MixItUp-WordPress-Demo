<?php
/**
 * Plugin Name: MixItUp Demo
 * Description: Display WordPress posts in a nice grid and filter them 
 * with beautiful animations.
 * Author: Shycoder
 * Author URI: https://shycoder.com
 * License: GPLv2 or later
 */

// enqueue scripts
add_action('wp_enqueue_scripts', 'md_enqueue_scripts');

function md_enqueue_scripts()
{
    // jQuery
    wp_register_script('jQuery', 'https://code.jquery.com/jquery-3.5.1.min.js', '', '', true);
    wp_enqueue_script('jQuery');

    // MixItUp
    wp_register_script('md-mixitup', plugin_dir_url(__FILE__) . 'assets/js/mixitup.min.js', array('jQuery'), '', true);
    wp_enqueue_script('md-mixitup');

    $script = file_get_contents(plugin_dir_url(__FILE__) . 'assets/js/script.js');
    wp_add_inline_script('md-mixitup', $script, 'after');

    // Bootstrap
    wp_register_style('md-bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
    wp_enqueue_style('md-bootstrap');
}

require_once(plugin_dir_path(__FILE__) . '/posts.php');
