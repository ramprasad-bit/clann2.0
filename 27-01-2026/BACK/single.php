<?php if(!defined('ABSPATH')){ die; } if(!function_exists('add_action')){ exit('you are not allowed.'); }
/**
 * The template for displaying all single posts
 */

get_header(); ?>

<?php if ( post_password_required() ){ strtr_show_password_form(); }else{ ?>

	<?php echo get_template_part('/template-parts/inner-banner'); ?>

	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<?php $template_file = get_template_directory().'/template-parts/content/content-'.get_post_type();

					if(file_exists(get_template_directory().'/template-parts/content/content-'.get_post_type().'.php')){
						echo get_template_part('/template-parts/content/content', get_post_type());
					}else{
						echo get_template_part('/template-parts/content/content'); 
					} ?>
			</main>
		</div>
	</div>
<?php } ?>      

<?php get_footer();
