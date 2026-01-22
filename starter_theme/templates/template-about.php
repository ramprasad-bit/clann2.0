<?php 

if(!defined('ABSPATH')){ die('You are not allowed'); }

if(!function_exists('add_action')){ exit; }

/* Template Name: About us */ 
get_header();
$page_id = get_the_id(); 
$src = get_stylesheet_directory_uri(); 
?>
<!--intro-->
<section class="section intro-row about-intro">
	<div class="container">
		<div class="global-heading text-center">
			<h2>Hello, we are Clann.</h2>
			<p>Clann is a dedicated age-friendly housing body committed to providing  quality housing and services that enable people to create homes and  thriving communities. The Irish word for family or a group of people  with a common interest, our name was chosen by our residents.</p>
		</div>
		<div class="row">
			<div class="intro-img"><img src="<?php echo $src; ?>/assets/images/about-intro-img.jpg" alt=""></div>
			<div class="intro-content">
				<div class="mission-vision">
					<div class="box">
						<div class="icons">
							<img src="<?php echo $src; ?>/assets/images/vision-icon.png" alt="" aria-hidden="true">
						</div>
						<div class="box-content">
							<h2>Our vision</h2>
							<p>Our vision is a society where everyone has a great place to live.</p>
						</div>
					</div>
					<div class="box">
						<div class="icons">
							<img src="<?php echo $src; ?>/assets/images/mission-icon.png" alt="" aria-hidden="true">
						</div>
						<div class="box-content">
							<h2>Our mission</h2>
							<p>Clann aims to achieve its vision by providing quality housing and  services to enable people to create homes and thriving communities.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- find out more start -->
<section class="section primary-color get-involved cluid-visit">
	<div class="container">
		<div class="row">
			<img src="<?php echo $src; ?>/assets/images/findout-cluid.png" alt="">
			<h2>To find out more about living our values, visit <a href="javascript:void(0)" role="link" aria-label="click here to visit clúid.ie"> clúid.ie</a> to download the full Values and Culture Code.</h2>
			<a href="javascript:void(0)" class="basic_btn" aria-label="click here to Get Involved">Get Involved</a>
		</div>
	</div>
</section>
<!-- Our four values start -->
<section class="section fourvalue-row">
	<div class="container">
		<div class="global-heading text-center">
			<h2>Our four values form the cornerstones of our culture in Clann.</h2>
		</div>
		<div class="culture-slider" id="culture-slider">
			<div class="culture-box">
				<div class="culture-img"><img src="<?php echo $src; ?>/assets/images/values-img1.png" alt="" aria-hidden="true"></div>
				<div class="culture-info">
					<h3>
						<a href="javascript:void(0)" role="link" aria-label="click here to view about Moving Together">Moving Together</a>
					</h3>
				</div>
			</div>
			<div class="culture-box">
				<div class="culture-img"><img src="<?php echo $src; ?>/assets/images/values-img2.png" alt="" aria-hidden="true"></div>
				<div class="culture-info">
					<h3>
						<a href="javascript:void(0)" role="link" aria-label="click here to view about Building Strength">Building Strength</a>
					</h3>
				</div>
			</div>
			<div class="culture-box">
				<div class="culture-img"><img src="<?php echo $src; ?>/assets/images/values-img3.png" alt="" aria-hidden="true"></div>
				<div class="culture-info">
					<h3>
						<a href="javascript:void(0)" role="link" aria-label="click here to view about Owning Our Work">Owning Our Work</a>
					</h3>
				</div>
			</div>
			<div class="culture-box">
				<div class="culture-img"><img src="<?php echo $src; ?>/assets/images/values-img4.png" alt="" aria-hidden="true"></div>
				<div class="culture-info">
					<h3>
						<a href="javascript:void(0)" role="link" aria-label="click here to view about Staying Curious">Staying Curious</a>
					</h3>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Our four values end -->
<!--Our people-->
<section class="section intro-row dark-bg primary-color intro-reverse technology-row">
	<div class="container">
		<div class="row">
			<div class="intro-img"><img src="<?php echo $src; ?>/assets/images/people-img.jpg" alt=""></div>
			<div class="intro-content">
				<div class="global-heading dark-bg">
					<h2>Our people</h2>
				</div>
				<p>Our team is committed to supporting people to remain  living independently for as long as possible and providing more age-friendly homes for people who are inappropriately housed.</p>
				<p><span>Each one of our schemes has a dedicated Scheme Manager.</span></p>
				<a href="javascript:void(0)" role="link" class="basic_btn" aria-label="Click here to Read More Our people">Read More</a>
			</div>
		</div>
	</div>
</section>
<!--Our people end-->
<!-- Our Latest Vacancies start -->
<section class="section vacancies-row">
	<div class="container">
		<div class="text-center global-heading">
			<h2>Our Latest Vacancies</h2>
			<p>Clann is a division of Clúid Housing, the People and Culture team manages recruitment for both Clúid and Clann</p>
		</div>
		<div class="button-row">
			<a href="javascript:void(0)" role="link" class="basic_btn" aria-label="Click here to View all Jobs">View all Jobs</a>
		</div>
	</div>
</section>
<!-- Our Latest Vacancies end -->
<section class="section light-blue awards-row">
	<div class="container">
		<div class="global-heading text-center">
			<h2>Our awards</h2>
		</div>
		<div class="tabs">
	        <div role="tablist" aria-labelledby="ourexperiences-tablist" class="automatic tab-lists">
	            <button id="tab-1" type="button" role="tab" aria-selected="false" aria-controls="tabpanel-1" class="active" tabindex="-1">
	                <span class="focus">2021</span>
	            </button>
	            <button id="tab-2" type="button" role="tab" aria-selected="false" aria-controls="tabpanel-2" tabindex="-1">
	                <span class="focus">2020</span>
	            </button>
	        </div>
	        <div class="tabs-content is-hidden" id="tabpanel-1" role="tabpanel" tabindex="0" aria-labelledby="tab-1">
	            <ul>
	            	<li>Winner | CIH All Ireland Housing Awards | Housing Hero Award | Michael Lynch</li>
	            	<li>Shortlisted | CIH All Ireland Housing Awards | Supporting Communities Award | Oriel Lodge, Cava</li>
	            	<li>Shortlisted | CIH All Ireland Housing Awards | Housing Team of the Year | Staying Connected, Staying Apart</li>
	            </ul>
	        </div>
	        <div class="tabs-content is-hidden" id="tabpanel-2" role="tabpanel" tabindex="0" aria-labelledby="tab-2">
	            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text...
	        </div>                                                                                       
	    </div>
	</div>
</section>
<!-- Our publications start -->
<section class="section intro-row dark-bg primary-color publications-row">
	<div class="container">
		<div class="global-heading text-center dark-bg">
			<h2>Our publications</h2>
		</div>
		<div class="culture-slider" id="publications-slider">
			<div class="culture-box">
				<div class="culture-img"><img src="<?php echo $src; ?>/assets/images/Saol-1.png" alt="" aria-hidden="true"></div>
				<div class="culture-info">
					<h3>
						<a href="javascript:void(0)" role="link" aria-label="click here to view about Welcome to our Summer 2023 Newsletter">Welcome to our Summer 2023 Newsletter</a>
					</h3>
				</div>
			</div>
			<div class="culture-box">
				<div class="culture-img"><img src="<?php echo $src; ?>/assets/images/Saol-2.png" alt="" aria-hidden="true"></div>
				<div class="culture-info">
					<h3>
						<a href="javascript:void(0)" role="link" aria-label="click here to view about Saol – Winter 2022">Saol – Winter 2022</a>
					</h3>
				</div>
			</div>
			<div class="culture-box">
				<div class="culture-img"><img src="<?php echo $src; ?>/assets/images/Saol-3.png" alt="" aria-hidden="true"></div>
				<div class="culture-info">
					<h3>
						<a href="javascript:void(0)" role="link" aria-label="click here to view about Welcome to our Summer 2022 Newsletter">Welcome to our Summer 2022 Newsletter</a>
					</h3>
				</div>
			</div>
			<div class="culture-box">
				<div class="culture-img"><img src="<?php echo $src; ?>/assets/images/Saol-4.png" alt="" aria-hidden="true"></div>
				<div class="culture-info">
					<h3>
						<a href="javascript:void(0)" role="link" aria-label="click here to view about Saol, Clann’s resident newsletter – Winter 2021 edition.">Saol, Clann’s resident newsletter – Winter 2021 edition.</a>
					</h3>
				</div>
			</div>
			<div class="culture-box">
				<div class="culture-img"><img src="<?php echo $src; ?>/assets/images/Saol-1.png" alt="" aria-hidden="true"></div>
				<div class="culture-info">
					<h3>
						<a href="javascript:void(0)" role="link" aria-label="click here to view about Welcome to our Summer 2023 Newsletter">Welcome to our Summer 2023 Newsletter</a>
					</h3>
				</div>
			</div>
			<div class="culture-box">
				<div class="culture-img"><img src="<?php echo $src; ?>/assets/images/Saol-2.png" alt="" aria-hidden="true"></div>
				<div class="culture-info">
					<h3>
						<a href="javascript:void(0)" role="link" aria-label="click here to view about Saol – Winter 2022">Saol – Winter 2022</a>
					</h3>
				</div>
			</div>
			<div class="culture-box">
				<div class="culture-img"><img src="<?php echo $src; ?>/assets/images/Saol-3.png" alt="" aria-hidden="true"></div>
				<div class="culture-info">
					<h3>
						<a href="javascript:void(0)" role="link" aria-label="click here to view about Welcome to our Summer 2022 Newsletter">Welcome to our Summer 2022 Newsletter</a>
					</h3>
				</div>
			</div>
			<div class="culture-box">
				<div class="culture-img"><img src="<?php echo $src; ?>/assets/images/Saol-4.png" alt="" aria-hidden="true"></div>
				<div class="culture-info">
					<h3>
						<a href="javascript:void(0)" role="link" aria-label="click here to view about Saol, Clann’s resident newsletter – Winter 2021 edition.">Saol, Clann’s resident newsletter – Winter 2021 edition.</a>
					</h3>
				</div>
			</div>
		</div>
		<div class="button-row">
			<a href="javascript:void(0)" role="link" class="basic_btn" aria-label="Click here to View All Publications">View All Publications</a>
		</div>
	</div>
</section>
<!-- Our publications end -->
<section class="section meeting-row">
	<div class="container">
		<div class="global-heading text-center">
			<h2>We are committed to meeting the demand for age-friendly housing in towns and cities across Ireland.</h2>
		</div>
	</div>
</section>
		
<?php get_footer(); ?>