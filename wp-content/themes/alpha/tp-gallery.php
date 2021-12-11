<?php 
   /*
       Template Name: gallery
   */
   get_header();

   //$buttons = get_sub_field('slider_button');
   //$button_label = $buttons['button_label'];
   //echo $link = $buttons['button_link'];
   //$button_link = button_group($buttons);
                   
   $images = get_field('image');
   //$image = $image['sizes']['featured_image'];

   //print_r($images);
   //exit();

  $title = isset( $post->post_title ) ? $post->post_title : '';
  $content = isset( $post->post_content ) ? $post->post_content : '';

  $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
  if(!empty($image)){
    $postBanner = $image[0];
  }
  else{
    $default_post_banner_image = get_field("default_post_banner_image","option");
    $postBanner = $default_post_banner_image['sizes']['defaultPost_bannerImage'];
  }
?>
  <!--
   <div class="container">
      <div class="row mt-5">
         <?php
            //foreach($images as $img){
         ?>  
         <div class="col-md-4 mt-4">
            <img src="<?php //echo $img['sizes']['featured_image']; ?>" />
         </div>           
         <?php //} ?>   
      </div>   
   </div>
   -->

   <div class="container mt-5">
     <div class="row">
       <div class="col-md-10 offset-md-1">
          <h2 class="text-center display-4 mt-2"><?php echo $title; ?></h2>
          <p class="lead"><?php echo $content; ?></p>
          <img src="<?php echo $postBanner; ?>" />
       </div>
     </div>
   </div>

    <!-- Slider main container -->
    <div class="swiper-container">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
        
        <?php
           foreach($images as $img){
         ?>  
       
            <div class="swiper-slide">
               <img src="<?php echo $img['sizes']['featured_image']; ?>" />
            </div>
      
        <?php } ?>   
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>

    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>

    <!-- If we need scrollbar -->
    <div class="swiper-scrollbar"></div>
</div>

<?php
   get_footer();
?>