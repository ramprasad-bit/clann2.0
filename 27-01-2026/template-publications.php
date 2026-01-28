<?php 
if(!defined('ABSPATH')){ die('You are not allowed'); }
if(!function_exists('add_action')){ exit; }
/* Template Name: Publications */ 
get_header();
$page_id = get_the_id(); 
$src = get_stylesheet_directory_uri(); 
if(get_field('show_publications_section')==1):
?>
<!-- Publications List -->
<?php
    $args = array(
        'post_type'      => 'publication',
        'post_status'	 => 'publish',	
        // 'post__not_in'   => array($post_id),
        'posts_per_page' => -1,
        'orderby'		 => 'publish_date',
        'order'			 => 'ASC'
    );
    $postPerPage = '0';
    $book_posts = new WP_Query($args);
    if ( $book_posts->have_posts() ) :
?>
<section class="section publications-list-row">
    <div class="container">
        <div class="publications-list">
             <?php
                while ($book_posts->have_posts()) : $book_posts->the_post();
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
                    <?php echo strtr_get_post_thumb_url($post_id,'img_254_358'); ?>
                </div>
                <?php echo $title?'<div class="culture-info">
                    <h3>
                        <a href="'.$pdfLink.'" download role="link" aria-label="click here to view about '.$title.'">'.$title.'</a>
                    </h3>
                </div>':''; ?>
            </div>
            <?php
                $postPerPage++;
                endwhile;
                wp_reset_query();
            ?>           
        </div>
    </div>
</section>
<?php endif; endif; get_footer(); ?>