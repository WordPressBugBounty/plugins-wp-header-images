<?php
// If uninstall is not called from WordPress, exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

$wphi_option_names = array(
	'wp_header_images',
	'wphi_template',
	'wphi_template_custom',
	'wphi_styling',
	'wphi_dom',
	'wphi_on_off_options',
	'wphi_post_type_selection',
	'wphi_sidebar_settings',
	'wphi_gluri_slider',
	'wphi_header_videos',
);

$wphi_sites = is_multisite() ? get_sites( array( 'fields' => 'ids' ) ) : array( get_current_blog_id() );

foreach ( $wphi_sites as $wphi_site_id ) {
	if ( is_multisite() ) {
		switch_to_blog( $wphi_site_id );
	}
	foreach ( $wphi_option_names as $wphi_option_name ) {
		delete_option( $wphi_option_name );
	}
	if ( is_multisite() ) {
		restore_current_blog();
	}
}

foreach ( $wphi_option_names as $wphi_option_name ) {
	delete_site_option( $wphi_option_name );
}
