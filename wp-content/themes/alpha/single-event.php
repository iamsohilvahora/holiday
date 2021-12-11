<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package alpha
 */

get_header();
die('single event');
$page_id = get_the_ID();
$page_title = get_the_title($page_id);

$address = get_field('address','option');
$church_phone = get_field('church_phone','option');

$address_map = get_field('address_map','option');
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
         <?php 
		  if ( have_posts() ) {
			while ( have_posts() ) { the_post();
				$page_content = get_the_content($page_id);
				$content = apply_filters('the_content',$page_content);
				echo remove_empty_p($content);
			}
		  }
     	?>
      </div>
   </div>
     <div class="col-sm-12 col-md-4 col-lg-3 p-0">
        <aside>
           <div class="ourministers">
              <h3><span>Our Ministries</span></h3>
            <?php wp_nav_menu(array('menu' => "Sidebar-menu")); ?>
           </div>
			<?php if(!empty($address)  || !empty($church_phone) ) { ?>
           <div class="address">
              <h3>Come Fellowship with us</h3>
              <?php if(!empty($address)) { ?>
              <h6>Our Location: </h6>
              <p><?php echo $address; ?></p>
          	  <?php $map_link = "https://www.google.com/maps/?q=$address_map[lat],$address_map[lng]" ?>
              <a <?php echo alpha_inc_link_fillter($map_link,true); ?> class="map-url">Map & Directions</a>
          	  <?php }?>
              <?php if(!empty($church_phone)) { ?>
               <h6>Church Phone: </h6>
               <a href="tel:<?php echo $church_phone; ?>" class="phone"><?php echo $church_phone; ?></a>
           	  <?php } ?>
           </div>
       		<?php } ?>
         </aside>
     </div>
	</div>
</div>
</section>   
   <!--section(banner-section) end's--> 
</div>

<?php
get_footer();
