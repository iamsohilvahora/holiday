<form class="form form-inline" action="<?php echo home_url('/'); ?>" role="search" method="get">
	<input type="search" class="form-control col-md-6 mx-1" placeholder="Search keyword here" name="s" title="Search Now" value="<?php echo get_search_query(); ?>">
	<input type="submit" value="submit" >
	<input type="hidden" name="post_type" value="movies">
</form>