<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package alpha
 */

//exit("seasrcj");
get_header(); 
?>
	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<?php if ( have_posts() ) : ?>
					<!-- <div class="row">
						<div class="col-md-10 offset-md-1">
							<header class="page-header">
								<h1 class="page-title">
									<?php
									/* translators: %s: search query. */
									// printf( esc_html__( 'Search Results for: %s', 'post-list' ), '<span>' . get_search_query() . '</span>' );
									?>
								</h1>
							</header>
						</div>
					</div> --><!-- .page-header -->

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						$id =get_the_ID();
						if(isset($_GET['post_type'])) {
					        $type = $_GET['post_type'];
				           if($type == 'movies') {	
					?>
						<div class="row my-5">
								<div class="col-md-8">
									<h2 ><a href="<?php echo get_the_permalink(); ?>"><?php echo get_field('title'); ?></a></h2>
										<p><?php echo get_field('content'); ?></p>
								</div>
								<div class="col-md-4">
										<?php 
											$img = get_field('image')['sizes']['imageset'];
											//print_r($img);
											//exit();
										?>
										<img src="<?php echo $img; ?>" alt="<?php echo get_field('title'); ?>">

								</div>
					        <?php } } ?>

						</div>
						<?php endwhile; ?>
			
			<div class="row">
				<div class="col-md-10 offset-md-1">
					<?php //the_posts_navigation(); ?>
				</div>
			</div>	

			<?php
				else :
			?>	
				<div class="row">
					<div class="col-md-10 offset-md-1">
						<?php get_template_part( 'template-parts/content', 'none' ); ?>
					</div>
				</div>	
			<?php
				endif;
			?>
			</div>
		</main><!-- #main -->
	</section><!-- #primary -->