       </main>
	</div>
</div>
<?php $src = get_stylesheet_directory_uri(); ?>
<!-- Footer -->
<footer id="colophon" class="site-footer">
	<div class="container">
		<?php echo get_template_part('/template-parts/pay-rent-footer-box'); ?>

		<div class="fooetr-top">
			<div class="foot-col">
				<div class="foot-logo"><img src="<?php echo $src; ?>/assets/images/footer-logo.png" alt="clann logo"></div>
				<div class="social">
					<h2>Follow Us On:</h2>
					<ul aria-label="clann social media">
						<li><a href="javascript:void(0)" role="link" rel="" aria-label="Clann Bluesky profile">
							<img src="<?php echo $src; ?>/assets/images/bluesky-icon.png" alt="" aria-hidden="true"></a>
						</li>
						<li><a href="javascript:void(0)" role="link" rel="" aria-label="Clann Youtube profile">
							<img src="<?php echo $src; ?>/assets/images/youtube-icon.png" alt="" aria-hidden="true"></a>
						</li>
						<li><a href="javascript:void(0)" role="link" rel="" aria-label="Clann Linkedin profile">
							<img src="<?php echo $src; ?>/assets/images/linkedin-icon.png" alt="" aria-hidden="true"></a>
						</li>
					</ul>
				</div>
			</div>
			<div class="foot-col contact_infoleft">
				<div class="contact_info">
					<ul aria-label="Clann contact information">
						<li>
							<span></span>
							<div class="info">
								<p><span>Address</span></p>
								<p>159-161 Sheriff Street Upper, Dublin, D01 R8N0, Ireland</p>
							</div>
						</li>
						<li>
							<span></span>
							<div class="info">
								<p><span>Phone</span></p>
								<a href="tel:017072244" aria-label="call to 017072244" class="">01 707 2244</a>
							</div>
						</li>
						<li>
							<span></span>
							<div class="info">
								<p><span>Freephone</span></p>
								<a href="tel:1800707224" aria-label="free call to 1800707224" class="">1800 707 224</a>
							</div>
						</li>
						<li>
							<span></span>
							<div class="info">
								<p><span>Email</span></p>
								<a href="mailto:clann@clannhousing.ie" aria-label="email to clann@clannhousing.ie" class=""> clann@clannhousing.ie</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="foot-col ftrlinks_item">
				<h2>Ouick Links</h2>
				<ul class="clann quick links">
					<li><a href="javascript:void(0)" role="link">About Us</a></li>
					<li><a href="javascript:void(0)" role="link">My Community</a></li>
					<li><a href="javascript:void(0)" role="link">My Home</a></li>
					<li><a href="javascript:void(0)" role="link">Supports</a></li>
					<li><a href="javascript:void(0)" role="link">Contact</a></li>
				</ul>
			</div>
			<div class="foot-col ftrlinks_item">
				<h2>Other Links</h2>
				<ul class="clann quick links">
					<li><a href="javascript:void(0)" role="link">Careers</a></li>
					<li><a href="javascript:void(0)" role="link">Accessibility</a></li>
					<li><a href="javascript:void(0)" role="link">Terms and Conditions</a></li>
					<li><a href="javascript:void(0)" role="link">Privacy Policy</a></li>
					<li><a href="javascript:void(0)" role="link">Cookie Policy</a></li>
				</ul>
			</div>
		</div>
		<div class="fooetr-bottom">
			<p>Clann ® is a registered trademark of Clúid Housing Association.</p>
			<p><span>Company Number: 212249. Registered Charity Number: 20029975. PSRA Licence Number: 001415.</span></p>
			<p>Website by <a href="javascript:void(0)" role="link" aria-label="click here to visit IrishMediaAgency.ie" title=""> IrishMediaAgency.ie</a></p>
		</div>
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