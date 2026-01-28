<?php 
$pr_box_content = get_field('pr_box_content', 'option');
$pr_box_link = get_field('pr_box_link', 'option');
?>
<div class="rent-box">
	<div class="row">
	    <?php if($pr_box_content) { ?>
		    <?php echo $pr_box_content; ?>
		<?php } if($pr_box_link) { ?>
		    <a href="<?php echo $pr_box_link['url']; ?>" class="basic_btn olive_btn" aria-label="click here to <?php echo $pr_box_link['title']; ?>"><?php echo $pr_box_link['title']; ?></a>
		<?php } ?>
	</div>
</div>