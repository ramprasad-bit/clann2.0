<?php 

if(!defined('ABSPATH')){ die('You are not allowed'); }

if(!function_exists('add_action')){ exit; }



/* Template Name: Supports */ 
get_header();
$page_id 				= get_the_id(); 
$src = get_stylesheet_directory_uri(); 
?>

<!--intro-->
<section class="section intro-row">
	<div class="container">
		<div class="row">
			<div class="intro-img"><img src="<?php echo $src; ?>/assets/images/supports-intro-img.jpg" alt=""></div>
			<div class="intro-content">
				<div class="global-heading">
					<h2>Getting help when you need it</h2>
					<p>We are committed to making sure you have the right support you need to fully enjoy your home. We know that our residents value having a member of our team on site and being able to ask for help when needed.</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!--intro end-->
<!-- Emergency response service start -->
<section class="section primary-color em-service">
	<div class="container">
		<div class="global-heading text-center dark-bg">
			<h2>Emergency response service</h2>
			<div class="emg-supp">
				<img src="<?php echo $src; ?>/assets/images/emergency-support-icon.png" alt="" aria-hideen="true">
				<h3><a href="tel:1850247999" role="link" aria-label="call to 1850247999"> 1850 247 999</a></h3>
			</div>
		</div>
		<div class="service-content">
			<p>Clann works with a partner organisation to provide an emergency response service to our residents.</p>
			<p>This service is run by a team of dedicated, caring and compassionate people who are always ready to help.</p>
			<p>The team will answer your call 24 hours a day, 7 days a week.</p>
			<div class="hide-part" id="hiddenContent" hidden>
				<p>When you ring the emergency response service you will be greeted by a real person who is trained to help people. The team receive calls about all types of things including emergency situations, falls and loneliness. No matter what the issue, we are here to help. We will never end a call until we know you are OK.</p>
				<p>All Clann homes are equipped with an emergency call system. This is a two-way speech system which can be used to speak to the emergency response team and get help if needed. The emergency response team receives calls relating to anything from emergency situations, to falls and vulnerability and loneliness. No matter what the issue, the team will help you through it and will not end a call until they know you are ok.</p>
				<p>Clann residents can also request a wellbeing call through the emergency response service. The call can be daily or tailored to your individual needs. This can be a long-term or a short-term arrangement, it’s up to you.</p>
				<p>For more information on this service, you can call our dedicated Customer Contact Centre on</p>
				<p>
					<a role="link" rel="noopener noreferrer" href="tel:017072244" aria-label="call to 017072244 " class=""> <img src="<?php echo $src; ?>/assets/images/call-icon-w.png" alt="" aria-hidden="true"> 01 707 2244</a>
					or
					<a role="link" rel="noopener noreferrer" href="mailto:clann@clannhousing.ie" aria-label="email to clann@clannhousing.ie" class=""> <img src="assets/images/email-icon-w.png" alt="" aria-hidden="true"> clann@clannhousing.ie</a>
				</p>
			</div>

			<button class="show-more basic_btn"	aria-expanded="false" aria-controls="hiddenContent">Read More</button>
		</div>
	</div>
</section>
<!-- Emergency response service end -->
<!--Assistive technology start-->
<section class="section intro-row intro-reverse technology-row">
	<div class="container">
		<div class="row">
			<div class="intro-img"><img src="<?php echo $src; ?>/assets/images/assistiv-intro-img.jpg" alt=""></div>
			<div class="intro-content">
				<div class="global-heading">
					<h2>Assistive technology</h2>
				</div>
				<p><strong>In addition to our emergency response service, Clann can install tailored monitoring technology in your home.</strong></p>
				<p>The type of products we can install are tailored to your individual needs. This includes things like movement sensors, door sensors, pathway lighting to help find the bathroom at night and fall sensors. The reason why we promote using this type of technology is to support you to live independently in your own home for as long as possible.</p>
				<p>To find out more about the supports available, speak to your scheme manager.</p>
			</div>
		</div>
	</div>
</section>
<!--Assistive technology end-->
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