<?php 
    /* Template Name: CMS Page */
    
    get_header(); 

    $no_img = get_field('no_img', 'option');
    $src = get_template_directory_uri();
    $pageid = get_the_ID();
?> 

<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php if ( post_password_required() ){ strtr_show_password_form(); }else{ ?>
                <?php echo get_template_part('/template-parts/inner-banner'); ?>
            <?php } ?>
        </main>
    </div>
</div>

<?php get_footer(); ?>
