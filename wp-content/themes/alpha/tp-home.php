<?php 
   /*
       Template Name: home
   */
   get_header();

   //$sliders = get_field('sliders');
   //print_r($sliders);
   //die();

   //get default home page content
  the_post();
  $page_id = get_the_id();  //Page ID

  $title= get_the_title($page_id); //Page Title                   
  $content= get_the_content($page_id); //Page Content                    
  $content= apply_filters('the_content', $content);

  $src = wp_get_attachment_image_src( get_post_thumbnail_id($page_id),'home_page_banner_image_size'); //featured image  
  $src = $src[0]; 
?>

<!--slider start's-->
<section class="home-slider d-none d-md-block">
            <!--slide start's-->
            <?php   
                if( have_rows('sliders') ):
                // loop through the rows of data
                    while ( have_rows('sliders') ) : the_row();
       
                    // display a sub field value
                     $heading = get_sub_field('heading');
                     $text = get_sub_field('text');
                     
                     $buttons = get_sub_field('slider_button');
                     $button_label = $buttons['button_label'];
                     //echo $link = $buttons['button_link'];
                     $button_link = button_group($buttons);
                                     
                     $image = get_sub_field('image')['sizes']['medium23'];
                     //print_r($image);
                     //exit();
            ?>

            <div>
                <div class="item" style="background: url('<?php echo $image; ?>')">
                   <img src="<?php echo $image; ?>" alt="<?php echo $heading; ?>"> 
                   <div class="container">
                     <div class="caption">
                        <h2 class='display-3'><?php echo $heading; ?></h2>
                        <p class='lead'><?php echo $text;; ?></p>
                        <a <?php echo $button_link; ?> class='btn text-light'><?php echo $button_label; ?></a>
                     </div>
                  </div>
               </div>
            </div>        
 
             <?php       
                    endwhile;
                else :
             ?>       
                <div>
                    <p>Data Not Found.</p>     
                </div>
             <?php       
                endif;    
             ?>

            <!--slide end's-->
</section>     
           
<section class="ministers">
          <h2><?php echo get_field('title'); ?></h2>
         
         <div class="row m-0">
            <!--item start's-->
            <?php
            if( have_rows('lists') ):
                // loop through the rows of data
                    while ( have_rows('lists') ) : the_row();
       
                    // display a sub field value
                    //$title = get_field('title');
                    $subtitle = get_sub_field('subtitle');
                    $image2 = get_sub_field('image')['url'];
            ?> 

             <div class="col-sm-12 col-md-4 col-lg-3 col-xl-2 p-0">
                <div class="item">
                  <figure style="background: url(<?php echo $image2; ?>)">
                  <img src="<?php echo $image2; ?>" alt="<?php echo $subtitle; ?>"></figure >
                  <h3><a href=""><?php echo $subtitle; ?></a></h3>
                </div>
             </div>

             <?php       
                    endwhile;
                else :
             ?>       
                <div>
                    <p>List Not Found.</p>     
                </div>
             <?php       
                endif;    
             ?>
            <!--item end's-->   
         </div>
</section>

<!--
   <section class="event-section">
      <div class="row m-0">
         <div class="col-sm-12 col-md-6 p-0">
                  <?php //get_sidebar(); ?>

         </div>
         <div class="col-sm-12 col-md-6 p-0">     
               <figure style="background: url(<?php //echo get_template_directory_uri();?>/images/calender-bg.jpg)">
                           <img src="<?php //echo get_template_directory_uri();?>/images/calender-bg.jpg" alt="ministers"></figure>
                           <div class="involved">
                              <h2>Get Involved</h2>
                              <p>Join a class or volunteer for an event!  <a href="#">learn more</a></p>
                           </div>                  
         </div>       
      </div>       
   </section>    
-->

<?php
   get_footer();
?>

