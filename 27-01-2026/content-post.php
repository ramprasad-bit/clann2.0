<?php
/**
 * Template part for displaying page content in post.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header(); 
global $post;
$no_img = get_field('no_img', 'option');
$src = get_template_directory_uri();
$post_id = get_the_ID();
$page_title = get_the_title($post_id);
$blog_page_link = site_url('blog');
// $post_id = get_the_id();            
$title = trim(get_the_title());
$excerpt = get_the_excerpt();
$excerpt = substr( $excerpt , 0, 200);                                    
$date_time = get_the_date( 'F j, Y', $post_id );               
$content = apply_filters( 'the_content', get_the_content($post_id) );
$wordcount = str_word_count( strip_tags( $content ) );   
$time = ceil($wordcount / 250);
$authorID = get_post_field ('post_author', $post_id);
$displayName = ucfirst(get_the_author_meta( 'display_name' , $authorID ));
$intro_heading = get_field('intro_heading', $post_id);
// $categories = get_the_category();
if ( post_password_required() ){ strtr_show_password_form(); }else{     
?>
<!-- Our stories details -->
<section class="section stories-details">
    <div class="container container-small">
        <?php echo $intro_heading?'<h2>'.$intro_heading.'</h2>':''; ?>
        <div class="details-img">
            <!-- <img src="<?php //echo $src; ?>/assets/images/story-details.jpg" alt=""> -->
            <?php strtr_get_post_thumb_url($post_id, 'img_1000_700');  ?>
        </div>
        <?php echo $content?$content:''; ?>
        <div class="social-row">
            <p>Share: </p>
            <ul aria-label="clann social media">
                <li>
                    <a href="javascript:void(0)" role="link" rel="" aria-label="Clann Bluesky profile">
                    <img src="<?php echo $src; ?>/assets/images/bluesky-icon.png" alt="" aria-hidden="true"></a>
                </li>
                <li>
                    <a href="javascript:void(0)" role="link" rel="" aria-label="Clann Youtube profile">
                    <img src="<?php echo $src; ?>/assets/images/youtube-icon.png" alt="" aria-hidden="true"></a>
                </li>
                <li>
                    <a href="javascript:void(0)" role="link" rel="" aria-label="Clann Linkedin profile">
                    <img src="<?php echo $src; ?>/assets/images/linkedin-icon.png" alt="" aria-hidden="true"></a>
                </li>
            </ul>
        </div>
    </div>
</section>
<?php
    if(get_field('show_gallery_section', $post_id)):
        $gs_heading = get_field('gs_heading', $post_id);
        $gs_gallerys = get_field('gs_gallerys', $post_id);
?>
<section class="section light-blue">
    <div class="container">
        <?php echo $gs_heading?'<div class="global-heading text-center">
            <h2>'.$gs_heading.'</h2>
        </div>':''; ?>
        <?php if(is_array($gs_gallerys) && count($gs_gallerys)>0): ?>
        <div class="row gallery-row">
            <?php foreach($gs_gallerys as $gs_gallery):                 
                $gs_image_url = $gs_gallery['url'];
                echo $gs_image_url?'<div class="gallery-box">
                <a data-fancybox="gallery" data-src="'.$gs_image_url.'" data-caption="">
                    <img src="'.$gs_gallery['sizes']['img_800_800'].'" alt="'.esc_attr($gs_gallery['alt']).'">
                </a>
                </div>':''; 
                endforeach;
            ?>            
        </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>
<?php } ?>