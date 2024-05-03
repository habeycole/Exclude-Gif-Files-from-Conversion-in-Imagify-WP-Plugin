<?php
/**
 * Plugin Name: Exclude Gif Files from Conversion in Imagify WP Plugin
 * Description: This plugin excludes GIF image format from the optimization process of Imagify to the WEBP format.
 * Plugin URI: https://www.imagify.io
 * Author: Abiodun Olumide Daniels (Abbey)
 * Author URI: abiodundaniels.com.ng
 * Version: 1.0
 * Requires WP Version at least: 5.3
 * Requires PHP: 7.3
 * Copyright (c) 2024
 */

 function no_webp_for_gif( $response, $process, $file, $thumb_size, $optimization_level, $webp, $is_disabled ) {
	if ( ! $webp || $is_disabled || is_wp_error( $response ) ) {
		return $response;
	}
​
	if ( 'image/gif' !== $file->get_mime_type() ) {
		return $response;
	}
​
	return new \WP_Error( 'no_webp_for_gif', __( 'Webp version of gif is disabled by filter.' ) );
}
add_filter('imagify_auto_optimize_attachment', 'no_webp_for_gif', 10, 7);
?>
