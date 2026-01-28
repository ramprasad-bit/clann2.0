       </main>
	</div>
</div>
<?php 
$locations = get_nav_menu_locations();
$src = get_stylesheet_directory_uri(); 
$footer_logo = get_field('footer_logo', 'option');
$site_address = get_field('site_address', 'option');
$social_media_heading = get_field('social_media_heading', 'option');
$site_socal_media = get_field('site_socal_media', 'option');
$copy_right_text = get_field('copy_right_text', 'option');
$email_add = get_field('head_email', 'option');
$phone_num = get_field('headphone', 'option');
$help_line = get_field('head_help_line', 'option');
?>
<!-- Footer -->
<footer id="colophon" class="site-footer">
	<div class="container">
		<?php echo get_template_part('/template-parts/pay-rent-footer-box'); ?>
		<div class="fooetr-top">
			<div class="foot-col">
				<?php echo $footer_logo?'<div class="foot-logo"><img src="'.$footer_logo['url'].'" alt="'.$footer_logo['alt'].'"></div>':''; ?>
				<?php if(is_array($site_socal_media) && count($site_socal_media)>0){ ?>
					<div class="social">
						<?php echo $social_media_heading?'<h2>'.$social_media_heading.'</h2>':''; ?>						
						<ul aria-label="clann social media">
							<?php foreach($site_socal_media as $siteData){
								echo $siteData['icon']?'<li><a href="'.$siteData['link'].'" role="link" rel="" aria-label="Clann '.$siteData['icon']['alt'].' profile">
								<img src="'.$siteData['icon']['url'].'" alt="'.$siteData['icon']['alt'].'" aria-hidden="true"></a>
							</li>':'';
							} ?>							
						</ul>
					</div>
				<?php } ?>
			</div>
			<div class="foot-col contact_infoleft">
				<div class="contact_info">
					<ul aria-label="Clann contact information">
						<?php echo $site_address?'<li>
							<span></span>
							<div class="info">
								<p><span>Address</span></p>
								<p>'.$site_address.'</p>
							</div>
						</li>':''; 
						 echo $phone_num?'<li>
							<span></span>
							<div class="info">
								<p><span>Phone</span></p>
								<a href="tel:'.preg_replace('/\D+/', '', $phone_num).'" aria-label="call to '.preg_replace('/\D+/', '', $phone_num).'" class="">'.$phone_num.'</a>
							</div>
						</li>':''; 
						 echo $help_line?'<li>
							<span></span>
							<div class="info">
								<p><span>Freephone</span></p>
								<a href="tel:'.preg_replace('/\D+/', '', $help_line).'" aria-label="free call to '.preg_replace('/\D+/', '', $help_line).'" class="">'.$help_line.'</a>
							</div>
						</li>':''; 
						 echo $email_add?'<li>
							<span></span>
							<div class="info">
								<p><span>Email</span></p>
								<a href="mailto:'.$email_add.'" aria-label="email to '.$email_add.'" class=""> '.$email_add.'</a>
							</div>
						</li>':''; ?>
					</ul>
				</div>
			</div>
			<div class="foot-col ftrlinks_item">				
				<?php								
					if ( isset( $locations['footer'] ) ) {
					$menu_id = $locations['footer']; 
					$menu = wp_get_nav_menu_object( $menu_id );
					echo '<h2>' . $menu->name. '</h2>';
					if (has_nav_menu('footer')) {
							wp_nav_menu([
								'theme_location' => 'footer',
								'menu_class' => '',
								'menu_id' => '',
								'container' => '',
								'depth' => 1
							]);
						} 
					}
				?>
			</div>
			<div class="foot-col ftrlinks_item">				
				<?php								
					if ( isset( $locations['footer_2'] ) ) {
					$menu_id = $locations['footer_2']; 
					$menu = wp_get_nav_menu_object( $menu_id );
					echo '<h2>' . $menu->name. '</h2>';
					if (has_nav_menu('footer_2')) {
							wp_nav_menu([
								'theme_location' => 'footer_2',
								'menu_class' => '',
								'menu_id' => '',
								'container' => '',
								'depth' => 1
							]);
						} 
					}
				?>
			</div>
		</div>
		<?php echo $copy_right_text?'<div class="fooetr-bottom">'.$copy_right_text.'</div>':''; ?>
	</div>
	<a href="javascript:void(0)" id="scroll" aria-label="Click here to return to the top" style="display: none;"><span>
		<img src="<?php echo $src; ?>/assets/images/top-arrow.png" alt="arrow" aria-hidden="true">
	</span></a>				
</footer>
<!-- Footer -->
<!--Overlay-->
<div id="search-overlay" class="search-form">
	<div class="search-centered">
		<form action="">
			<div class="subscribe_form d-flex">
				<div class="subs_input">
					<input type="text" class="subs_frm_control" placeholder="Enter Your Search..." name="" value="" >
				</div>
				<input type="submit" class="basic_btn subs_btn" value="Search">
			</div>
			<a href="javascript:void(0)" id="close-btn" aria-label="Close search"><img src="<?php echo $src; ?>/assets/images/close-w-icon.png" alt="" aria-hidden="true"></a>
		</form>		
	</div>
</div>
</div>
</div>
<?php wp_footer(); ?>
<script>
	jQuery(document).ready(function(){
		var speed = 500;
		var hash = window.location.hash;
		if(jQuery(hash).length) scrollToID(hash, speed); 
	
		if(hash){
			setTimeout(function(){
				window.history.replaceState("", document.title, window.location.pathname);
			}, 1);
		}
	});
	function scrollToID(id, speed) {
		var offSet = 190;
		var obj = jQuery(id).offset();
		var targetOffset = obj.top - offSet;
		jQuery('html,body').animate({ scrollTop: targetOffset }, speed);
	}
</script>
</body>
</html>	