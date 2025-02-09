<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://swit.hr
 * @since             1.0.0
 * @package           PlCom
 *
 * @wordpress-plugin
 * Plugin Name:       Plugin Compatibility Table
 * Plugin URI:        https://wpcompatible.com
 * Description:       Find Compatible WordPress / Plugin / PHP Version with complete plugin compatibilty table
 * Version:           1.0.0
 * Author:            SWIT,Sandi Winter
 * Author URI:        https://swit.hr
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugincompatibility
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLCOM_VERSION', '1.0.0' );
define( 'PLCOM_NAME', 'plugincompatibility' );
define( 'PLCOM_PATH', plugin_dir_path( __FILE__ ) );
define( 'PLCOM_URL', plugin_dir_url( __FILE__ ) );



/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-compatible-activator.php
 */
function activate_plcom() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-compatible-activator.php';
	PlCom_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-compatible-deactivator.php
 */
function deactivate_plcom() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-compatible-deactivator.php';
	PlCom_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_plcom' );
register_deactivation_hook( __FILE__, 'deactivate_plcom' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-compatible.php';

require plugin_dir_path( __FILE__ ) . 'actions.php';
require plugin_dir_path( __FILE__ ) . 'filters.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_plcom() {

	$plugin = new PlCom();
	$plugin->run();

}
run_plcom();
