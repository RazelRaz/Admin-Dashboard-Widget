<?php
/*
 * Plugin Name:       Admin Dashboard Widget
 * Description:       This is a basic Plugin
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Razel Ahmed
 * Author URI:        https://razelahmed.com
 */
if ( ! defined('ABSPATH') ) {
  exit;
}

class Plugin_zero{
    public function __construct() {
      add_action( 'init', [ $this, 'initialize' ] );
      add_action( 'admin_notices', [ $this, 'Show_admin_notices' ] );
      add_action( 'wp_dashboard_setup', [ $this, 'mydashboard_callback' ] );
    }

    public function initialize() {
      add_filter( 'the_title', [ $this, 'Chnage_Title_Color' ] );
    }

    public function Chnage_Title_Color( $post_title ) {
        return $post_title . 'New Post';
    }

    public function Show_admin_notices() {
      echo '<div><p class="update-message notice inline notice-success notice-alt">Im Admin Notice</p></div>';
    }

    // dahsboard widget
    public function mydashboard_callback() {
      wp_add_dashboard_widget( 'pz_new_widget', 'Plugin Zero Widget', [ $this, 'pl_zero_widget_callback' ] );
    }

    public function pl_zero_widget_callback() {
      echo 'This is First Message from Plugin Zero';
    }

}

new Plugin_zero();

