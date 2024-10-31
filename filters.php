<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly  

add_filter( 'plugin_action_links_plugin-compatibility/plugin-compatibility.php', 'plcom_settings_link' );
function plcom_settings_link( $links ) {
	// Build and escape the URL.
	$url = esc_url( get_admin_url().'tools.php?page=plcom' );
	// Create the link.
	$settings_link = "<a style=\"color:green;font-weight:bold;\" href='$url'>" . __( 'Open plugin page' ) . '</a>';
	// Adds the link to the end of the array.
    $links[] = $settings_link;
	return $links;
}


