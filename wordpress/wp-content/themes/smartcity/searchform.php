<form action="<?php echo home_url('/'); ?>" method="get">
	<div class="input-group">
	    <input type="text" name="s" id="search" class="form-control" placeholder="Search" value="<?php the_search_query(); ?>" />
	    <span class="input-group-btn">
	    	<input type="submit" value="Search" class="btn btn-default" style="font-weight: bold; text-transform: uppercase; letter-spacing: 1px;">
	    </span>
	</div>
</form>