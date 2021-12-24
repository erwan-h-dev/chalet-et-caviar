<?php

function wpm_enqueue_styles(){
	wp_enqueue_style('parent-style', get_template_directory_uri().'/style.css');
}

add_action('wp_enqueue_scripts', 'wpm_enqueue_styles');

/* ---------------------------------------------------------------------------------------------
   custom type chalet SETUP
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists('chalet_post_type') ) {

	// Register Custom Post Type
	function chalet_post_type() {
	
		$labels = array(
			'name'                  => _x( 'chalets', 'Post Type General Name', 'hitchcock_child' ),
			'singular_name'         => _x( 'chalet', 'Post Type Singular Name', 'hitchcock_child' ),
			'menu_name'             => __( 'Chalets', 'hitchcock_child' ),
			'name_admin_bar'        => __( 'Chalets', 'hitchcock_child' ),
			'archives'              => __( 'Chalets Archivés', 'hitchcock_child' ),
			// 'attributes'            => __( 'Attributes', 'hitchcock_child' ),
			'parent_item_colon'     => __( 'chalet parent:', 'hitchcock_child' ),
			'all_items'             => __( 'Tous les chalets', 'hitchcock_child' ),
			'add_new_item'          => __( 'Ajouter un nouveau chalet', 'hitchcock_child' ),
			'add_new'               => __( 'Ajouter un chalet', 'hitchcock_child' ),
			'new_item'              => __( 'Nouveau chalet', 'hitchcock_child' ),
			'edit_item'             => __( 'Editer le chalet', 'hitchcock_child' ),
			'update_item'           => __( 'Mettre à jour le chalet', 'hitchcock_child' ),
			'view_item'             => __( 'Voir le chalet', 'hitchcock_child' ),
			'view_items'            => __( 'Voir les chalets', 'hitchcock_child' ),
			'search_items'          => __( 'rechercher un chalet', 'hitchcock_child' ),
			'not_found'             => __( 'Not found', 'hitchcock_child' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'hitchcock_child' ),
			'featured_image'        => __( 'Image principale', 'hitchcock_child' ),
			'set_featured_image'    => __( 'ajouter une Image principale', 'hitchcock_child' ),
			'remove_featured_image' => __( 'supprimer l\'Image principale', 'hitchcock_child' ),
			'use_featured_image'    => __( 'utiliser l\'Image principale', 'hitchcock_child' ),
			'insert_into_item'      => __( 'insérer dans le chalet', 'hitchcock_child' ),
			'uploaded_to_this_item' => __( 'téléverser dans le chalet', 'hitchcock_child' ),
			'items_list'            => __( 'liset des chalets', 'hitchcock_child' ),
			'items_list_navigation' => __( 'menu des chalets', 'hitchcock_child' ),
			'filter_items_list'     => __( 'filtres des chalets', 'hitchcock_child' ),
		);

		$args = array(
			'label'                 => __( 'chalets', 'hitchcock_child' ),
			'description'           => __( 'Liste des chalets', 'hitchcock_child' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions'),
			'taxonomies'            => array('type_chalet'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 3,
			'menu_icon'             => 'dashicons-admin-multisite',
			'show_in_admin_bar'     => false,
			'show_in_nav_menus'     => true,
			'can_export'            => false,
			'has_archive'           => false,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
			'show_in_rest'          => false,
		);

		register_post_type( 'chalets', $args );


		$labels = array(
			'name'              => _x( 'Types de chalet', 'taxonomy general name' ),
			'singular_name'     => _x( 'Type de chalet', 'taxonomy singular name' ),
			'search_items'      => __( 'Rechercher un type de chalet' ),
			'all_items'         => __( 'Tous les type de chalet' ),
			'parent_item'       => __( 'Parent chalets' ),
			'parent_item_colon' => __( 'Parent chalets:' ),
			'edit_item'         => __( 'editer un type de chalet' ),
			'update_item'       => __( 'metre a jour un type de chalet' ),
			'add_new_item'      => __( 'Ajouter un nouveau type de chalets' ),
			'new_item_name'     => __( 'Nouveau type de chalet' ),
			'menu_name'         => __( 'Type de chalets' ),
		);

		$args   = array(
			'hierarchical'      => true, // make it hierarchical (like categories)
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			// 'rewrite'           => [ 'slug' => 'chalet' ],
		);
		register_taxonomy( 'type_chalet', 'chalets', $args );
	}
	add_action( 'init', 'chalet_post_type', 0 );

}

if ( ! function_exists( 'app_js_script' ) ){

	function app_js_script() {
		wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/assets/js/app.js', array(),'',true );
	}
	add_action( 'wp_enqueue_scripts', 'app_js_script' );
}

if ( ! function_exists( 'get_price' ) ){

	function get_price($post_id) {
		
		$price = get_field('prix', $post_id);
		$type = get_the_terms( $post_id, 'type_chalet' );

		$return = substr_replace($price, ' ', strlen($price)-3, 0)." €";

	    if($type[0]->slug == "location"){
			$return = $return." / semaine";
		}
		
		return $return;
	}
	// add_action( 'wp_enqueue_scripts', 'get_price' );
}