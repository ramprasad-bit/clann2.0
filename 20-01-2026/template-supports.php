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
<section class="section light-blue partner-support-row">
	<div class="container">
		<div class="global-heading text-center">
			<h2>Partner supports</h2>
			<p>We work with partner organisations that provide specialist support services to our residents. These agencies can support you to remain active, healthy and independent.</p>
		</div>
		<div class="partner-support-slider" id="partner-support-slider">
			<div class="partner-support-box">
				<div class="row">
					<div class="partner-img">
						<img src="<?php echo $src; ?>/assets/images/home-support-logo.png" alt="home support logo">
					</div>
					<div class="partner-content">
						<h3>Home Support Service</h3>
						<p>The HSE Home Support Service (formerly called the Home Help Service or Home Care Package Scheme) aims to support older people to remain in their own homes for as long as possible and to support informal carers.</p>
						<h3>The Home Support Service provides you with support for everyday tasks including:</h3>
						<ul aria-label=" Home Support Service tasks">
							<li>getting in and out of bed</li>
							<li>dressing and undressing</li>
							<li>personal care such as showering and shaving</li>
						</ul>
						<p>The support you can receive depends on your individual needs. These supports will be provided by the HSE or by an external provider, approved by the HSE.</p>
						<a href="javascript:void(0)" role="link" class="basic_btn" aria-label="Click here for More Information">Click here for More Information</a>
					</div>
				</div>
			</div>
			<div class="partner-support-box">
				<div class="row">
					<div class="partner-img">
						<img src="<?php echo $src; ?>/assets/images/home-support-logo.png" alt="home support logo">
					</div>
					<div class="partner-content">
						<h3>Home Support Service</h3>
						<p>The HSE Home Support Service (formerly called the Home Help Service or Home Care Package Scheme) aims to support older people to remain in their own homes for as long as possible and to support informal carers.</p>
						<h3>The Home Support Service provides you with support for everyday tasks including:</h3>
						<ul aria-label=" Home Support Service tasks">
							<li>getting in and out of bed</li>
							<li>dressing and undressing</li>
							<li>personal care such as showering and shaving</li>
						</ul>
						<p>The support you can receive depends on your individual needs. These supports will be provided by the HSE or by an external provider, approved by the HSE.</p>
						<a href="javascript:void(0)" role="link" class="basic_btn" aria-label="Click here for More Information">Click here for More Information</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Partner supports end -->
<!--intro-->
<section class="section intro-row resident-row">
	<div class="container">
		<div class="row">
			<div class="intro-img"><img src="<?php echo $src; ?>/assets/images/recident-intro-img.jpg" alt=""></div>
			<div class="intro-content">
				<div class="global-heading">
					<h2>Resident support services</h2>
					<p>Find information about the support services available to Clann residents. These service providers have worked with Clann staff and residents in the past and have helped residents overcome whatever challenges may arise.</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!--intro end-->		
<?php get_footer(); ?>