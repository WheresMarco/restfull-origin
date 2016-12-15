<?php
/*
  Plugin Name: REST Allow Origin
  Plugin URI: http://oddalice.se
  Description: Adds <em>Access-Control-Allow-Origin: *</em> to all REST endpoints.
  Version: 1.0
  Author: Odd Alice
  Author URI: http://oddalice.com
  Text Domain: oa-rest-allow-origin
  Domain Path: /languages
*/

add_action( 'rest_api_init', function() {
  // Remove the old cors headers
  remove_filter( 'rest_pre_serve_request', 'rest_send_cors_headers' );

  // Readd the cors headers with allow origin *
  add_filter( 'rest_pre_serve_request', function( $value ) {
    header( 'Access-Control-Allow-Origin: *' );
    header( 'Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE' );
    header( 'Access-Control-Allow-Credentials: true' );

    return $value;
	});
}, 15 );
