<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php 
	if(!defined('ABSPATH')){ die('You are not allowed'); }
	if(!function_exists('add_action')){ exit; }

	wp_body_open(); 
	wp_nonce_field('verify_wpnonce_field', 'wp_nonce_unqkey'); 
	$src = get_stylesheet_directory_uri();
	$page_id = get_the_id();
	?>
	
	<div id="page" class="site">
		<div class="site-inner">
			<!-- Header -->
			<?php get_header(); ?>
			
			<!-- Main Content -->
			<main id="main" class="site-main">
				<!-- Page content starts here -->
				<div class="santu-roy">
					<section class="section intro-row santu-roy-page">
						<div class="container">
							<div class="global-heading text-center">
								<h1><?php the_title(); ?></h1>
							</div>
							<div class="row">
								<div class="page-content">
									<?php the_content(); ?>
								</div>
							</div>
						</div>
					</section>
				</div>
				<!-- Page content ends here -->
			</main>
			
			<!-- Footer -->
			<?php get_footer(); ?>
		</div>
	</div>
	
	<?php wp_footer(); ?>
</body>
</html>
