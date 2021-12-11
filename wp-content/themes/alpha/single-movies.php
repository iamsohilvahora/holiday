<?php
	/**
	 * The template for displaying all single posts
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
	 *
	 * @package alpha
	 */
	get_header(); 		
	// Check Condition
	if ( have_posts() ) :
			the_post();
			$page_id = get_the_ID();
			//$title = get_the_title($page_id);
			//$content = get_the_content($page_id);
?>	

		<div class="container mt-5">
			<div class="row">
				<div class="offset-md-2 col-md-8">
					<?php 
						$img = get_field('image')['sizes']['imagefeatured'];
						//print_r($img);
						//exit();
					?>
					<img src="<?php echo $img; ?>" alt="<?php echo get_field('title'); ?>" >
				</div>
			</div>

			<div class="row">
				<div class="offset-md-2 col-md-8">
						<h2 ><?php echo get_field('title'); ?></h2>
						<p><?php echo get_field('content'); ?></p>
						
						<?php if(get_field('available')): ?>
							<p><span>Available</span> : <span><?php echo get_field('cost'); ?></span></p>

						<?php else: ?> 
							<p><span>Not Available</span> : <span><?php echo get_field('cost') ?? 'N/A' ?></span></p>	
						<?php endif; ?>	
				</div>
			</div>
		</div>

	<?php
	endif;

	//get_sidebar( 'content' );
	//get_sidebar();
	get_footer();
?>