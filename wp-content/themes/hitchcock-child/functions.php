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
			'name'                  => _x( 'chalets', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'chalets', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Chalets', 'text_domain' ),
			'name_admin_bar'        => __( 'Chalets', 'text_domain' ),
			'archives'              => __( 'Chalets Archivés', 'text_domain' ),
			'attributes'            => __( 'Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'chalet parent:', 'text_domain' ),
			'all_items'             => __( 'Tous les chalets', 'text_domain' ),
			'add_new_item'          => __( 'Ajouter un nouveau chalet', 'text_domain' ),
			'add_new'               => __( 'Ajouter un chalet', 'text_domain' ),
			'new_item'              => __( 'Nouveau chalet', 'text_domain' ),
			'edit_item'             => __( 'Editer le chalet', 'text_domain' ),
			'update_item'           => __( 'Mettre à jour le chalet', 'text_domain' ),
			'view_item'             => __( 'Voir le chalet', 'text_domain' ),
			'view_items'            => __( 'Voir les chalets', 'text_domain' ),
			'search_items'          => __( 'rechercher un chalet', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Image principale', 'text_domain' ),
			'set_featured_image'    => __( 'ajouter une Image principale', 'text_domain' ),
			'remove_featured_image' => __( 'supprimer l\'Image principale', 'text_domain' ),
			'use_featured_image'    => __( 'utiliser l\'Image principale', 'text_domain' ),
			'insert_into_item'      => __( 'insérer dans le chalet', 'text_domain' ),
			'uploaded_to_this_item' => __( 'téléverser dans le chalet', 'text_domain' ),
			'items_list'            => __( 'liset des chalets', 'text_domain' ),
			'items_list_navigation' => __( 'menu des chalets', 'text_domain' ),
			'filter_items_list'     => __( 'filtres des chalets', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'chalets', 'text_domain' ),
			'description'           => __( 'Liste des chalets', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes' ),
			'taxonomies'            => array( 'category', 'Attributes' ),
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
	
	}
	add_action( 'init', 'chalet_post_type', 0 );
	
	}