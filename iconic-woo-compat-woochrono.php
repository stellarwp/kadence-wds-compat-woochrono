<?php
/**
 * Plugin Name:       Kadence WDS compatibility plugin [WooChrono]
 * Plugin URI:        https://iconicwp.com/products/woocommerce-delivery-slots/?utm_source=iconicwp&utm_medium=plugin&utm_campaign=iconic-wds-compat-woochrono
 * Description:       Compatibility between {Delivery Slots by Kadence} and WooChrono.
 * Author:            Kadence WP
 * Author URI:        https://www.kadencewp.com/
 * Text Domain:       iconic-compat-72370
 * Domain Path:       /languages
 * Version:           0.1.0
 * GitHub Plugin URI: stellarwp/kadence-wds-compat-woochrono
 *
 * Use a random 5 digit number to prevent conflicts. This is used
 * for function name prefixes (iconic_compat_{54494}_) and the
 * textdomain. https://numbergenerator.org/random-5-digit-number-generator
 *
 * In order to enable automatic updates for the customer, recommend installing
 * Git Updater: https://github.com/afragen/git-updater
 *
 * Make sure to update the git URL for this plugin in the plugin headers.
 *
 * Replace anything in curly brackets {}.
 */

/**
 * Init.
 */
/**
 * Change the format of shipping method ID.
 *
 * @return array
 */
function iconic_compat_72370_shipping_replace_shipping_method_id( $shipping_method_options ) {
	if ( ! function_exists( 'chronofood' ) ) {
		return $shipping_method_options;
	}

	foreach ( $shipping_method_options as $key => $method_name ) {
		if ( 'wc_chrono' === substr( $key, 0, 9 ) ) {

			$new_key = str_replace( 'wc_', '', $key );
			unset( $shipping_method_options[ $key ] );
			$shipping_method_options[ $new_key ] = $method_name;
		}
	}

	return $shipping_method_options;
}

add_filter( 'iconic_wds_shipping_method_options', 'iconic_compat_72370_shipping_replace_shipping_method_id', 10 );