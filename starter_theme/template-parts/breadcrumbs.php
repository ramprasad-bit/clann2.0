<?php //$page_for_posts = get_option( 'page_for_posts' );
    //$page_id = (get_post_type() == 'post')? $page_for_posts:get_the_id(); ?>

<div class="breadcrumbs">
    <ul>
        <?php echo '<li><a href="'.home_url().'">Home <i class="fa-solid fa-circle-arrow-right"></i></a></li>'; 
        
        if(get_post_type() == 'bikes'){
            echo '<li><a href="'.get_the_permalink(255).'">'.get_the_title(255).' <i class="fa-solid fa-circle-arrow-right"></i></a></li>'; 
        } 
        $post_parent = wp_get_post_parent_id(get_the_ID());                        

        if($post_parent){                            
            echo '<li><a href="'.get_the_permalink($post_parent).'">'.get_the_title($post_parent).'<i class="fa-solid fa-circle-arrow-right"></i></a></li>';
        } ?>	

        <li class="current_page_ttl"><?php echo single_post_title(); ?></li>
    </ul>
</div>