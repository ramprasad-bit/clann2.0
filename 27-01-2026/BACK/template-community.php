<?php 

if(!defined('ABSPATH')){ die('You are not allowed'); }
if(!function_exists('add_action')){ exit; }

/* Template Name: Community */ 
get_header();
$page_id = get_the_id(); 
$src = get_stylesheet_directory_uri(); 
?>
<!-- Our stories start -->
<?php
	if(get_field('show_our_stories_section')==1){
	$os_heading = get_field('os_heading');
	$os_button = get_field('os_button');
?>
<section class="section stories-row">
	<div class="container">
		<?php echo $os_heading?'<div class="global-heading text-center">
			<h2>'.$os_heading.'</h2>
		</div>':''; ?>
		<?php             
            $args = array(
                'post_type'      => 'post',
                'post_status'	 => 'publish',								
                'posts_per_page' => -1,
                'orderby'		 => 'publish_date',
                'order'			 => 'ASC',
				'category_name'  => 'story'
            );
            $storiePerPage = '0';
            $storie_posts = new WP_Query($args);	
			if($storie_posts->have_posts()){		    
        ?>
		<div class="stories-slider" id="stories-slider">
			<?php
			while ($storie_posts->have_posts()) : $storie_posts->the_post();
				$post_id = get_the_ID();
				$title = get_the_title($post_id);
				$excerpt = get_the_excerpt($post_id);
				$excerpt = substr( $excerpt , 0, 250);				
				$thumbnail_id = get_post_thumbnail_id($post_id);				
				$image_url = get_the_post_thumbnail_url($post_id, 'img_463_297');				
				$image_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);				
				$image_url = $image_url ? $image_url : $no_img['url'];
				$image_alt = $image_alt ? $image_alt : get_the_title($post_id);		
				// strtr_get_post_thumb_url($post_id, 'img_463_297');		
            ?>
			<div class="single-box">
				<?php echo $image_url?'<div class="single-img">					
					<img src="'.$image_url.'" alt="'.$image_alt.'">
				</div>':''; ?>
				<?php echo $title?'<div class="single-info">
					<h3><a href="'.get_the_permalink( $post_id ).'" role="link" rel="">'.$title.'</a></h3>
				</div>':''; ?>
			</div>
			<?php
                $storiePerPage++;
                endwhile;
                wp_reset_query();
            ?>			
		</div>		
		<?php } ?>
		<?php echo $os_button?'<div class="button-row">
			<a href="'.$os_button['url'].'" target="'.$os_button['target'].'" class="basic_btn" aria-label="click here to View '.$os_button['title'].'">'.$os_button['title'].'</a>
		</div>':''; ?>
	</div>
</section>
<?php } ?>
<!-- Our stories end -->
<?php
	$as_content_grid = get_field('as_content_grid');
	if(is_array($as_content_grid) && count($as_content_grid)>0){
?>
<section class="community-row">
	<?php $i=1; foreach($as_content_grid as $asConts){ 			
			$sec_style = ($i % 2 == 0)
			? 'intro-row'
			: 'primary-color dark-bg intro-row intro-reverse';
		?>
		<div class="section <?php echo esc_attr($sec_style); ?>">
			<div class="container">
				<div class="row">
					<?php echo $asConts['as_image']?'<div class="intro-img"><img src="'.$asConts['as_image']['url'].'" alt="'.$asConts['as_image']['alt'].'"></div>':''; ?>
					<div class="intro-content">
						<div class="global-heading">
							<?php echo $asConts['as_heading']?'<h2>'.$asConts['as_heading'].'</h2>':''; 
							 echo $asConts['as_content']?$asConts['as_content']:''; ?>
						</div>
						<?php echo $asConts['as_button']?'<a href="'.$asConts['as_button']['url'].'" target="'.$asConts['as_button']['target'].'" class="basic_btn" aria-label="click here to Read More about '.$asConts['as_heading'].'">'.$asConts['as_button']['title'].'</a>':''; ?>
					</div>
				</div>
			</div>
		</div>
	<?php $i++; } ?>	
</section>
<?php } ?>
<!-- Our publications start -->
<?php echo get_field('abt_op_visibility')==1?get_template_part('/template-parts/publication-module'):''; ?>
<!-- Our news start -->
<?php             
	$args = array(
		'post_type'      => 'post',
		'post_status'	 => 'publish',								
		'posts_per_page' => -1,
		'orderby'		 => 'publish_date',
		'order'			 => 'ASC',
		'category_name'  => 'news'
	);
	$newsPerPage = '0';
	$news_posts = new WP_Query($args);
	if($news_posts->have_posts()){			    
?>
<section class="section light-blue news-row">
	<div class="container">
		<div class="global-heading text-center">
			<h2>Our news</h2>
			<p>We work all over Ireland and there’s always something newsworthy happening</p>
		</div>
		<div class="stories-slider news-slider" id="news-slider">
			<?php
			while ($news_posts->have_posts()) : $news_posts->the_post();
				$post_id = get_the_ID();
				$title = get_the_title($post_id);
				$excerpt = get_the_excerpt($post_id);
				$excerpt = substr( $excerpt , 0, 350);				
				$thumbnail_id = get_post_thumbnail_id($post_id);				
				$image_url = get_the_post_thumbnail_url($post_id, 'img_463_297');				
				$image_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);				
				$image_url = $image_url ? $image_url : $no_img['url'];
				$image_alt = $image_alt ? $image_alt : get_the_title($post_id);	
				$post_date = get_the_date('jS F, Y', $post_id);	
				// strtr_get_post_thumb_url($post_id, 'img_463_297');		
            ?>
			<div class="single-box">
				<?php echo $image_url?'<div class="single-img">
					<img src="'.$image_url.'" alt="'.$image_alt.'">
				</div>':''; ?>
				<div class="single-info">
					<?php echo $post_date?'<div class="post-date">
						<img src="'.$src.'/assets/images/calender-icon.png" alt="calender" aria-hidden="true"> '.$post_date.'
					</div>':''; 
					 echo $title?'<h3><a href="'.get_the_permalink( $post_id ).'" role="link" rel="">'.$title.'</a></h3>':''; 
					echo $excerpt?'<p>'.$excerpt.'</p>':''; ?>
				</div>
			</div>
			<?php
                $newsPerPage++;
                endwhile;
                wp_reset_query();
            ?>			
		</div>
		<div class="newsSlick-control">
			<button type="button" aria-label="Click here to pause slider" title="Pause Slider" class="slick-autoplay-toggle basic_btn" id="newsSlick-toggle"><i aria-hidden="true" class="fas fa-pause"></i> Pause</button>
		</div>
	</div>
</section>
<?php } ?>
<!-- Our news end -->
<?php get_footer(); ?>