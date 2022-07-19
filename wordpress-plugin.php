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

/**
 * https://developer.wordpress.org/reference/hooks/admin_notices/
 */
add_action( 'admin_notices', 'hello_wordpress_dashboard' );
function hello_wordpress_dashboard() {
	echo '<div class="notice notice-success is-dismissible">';
	echo '<p>Hello WordPress!</p>';
	echo '</div>';
}

/**
 * https://developer.wordpress.org/reference/hooks/the_content/
 */
add_filter( 'the_content', 'hello_wordpress_content' );
function hello_wordpress_content( $content ) {
	$content .= '<p>Hello WordPress!</p>';

	return $content;
}

/**
 * https://developer.wordpress.org/plugins/http-api/
 */
add_action( 'admin_notices', 'hello_wordpress_joke' );
function hello_wordpress_joke() {
	$response = wp_remote_get( 'https://v2.jokeapi.dev/joke/Pun?blacklistFlags=nsfw,religious,political,racist,sexist,explicit&type=single' );
	$body     = wp_remote_retrieve_body( $response );
	$content_array = json_decode( $body, true );

	echo '<div class="notice notice-success is-dismissible">';
	echo '<p>'.$content_array['joke'].'</p>';
	echo '</div>';
}