<?php
$tk_options = get_option('tk_settings');
$tk_portfolio_slug = (isset($tk_options['portfolio_slug'])) ? $tk_options['portfolio_slug'] : 'portfolio-item';
/*************************** POST TYPE **************************
 *
 * Register Post type
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_post_type_register  
**/
$labels = array(
	'name'               => _x( 'Portfolios', 'post type general name', 'tallykit_textdomain' ),
	'singular_name'      => _x( 'Portfolio', 'post type singular name', 'tallykit_textdomain' ),
	'menu_name'          => _x( 'Portfolios', 'admin menu', 'tallykit_textdomain' ),
	'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'tallykit_textdomain' ),
	'add_new'            => _x( 'Add New', 'Portfolio', 'tallykit_textdomain' ),
	'add_new_item'       => __( 'Add New Portfolio', 'tallykit_textdomain' ),
	'new_item'           => __( 'New Portfolio', 'tallykit_textdomain' ),
	'edit_item'          => __( 'Edit Portfolio', 'tallykit_textdomain' ),
	'view_item'          => __( 'View Portfolio', 'tallykit_textdomain' ),
	'all_items'          => __( 'All Portfolios', 'tallykit_textdomain' ),
	'search_items'       => __( 'Search Portfolios', 'tallykit_textdomain' ),
	'parent_item_colon'  => __( 'Parent Portfolios:', 'tallykit_textdomain' ),
	'not_found'          => __( 'No Portfolios found.', 'tallykit_textdomain' ),
	'not_found_in_trash' => __( 'No Portfolios found in Trash.', 'tallykit_textdomain' ),
);

$settings = array(
	'post_type_name'     => 'tallykit_portfolio',
	'args'               => array(),
	'labels'             => $labels,
	'rewrite'            => array( 'slug' => apply_filters('tallykit_portfolio_slug', $tk_portfolio_slug) ),
	'supports'           => array( 'title', 'editor', 'thumbnail' ),
	'menu_icon'          => 'dashicons-portfolio',
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
$post_columns = new acoc_post_column_editor('tallykit_portfolio');

 //add native column
$post_columns->add_column('title',
  array(
		'label'    => __('Title', 'tallykit_textdomain'),
		'type'     => 'native',
		'sortable' => true
	)
);
//add thumbnail column
$post_columns->add_column('post_thumb_portfolio',
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
new acoc_post_taxonomy_filter(array('tallykit_portfolio' => array('tallykit_portfolio_category', 'tallykit_portfolio_tag')));







/**************************** Taxonomy Register *************************
 *
 * Register Taxonomy
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_taxonomy_register  
**/
$labels = array(
	'name'                       => _x( 'Portfolio Categories', 'taxonomy general name', 'tallykit_textdomain' ),
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
	'taxonomy'  => 'tallykit_portfolio_category',
	'post_type' => 'tallykit_portfolio',
	'args'      => array(),
	'labels'    => $labels,
	'rewrite'   => array( 'slug' => apply_filters('portfolio_category_slug', 'portfolio_category') ),
	'hierarchical' => true,
);
new acoc_taxonomy_register($settings);


$labels = array(
	'name'                       => _x( 'Portfolio Tags', 'taxonomy general name', 'tallykit_textdomain' ),
	'singular_name'              => _x( 'Tag', 'taxonomy singular name', 'tallykit_textdomain' ),
	'search_items'               => __( 'Search Tags', 'tallykit_textdomain' ),
	'popular_items'              => __( 'Popular Tags', 'tallykit_textdomain' ),
	'all_items'                  => __( 'All Tags', 'tallykit_textdomain' ),
	'parent_item'                => null,
	'parent_item_colon'          => null,
	'edit_item'                  => __( 'Edit Tag', 'tallykit_textdomain' ),
	'update_item'                => __( 'Update Tag', 'tallykit_textdomain' ),
	'add_new_item'               => __( 'Add New Tag', 'tallykit_textdomain' ),
	'new_item_name'              => __( 'New Tag Name', 'tallykit_textdomain' ),
	'separate_items_with_commas' => __( 'Separate Tags with commas', 'tallykit_textdomain' ),
	'add_or_remove_items'        => __( 'Add or remove Tags', 'tallykit_textdomain' ),
	'choose_from_most_used'      => __( 'Choose from the most used Tags', 'tallykit_textdomain' ),
	'not_found'                  => __( 'No Tags found.', 'tallykit_textdomain' ),
	'menu_name'                  => __( 'Tags', 'tallykit_textdomain' ),
);
$settings = array(
	'taxonomy'  => 'tallykit_portfolio_tag',
	'post_type' => 'tallykit_portfolio',
	'args'      => array(),
	'labels'    => $labels,
	'rewrite'   => array( 'slug' => apply_filters('portfolio_tag_slug', 'portfolio_tag') ),
	'hierarchical' => false,
);
new acoc_taxonomy_register($settings);