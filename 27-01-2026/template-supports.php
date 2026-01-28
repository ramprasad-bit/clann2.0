<?php 
if(!defined('ABSPATH')){ die('You are not allowed'); }
if(!function_exists('add_action')){ exit; }
/* Template Name: Supports */ 
get_header();
$page_id = get_the_id(); 
$src = get_stylesheet_directory_uri(); 
?>
<!--intro-->
<?php
	$intro_image = get_field('intro_image');
	$intro_heading = get_field('intro_heading');
	$intro_content = get_field('intro_content');
	if(!empty($intro_heading)){
?>
<section class="section intro-row">
	<div class="container">
		<div class="row">
			<?php echo $intro_image?'<div class="intro-img"><img src="'.$intro_image['url'].'" alt="'.$intro_image['alt'].'"></div>':''; ?>
			<div class="intro-content">
				<div class="global-heading">
					<?php echo $intro_heading?'<h2>'.$intro_heading.'</h2>':''; 
					 echo $intro_content?$intro_content:''; ?>					
				</div>
			</div>
		</div>
	</div>
</section>
<?php } ?>
<!-- Emergency response service start -->
<?php
	$cs_heading = get_field('cs_heading');
	$cs_phone_no = get_field('cs_phone_no');
	$cleanNumber = preg_replace('/\D+/', '', $cs_phone_no);
	$cs_content_before_read_more = get_field('cs_content_before_read_more');
	$cs_content_after_read_more = get_field('cs_content_after_read_more');
	$cs_button = get_field('cs_button');
	if(!empty($cs_heading)){
?>
<section class="section primary-color em-service">
	<div class="container">
		<div class="global-heading text-center dark-bg">
			<?php echo $cs_heading?'<h2>'.$cs_heading.'</h2>':''; 
			 echo $cs_phone_no?'<div class="emg-supp">
				<img src="'.$src.'/assets/images/emergency-support-icon.png" alt="" aria-hideen="true">
				<h3><a href="tel:'.$cleanNumber.'" role="link" aria-label="call to '.$cleanNumber.'"> '.$cs_phone_no.'</a></h3>
			</div>':''; ?>
		</div>
		<?php if(!empty($cs_content_before_read_more)){ ?>
			<div class="service-content">
				<?php echo $cs_content_before_read_more?$cs_content_before_read_more:''; 
				echo $cs_content_after_read_more?'<div class="hide-part" id="hiddenContent" hidden>'.$cs_content_after_read_more.'</div>
				<button class="show-more basic_btn"	aria-expanded="false" aria-controls="hiddenContent">Read More</button>':''; ?>
			</div>
		<?php } ?>
	</div>
</section>
<?php } ?>
<!--Assistive technology start-->
<?php
	$as_heading = get_field('as_heading');
	$as_sub_heading = get_field('as_sub_heading');
	$as_content = get_field('as_content');
	$as_image = get_field('as_image');
	if(!empty($as_heading)){
?>
<section class="section intro-row intro-reverse technology-row">
	<div class="container">
		<div class="row">
			<?php echo $as_image?'<div class="intro-img"><img src="'.$as_image['url'].'" alt="'.$as_image['alt'].'"></div>':''; ?>
			<div class="intro-content">
				<?php echo $as_heading?'<div class="global-heading">
					<h2>'.$as_heading.'</h2>
				</div>':''; 
				 echo $as_sub_heading?'<p><strong>'.$as_sub_heading.'</strong></p>':''; 
				  echo $as_content?$as_content:''; ?>
			</div>
		</div>
	</div>
</section>
<?php } ?>
<!-- Partner supports start -->
<?php
	$ps_heading = get_field('ps_heading');
	$ps_content = get_field('ps_content');
	$ps_partners_slider = get_field('ps_partners_slider');
	if(!empty($ps_heading) || is_array($ps_partners_slider)){
?>
<section class="section light-blue partner-support-row">
	<div class="container">
		<div class="global-heading text-center">
			<?php echo $ps_heading?'<h2>'.$ps_heading.'</h2>':''; 
			 echo $ps_content?'<p>'.$ps_content.'</p>':''; ?>
		</div>
		<?php if(is_array($ps_partners_slider) && count($ps_partners_slider)>0){ ?>
		<div class="partner-support-slider" id="partner-support-slider">
			<?php foreach($ps_partners_slider as $psData){ ?>
				<div class="partner-support-box">
					<div class="row">
						<?php echo $psData['ps_image']?'<div class="partner-img">
							<img src="'.$psData['ps_image']['url'].'" alt="'.$psData['ps_image']['alt'].'">
						</div>':''; ?>
						<div class="partner-content">
							<?php echo $psData['ps_content']?$psData['ps_content']:''; 
							 echo $psData['ps_button']?'<a href="'.$psData['ps_button']['url'].'" target="'.$psData['ps_button']['target'].'" role="link" class="basic_btn" aria-label="Click here for '.$psData['ps_button']['title'].'">'.$psData['ps_button']['title'].'</a>':''; ?>
						</div>
					</div>
				</div>
			<?php } ?>			
		</div>
		<?php } ?>
	</div>
</section>
<?php } ?>
<!--intro-->
<?php
	$rs_image = get_field('rs_image');
	$rs_heading = get_field('rs_heading');
	$rs_content = get_field('rs_content');
	if(!empty($rs_heading)){
?>
<section class="section intro-row resident-row">
	<div class="container">
		<div class="row">
			<?php echo $rs_image?'<div class="intro-img"><img src="'.$rs_image['url'].'" alt="'.$rs_image['alt'].'"></div>':''; ?>
			<div class="intro-content">
				<div class="global-heading">
					<?php echo $rs_heading?'<h2>'.$rs_heading.'</h2>':''; 
					 echo $rs_content?$rs_content:''; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php } ?>
<!--intro end-->		
<?php get_footer(); ?>