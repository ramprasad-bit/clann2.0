<?php
    if(!defined('ABSPATH')){ die('You are not allowed'); }
    if(!function_exists('add_action')){ exit; }
    /* Template Name: Clann Stories */ 
    get_header();
    $page_id = get_the_id();
    $src = get_stylesheet_directory_uri();
    if(get_field('show_story_section', $page_id)):
?>
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
    if($storie_posts->have_posts()):		    
?>
<section class="section stories-row">
    <div class="container">									
        <div class="stories-slider stories-list global-list">
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
                <?php echo $image_url ? '<div class="single-img"><img src="' . $image_url . '" alt="' . $image_alt . '"></div>' : ''; 
                if($title || $excerpt): ?>
                    <div class="single-info">
                        <?php echo $title ? '<h3><a href="'.get_permalink($post_id).'" role="link" rel="">'.$title.'</a></h3>' : ''; 
                        echo $excerpt ? '<p>'.$excerpt.'</p>' : ''; ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php
                $storiePerPage++;
                endwhile;
                wp_reset_query();
            ?>            
        </div>									
    </div>
</section>
<?php endif; endif; ?>
<?php get_footer(); ?>