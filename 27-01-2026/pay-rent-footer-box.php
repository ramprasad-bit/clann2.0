<?php 
$page_ID = get_the_ID();
$pr_box_content = get_field('pr_box_content', 'option');
$pr_box_link = get_field('pr_box_link', 'option');
$pr_show_pages = get_field('pr_show_pages', 'option');
if(is_array($pr_show_pages) && in_array($page_ID, $pr_show_pages)) { ?>
<div class="rent-box">
	<div class="row">
		
		    <?php if($pr_box_content) { ?>
			    <?php echo $pr_box_content; ?>
			<?php } if($pr_box_link) { ?>
			    <a href="<?php echo $pr_box_link['url']; ?>" class="basic_btn olive_btn" aria-label="click here to <?php echo $pr_box_link['title']; ?>"><?php echo $pr_box_link['title']; ?></a>
			<?php } ?>
		
	</div>
</div>
<?php } ?>