<?php 

if(!defined('ABSPATH')){ die('You are not allowed'); }

if(!function_exists('add_action')){ exit; }

/* Template Name: About us */ 
get_header();
$page_id 				= get_the_id(); 
$src = get_stylesheet_directory_uri(); 
?>
<!--intro-->
<?php
	$abt_int_left_image = get_field('abt_int_left_image');
	$abt_int_content = get_field('abt_int_content');
	$abt_mission_and_vission = get_field('abt_mission_and_vission');
?>
<section class="section intro-row about-intro">
	<div class="container">
		<?php echo $abt_int_content?'<div class="global-heading text-center">'.$abt_int_content.'</div>':''; ?>
		<div class="row">
			<?php echo $abt_int_left_image?'<div class="intro-img"><img src="'.$abt_int_left_image['url'].'" alt="'.$abt_int_left_image['alt'].'"></div>':''; ?>
			<?php if(is_array($abt_mission_and_vission) && count($abt_mission_and_vission)>0){ ?>
			<div class="intro-content">
				<div class="mission-vision">
					<?php foreach($abt_mission_and_vission as $missionData){ ?>
						<div class="box">
							<?php echo $missionData['icon']?'<div class="icons">
								<img src="'.$missionData['icon']['url'].'" alt="'.$missionData['icon']['alt'].'" aria-hidden="true">
							</div>':''; ?>
							<div class="box-content">
								<?php echo $missionData['heading']?'<h2>'.$missionData['heading'].'</h2>':''; 
								 echo $missionData['content']?'<p>'.$missionData['content'].'</p>':''; ?>
							</div>
						</div>
					<?php } ?>					
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</section>
<!-- find out more start -->
<?php
	if(get_field('abt_gd_visibility')==1){
	$abt_gd_image = get_field('abt_gd_image');	
	$abt_gd_content = get_field('abt_gd_content');
?>
<section class="section primary-color get-involved cluid-visit">
	<div class="container">
		<div class="row">
			<?php echo $abt_gd_image?'<img src="'.$abt_gd_image['url'].'" alt="'.$abt_gd_image['alt'].'">':''; 
			 echo $abt_gd_content?$abt_gd_content:''; ?>			
		</div>
	</div>
</section>
<?php } ?>
<!-- Our four values start -->
<?php
	if(get_field('abt_fv_visibility')==1){
	$abt_fv_heading = get_field('abt_fv_heading');
	$abt_fv_items = get_field('abt_fv_items');
?>
<section class="section fourvalue-row">
	<div class="container">
		<?php echo $abt_fv_heading?'<div class="global-heading text-center">
			<h2>'.$abt_fv_heading.'</h2>
		</div>':''; ?>
		<?php if(is_array($abt_fv_items) && count($abt_fv_items)>0){ ?>
		<div class="culture-slider" id="culture-slider">
			<?php $i=1; foreach($abt_fv_items as $abtData){ ?>
				<div class="culture-box">
					<?php echo $abtData['icon']?'<div class="culture-img"><img src="'.$abtData['icon']['url'].'" alt="'.$abtData['icon']['alt'].'" aria-hidden="true"></div>':''; 
					 echo $abtData['heading']?'<div class="culture-info">
                        <h3><a href="#" class="culture-trigger" data-title="'.esc_attr($abtData['heading']).'" data-content="'.esc_attr(wp_kses_post($abtData['content'])).'" aria-haspopup="dialog" aria-controls="culture-popup" aria-label="click here to view about '.esc_html($abtData['heading']).'">'.esc_html($abtData['heading']).'</a></h3>
                    </div>':''; ?>					
				</div>
			<?php $i++; } ?>			
		</div>
		<?php } ?>
	</div>
</section>
<?php } ?>
<!--Our people-->
<?php
	if(get_field('abt_ops_visibility')==1){
	$abt_op_heading = get_field('abt_op_heading');
	$abt_op_content = get_field('abt_op_content');
	$abt_op_link = get_field('abt_op_link');
	$abt_op_image = get_field('abt_op_image');
?>
<section class="section intro-row dark-bg primary-color intro-reverse technology-row">
	<div class="container">
		<div class="row">
			<?php echo $abt_op_image?'<div class="intro-img"><img src="'.$abt_op_image['url'].'" alt="'.$abt_op_image['alt'].'"></div>':''; ?>
			<div class="intro-content">
				<?php echo $abt_op_heading?'<div class="global-heading dark-bg">
					<h2>'.$abt_op_heading.'</h2>
				</div>':''; 
				 echo $abt_op_content?$abt_op_content:''; 
				  echo $abt_op_link?'<a href="'.$abt_op_link['url'].'" target="'.$abt_op_link['target'].'" role="link" class="basic_btn" aria-label="Click here to '.$abt_op_link['title'].' Our people">'.$abt_op_link['title'].'</a>':''; ?>
			</div>
		</div>
	</div>
</section>
<?php } ?>
<!-- Our Latest Vacancies start -->
<?php
	if(get_field('abt_olv_visibility')==1){
	$abt_olv_content = get_field('abt_olv_content');
	$abt_olv_button = get_field('abt_olv_button');
?>
<section class="section vacancies-row">
	<div class="container">
		<?php echo $abt_olv_content?'<div class="text-center global-heading">'.$abt_olv_content.'</div>':''; 
		 echo $abt_olv_button?'<div class="button-row">
			<a href="'.$abt_olv_button['url'].'" target="'.$abt_olv_button['target'].'" role="link" class="basic_btn" aria-label="Click here to View '.$abt_olv_button['title'].'">'.$abt_olv_button['title'].'</a>
		</div>':''; ?>
	</div>
</section>
<?php } ?>
<!-- Our Latest Vacancies end -->
<?php
	if(get_field('abt_oa_visibility')==1){
	$abt_oa_heading = get_field('abt_oa_heading');
	$abt_oa_items = get_field('abt_oa_items');
?>
<section class="section light-blue awards-row">
	<div class="container">
		<?php echo $abt_oa_heading?'<div class="global-heading text-center">
			<h2>'.$abt_oa_heading.'</h2>
		</div>':''; ?>
		<?php if(is_array($abt_oa_items) && count($abt_oa_items)>0){ ?>
		<div class="tabs">			
	        <div role="tablist" aria-labelledby="ourexperiences-tablist" class="automatic tab-lists">
				<?php $cnt=1; foreach($abt_oa_items as $abtData){ 
					if($cnt==1){ $addClass = 'class="active"'; } else { $addClass = ''; }
					echo $abtData['heading']?'<button id="tab-'.$cnt.'" type="button" role="tab" aria-selected="false" aria-controls="tabpanel-'.$cnt.'" '.$addClass.' tabindex="-1">
	                <span class="focus">'.$abtData['heading'].'</span>
	            </button>':''; $cnt++; } ?>
	        </div>
			<?php $cnt1=1; foreach($abt_oa_items as $abtData){ 
				echo $abtData['content']?'<div class="tabs-content is-hidden" id="tabpanel-'.$cnt1.'" role="tabpanel" tabindex="0" aria-labelledby="tab-'.$cnt1.'">'.$abtData['content'].'</div>':'';
			 $cnt1++; } ?>                                                                                      
	    </div>
		<?php } ?>
	</div>
</section>
<?php } ?>
<!-- Our publications start -->
<?php
	if(get_field('abt_op_visibility')==1){
	$abts_op_heading = get_field('abts_op_heading');
	$abt_op_button = get_field('abt_op_button');
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
					<!-- <img src="<?php //echo $src; ?>/assets/images/Saol-1.png" alt="" aria-hidden="true"> -->
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
<?php } ?>
<!-- Our publications end -->
<?php
	if(get_field('abt_wd_visibility')==1){
	$abt_wd_content = get_field('abt_wd_content');
?>
<section class="section meeting-row">
	<?php echo $abt_wd_content?'<div class="container">
		<div class="global-heading text-center">'.$abt_wd_content.'</div>
	</div>':''; ?>
</section>
<?php } ?>		
<!-- popup -->
<div class="culture-popup" id="culture-popup" role="dialog" aria-modal="true" hidden>
    <div class="popup-overlay"></div>

    <div class="popup-content">
        <button class="popup-close" aria-label="Close popup">&times;</button>
        <h3 id="popup-title"></h3>
        <div id="popup-body"></div>
    </div>
</div>
<?php get_footer(); ?>