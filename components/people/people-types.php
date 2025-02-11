<?php
$tk_options = get_option('tk_settings');
$tk_people_slug = (isset($tk_options['people_slug'])) ? $tk_options['people_slug'] : 'people-item';
/*************************** POST TYPE **************************
 *
 * Register Post type
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_post_type_register  
**/
$labels = array(
	'name'               => _x( 'Peoples', 'post type general name', 'tallykit_textdomain' ),
	'singular_name'      => _x( 'People', 'post type singular name', 'tallykit_textdomain' ),
	'menu_name'          => _x( 'Peoples', 'admin menu', 'tallykit_textdomain' ),
	'name_admin_bar'     => _x( 'People', 'add new on admin bar', 'tallykit_textdomain' ),
	'add_new'            => _x( 'Add New', 'People', 'tallykit_textdomain' ),
	'add_new_item'       => __( 'Add New People', 'tallykit_textdomain' ),
	'new_item'           => __( 'New People', 'tallykit_textdomain' ),
	'edit_item'          => __( 'Edit People', 'tallykit_textdomain' ),
	'view_item'          => __( 'View People', 'tallykit_textdomain' ),
	'all_items'          => __( 'All Peoples', 'tallykit_textdomain' ),
	'search_items'       => __( 'Search Peoples', 'tallykit_textdomain' ),
	'parent_item_colon'  => __( 'Parent Peoples:', 'tallykit_textdomain' ),
	'not_found'          => __( 'No Peoples found.', 'tallykit_textdomain' ),
	'not_found_in_trash' => __( 'No Peoples found in Trash.', 'tallykit_textdomain' ),
);

$settings = array(
	'post_type_name'     => 'tallykit_people',
	'args'               => array(),
	'labels'             => $labels,
	'rewrite'            => array( 'slug' => $tk_people_slug ),
	'supports'           => array( 'title', 'editor', 'thumbnail' ),
	'menu_icon'          => 'dashicons-groups',
);
new acoc_post_type_register($settings);





 
/*************************** Post Column **************************
 *
 * Editing the post column and adding our own content
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_post_column_editor  
**/
$post_columns = new acoc_post_column_editor('tallykit_people');

 //add native column
$post_columns->add_column('title',
  array(
		'label'    => __('Title', 'tallykit_textdomain'),
		'type'     => 'native',
		'sortable' => true
	)
);
//add thumbnail column
$post_columns->add_column('tallykit_prople_post_thumb',
  array(
		'label' => __('Thumb', 'tallykit_textdomain'),
		'type'  => 'thumb',
		'size'  => 'thumbnail'
	)
);






/*************************** Post Taxonomy Filter **************************
 *
 * Add Taxonomy filter for the admin post list.
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_post_taxonomy_filter
**/
new acoc_post_taxonomy_filter(array('tallykit_people' => array('tallykit_people_category')));







/**************************** Taxonomy Register *************************
 *
 * Register Taxonomy
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_taxonomy_register  
**/
$labels = array(
	'name'                       => _x( 'People Categories', 'taxonomy general name', 'tallykit_textdomain' ),
	'singular_name'              => _x( 'Category', 'taxonomy singular name', 'tallykit_textdomain' ),
	'search_items'               => __( 'Search Categories', 'tallykit_textdomain' ),
	'popular_items'              => __( 'Popular Categories', 'tallykit_textdomain' ),
	'all_items'                  => __( 'All Categories', 'tallykit_textdomain' ),
	'parent_item'                => null,
	'parent_item_colon'          => null,
	'edit_item'                  => __( 'Edit Category', 'tallykit_textdomain' ),
	'update_item'                => __( 'Update Category', 'tallykit_textdomain' ),
	'add_new_item'               => __( 'Add New Category', 'tallykit_textdomain' ),
	'new_item_name'              => __( 'New Category Name', 'tallykit_textdomain' ),
	'separate_items_with_commas' => __( 'Separate Categories with commas', 'tallykit_textdomain' ),
	'add_or_remove_items'        => __( 'Add or remove Categories', 'tallykit_textdomain' ),
	'choose_from_most_used'      => __( 'Choose from the most used Categories', 'tallykit_textdomain' ),
	'not_found'                  => __( 'No Categories found.', 'tallykit_textdomain' ),
	'menu_name'                  => __( 'Categories', 'tallykit_textdomain' ),
);
$settings = array(
	'taxonomy'  => 'tallykit_people_category',
	'post_type' => 'tallykit_people',
	'args'      => array(),
	'labels'    => $labels,
	'rewrite'   => array( 'slug' => 'people_category' ),
	'hierarchical' => true,
);
new acoc_taxonomy_register($settings);