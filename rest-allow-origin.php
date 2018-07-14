<?php
/*
  Plugin Name: RESTfull Origin
  Plugin URI: https://wheresmar.co
  Description: Adds <em>Access-Control-Allow-Origin: *</em> to all REST endpoints.
  Version: 1.0
  Author: Marco Hyyryläinen
  Author URI: https://wheresmar.co
  Text Domain: wm-restfull-origin
  Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action( 'rest_api_init', function() {

  // Remove the old cors headers
  remove_filter( 'rest_pre_serve_request', 'rest_send_cors_headers' );

  // Re-add the cors headers with allow origin *
  add_filter( 'rest_pre_serve_request', function( $value ) {

    header( 'Access-Control-Allow-Origin: *' );
    header( 'Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE' );
    header( 'Access-Control-Allow-Credentials: true' );

    return $value;

  });

}, 15 );
