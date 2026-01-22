<?php 

if(!defined('ABSPATH')){ die('You are not allowed'); }

if(!function_exists('add_action')){ exit; }



/* Template Name: Community */ 
get_header();
$page_id 				= get_the_id(); 
$src = get_stylesheet_directory_uri(); 
?>

<!-- Our stories start -->
<section class="section stories-row">
	<div class="container">
		<div class="global-heading text-center">
			<h2>Our stories</h2>
		</div>
		<div class="stories-slider" id="stories-slider">
			<div class="single-box">
				<div class="single-img">
					<img src="<?php echo $src; ?>/assets/images/stories-img1.jpg" alt="">
				</div>
				<div class="single-info">
					<h3>
					<a href="javascript:void(0)" role="link" rel="">Your Voice Matters! Everyone's Voice counts!</a>
					</h3>
				</div>
			</div>
			<div class="single-box">
				<div class="single-img">
					<img src="<?php echo $src; ?>/assets/images/stories-img2.jpg" alt="">
				</div>
				<div class="single-info">
					<h3>
					<a href="javascript:void(0)" role="link" rel="">Mick’s Story</a>
					</h3>
				</div>
			</div>
			<div class="single-box">
				<div class="single-img">
					<img src="<?php echo $src; ?>/assets/images/stories-img3.jpg" alt="">
				</div>
				<div class="single-info">
					<h3>
					<a href="javascript:void(0)" role="link" rel="">Creating a community garden at Sallymills</a>
					</h3>
				</div>
			</div>
			<div class="single-box">
				<div class="single-img">
					<img src="<?php echo $src; ?>/assets/images/stories-img1.jpg" alt="">
				</div>
				<div class="single-info">
					<h3>
					<a href="javascript:void(0)" role="link" rel="">Your Voice Matters! Everyone's Voice counts!</a>
					</h3>
				</div>
			</div>
		</div>
		<div class="button-row">
			<a href="javascript:void(0)" class="basic_btn" aria-label="click here to View All our stories">View All</a>
		</div>
	</div>
</section>
<!-- Our stories end -->
<section class="community-row">
	<div class="section primary-color dark-bg intro-row intro-reverse">
		<div class="container">
			<div class="row">
				<div class="intro-img"><img src="<?php echo $src; ?>/assets/images/community-img1.jpg" alt=""></div>
				<div class="intro-content">
					<div class="global-heading">
						<h2>Self-Help guides</h2>
						<p><strong>Clann is committed to providing a safe and secure environment for you to call home. We actively support our residents to remain living independently.</strong></p>
						<p>To achieve this, we work closely with a range of service providers in the local community.</p>
					</div>
					<a href="javascript:void(0)" class="basic_btn" aria-label="click here to Read More about Self-Help guides">Read More</a>
				</div>
			</div>
		</div>
	</div>
	<div class="section intro-row">
		<div class="container">
			<div class="row">
				<div class="intro-img"><img src="<?php echo $src; ?>/assets/images/community-img2.jpg" alt=""></div>
				<div class="intro-content">
					<div class="global-heading">
						<h2>Resident engagement strategy</h2>
						<p>Clúid Housing currently provides three housing solutions – Clúid, Clann and Cost Rental. Clann is Clúid’s dedicated age-friendly housing service for people over 55. The same general principles for resident engagement will inform our approach to engagement with both Clann and Clúid residents.</p>
						<p>The specific requirements of Clann residents will be met by involving CRAG, scheme managers and other support workers and community partners in developing outcomes that meet the needs of older residents. Relevant examples are included within the strategy. As you’ll notice from the branding, the scope of this strategy relates to all current and future residents, and resident groups within Clúid Housing..</p>
					</div>
					<a href="javascript:void(0)" class="basic_btn" aria-label="click here to Find Out More about Resident engagement strategy">Find Out More</a>
				</div>
			</div>
		</div>
	</div>
	<div class="section primary-color dark-bg intro-row intro-reverse">
		<div class="container">
			<div class="row">
				<div class="intro-img"><img src="<?php echo $src; ?>/assets/images/community-img3.jpg" alt=""></div>
				<div class="intro-content">
					<div class="global-heading">
						<h2>My voice</h2>
						<p>Clann Housing provides a number of different ways to influence the services that you receive but we also know that it can be difficult to find the time. If you want to get involved, we will find a way to have your voice heard. If you are interested in any of the options below or would like more information on Resident Engagement at Clann Housing, just fill out the form below.</p>
					</div>
					<a href="javascript:void(0)" class="basic_btn" aria-label="click here to Find Out More about My voice">Find Out More</a>
				</div>
			</div>
		</div>
	</div>
	<div class="section intro-row">
		<div class="container">
			<div class="row">
				<div class="intro-img"><img src="<?php echo $src; ?>/assets/images/community-img4.jpg" alt=""></div>
				<div class="intro-content">
					<div class="global-heading">
						<h2>Resident support services</h2>
						<p>Find information about the support services available to Clann residents. These service providers have worked with Clann staff and residents in the past and have helped residents overcome whatever challenges may arise.</p>
					</div>
					<a href="javascript:void(0)" class="basic_btn" aria-label="click here to Read More about Resident support services">Read More</a>
				</div>
			</div>
		</div>
	</div>
	<div class="section primary-color dark-bg intro-row intro-reverse">
		<div class="container">
			<div class="row">
				<div class="intro-img"><img src="<?php echo $src; ?>/assets/images/community-img5.jpg" alt=""></div>
				<div class="intro-content">
					<div class="global-heading">
						<h2>Great Place to Live Competition</h2>
						<p><strong>Each year, Clann holds a national competition to recognise and celebrate the efforts that you and your neighbours put into making your communities great places to live.</strong></p>
						<p>If you or someone you know is committed to making your community a better place then we want to hear from you.</p>
					</div>
					<a href="javascript:void(0)" class="basic_btn" aria-label="click here to read More about Great Place to Live Competition">Read More</a>
				</div>
			</div>
		</div>
	</div>
	<div class="section intro-row">
		<div class="container">
			<div class="row">
				<div class="intro-img"><img src="<?php echo $src; ?>/assets/images/community-img6.jpg" alt=""></div>
				<div class="intro-content">
					<div class="global-heading">
						<h2>Our Greening Strategy</h2>
						<p>Our Greening Strategy - Building a Sustainable Future Together</p>
					</div>
					<a href="javascript:void(0)" class="basic_btn" aria-label="click here to Read More about Our Greening Strategy">Read More</a>
				</div>
			</div>
		</div>
	</div>
	<div class="section primary-color dark-bg intro-row intro-reverse">
		<div class="container">
			<div class="row">
				<div class="intro-img"><img src="<?php echo $src; ?>/assets/images/community-img7.jpg" alt=""></div>
				<div class="intro-content">
					<div class="global-heading">
						<h2>CRAG</h2>
						<p>The Residents’ Advisory Group was established in February 2020 and is made up from a diverse range of people from across the resident body. The Advisory Group’s mission is ‘To use our experience as residents to make recommendations and take action with Clann on issues that make a difference locally and nationally’.</p>
					</div>
					<a href="javascript:void(0)" class="basic_btn" aria-label="click here to read More about CRAG">Read More</a>
				</div>
			</div>
		</div>
	</div>
	<div class="section intro-row">
		<div class="container">
			<div class="row">
				<div class="intro-img"><img src="<?php echo $src; ?>/assets/images/community-img8.jpg" alt=""></div>
				<div class="intro-content">
					<div class="global-heading">
						<h2>Clúid housing</h2>
						<p>Clúid Housing, of which Clann is a division, is an award-winning, not-for-profit charity providing secure, affordable, high-quality homes and services to people across Ireland. Clúid has grown to become the leading approved housing body (AHB) in Ireland</p>
					</div>
					<a href="javascript:void(0)" class="basic_btn" aria-label="click here to Find Out More about Clúid housing">Find Out More</a>
				</div>
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
<!-- Our news start -->
<section class="section light-blue news-row">
	<div class="container">
		<div class="global-heading text-center">
			<h2>Our news</h2>
			<p>We work all over Ireland and there’s always something newsworthy happening</p>
		</div>
		<div class="stories-slider news-slider" id="news-slider">
			<div class="single-box">
				<div class="single-img">
					<img src="<?php echo $src; ?>/<?php echo $src; ?>/assets/images/stories-img1.jpg" alt="">
				</div>
				<div class="single-info">
					<div class="post-date">
						<img src="<?php echo $src; ?>/assets/images/calender-icon.png" alt="" aria-hidden="true"> 17th September, 2025
					</div>
					<h3>
					<a href="javascript:void(0)" role="link" rel="">Four Seasons Photo Competition 2025 Autumn Winners</a>
					</h3>
					<p>Congratulations to the three winners in the Autumn Four Seasons Photo Competition.</p>
				</div>
			</div>
			<div class="single-box">
				<div class="single-img">
					<img src="<?php echo $src; ?>/assets/images/stories-img2.jpg" alt="">
				</div>
				<div class="single-info">
					<div class="post-date">
						<img src="<?php echo $src; ?>/assets/images/calender-icon.png" alt="" aria-hidden="true"> 3rd Sep, 2025
					</div>
					<h3>
					<a href="javascript:void(0)" role="link" rel="">Age-Friendly Housing: How Housing Policy can Shape Positive Ageing</a>
					</h3>
					<p>The 2025 Simon Brooke Lecture will focus on Age-Friendly Housing in Ireland.</p>
				</div>
			</div>
			<div class="single-box">
				<div class="single-img">
					<img src="<?php echo $src; ?>/assets/images/stories-img3.jpg" alt="">
				</div>
				<div class="single-info">
					<div class="post-date">
						<img src="<?php echo $src; ?>/assets/images/calender-icon.png" alt="" aria-hidden="true"> 25th Jul, 2025
					</div>
					<h3>
					<a href="javascript:void(0)" role="link" rel="">Clann’s Housing Advice Centre will close at 2pm on Monday 28th July</a>
					</h3>
					<p>Clann’s Housing Advice Centre will be closed from 2pm on Monday 28th July 2025.</p>
				</div>
			</div>
			<div class="single-box">
				<div class="single-img">
					<img src="<?php echo $src; ?>/assets/images/stories-img1.jpg" alt="">
				</div>
				<div class="single-info">
					<div class="post-date">
						<img src="<?php echo $src; ?>/assets/images/calender-icon.png" alt="" aria-hidden="true"> 17th September, 2025
					</div>
					<h3>
					<a href="javascript:void(0)" role="link" rel="">Four Seasons Photo Competition 2025 Autumn Winners</a>
					</h3>
					<p>Congratulations to the three winners in the Autumn Four Seasons Photo Competition.</p>
				</div>
			</div>
		</div>
		<div class="newsSlick-control">
			<button type="button" aria-label="Click here to pause slider" title="Pause Slider" class="slick-autoplay-toggle basic_btn" id="newsSlick-toggle"><i aria-hidden="true" class="fas fa-pause"></i> Pause</button>
		</div>
	</div>
</section>
<!-- Our news end -->
		
<?php get_footer(); ?>