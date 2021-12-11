<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package alpha
 */
	// if(have_posts()):
	// 	while(have_posts()):
	// 		the_post();

	// 		if(get_post_type() == 'moviessdsd'){
	// 			include(TEMPLATEPATH .'/archive-category.php');
	// 		}
	// 		else{

	// 		}

	// 	endwhile;

	// endif;	


//exit("errere");
get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		//$term_id = get_queried_object_id();

		 // $queried_object = get_queried_object();
		 // $term_id = $queried_object->term_id;

		 // $paged = (get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		 // $args =  array(
		 // 		'post_status' => 'publish',
			// 	'post_type' => 'movies',
			// 	'posts_per_page' => 2,
			// 	'is_paged' => true,
			// 	'paged' => $paged,
			// 	'tax_query' => array(
			// 	    array(
			// 	      'taxonomy'=> 'movie_categories',
			// 	      'field' => 'term_id',
			// 	      'terms' => $term_id ,
			// 	      //'include_children' => true,  // set true if you want post of its child category also
			// 	      'oparator' => 'IN'
			// 	    ))
			// 	);
			// // the query
			// $wp_query = new WP_Query( $args ); 
			// echo '<pre>';
			// print_r($wp_query);
			// echo '</pre>';



			// replace it
			//$wp_query   = $medalist_query;

		if ( have_posts() ) : 


		?>
			
			<div class="container mt-5">
				<div class="row">

				<div class="col-md-9">
					<div class="row">
						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post(); 
							$id =get_the_ID();
						?>	

						<div class="col-md-9 jumbotron">
							<h2 ><a href="<?php echo get_the_permalink(); ?>"><?php echo get_field('title'); ?></a></h2>
							<p><?php //echo get_field('content'); ?></p>
							<p><?php echo custom_field_excerpt(); ?></p>

							<?php if(get_field('available')): ?>
								<p><span>Available</span> : <span><?php echo get_field('cost'); ?></span></p>

							<?php else: ?> 
								<p><span>Not Available</span> : <span><?php echo get_field('cost') ?? 'N/A' ?></span></p>	
							<?php endif; ?>	
						</div>
						
						<div class="col-md-3 jumbotron">
							<?php 
								$img = get_field('image')['sizes']['imageset'];
								//print_r($img);
								//exit();
							?>
							<img src="<?php echo $img; ?>" alt="<?php echo get_field('title'); ?>" >		
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
				//the_posts_navigation();
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
			<div class="d-flex justify-content-center"> 
				<?php wpex_pagination(); ?> 
			</div>
			
			<!-- <ul class="page-numbers">
				<li><a href=""><?php //wpex_pagination(); ?></a></li>
			</ul> -->


			<!-- <div class="pagination d-flex justify-content-center"></div> -->

			<?php //wp_reset_query(); ?>


			

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php


	get_footer();
