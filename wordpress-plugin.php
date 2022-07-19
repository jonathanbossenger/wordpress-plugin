<?php
/*
 * Plugin Name: WordPress Plugin
 * Description: This is a simple WordPress plugin.
 * Version: 1.0.0
 * Author: John Doe
 * Author URI: http://jondoe.com
 * Plugin URI: https://wp-plugin.com/
 *
 */

add_action( 'admin_notices', 'hello_wordpress_dashboard' );
function hello_wordpress_dashboard() {
	echo '<div class="notice notice-success is-dismissible">';
	echo '<p>Hello WordPress!</p>';
	echo '</div>';
}

add_filter( 'the_content', 'hello_wordpress_content' );
function hello_wordpress_content( $content ) {
	$content .= '<p>Hello WordPress!</p>';

	return $content;
}