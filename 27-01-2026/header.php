<!doctype html>
	<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

		<?php wp_head(); ?>
		<?php
			global $post;
			$pr_show_pages = get_field('pr_show_pages', 'option');
			$page_ID = isset($post->ID) ? $post->ID : 0;
			$pay_box_class = '';
			if ( is_array($pr_show_pages) && in_array($page_ID, $pr_show_pages) ) {
				$pay_box_class = 'pay-box';
			}
		?>
	</head>

	<body <?php body_class($pay_box_class); ?>>
		<?php wp_body_open(); wp_nonce_field( 'verify_wpnonce_field', 'wp_nonce_unqkey'); $src = get_stylesheet_directory_uri();  ?>
        <?php 
		 $email_address = get_field('head_email', 'option');
		 $phone_number = get_field('headphone', 'option');
		 $head_help_line = get_field('head_help_line', 'option');
		 $head_rent_button = get_field('head_rent_button', 'option');
		 
		 ?>
		<div id="page" class="site">
			<div class="site-inner">
				<!-- Header -->
				<header id="masthead" class="site-header">
					<!-- Skip to main content -->
					<a href="#main" class="skip-to-main-content-link" role="link" aria-label="Skip to main content">Skip to main content</a>
					<div class="header_top">
						<div class="container">
							<div class="header_top_menu_wrapper d-flex align-items-center justify-content-between">
							    
							    <?php $header_logo = get_field('main_logo', 'option'); 
    								if($header_logo){ ?>
    									<!--Brand icon-->
    									<div class="logo">
    										<?php echo '<a role="link" aria-label="'.$header_logo['alt'].'" rel="noopener noreferrer" href="'.home_url().'">
    											<img src="'.$header_logo['url'].'" alt="'.$header_logo['alt'].'" alt="'.$header_logo['alt'].'">
    										</a>'; ?>
    									</div>
    							<?php } ?>
							
								<div class="contact-links">
									<ul aria-label="Contact Information">
									    
									    <?php echo ($phone_number)? '<li><a href="tel:'.filter_phone_number($phone_number).'" aria-label="phone number '.$phone_number.'" role="link" rel="noopener noreferrer">
									    <span><img src="'.$src.'/assets/images/call-icon.png" alt="call-icon" aria-hidden="true" ></span>'.$phone_number.'</a></li>':''; ?>
									    
									    <?php echo ($head_help_line)? '<li><a href="tel:'.filter_phone_number($head_help_line).'" aria-label="Help line number '.$head_help_line.'" role="link" rel="noopener noreferrer">
									    <span><img src="'.$src.'/assets/images/helpline-icon.png" alt="Help line number-icon" aria-hidden="true" ></span>'.$head_help_line.'</a></li>':''; ?>
									    
									    <?php echo ($email_address)? '<li><a href="mailto:'.$email_address.'" aria-label="email to '.$email_address.'" role="link" rel="noopener noreferrer">
									    <span><img src="'.$src.'/assets/images/email-icon.png" alt="email-icon" aria-hidden="true" ></span>'.$email_address.'</a></li>':''; ?>
									   
										
									</ul>
									<?php if($head_rent_button){ ?>
    									<div class="header-btn">
    										<a href="<?php echo $head_rent_button['url']; ?>" role="link" rel="noopener noreferrer" aria-label="click here to <?php echo $head_rent_button['title']; ?>" class="basic_btn rent-btn"><?php echo $head_rent_button['title']; ?></a>
    									</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="header_bottom">
							<div class="container d-flex align-items-center justify-content-end">
								<?php $header_logo = get_field('main_logo', 'option'); 
    								if($header_logo){ ?>
    									<!--Brand icon-->
    									<div class="logo">
    										<?php echo '<a role="link" aria-label="'.$header_logo['alt'].'" rel="noopener noreferrer" href="'.home_url().'">
    											<img src="'.$header_logo['url'].'" alt="'.$header_logo['alt'].'" alt="'.$header_logo['alt'].'">
    										</a>'; ?>
    									</div>
    							<?php } ?>

								<!-- Navigation -->
								<nav id="site-navigation" class="main-navigation">
									
										<?php if(has_nav_menu('primary')){
												wp_nav_menu([
													'theme_location' => 'primary',
													'menu_id' => 'menu-main-menu',
													'menu_class' => 'primary-menu',
													'depth' => 2
												]);
											} ?>
								
									<!-- hamburger -->
									<a href="javascript:void(0)" role="button" class="menuTrigger toggle-close" aria-label="close navigation">
										<span></span>
										<span></span>
										<span></span>
									</a>
								</nav>
								<div class="mob-head-right">
								    <?php if($head_rent_button){ ?>
    									<div class="header-btn">
    										<a href="<?php echo $head_rent_button['url']; ?>" role="link" rel="noopener noreferrer" aria-label="click here to <?php echo $head_rent_button['title']; ?>" class="basic_btn rent-btn"><?php echo $head_rent_button['title']; ?></a>
    									</div>
									<?php } ?>
									<div class="header_search">
										<a href="javascript:void(0)" id="search_icon" class="hdr_srch_icon"><img src="<?php echo $src; ?>/assets/images/search-icon.png" alt="search icon"></a>
									</div>
									<a href="javascript:void(0)" role="button" class="menuTrigger toggle-open" aria-label="open navigation">
										<span></span>
										<span></span>
										<span></span>
									</a>
								</div>
								
							</div>
						</div>
					</div>
					<div class="overly"></div>
				</header>
				<!-- Header -->
				<div id="content" class="site-content">
            	<div id="primary" class="content-area">
            		<main id="main" class="site-main" role="main">
            		    
            		    <?php if(is_front_page()) { ?>
            		    
            		    <?php 
            		        $banner_type    = get_field('banner_type');
            		        $hm_banner_img  = get_field('hm_banner_img');
            		        $hm_banner_vid  = get_field('hm_banner_vid');
            		        $hm_banner_text = get_field('hm_banner_text');
            		        $hm_bnr_button  = get_field('hm_bnr_button');
            		    ?>
            			<!--Banner-->
            			<section class="banner">
            				<div class="banner_content_wrapper">
            					<div class="container">
            						<div class="banner_content">
            							<div class="banner_text">
            							    <?php if($hm_banner_text) { ?>
            								    <h1><?php echo $hm_banner_text; ?></h1>
            								<?php } ?>
            								<?php if($hm_bnr_button) { ?><a href="<?php echo $hm_bnr_button['url']; ?>" class="basic_btn"><?php echo $hm_bnr_button['title']; ?></a><?php } ?>
            							</div>
            							<!-- <div class="play-pause-btn video_btn">
            									<button role="button" class="basic_btn pause-bt" id="video-play-toggle" aria-live="assertive"> </button>
            							</div> -->
            						</div>
            					</div>
            				</div>
            				<div class="banner_media">
            				    <?php if($banner_type == 'Image' && $hm_banner_img !="") {  ?>
            				    
            				        <img src="<?php echo $hm_banner_img['url']; ?>" alt="<?php echo $hm_banner_img['alt']; ?>">
            				        
            				    <?php } if($banner_type == 'Video' && $hm_banner_vid !="") { ?>
            				    
            				        <video autoplay muted playsinline loop id="ban_video">
            							<source src="<?php echo $hm_banner_vid['url']; ?>" type="video/mp4"/>
            					</video>
            				    
            				    <?php } ?>
            				</div>
            			</section>
            			<?php }else{ ?>
            			    <?php echo get_template_part('/template-parts/inner-banner'); ?>
            			<?php } ?>
            			<!--Banner-->