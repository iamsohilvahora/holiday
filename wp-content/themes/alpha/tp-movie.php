<?php
	/*Template Name: movies*/
	get_header();
	$paged = (get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$args = array('post_type' => 'movies',
				'posts_per_page' => 3,
				'paged' => $paged);

	// the query
	$wp_query = new WP_Query( $args ); 

	if ( $wp_query->have_posts() ) : ?>

	<div class="container mt-5">
		<!-- <form class="form" action="<?php //echo home_url( '/' ); ?>">
		  <div class="form-row">
		    <div class="form-group col-md-6">
			    <input type="search" class="form-control" name="s" placeholder="Search Title Here...">
		    </div>
		    <div class="form-group col-md-6">
		       <input type="submit" value="Search" class="btn btn-primary">
			  <input type="hidden" name="post_type" value="movies">
		    </div>
		  </div>
		</form> -->
		<?php get_search_form(); ?>

		<div class="row mt-1">
					<div class="col-md-9">
						<div class="row">
							<?php
								// the loop 
								while($wp_query->have_posts() ) : $wp_query->the_post(); 
									$id =get_the_ID();
							?>	
							<div class="col-md-8 jumbotron">
								<h2><a href="<?php echo get_the_permalink(); ?>"><?php echo get_field('title'); ?></a></h2>
								<p><?php //echo get_field('content'); ?></p>
								<p><?php echo custom_field_excerpt(); ?></p>

								<?php if(get_field('available')): ?>
									<p><span>Available</span> : <span><?php echo get_field('cost'); ?></span></p>

								<?php else: ?> 
									<p><span>Not Available</span> : <span><?php echo get_field('cost') ?? 'N/A' ?></span></p>	
								<?php endif; ?>

							</div>
							<div class="col-md-4 jumbotron">
								<?php 
									$img = get_field('image')['sizes']['imageset'];
									//print_r($img);
									//exit();
								?>
								<img src="<?php echo $img; ?>" alt="<?php echo get_field('title'); ?>">
							</div>
							<?php endwhile; // end of the loop ?>
							
								
						</div>
					</div>	
			<?php
					$taxonomy = 'movie_categories';
					$terms = get_terms($taxonomy); // Get all terms of a taxonomy

					if ( $terms && !is_wp_error( $terms ) ) :
			?>
					<div class="col-md-3">
						<h3>Categories</h3>
					    <ul>
					        <?php foreach ( $terms as $term ) { ?>
					            <li><a href="<?php echo get_term_link($term->slug, $taxonomy); ?>"><?php echo $term->name; ?></a></li>
					        <?php } ?>
					    </ul>
					
						<?php endif;?>	
					</div>
		</div>
	</div>

	

	<?php
	  // if (function_exists("pagination")) {
	  //       pagination($wp_query->max_num_pages);
	  // }

	 // $post = get_post( $post );
	 // $pageId = get_the_ID();
	 // $previd = get_previous_post_id($pageId);
	 // $previousLinks = get_the_permalink($previd);
	 // $newid = get_next_post_id($pageId);
	 // $nextLinks = get_the_permalink($newid);
	?>
	<!--<ul class="pagination">
		<li class="page-tem"><a class="page-link" href="<?php //echo $previousLinks; ?>">Prev</a></li>
		<li class="page-tem"><a class="page-link" href="<?php //echo $nextLinks; ?>">Next</a></li>
	</ul>
	-->

	<?php

	else:
	?>	
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
<!-- <div class="pagination d-flex justify-content-center"><?php //pagination_bar($wp_query); ?></div>
 -->

<div class="d-flex justify-content-center"> 
	<?php wpex_pagination($wp_query); ?> 
</div>
<?php wp_reset_query(); ?>