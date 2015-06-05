<?php
/**
 *
 *
 * @package   Lasso_Yoast
 * @author    Nick Haskins <nick@aesopinteractive.com>
 * @link      http://lasso.is
 * @copyright 2015 Aesopinteractive LLC
 *
 * Plugin Name:       Lasso Yoast
 * Plugin URI:        http://lasso.is
 * Description:       Yoast add-on for Lasso.
 * Version:           0.1
 * Author:            Aesopinteractive LLC
 * Author URI:        http://aesopinteractive.com
 * Text Domain:       lasso-yoast
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Set some constants
define( 'LASSO_YOAST_VERSION', '0.1' );
define( 'LASSO_YOAST_DIR', plugin_dir_path( __FILE__ ) );
define( 'LASSO_YOAST_URL', plugins_url( '', __FILE__ ) );
define( 'LASSO_YOAST_FILE', __FILE__ );
