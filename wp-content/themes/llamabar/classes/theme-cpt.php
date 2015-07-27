<?php
class ckCustomPostTypes {

	public function __construct() {
		add_action( 'cmb2_init', array($this,'ck_custom_meta'));
		add_action('init',array($this,'ck_custom_posts'));

	}

    function ck_custom_posts()
	{
		// Register custom post types
		register_post_type(	'athletes', 
			array(	
				'label' 			=> __('Athletes'),
				'labels' 			=> array(	'name' 					=> __('Athletes'),
												'singular_name' 		=> __('Athlete'),
												'add_new' 				=> __('Add New'),
												'add_new_item' 			=> __('Add New Athlete'),
												'edit' 					=> __('Edit'),
												'edit_item' 			=> __('Edit Athlete'),
												'new_item' 				=> __('New Athlete'),
												'view_item'				=> __('View Athlete'),
												'search_items' 			=> __('Search Athlete'),
												'not_found' 			=> __('No Athlete found'),
												'not_found_in_trash' 	=> __('No Athlete found in trash')	),
				'public' 			=> true,
				'can_export'		=> true,
				'show_ui' 			=> true, // UI in admin panel
				'_builtin' 			=> false, // It's a custom post type, not built in
				'_edit_link' 		=> 'post.php?post=%d',
				'capability_type' 	=> 'post',
				'menu_icon' 		=> 'dashicons-location-alt',
				'hierarchical' 		=> false,
				'has_archive' 		=> true,
				'rewrite' 			=> array(	"slug" => "athlete"	), // Permalinks
				'query_var' 		=> "athlete", // This goes to the WP_Query schema
				'supports' 			=> array(	'title',																
												'editor',
												'thumbnail'
												),
				'show_in_nav_menus'	=> false ,
				'taxonomies'		=> array()
			)
		);

		register_post_type(	'vendors', 
			array(	
				'label' 			=> __('Vendors'),
				'labels' 			=> array(	'name' 					=> __('Vendors'),
												'singular_name' 		=> __('Vendor'),
												'add_new' 				=> __('Add New'),
												'add_new_item' 			=> __('Add New Vendor'),
												'edit' 					=> __('Edit'),
												'edit_item' 			=> __('Edit Vendor'),
												'new_item' 				=> __('New Vendor'),
												'view_item'				=> __('View Vendor'),
												'search_items' 			=> __('Search Vendor'),
												'not_found' 			=> __('No Vendor found'),
												'not_found_in_trash' 	=> __('No Vendor found in trash')	),
				'public' 			=> true,
				'can_export'		=> true,
				'show_ui' 			=> true, // UI in admin panel
				'_builtin' 			=> false, // It's a custom post type, not built in
				'_edit_link' 		=> 'post.php?post=%d',
				'capability_type' 	=> 'post',
				'menu_icon' 		=> 'dashicons-location-alt',
				'hierarchical' 		=> false,
				'has_archive' 		=> true,
				'rewrite' 			=> array(	"slug" => "vendor"	), // Permalinks
				'query_var' 		=> "vendor", // This goes to the WP_Query schema
				'supports' 			=> array(	'title',
												'editor',																
												'thumbnail'
												),
				'show_in_nav_menus'	=> false ,
				'taxonomies'		=> array()
			)
		);	

		register_taxonomy(	"location", 
			array(	"vendors"	), 
			array (	"hierarchical" 		=> true, 
					"label" 			=> "Locations", 
					'labels' 			=> array(	'name' 				=> __('Locations'),
													'singular_name' 	=> __('Location'),
													'search_items' 		=> __('Search Location'),
													'popular_items' 	=> __('Popular Locations'),
													'all_items' 		=> __('All Locations'),
													'parent_item' 		=> __('Parent Location'),
													'parent_item_colon' => __('Parent Location:'),
													'edit_item' 		=> __('Edit Location'),
													'update_item'		=> __('Update Location'),
													'add_new_item' 		=> __('Add New Location'),
													'new_item_name' 	=> __('New Location Name')	), 
					'public' 			=> true,
					'show_ui' 			=> true,
					"rewrite" 			=> array('slug' => 'location', 'hierarchical' => false)	
				)
		);

		
	}

	public function ck_custom_meta() {

	    // Start with an underscore to hide fields from custom fields list
	    $prefix = '_ck_';

	    
	    $page_meta = new_cmb2_box( array(
	        'id'            => $prefix . 'page_metabox',
	        'title'         => __( 'Page Meta', 'cmb2' ),
	        'object_types'  => array( 'page', ), // Post type
	        'context'       => 'normal',
	        'priority'      => 'high',
	        'show_names'    => true, // Show field names on the left
	        // 'cmb_styles' => false, // false to disable the CMB stylesheet
	        // 'closed'     => true, // true to keep the metabox closed by default
	    ) );

		$group_field_id = $page_meta->add_field( array(
		    'id'          => $prefix.'page_links',
		    'type'        => 'group',
		    'description' => __( 'Generates reusable form entries', 'cmb' ),
		    'options'     => array(
		        'group_title'   => __( 'Entry {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
		        'add_button'    => __( 'Add Another Entry', 'cmb' ),
		        'remove_button' => __( 'Remove Entry', 'cmb' ),
		        'sortable'      => true, // beta
		    ),
		) );

		$page_meta->add_field( array(
		    'name'    => 'Page Header Content',
		    'desc'    => 'enter the building header area content',
		    'id'      => $prefix.'page_header',
		    'type'    => 'textarea'
		) );


		// Id's for group's fields only need to be unique for the group. Prefix is not needed.
		$page_meta->add_group_field( $group_field_id, array(
		    'name' => 'Page Title',
		    'id'   => 'title',
		    'type' => 'text',
		    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
		) );

		$page_meta->add_group_field( $group_field_id, array(
		    'name' => 'Page Link',
		    'description' => 'Write a short description for this entry',
		    'id'   => 'link',
		    'type' => 'text',
		) );

		$page_meta->add_group_field( $group_field_id, array(
		    'name' => 'Entry Image',
		    'id'   => 'image',
		    'type' => 'file',
		) );

		
		$product_meta = new_cmb2_box( array(
	        'id'            => $prefix . 'product_metabox',
	        'title'         => __( 'Product Meta', 'cmb2' ),
	        'object_types'  => array( 'page', ), // Post type
	        'show_on'      => array( 'key' => 'page-template', 'value' => 'templates/template-product.php' ),
	        'context'       => 'normal',
	        'priority'      => 'high',
	        'show_names'    => true, // Show field names on the left
	        // 'cmb_styles' => false, // false to disable the CMB stylesheet
	        // 'closed'     => true, // true to keep the metabox closed by default
	    ) );

		$product_meta->add_field( array(
		    'name'    => 'Top Left Image A',
		    'desc'    => 'Upload an image or enter an URL.',
		    'id'      => 'products_1',
		    'type'    => 'file',
		    // Optionally hide the text input for the url:
		    'options' => array(
		        'url' => false,
		    ),
		) );

		$product_meta->add_field( array(
		    'name'    => 'Top Left Image B',
		    'desc'    => 'Upload an image or enter an URL.',
		    'id'      => 'products_2',
		    'type'    => 'file',
		    // Optionally hide the text input for the url:
		    'options' => array(
		        'url' => false,
		    ),
		) );

		$product_meta->add_field( array(
		    'name'    => 'Open Bar Image',
		    'desc'    => 'Upload an image or enter an URL.',
		    'id'      => 'products_3',
		    'type'    => 'file',
		    // Optionally hide the text input for the url:
		    'options' => array(
		        'url' => false,
		    ),
		) );

		$product_meta->add_field( array(
		    'name'    => 'Nutritional Information',
		    'desc'    => 'Upload an image or enter an URL.',
		    'id'      => 'products_5',
		    'type'    => 'file',
		    // Optionally hide the text input for the url:
		    'options' => array(
		        'url' => false,
		    ),
		) );

		$product_meta->add_field( array(
		    'name'    => 'Secondary Section Content Title',
		    'desc'    => 'enter the second area content title',
		    'id'      => $prefix.'secondary_header',
		    'type'    => 'text'
		) );

		$product_meta->add_field( array(
		    'name'    => 'Ingredients',
		    'desc'    => 'enter the ingredients content',
		    'id'      => $prefix.'ingredients',
		    'type'    => 'wysiwyg'
		) );
		

		$ingredients_meta = new_cmb2_box( array(
	        'id'            => $prefix . 'ingrdients_metabox',
	        'title'         => __( 'Page Meta', 'cmb2' ),
	        'object_types'  => array( 'page', ), // Post type
	        'show_on'      => array( 'key' => 'page-template', 'value' => 'templates/template-ingredients.php' ),
	        'context'       => 'normal',
	        'priority'      => 'high',
	        'show_names'    => true, // Show field names on the left
	        // 'cmb_styles' => false, // false to disable the CMB stylesheet
	        // 'closed'     => true, // true to keep the metabox closed by default
	    ) );

	    $ingredients_meta->add_field( array(
		    'name' => 'Ingredients Images',
		    'desc' => '',
		    'id'   => 'ingredients_images',
		    'type' => 'file_list',
		    // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
		) );

		$about_meta = new_cmb2_box( array(
	        'id'            => $prefix . 'about_metabox',
	        'title'         => __( 'About Meta', 'cmb2' ),
	        'object_types'  => array( 'page', ), // Post type
	        'show_on'      => array( 'key' => 'page-template', 'value' => 'template-about.php' ),
	        'context'       => 'normal',
	        'priority'      => 'high',
	        'show_names'    => true, // Show field names on the left
	        // 'cmb_styles' => false, // false to disable the CMB stylesheet
	        // 'closed'     => true, // true to keep the metabox closed by default
	    ) );

	    $about_meta->add_field( array(
		    'name'    => 'Top Right',
		    'desc'    => 'Upload an image or enter an URL.',
		    'id'      => 'about_1',
		    'type'    => 'file',
		    // Optionally hide the text input for the url:
		    'options' => array(
		        'url' => false,
		    ),
		) );

		$about_meta->add_field( array(
		    'name'    => 'Quote Content',
		    'desc'    => 'enter the quote for about content',
		    'id'      => $prefix.'about_quote',
		    'type'    => 'textarea'
		) );

		$about_meta->add_field( array(
		    'name'    => 'Quote Image',
		    'desc'    => 'Upload an image or enter an URL.',
		    'id'      => 'about_2',
		    'type'    => 'file',
		    // Optionally hide the text input for the url:
		    'options' => array(
		        'url' => false,
		    ),
		) );

		$about_meta->add_field( array(
		    'name'    => 'Section Content',
		    'desc'    => 'enter the final section content',
		    'id'      => $prefix.'about_content',
		    'type'    => 'textarea'
		) );

		$about_meta->add_field( array(
		    'name'    => 'Final Section Image',
		    'desc'    => 'Upload an image or enter an URL.',
		    'id'      => 'about_3',
		    'type'    => 'file',
		    // Optionally hide the text input for the url:
		    'options' => array(
		        'url' => false,
		    ),
		) );

		$athletes_meta = new_cmb2_box( array(
	        'id'            => $prefix . 'athletes_metabox',
	        'title'         => __( 'Athletes Meta', 'cmb2' ),
	        'object_types'  => array( 'athletes', ), // Post type
	        'context'       => 'normal',
	        'priority'      => 'high',
	        'show_names'    => true, // Show field names on the left
	        // 'cmb_styles' => false, // false to disable the CMB stylesheet
	        // 'closed'     => true, // true to keep the metabox closed by default
	    ) );

	    $athletes_meta->add_field( array(
		    'name'    => 'Athletes Team',
		    'desc'    => 'enter the athletes team name',
		    'id'      => $prefix.'athletes_team',
		    'type'    => 'text'
		) );

		$athletes_meta->add_field( array(
		    'name'    => 'Athletes Sport',
		    'desc'    => 'enter the athletes sport name',
		    'id'      => $prefix.'athletes_sport',
		    'type'    => 'text'
		) );

	    $athletes_meta->add_field( array(
		    'name'    => 'Twitter Username',
		    'desc'    => 'enter the athletes Twitter username',
		    'id'      => $prefix.'athletes_twitter',
		    'type'    => 'text'
		) );

		$athletes_meta->add_field( array(
		    'name'    => 'Instagram Username',
		    'desc'    => 'enter the athletes Instagram username',
		    'id'      => $prefix.'athletes_instagram',
		    'type'    => 'text'
		) );

		$vendor_meta = new_cmb2_box( array(
	        'id'            => $prefix . 'vendor_metabox',
	        'title'         => __( 'Vendor Information', 'cmb2' ),
	        'object_types'  => array( 'vendors', ), // Post type
	        'context'       => 'normal',
	        'priority'      => 'high',
	        'show_names'    => true, // Show field names on the left
	        // 'cmb_styles' => false, // false to disable the CMB stylesheet
	        // 'closed'     => true, // true to keep the metabox closed by default
	    ) );

	    $vendor_meta->add_field( array(
		    'name'    => 'Vendor Address',
		    'desc'    => 'enter the vendor address',
		    'id'      => $prefix.'vendor_address',
		    'type'    => 'text'
		) );

	    $vendor_meta->add_field( array(
		    'name'    => 'Vendor Phone Number',
		    'desc'    => 'enter the vendor phone number (eg. (###) ### ####)',
		    'id'      => $prefix.'vendor_phone',
		    'type'    => 'text'
		) );

	    $vendor_meta->add_field( array(
		    'name'    => 'Vendor Website Address',
		    'desc'    => 'enter the vendor website URL (eg. http://www.vendor.com)',
		    'id'      => $prefix.'vendor_website',
		    'type'    => 'text'
		) );

	    $vendor_meta->add_field( array(
		    'name'    => 'Vendor Email Address',
		    'desc'    => 'enter the vendor email address',
		    'id'      => $prefix.'vendor_email',
		    'type'    => 'text'
		) );

		  
	}

}
global $cpt; 
$cpt = new ckCustomPostTypes(); 
