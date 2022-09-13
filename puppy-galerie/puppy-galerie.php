<?php
/**
 * Plugin Name: Puppy Galerie
 * Plugin URI: 
 * Description: Galerie Menü für die Puppy Galerien
 * Version: 1.2.1
 * Author: Felix Limburger
 * Author URI: https://felixlimburger.de
 */

/**
  * Updater
  */


require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/puppyspike/Puppy-Galerie/',
	__FILE__,
	'puppy-galerie'
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('main');

//Optional: If you're using a private repository, specify the access token like this:
$myUpdateChecker->setAuthentication('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');


/**
 * Key Name
 * cpt = custom post type
 */

#require_once( plugin_dir_path( __FILE__ ) . 'form-library.php');
#require_once( plugin_dir_path( __FILE__ ) . 'custom-meta-box.php');
#require_once( plugin_dir_path( __FILE__ ) . 'custom-post-column.php');
#require_once( plugin_dir_path( __FILE__ ) . 'custom-post-filter.php');

// Register Custom Post Type Galerie
add_action( 'init', 'your_prefix_register_post_type' );
function your_prefix_register_post_type() {
	$labels = [
		'name' => _x( 'Galerien', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Galerie', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Galerien', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Galerie', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Galerie Archive', 'textdomain' ),
		'attributes' => __( 'Galerie Attribute', 'textdomain' ),
		'parent_item_colon' => __( 'Eltern Galerie:', 'textdomain' ),
		'all_items' => __( 'Alle Galerien', 'textdomain' ),
		'add_new_item' => __( 'Galerie erstellen', 'textdomain' ),
		'add_new' => __( 'Erstellen', 'textdomain' ),
		'new_item' => __( 'Galerie erstellen', 'textdomain' ),
		'edit_item' => __( 'Bearbeite Galerie', 'textdomain' ),
		'update_item' => __( 'Aktualisiere Galerie', 'textdomain' ),
		'view_item' => __( 'Galerie anschauen', 'textdomain' ),
		'view_items' => __( 'Galerien anschauen', 'textdomain' ),
		'search_items' => __( 'Suche Galerie', 'textdomain' ),
		'not_found' => __( 'Keine Galerien gefunden.', 'textdomain' ),
		'not_found_in_trash' => __( 'Keine Galerien im Papierkorb gefunden.', 'textdomain' ),
		'featured_image' => __( 'Beitragsbild', 'textdomain' ),
		'set_featured_image' => __( 'Beitragsbild festlegen', 'textdomain' ),
		'remove_featured_image' => __( 'Beitragsbild entfernen', 'textdomain' ),
		'use_featured_image' => __( 'Als Beitragsbild verwenden', 'textdomain' ),
		'insert_into_item' => __( 'In Galerie einfügen', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Zu diesem Galerie hochgeladen', 'textdomain' ),
		'items_list' => __( 'Galerien Liste', 'textdomain' ),
		'items_list_navigation' => __( 'Galerien Liste Navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Galerien Liste', 'textdomain' ),
		'item_published' => __( 'Galerie veröffentlicht', 'textdomain' ),
		'item_published_privately' => __( 'Galerie privat veröffentlicht', 'textdomain' ),
		'item_reverted_to_draft' => __( 'Galerie als Entwurf gespeichert', 'textdomain' ),
		'item_scheduled' => __( 'Galerie geplant', 'textdomain' ),
		'item_updated' => __( 'Galerie aktualisiert', 'textdomain' ),
	];
	$args = [
		'label'               => esc_html__( 'Galerien', 'textdomain' ),
				'labels'              => $labels,
				'description'         => '',
				'public'              => true,
				'hierarchical'        => false,
				'exclude_from_search' => false,
				'publicly_queryable'  => true,
				'show_ui'             => true,
				'show_in_nav_menus'   => true,
				'show_in_admin_bar'   => true,
				'show_in_rest'        => true,
				'query_var'           => true,
				'can_export'          => true,
				'delete_with_user'    => true,
				'has_archive'         => true,
				'rest_base'           => '',
				'show_in_menu'        => true,
				'menu_position'       => 4,
				'menu_icon'           => 'dashicons-format-gallery',
				'capability_type'     => 'post',
				'supports'            => ['title', 'editor', 'thumbnail'],
				'taxonomies'          => ['galerie_kategorie'],
				'rewrite'             => false,
			];
	register_post_type( 'galerie', $args );
}


add_action( 'init', 'your_prefix_register_taxonomy' );
function your_prefix_register_taxonomy() {
	$labels = [
		'name'              => _x( 'Event', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Events', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Suche Event', 'textdomain' ),
		'all_items'         => __( 'Alle Event', 'textdomain' ),
		'parent_item'       => __( 'Eltern Events', 'textdomain' ),
		'parent_item_colon' => __( 'Eltern Events:', 'textdomain' ),
		'edit_item'         => __( 'Bearbeite Events', 'textdomain' ),
		'update_item'       => __( 'Aktualisiere Events', 'textdomain' ),
		'add_new_item'      => __( 'Events hinzufügen', 'textdomain' ),
		'new_item_name'     => __( 'Neuer Events Name', 'textdomain' ),
		'menu_name'         => __( 'Events', 'textdomain' ),
	];
	$args = [
		'label'              => esc_html__( 'Events', 'textdomain' ),
		'labels'             => $labels,
		'description'        => '',
		'public'             => true,
		'publicly_queryable' => true,
		'hierarchical'       => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_nav_menus'  => true,
		'show_in_rest'       => true,
		'show_tagcloud'      => false,
		'show_in_quick_edit' => true,
		'show_admin_column'  => true,
		'query_var'          => true,
		'sort'               => false,
		'meta_box_cb'        => 'post_tags_meta_box',
		'rest_base'          => '',
		'rewrite'            => [
			'with_front'   => false,
			'hierarchical' => false,
		],
	];
	register_taxonomy( 'galerie_kategorie', ['galerie'], $args );
}