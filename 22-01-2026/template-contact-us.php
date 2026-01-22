<?php 
	if(!defined('ABSPATH')){ die('You are not allowed'); }
	if(!function_exists('add_action')){ exit; }

	/* Template Name: Contact us */ 
	get_header();
	$page_id 				= get_the_id(); 
	$cnt_int_visibility 	= get_field('cnt_int_visibility');
	$cnt_image 				= get_field('cnt_image');
	$cnt_int_content 		= get_field('cnt_int_content');
	$cnt_get_in_touch 		= get_field('cnt_get_in_touch');
	$cnt_form_shortcode 	= get_field('cnt_form_shortcode');
	$cnt_iframe 			= get_field('cnt_iframe');
?>

<?php if($cnt_int_visibility == true) { ?>
<!-- contact intro start -->
<section class="section intro-row contact-row">
	<div class="container">
		<div class="row">
			<?php if($cnt_image){ ?>
				<div class="intro-img"><img src="<?php echo $cnt_image['url']; ?>" alt="<?php echo $cnt_image['alt']; ?>"></div>
			<?php } if($cnt_int_content ){ ?>
				<div class="intro-content">
					<div class="global-heading">
						<?php echo $cnt_int_content; ?>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<?php } ?>
<!-- contact intro end -->
<section class="section get-touch">
	<div class="container">
		<?php if($cnt_get_in_touch){ ?>
			<div class="global-heading text-center">
				<?php echo $cnt_get_in_touch; ?>
			</div>
		<?php } ?>
		<div class="row get-touch-block">
			<?php if($cnt_form_shortcode){ ?>
				<div class="contact-form">
					<?php echo do_shortcode($cnt_form_shortcode); ?>
				</div>
			<?php } if($cnt_iframe){ ?>
			<div class="contact-map">
				<?php echo $cnt_iframe; ?>
			</div>
			<?php } ?>
		</div>
	</div>
</section>
		
<?php get_footer(); ?>