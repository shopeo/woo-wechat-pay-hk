<?php
/**
 * Plugin Name: WeChat Hong Kong Payment Gateway
 * Plugin URI: https://wordpress.org/plugins/woo-wechat-pay-hk
 * Description: WeChat Hong Kong Payment Gateway Woocommerce Plugin
 * Author: SHOPEO
 * Version: 0.0.1
 * Author URI: https://shopeo.cn
 * License: GPL3+
 * Text Domain: woo-wechat-pay-hk
 * Domain Path: /languages
 * Requires at least: 5.9
 * Requires PHP: 5.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once 'vendor/autoload.php';
}

if ( ! defined( 'WOO_WECHAT_PAY_HK_PLUGIN_FILE' ) ) {
	define( 'WOO_WECHAT_PAY_HK_PLUGIN_FILE', __FILE__ );
}

if ( ! function_exists( 'woo_wechat_pay_hk_activation' ) ) {
	function woo_wechat_pay_hk_activation() {

	}
}

register_activation_hook( WOO_WECHAT_PAY_HK_PLUGIN_FILE, 'woo_wechat_pay_hk_activation' );

if ( ! function_exists( 'woo_wechat_pay_hk_deactivation' ) ) {
	function woo_wechat_pay_hk_deactivation() {

	}
}

register_deactivation_hook( WOO_WECHAT_PAY_HK_PLUGIN_FILE, 'woo_wechat_pay_hk_deactivation' );

if ( ! function_exists( 'woo_wechat_pay_hk_init' ) ) {
	function woo_wechat_pay_hk_init() {

		//load text domain
		load_plugin_textdomain( 'woo-wechat-pay-hk', false, dirname( plugin_basename( WOO_WECHAT_PAY_HK_PLUGIN_FILE ) ) . '/languages' );
	}
}

add_action( 'init', 'woo_wechat_pay_hk_init' );

add_action( 'admin_enqueue_scripts', function () {
	$plugin_version = get_plugin_data( WOO_WECHAT_PAY_HK_PLUGIN_FILE )['Version'];
	//style

	//script
	wp_enqueue_script( 'woo-wechat-pay-hk-admin-script', plugins_url( '/assets/js/admin.js', WOO_WECHAT_PAY_HK_PLUGIN_FILE ), array( 'jquery' ), $plugin_version );
	wp_localize_script( 'woo-wechat-pay-hk-admin-script', 'woo_wechat_pay_hk', array(
		'ajax_url' => admin_url( 'admin-ajax.php' )
	) );
} );

add_action( 'wp_enqueue_scripts', function () {
	$plugin_version = get_plugin_data( WOO_WECHAT_PAY_HK_PLUGIN_FILE )['Version'];
	//style
	wp_enqueue_style( 'woo-wechat-pay-hk-style', plugins_url( '/assets/css/style.css', WOO_WECHAT_PAY_HK_PLUGIN_FILE ), array(), $plugin_version );
	wp_style_add_data( 'woo-wechat-pay-hk-style', 'rtl', 'replace' );

	//script
	wp_enqueue_script( 'woo-wechat-pay-hk-script', plugins_url( '/assets/js/app.js', WOO_WECHAT_PAY_HK_PLUGIN_FILE ), array( 'jquery' ), $plugin_version );
	wp_localize_script( 'woo-wechat-pay-hk-script', 'woo_wechat_pay_hk', array(
		'ajax_url' => admin_url( 'admin-ajax.php' )
	) );
} );
