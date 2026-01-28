<?php 
if(!defined('ABSPATH')){ die('You are not allowed'); }
if(!function_exists('add_action')){ exit; }


function strtr_customize_register($wp_customize){
     
    //  =============================
    //  = Inner Page Header Logo Upload             =
    //  =============================
    $wp_customize->add_setting('strtr_inner_header_logo', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        // 'type'           => 'option',
        'type'           => 'theme_mod',
  
    ));
  
    $wp_customize->add_control( new WP_Customize_Media_Control($wp_customize, 'strtr_inner_header_logo_upload', array(
        'label'    => __('Inner Page Header Logo', 'strtr'),
        'section'  => 'title_tagline',
        'settings' => 'strtr_inner_header_logo',
		'mime_type' => 'image'
    )));
	
	$wp_customize->add_section( 'custom_login_design', array(
		'title' => __( 'Custom Login Page Design' ),
		'description' => __( '' ),
		'panel' => '', // Not typically needed.
		'priority' => 160,
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
	  ) );

	  $wp_customize->add_setting('strtr_login_bg', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        // 'type'           => 'option',
        'type'           => 'theme_mod',
  
    ));


	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		  $wp_customize, // WP_Customize_Manager
		  'strtr_login_bg', // Setting id
		  array( // Args, including any custom ones.
			'label' => __( 'Login Page Background Color' ),
			'section' => 'custom_login_design',
		  )
		)
	  );

	  $wp_customize->add_setting('strtr_login_border', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        // 'type'           => 'option',
        'type'           => 'theme_mod',
  
    ));

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		  $wp_customize, // WP_Customize_Manager
		  'strtr_login_border', // Setting id
		  array( // Args, including any custom ones.
			'label' => __( 'Login Page Form Border Color' ),
			'section' => 'custom_login_design',
		  )
		)
	  );

	  $wp_customize->add_setting('strtr_login_txt_color', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        // 'type'           => 'option',
        'type'           => 'theme_mod',
  
    ));

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		  $wp_customize, // WP_Customize_Manager
		  'strtr_login_txt_color', // Setting id
		  array( // Args, including any custom ones.
			'label' => __( 'Login Page Footer Text Color' ),
			'section' => 'custom_login_design',
		  )
		)
	  );
}
  
add_action('customize_register', 'strtr_customize_register');

function strtr_theme_setup(){
	// Theme Supports
	// add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

    // custom image sizes
		// add_image_size( 'custom_logo', '191', '98', array('center', 'center') );		 

		$image_size_array = [
			 [463, 297],
			 [518, 387],
			 [254, 358],
			 [494, 370],
			 [1000, 700],
			 [700, 455],
			 [456, 345]
		];
		
	
		if(!empty($image_size_array)){
			foreach($image_size_array as $size){
				$image_width = $size[0];
				$image_height = $size[1];
				add_image_size('img_'.$image_width.'_'.$image_height, $image_width, $image_height, array('center', 'center'));
			}
		}
		
}

add_action('after_setup_theme', 'strtr_theme_setup');

function twenty_twenty_one_scripts() {
	// Note, the is_IE global variable is defined by WordPress and is used
	// to detect if the current browser is internet explorer.
	global $is_IE, $wp_scripts;
	$src = get_template_directory_uri();

	wp_enqueue_style( 'strtr-fontgoogle', 'https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', [], null, 'all' );
	wp_enqueue_style( 'strtr-slick-css', $src.'/assets/css/slick.min.css', [], null, 'all' );
	wp_enqueue_style( 'strtr-fancybox-css', $src.'/assets/css/fancybox.css', [], null, 'all' );
	wp_enqueue_style( 'custom_main_style', $src . '/style.css', [], microtime(), 'all');

	wp_enqueue_script( 'strtr_jquery_ui_js', $src.'/assets/js/jquery-min.js', ['jquery'], null, true );
	wp_enqueue_script( 'strtr_slick_js', $src.'/assets/js/slick.min.js', ['jquery'], null, true );
	wp_enqueue_script( 'strtr_fancybox_js', $src.'/assets/js/fancybox.js', ['jquery'], null, true );
	wp_enqueue_script( 'strtr_custom_js', $src.'/assets/js/custom.js', ['jquery'], microtime(), true );

	wp_localize_script( 'strtr_custom_js', 'wpajax', [
		'ajax_url' => admin_url('admin-ajax.php'),
		'home_url' => home_url()
	] );

}
add_action( 'wp_enqueue_scripts', 'twenty_twenty_one_scripts' );


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}


add_action('init', 'strtr_use_classic_editor');
function strtr_use_classic_editor(){
    if(function_exists('get_field') && get_field('use_classic_editor', 'option') == 1){
	    add_filter('use_block_editor_for_post', '__return_false', 10);		
	    add_filter( 'use_widgets_block_editor', '__return_false' );
    }
}


if(function_exists('acf_add_local_field_group')){
	$fields = [
		[
			'key' => 'field_use_classic_editor',
			'label' => __('Use Classic Editor?', 'strtr'),
			'name' => 'use_classic_editor',
			'type' => 'true_false',
			'ui' => 1
		],
		[
			'key' => 'field_show_page_editor',
			'label' => __('Show Page Editor On These Pages', 'strtr'),
			'name' => 'show_page_editor_pagids',
			'type' => 'text'
		],
		[
			'key' => 'field_no_img',
			'label' => __('No Image', 'strtr'),
			'name' => 'no_img',
			'instructions' => 'Image dimension is 1000 x 700 pixels',
			'type' => 'image'
		],
		[
			'key' => 'field_default_inr_bnr',
			'label' => __('Default Inner Banner Image', 'strtr'),
			'name' => 'default_inr_bnr',
			'type' => 'image'
		]
	];

	acf_add_local_field_group([
		'key' => 'group_6409bb69cca24',
		'title' => __('Default Options', 'strtr'),
		'fields' => $fields,
		'label_placement' => 'top',
		'menu_order' => 0,
		'style' => 'default',
		'position' => 'normal',
		'location' => [
			[
				[
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'theme-settings'
				]
			]
		],
		'active' => true,
	]);
}
 
add_action( 'admin_init', 'strtr_hide_editor' );
function strtr_hide_editor() {
	if(isset($_GET['post']) || isset($_POST['post_ID'])){
  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
  if( !isset( $post_id ) ) return;

    if(function_exists('get_field')){
          $show_page_editor_pagids_arr = get_field('show_page_editor_pagids', 'option');
          $id_arr = (explode(",",$show_page_editor_pagids_arr));
          $show_page_editor_pagids = $id_arr; 
          
          $current_page_template = get_page_template_slug($post_id);

		  $front_page_id = get_option('page_on_front');

        	if((!empty(get_page_template_slug( $post_id )) && $current_page_template != 'templates/innerpage.php') || $front_page_id == $post_id){        	
        		if(!in_array($post_id, $show_page_editor_pagids)){
					remove_post_type_support('page', 'editor');
				}
				
        		// remove_post_type_support('page', 'thumbnail');
        	}
			// else{
        	// 	remove_post_type_support('page', 'editor');
        	// 	remove_post_type_support('page', 'thumbnail');
        	// } 
          }
        
    }else{ return; }
}


function picture_html_by_img_arr($image_arr, $img_desk_param = 'full', $img_mob_param = 'medium_large', $img_ipad_param = 'large'){
    
    if($img_desk_param == 'full'){
        $img_desktop = $image_arr['url'];
    }else{
        $img_desktop = $image_arr['sizes'][$img_desk_param];
    }
	
	$html='';
	if($image_arr['url']){
		$html.='<picture>';
		$html.='<source media="(max-width:767px)" width="'.$image_arr['sizes'][$img_mob_param.'-width'].'" height="'.$image_arr['sizes'][$img_mob_param.'-height'].'" srcset="'.$image_arr['sizes'][$img_mob_param].'">';
		$html.='<source media="(min-width:1024px)" width="'.$image_arr['width'].'" height="'.$image_arr['height'].'" srcset="'.$img_desktop.'">';
		$html.='<source media="(min-width:768px)" width="'.$image_arr['sizes'][$img_ipad_param.'-width'].'" height="'.$image_arr['sizes'][$img_ipad_param.'-height'].'" srcset="'.$image_arr['sizes'][$img_ipad_param].'">';
		$html.='<img loading="lazy" width="'.$image_arr['sizes'][$img_mob_param.'-width'].'" height="'.$image_arr['sizes'][$img_mob_param.'-height'].'" src="'.$image_arr['sizes'][$img_mob_param].'" alt="'.$image_arr['title'].'">';
		$html.='</picture>';
	}
	return $html;
}

function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}


function strtr_site_logo($page_id = null){

	$homepage_id = get_option('page_on_front');
	$inner_pg_header_logo_id = get_theme_mod('strtr_inner_header_logo');

	if(isset($page_id) && $page_id != null && $page_id != $homepage_id && get_theme_mod('strtr_inner_header_logo')){
		$inner_logo_image = wp_get_attachment_image_src( $inner_pg_header_logo_id , 'strtr_inner_header_logo' );    
		
		?>
			<a href="<?php echo home_url('/'); ?>">
				<?php echo '<img src="'.$inner_logo_image[0].'" width="'.$inner_logo_image[1].'" height="'.$inner_logo_image[2].'" alt="'.get_bloginfo('name').'">'; ?>
			</a>
		<?php
	}else{

	$custom_logo_id = get_theme_mod( 'custom_logo' );
    $image = wp_get_attachment_image_src( $custom_logo_id , 'custom_logo' );    

	

	?>
		<a href="<?php echo home_url('/'); ?>">
			<?php echo '<img src="'.$image[0].'" width="'.$image[1].'" height="'.$image[2].'" alt="'.get_bloginfo('name').'">'; ?>
		</a>
	<?php }
}

function filter_phone_number($phone_number){
	$filtered_number = preg_replace('/[^0-9+-]/', '', $phone_number);

	return $filtered_number;
}


function strtr_link($link_arr = null){
	$item_link = 'javascript:void(0)';
	$item_target = '_self';
	$item_title = '';

	if(isset($link_arr['url']) && !empty($link_arr['url'])){
		$item_link = esc_url( $link_arr['url'] );
	}
	if(isset($link_arr['target']) && !empty($link_arr['target'])){
		$item_target = esc_url( $link_arr['target'] );
	}
	if(isset($link_arr['title']) && !empty($link_arr['title'])){
		$item_title = esc_url( $link_arr['title'] );
	}

	return ['url' => $item_link, 'target' => $item_target, 'title' => $item_title];
}




add_filter( 'wpcf7_validate_tel*', 'custom_phone_validation_filter', 20, 2 );
add_filter( 'wpcf7_validate_tel', 'custom_phone_validation_filter', 20, 2 );
  
function custom_phone_validation_filter( $result, $tag ) {
  if ( 'your-phone' == $tag->name ) {
    $your_phone = isset( $_POST['your-phone'] ) ? $_POST['your-phone']: '';

	if(strlen($your_phone) < 8){
		$result->invalidate( $tag, "Please enter numbers between 8 to 12 characters long." );
	}
	if(strlen($your_phone) > 12 ){
		$result->invalidate( $tag, "Please enter numbers between 8 to 12 characters long." );
	}
    
    
  }
  
  return $result;
}



function strtr_get_post_thumb_url($post_id, $image_size_name){
	$post_thumbnail_url;
	$thumbnail_width;
	$thumbnail_height;

	if(has_post_thumbnail($post_id)){												
		$thumbnail_id = get_post_thumbnail_id($post_id);
		$get_post_thumbnail = wp_get_attachment_image_src( $thumbnail_id , $image_size_name );  
		$post_thumbnail_url = $get_post_thumbnail[0];
		$thumbnail_width = $get_post_thumbnail[1];
		$thumbnail_height = $get_post_thumbnail[2];

	}elseif($no_image = get_field('no_img', 'option')){
		$post_thumbnail_url = ($image_size_name == 'full')? $no_image['url']:$no_image['sizes'][$image_size_name];
		$thumbnail_width = $no_image['sizes'][$image_size_name.'-width'];
		$thumbnail_height = $no_image['sizes'][$image_size_name.'-height'];
	}
	// echo '<img loading="lazy" src="'.$post_thumbnail_url.'" width="'.$thumbnail_width.'" height="'.$thumbnail_height.'"  alt="'.get_the_title($post_id).'">';
	echo '<img src="'.$post_thumbnail_url.'"  alt="'.get_the_title($post_id).'">';

}

// custom post type register function 
function strtr_cpt_register($input_data = []){

	foreach($input_data as $input){
		$post_type_key = $input['post_type_key'];
		$singular_name = $input['singular_name'];
		$plural_name = $input['plural_name'];
		$rewrite_slug = $input['rewrite'];
		$supports = $input['supports'];
		$menu_icon = $input['menu_icon'];
		$taxonomies = (isset($input['taxonomies']))? $input['taxonomies']:[];
		$has_archive = $input['has_archive'];
			
		$post_type_labels = [
			'name' => $plural_name,
			'singular_name' => $singular_name,
			'add_new' => 'Add New '.$singular_name,
			'add_new_item' => 'Add New '.$singular_name,
			'edit_item' => 'Edit '.$singular_name,
			'new_item' => 'New '.$singular_name,
			'view_item' => 'View '.$singular_name,
			'view_items' => 'View '.$plural_name,
			'search_items' => 'Search '.$plural_name,
			'not_found' => 'Not Found',
			'not_found_in_trash' => 'Not Found in Trash',
			'all_items' => 'All '.$plural_name,
			'archives' => $singular_name.' Archives',
			'insert_into_item' => '',
			'uploaded_to_this_item' => '',
			'featured_image' => $singular_name.' Image',
			'set_featured_image' => 'Set '.$singular_name.' Image',
			'remove_featured_image' => 'Remove '.$singular_name.' Image',
			'use_featured_image' => 'Use as '.$singular_name.' Image'
		];
	
		$args = [
			'label' => $singular_name,
			'public' => true,
			'labels' => $post_type_labels,
			'hierarchical' => true,
			'show_ui' => true,
			'show_in_rest' => true,
			'menu_icon' => $menu_icon,
			'has_archive' => $has_archive,
			'rewrite' => [
				'slug' => $rewrite_slug
			],	
			'taxonomies' => $taxonomies,
			'supports' => $supports
		];
	
		register_post_type($post_type_key, $args);
	}
}

add_action('init', 'strtr_cpt_register_post_types');
function strtr_cpt_register_post_types(){
	$labels = [
		'name'              => 'Categories',
		'singular_name'     => 'Category',
		'all_items' 		=> 'All Categories',
		'edit_item' 		=> 'Edit Category',
		'update_item' 		=> 'Update Category',
		'add_new_item' 		=> 'Add a New Category',
		'menu_name' 		=> 'Categories'
	];
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		// 'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true
	);
	register_taxonomy( 'publication_category', 'publication', $args);
	register_taxonomy( 'storie_category', 'storie', $args);
	// publications
	$post_types_exper_arr = [			
		   [
			   'post_type_key' => 'publication',
			   'singular_name' => 'Publication',
			   'plural_name' => 'Publications',
			   'rewrite' => '',
			   'has_archive' => false,
			   'supports' => ['title','thumbnail','excerpt', 'revisions'],
			   'menu_icon' => 'dashicons-book',
			   'taxonomies' => ['publication_category']
		   ]
		];
	strtr_cpt_register($post_types_exper_arr); 	
	// Stories
	$post_types_stories_arr = [			
		   [
			   'post_type_key' => 'storie',
			   'singular_name' => 'Storie',
			   'plural_name' => 'Stories',
			   'rewrite' => '',
			   'has_archive' => false,
			   'supports' => ['title','thumbnail','excerpt', 'revisions'],
			   'menu_icon' => 'dashicons-welcome-write-blog',
			   'taxonomies' => ['storie_category']
		   ]
		];
	strtr_cpt_register($post_types_stories_arr); 
	
	}
				
// Post tyle

add_filter( 'walker_nav_menu_start_el', 'wpse_add_arrow',10,4);
function wpse_add_arrow( $item_output, $item, $depth, $args ){
    //Only add class to 'top level' items on the 'primary' menu.
    $classes = $item->classes;
    if(!empty($classes)){
    	if(in_array('menu-item-has-children',$classes)){
        	$item_output .='<span class="nav_arrowdown"><i class="fas fa-angle-down"></i></span>';
   		}
    }    
    return $item_output;
}





	/* Change Login Page Logo URL */
	add_filter( 'login_headerurl', 'custom_loginlogo_url' );

	function custom_loginlogo_url($url) {
		return site_url();
	}

	/*Set Logo to login page*/
	add_action( 'login_enqueue_scripts', 'strtr_login_logo_one' );
	function strtr_login_logo_one() { ?>

		<style type="text/css"> <?php
		/*Set Logo to login page*/
		if(has_custom_logo()){
			$custom_logo_id = get_theme_mod('custom_logo');
			$custom_log_url = wp_get_attachment_image_url($custom_logo_id, 'full');
		?> 
		body.login div#login h1 a {
		background-image: url(<?php echo $custom_log_url; ?>); 
		padding-bottom: 0px; 
		} <?php } ?> 
		body.login{
			background-color: <?php echo get_theme_mod('strtr_login_bg'); ?>;
		} 
		body.login h1 a {
			background-size: contain;
			width: 100%;
		}
		body.login form{
			border: 1px solid <?php echo get_theme_mod('strtr_login_border'); ?>;
		}
		body.login #nav a, body.login #backtoblog a{
			color: <?php echo get_theme_mod('strtr_login_txt_color'); ?>
		}
		
		</style><?php 
	} 



function str_show_field($html, $field, $pageid){
	$data = ($content = get_field($field, $pageid))? $content:'';
	if(!empty($data)){
		echo str_replace("%", $data, $html);
	}	
}
function str_link($attr, $field, $pageid){
	$data = ($content = get_field($field, $pageid))? $content:'';
	if(isset($data['url']) && !empty($data['url'])){		
		echo '<a href="'.$data['url'].'" '.$attr.' target="'.$data['target'].'">'.$data['title'].'</a>';
	}	
}

function str_imgwno($field, $id, $attr = '', $image_size_name = ''){	
	if($img = get_field($field, $id)){	
		$img_src = (!empty($image_size_name))? $img['sizes'][$image_size_name]:$img['url'];
		echo '<img '.$attr.' src="'.$img_src.'"  alt="'.$img['title'].'">';
	}elseif($no_image = get_field('no_img', 'option')){
		$img_src = (!empty($image_size_name))? $no_image['sizes'][$image_size_name]:$no_image['url'];
		echo '<img '.$attr.' src="'.$img_src.'"  alt="'.$no_image['title'].'">';
	}	
}



// Template for password protected form for pages and posts
function strtr_show_password_form(){ ?>
	<section class="section ps_protect">
		<div class="container">
			<?php echo get_the_password_form(); ?>			
		</div>
	</section>
<?php }

// show error on password protected form
add_filter( 'the_password_form', 'wpse_71284_custom_post_password_msg' );

function wpse_71284_custom_post_password_msg( $form )
{
    // No cookie, the user has not sent anything until now.
    if ( ! isset ( $_COOKIE[ 'wp-postpass_' . COOKIEHASH ] ) ){ return $form; }
	else{
		if(wp_get_referer() == get_permalink()){
			// Translate and escape.
			$msg = esc_html__( 'Sorry, your password is wrong.', 'your_text_domain' );

			// We have a cookie, but it doesn’t match the password.
			$msg = "<p class='ps_form_error'>$msg</p>";

			return $form.$msg;
		}else{
			return $form;
		}
	}    
}

function custom_featured_image_message($content) {
    global $post_type;

    // Check if the current post type is your custom post type
    if ('group-adventure' === $post_type) {
        // Add your custom message below the main label
        $content .= '<p>Image dimension is 700 x 455 pixels.</p>';
    }
    if ('activities' === $post_type) {
        // Add your custom message below the main label
        $content .= '<p>Image dimension is 456 x 345 pixels.</p>';
    }

    return $content;
}

add_filter('admin_post_thumbnail_html', 'custom_featured_image_message');