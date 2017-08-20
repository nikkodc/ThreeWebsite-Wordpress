<!-- SEARCH ELEMENTS -->
<form role="search" method="get" id="searchform" action="<?php echo home_url('/');?>">
	<!-- GROUP TEXTBOX AND BUTTON IN ONE LINE -->
	<div class="input-group">
		<input type="text" class="form-control" name="s" id="s" value="<?php the_search_query(); ?>" placeholder="search" required>
		<div class="input-group-btn">
			<button id="searchsubmit" class="btn btn-info"><i class="glyphicon glyphicon-search"></i> search</button>
		</div>
	</div>
</form>