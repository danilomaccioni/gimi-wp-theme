		<div class="right_sidebar user_sidebar"> 
			<?php $user_info = gimi_get_user_info('150'); ?>
			<div class="box_avatar"> <?php echo $user_info['html_tag_avatar']; ?> </div>
			<div class="box_name"> <?php echo $user_info['user_name']; ?> </div>
			<div class="box_roles box_small_text"> <?php echo $user_info['roles']; ?> </div>
			<div class="box_registered box_small_text"> <?php echo $user_info['registered']; ?> </div>
			<div class="box_url box_small_text"> <a href="<?php echo $user_info['user_url']; ?>"> Site Url</a> </div>
			<div class="box_description box_small_text"> <?php echo $user_info['description']; ?> </div>
		</div>
