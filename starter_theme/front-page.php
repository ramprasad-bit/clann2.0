<?php 

if(!defined('ABSPATH')){ die('You are not allowed'); }

if(!function_exists('add_action')){ exit; }

get_header(); 

$src = get_stylesheet_directory_uri(); 

//Intro 
$hm_int_visibility = get_field('hm_int_visibility');
$hm_int_heading    = get_field('hm_int_heading');
$hm_int_content    = get_field('hm_int_content');
$hm_int_link       = get_field('hm_int_link');
$hm_int_image      = get_field('hm_int_image');

//How to apply 
$hm_hta_visibility = get_field('hm_hta_visibility');
$hm_hta_heading    = get_field('hm_hta_heading');
$hm_hta_steps      = get_field('hm_hta_steps');
$hm_hta_button     = get_field('hm_hta_button');

//story 
$hm_st_visibility   = get_field('hm_st_visibility');
$hm_os_heading      = get_field('hm_os_heading');

//Green divider 
$hm_gd_visibility   = get_field('hm_gd_visibility');
$hm_gd_text 		= get_field('hm_gd_text');
$hm_gd_button       = get_field('hm_gd_button');

//Housing supports 
$hm_hs_visibility = get_field('hm_hs_visibility');
$hm_hs_heading    = get_field('hm_hs_heading');
$hm_hs_content    = get_field('hm_hs_content');
$hm_hs_button     = get_field('hm_hs_button');
$hm_hs_image      = get_field('hm_hs_image');

//News 
$hm_on_visibility = get_field('hm_on_visibility');
$hm_on_heading = get_field('hm_on_heading');
$hm_on_tagline = get_field('hm_on_tagline');

$no_img = get_field('no_img','option'); 

?>

<?php if($hm_int_visibility == true) { ?>
<!--intro-->
<section class="section intro-row">
	<div class="container">
		<div class="row">
			<?php if($hm_int_image){  ?>
				<div class="intro-img"><img src="<?php echo $hm_int_image['url']; ?>" alt="<?php echo $hm_int_image['alt']; ?>"></div>
			<?php } ?>
			<div class="intro-content">
				<div class="global-heading">
					<?php if($hm_int_heading){  ?><h2><?php echo $hm_int_heading; ?></h2><?php } ?>
					<?php echo $hm_int_content; ?>
				</div>
				<?php if($hm_int_link) { ?>
					<a href="<?php echo $hm_int_link['url']; ?>" class="basic_btn" aria-label="click here visit <?php echo $hm_int_link['title']; ?>"><?php echo $hm_int_link['title']; ?></a>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
<!--intro end-->
<?php } if($hm_hta_visibility == true) { ?>
<!-- How to apply start -->
<section class="section primary-color how-apply">
	<div class="container">
		<?php if($hm_hta_heading){ ?>
			<div class="global-heading text-center dark-bg">
				<h2><?php echo $hm_hta_heading; ?></h2>
			</div>
		<?php } ?>
		<?php if( have_rows('hm_hta_steps') ): ?>
		<div class="apply-list">
			<div class="apply-list-slider" id="apply-slider">
				<?php $counter = 1; while( have_rows('hm_hta_steps') ): the_row(); $image = get_sub_field('icon'); ?>
				<div class="apply-box">
					<div class="apply-icon">
						<span class="number"><?php echo $counter; ?></span>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" aria-hidden="true">
					</div>
					<h3><?php echo get_sub_field('heading'); ?></h3>
				</div>
				<?php $counter++; endwhile; ?>
			</div>

			<?php if($hm_hta_button) { ?>
				<div class="button-row">
					<a href="<?php echo $hm_hta_button['url']; ?>" class="basic_btn" aria-label="click here to <?php echo $hm_hta_button['title']; ?>"><?php echo $hm_hta_button['title']; ?></a>
				</div>
			<?php } ?>
			
		</div>
		<?php endif; ?>
	</div>
</section>
<!-- How to apply end -->
<?php } if($hm_st_visibility == true) { ?>
<!-- Our stories start -->
<section class="section stories-row">
	<div class="container">
		<?php if($hm_os_heading) { ?>
			<div class="global-heading text-center">
				<h2><?php echo $hm_os_heading; ?></h2>
			</div>
		<?php } ?>
		<div class="stories-slider" id="stories-slider">

			<?php
				$args = array(
				    'category_name' => 'story', // category slug
				    'posts_per_page' => -1       // show all posts
				);

				$query = new WP_Query($args);

				if ($query->have_posts()) :
				    while ($query->have_posts()) : $query->the_post();

				    	if (has_post_thumbnail()) {
		                    $post_image = get_the_post_thumbnail_url(get_the_ID(),'img_463_297'); // thumbnail size
		                }else{
		                	$post_image = $no_img['sizes']['img_463_297']; // thumbnail size
		                }
		                $excerpt = get_the_excerpt();
		                $date = get_the_date('jS F, Y');
				        ?>

				        <div class="single-box">
							<div class="single-img">
								<img src="<?php echo $post_image; ?>" alt="<?php the_title(); ?>">
							</div>
							<div class="single-info">
								<h3>
								<a href="<?php the_permalink(); ?>" role="link" rel=""> <?php the_title(); ?></a>
								</h3>
								<p><?php echo esc_html($excerpt); ?></p>
							</div>
						</div>

				        <?php
				    endwhile;
				    wp_reset_postdata();
				else :
				    echo '<div class="single-box"><strong><p>No stories found.</p></strong></div>';
				endif;
			?>

		</div>
	</div>
</section>
<!-- Our stories end -->
<?php } if($hm_gd_visibility == true) { ?>
<!-- Get Involved start -->
<section class="section primary-color get-involved">
	<div class="container">
		<div class="row">
			<?php if($hm_gd_text){ echo '<h2>'.$hm_gd_text.'</h2>'; } ?>
			<?php if($hm_gd_button){ ?>
				<a href="<?php echo $hm_gd_button['url']; ?>" class="basic_btn" aria-label="click here to <?php echo $hm_gd_button['title']; ?>"><?php echo $hm_gd_button['title']; ?></a>
			<?php } ?>
		</div>
	</div>
</section>
<!-- Get Involved end -->
<?php } if($hm_hs_visibility == true) { ?>
<!--Housing supports start-->
<section class="section intro-row supports-row">
	<div class="container">
		<div class="row">
			<div class="intro-img"><img src="<?php echo $src; ?>/assets/images/housingsupport-img.jpg" alt=""></div>
			<div class="intro-content">
				<div class="global-heading">
					<?php if($hm_hs_heading){ echo '<h2>'.$hm_hs_heading.'</h2>'; } ?>
					<?php echo $hm_hs_content; ?>
				</div>
				<?php if($hm_hs_button){ ?>
					<a href="<?php echo $hm_hs_button['url']; ?>" class="basic_btn" aria-label="click here Read More about <?php echo $hm_hs_heading; ?>"><?php echo $hm_hs_button['title']; ?></a>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
<!--Housing supports end-->
<?php } if($hm_on_visibility == true) { ?>
<!-- Our news start -->
<section class="section light-blue news-row">
	<div class="container">
		<div class="global-heading text-center">
			<?php if($hm_on_heading){ echo '<h2>'.$hm_on_heading.'</h2>'; } ?>
			<?php if($hm_on_tagline){ echo '<p>'.$hm_on_tagline.'</p>'; } ?>
		</div>
		<div class="stories-slider news-slider" id="news-slider">

			<?php
				$args = array(
				    'category_name' => 'news', // category slug
				    'posts_per_page' => -1       // show all posts
				);

				$query = new WP_Query($args);

				if ($query->have_posts()) :
			    while ($query->have_posts()) : $query->the_post();

			    	if (has_post_thumbnail()) {
	                    $post_image = get_the_post_thumbnail_url(get_the_ID(),'img_463_297'); // thumbnail size
	                }else{
	                	$post_image = $no_img['sizes']['img_463_297']; // thumbnail size
	                }
	                $excerpt = get_the_excerpt();
	                $date = get_the_date('jS F, Y');
			        ?>

					<div class="single-box">
						<div class="single-img">
							<img src="<?php echo $post_image; ?>" alt="<?php the_title(); ?>">
						</div>
						<div class="single-info">
							<div class="post-date">
								<img src="<?php echo $src; ?>/assets/images/calender-icon.png" alt="" aria-hidden="true"> <?php echo esc_html($date); ?>
							</div>
							<h3>
							<a href="<?php the_permalink(); ?>" role="link" rel=""> <?php the_title(); ?></a>
							</h3>
							<p><?php echo esc_html($excerpt); ?></p>
						</div>
					</div>

				<?php endwhile; wp_reset_postdata();?>
		</div>
		<div class="newsSlick-control">
			<button type="button" aria-label="Click here to pause slider" title="Pause Slider" class="slick-autoplay-toggle basic_btn" id="newsSlick-toggle"><i aria-hidden="true" class="fas fa-pause"></i> Pause</button>
		</div>
		<?php else :
				    echo '<div class="single-box"><strong><p>No news found.</p></strong></div>';
				endif; ?>
	</div>
</section>
<!-- Our news end -->
<?php } ?>	
<?php get_footer(); ?>