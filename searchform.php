<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url();?>">
		<label class="screen-reader-text" for="s">Search for:</label>
		<input class="search-text" value="" name="s" id="s" type="text">
		<!-- <input id="searchsubmit" value="1" type="submit"> -->
		<button type="submit"><img src="<?php echo get_template_directory_uri(); ?>/images/search.png" ></button> 
</form>
