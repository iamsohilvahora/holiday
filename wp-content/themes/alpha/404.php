<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package alpha
 */

get_header();
?>
<div class="inner-page">
   <div class="banner">
      <div class="container">
      <h2><?php echo $page_title; ?></h2>
      </div>
   </div>
<section>
<div class="container">   
<div class="row m-0">
   <div class="col-sm-12 col-md-8 col-lg-9 p-0">
      <div class="standard-section">
        <section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'alpha' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'alpha' ); ?></p>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->
      </div>
   </div>
	</div>
</div>
</section>   
</div>
 
<?php
get_footer();
