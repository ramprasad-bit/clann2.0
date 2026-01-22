<?php 
if(!defined('ABSPATH')){ die('You are not allowed'); }
if(!function_exists('add_action')){ exit; }

/* Template Name: Thank You */ 
$page_id = get_the_id();

if(wp_verify_nonce( $_GET['wp_nonce'], 'verify_wpnonce_field' )){ 
	get_header();	
	$no_image = get_field('no_img','option');
	$frontpage_id = get_option( 'page_on_front' ); ?>


<div id="content" class="site-content">
		      	<div id="primary" class="content-area">
		        	<main id="main" class="site-main" role="main">
							 <!-- cms content -->
							 <section class="section thank_you_outer info_page no_banner_firstsec">
								<div class="container">
									<div class="info_cont_holder">
									<h1><i class="fas fa-check-circle"></i></h1>									
									<?php the_content(); ?>
									<a href="<?php echo home_url('/'); ?>" class="button_yellow basic_btn">Go to home</a>
									</div>
								</div>
								<div class="mountain_float_img">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mountain_overlay.png" alt="mountain_overlay">
								</div>
							</section>
					</main>
				</div>
			</div>

<?php }else{ 
	$url = get_home_url() . '/';
	header('location: '.$url.'');
	exit();	
}

get_footer(); ?>
