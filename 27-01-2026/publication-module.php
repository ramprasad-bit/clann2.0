<?php	
if(!defined('ABSPATH')){ die('You are not allowed'); }
	$post_id = get_the_ID();
	$abts_op_heading = get_field('abts_op_heading', $post_id);
	$abt_op_button = get_field('abt_op_button', $post_id);
?>
<section class="section intro-row dark-bg primary-color publications-row">
	<div class="container">
		<?php echo $abts_op_heading?'<div class="global-heading text-center dark-bg">
			<h2>'.$abts_op_heading.'</h2>
		</div>':''; ?>
		<?php             
            $args = array(
                'post_type'      => 'publication',
                'post_status'	 => 'publish',								
                'posts_per_page' => -1,
                'orderby'		 => 'publish_date',
                'order'			 => 'ASC'
            );
            $tourPerPage = '0';
            $tour_posts = new WP_Query($args);			    
        ?>
		<div class="culture-slider" id="publications-slider">
			<?php
                while ($tour_posts->have_posts()) : $tour_posts->the_post();
                    $post_id = get_the_ID();
                    $title = get_the_title($post_id);
                    $excerpt = get_the_excerpt($post_id);
                    $excerpt = substr( $excerpt , 0, 250);
                    $imageurl = get_the_post_thumbnail(get_the_ID(),'img_542_428'); 
                    $expImgPath = ($imageurl)? $imageurl:$no_img['url'];							
                    $intro_upload_pdf = get_field('intro_upload_pdf', $post_id);   
					if($intro_upload_pdf){
						$pdfLink = $intro_upload_pdf['url'];
					} else{
						$pdfLink = '';
					}
            ?>
			<div class="culture-box">
				<div class="culture-img">					
					<?php strtr_get_post_thumb_url($post_id, 'img_518_387');  ?>
				</div>
				<?php echo $title?'<div class="culture-info">
					<h3>
						<a href="'.$pdfLink.'" download role="link" aria-label="click here to view about '.$title.'">'.$title.'</a>
					</h3>
				</div>':''; ?>
			</div>
			<?php
                $tourPerPage++;
                endwhile;
                wp_reset_query();
            ?>			
		</div>		
		<?php echo $abt_op_button?'<div class="button-row">
			<a href="'.$abt_op_button['url'].'" target="'.$abt_op_button['target'].'" role="link" class="basic_btn" aria-label="Click here to View '.$abt_op_button['title'].'">'.$abt_op_button['title'].'</a>
		</div>':''; ?>
	</div>
</section>
