<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package alpha
 */
$contact_us_title = get_field('contact_us_title','option');
$address = get_field('address','option');
$church_phone = get_field('church_phone','option');
$mail_link = get_field('mail_link','option');
$facebook_link = get_field('facebook_link','option');
$instagram_link = get_field('instagram_link','option');
$tweeter_link = get_field('tweeter_link','option');
$youtube_link = get_field('youtube_link','option');
$give_now_title = get_field('give_now_title','option');
$give_now_link_type = get_field('give_now_link_type','option');
$give_now_page = get_field('give_now_page','option');
$give_now_link = get_field('give_now_link','option');
$address_map = get_field('address_map','option');
$address_label = explode(',', $address_map['address']);
$copyright_text = get_field('copyright_text','option');

?>
</div><!-- #content -->
<footer id="colophon" class="site-footer">
   <div class="container">
      <div class="row">
         <div class="col-sm-12 col-md-3">
            <div class="contactus">
              <?php if(!empty($contact_us_title)) { ?>
               <h3><?php echo $contact_us_title; ?></h3>
              <?php } ?>
               <?php if(!empty($address)) { ?>
               <p><?php echo $address; ?></p>
               <?php } ?>
               <?php if(!empty($church_phone)) { ?>
               <a href="tel:<?php echo $church_phone; ?>"><?php echo $church_phone; ?></a>
               <?php } ?>
               <?php if(!empty($mail_link) || !empty($facebook_link) || !empty($instagram_link) || !empty($tweeter_link) || !empty($youtube_link)) { ?>
               <ul class="social-connect">
                  <?php if(!empty($mail_link)) { ?>
                  <li><a <?php echo alpha_inc_link_fillter($mail_link,true); ?> class="social-link mail"></a></li>
                  <?php } ?>
                  <?php if(!empty($facebook_link)) { ?>
                  <li><a <?php echo alpha_inc_link_fillter($facebook_link,true); ?> class="social-link fb"></a></li>
                  <?php } ?>
                  <?php if(!empty($instagram_link)) { ?>
                  <li><a <?php echo alpha_inc_link_fillter($instagram_link,true); ?> class="social-link instagram"></a></li>
                  <?php } ?>
                  <?php if(!empty($tweeter_link)) { ?>
                  <li><a <?php echo alpha_inc_link_fillter($tweeter_link,true); ?> class="social-link twitter"></a></li>
                  <?php } ?>
                  <?php if(!empty($youtube_link)) { ?>
                  <li><a <?php echo alpha_inc_link_fillter($youtube_link,true); ?> class="social-link youtube"></a></li>
                  <?php } ?>
               </ul>
               <?php } ?>
                 <?php if(!empty($give_now_title)) { ?>
                  <?php if($give_now_link_type == 'give_now_page' && !empty($give_now_page)) { ?>
                 <a href="<?php echo $give_now_page; ?>" class="givenow"><?php echo $give_now_title; ?></a>
                 <?php } elseif($give_now_link_type == 'give_now_external' && !empty($give_now_link)) { ?>
                  <a <?php echo alpha_inc_link_fillter($give_now_link,true); ?> class="givenow"><?php echo $give_now_title; ?></a>
                 <?php } }?>
            </div>
         </div>
         <div class="col-sm-12 col-md-5">
          <?php if(!empty($address_map)) { ?> 
            <div class="acf-map">
			<?php 
				$mapid = 'map-canvas';
				$address = $address_map['address'];
				$lat = $address_map['lat'];
				$log = $address_map['lng'];
				
				echo alpha_base_scripts($lat, $log, $zoom = 10, $mapid, $address); ?>

				<div id="map-canvas" style="height:200px;width:200px;">&nbsp;</div>
				
               <!--<div class="marker" data-address="<?php //echo $address_label[0]; ?>" data-lat="<?php //echo $address_map['lat']; ?>" data-lng="<?php //echo $address_map['lng']; ?>"></div>-->
            </div>
          <?php } ?>
         </div>
         <div class="col-sm-12 col-md-4">
            <div class="footer-logo">
               <img src="<?php echo get_template_directory_uri();?>/images/footer-logo.png" alt="footer logo image"/>
            </div>
            <?php if(!empty($copyright_text)) { ?>
            <p class="copyright">&copy;<?php echo $copyright_text; ?></p>
            <?php } ?>
         </div>
      </div>
   </div>
</footer>
<!-- #colophon -->
<?php wp_footer(); ?>
<script src="https://unpkg.com/swiper/js/swiper.min.js"></script>

</body>
</html>
</html>