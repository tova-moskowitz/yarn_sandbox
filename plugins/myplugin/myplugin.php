<?php
   /*
   Plugin Name: Tova's Plugin
   Plugin URI:
   Description: Creates metaboxes
   Version: 1
   Author: Tova Moskowitz
   Author URI:
   License:
   */

//create form
//validation
//update database



// Register Custom Post Type
function create_custom_project_type() {

	$labels = array(
		'name'                  => _x( 'Projects', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Projects', 'text_domain' ),
		'name_admin_bar'        => __( 'Projects', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Projects', 'text_domain' ),
		'add_new_item'          => __( 'Add New Project', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Project', 'text_domain' ),
		'description'           => __( 'My knitting and crochet projects', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'project', $args );

}
add_action( 'init', 'create_custom_project_type', 0 );




function add_project_meta_box(){
	add_meta_box( 'meta-box-id', 'Add a New Project', 'create_a_new_project', 'project' );
}

add_action('add_meta_boxes', 'add_project_meta_box');

function create_a_new_project(){
	?>
	<label>Project Name
		<input type="text" name="project-name" /><br/>
	</label>

	<label>Yarn Brand
		<input type="text" name="yarn-brand" /><br/>
	</label>

	<label>Yarn Name
		<input type="text" name="yarn-name" /><br/>
	</label>
<?php
}

function save_project_info_to_db($post){
	global $post;
	// echo '<pre>';
	// var_dump($post);
	// die;
    if(isset($_POST['yarn-name'])){
        update_post_meta($_POST['post_ID'], 'project-name',  $_POST['project-name']);
        get_post_meta($post->ID, 'project-name' , true);
    }
      if(isset($_POST['yarn-brand'])){
        update_post_meta($_POST['post_ID'], 'yarn-brand',  $_POST['yarn-brand']);
        get_post_meta($post->ID, 'yarn-brand', true);
    }
      if(isset($_POST['yarn-name'])){
        update_post_meta($_POST['post_ID'], 'yarn-name',  $_POST['yarn-name']);
        get_post_meta($post->ID, 'yarn-name', true);
    }  
}
add_action( 'save_post', 'save_project_info_to_db' );



	// echo '<pre>';
	// var_dump($_POST);
	// die;






