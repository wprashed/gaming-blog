<?php

function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Years.
	 */

	$labels = [
		"name" => __( "Years", "maggie" ),
		"singular_name" => __( "Year", "maggie" ),
	];

	$args = [
		"label" => __( "Years", "maggie" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'event_year', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "event_year",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
			];
	register_taxonomy( "event_year", [ "event" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );


