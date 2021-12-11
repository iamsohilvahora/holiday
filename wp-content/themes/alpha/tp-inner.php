<?php 
   /*
       Template Name: team
   */
   get_header();

   $heading1 = get_field('heading1');
   $heading2 = get_field('heading2');
   //$buttons = get_sub_field('slider_button');
   //$button_label = $buttons['button_label'];
   //echo $link = $buttons['button_link'];
   //$button_link = button_group($buttons);
                   
   $image = get_field('image')['sizes']['myimage'];

   //print_r($image);
   //exit();

   $statements = get_field('statements');
   $text1 = get_field('text1');
   $text2 = get_field('text2');
   $list1 = get_field('list1');
   $list2 = get_field('list2');
   $text3 = get_field('text3');
?>

<!--div(inner-page) start's-->
<div class="inner-page">
   <!--section(banner-section) start's-->
   <div class="banner">
      <div class="container">
         <h2><?php echo $heading1; ?></h2>
      </div>
   </div>
   <section>
      <div class="container">
         <div class="row m-0">
            <div class="col-sm-12 col-md-8 col-lg-9 p-0">
               <div class="standard-section">
                  <img src="<?php echo $image; ?>" />
                  <?php
                     foreach($statements as $stmt){
                  ?>      
                        <h4><?php echo $stmt['title']; ?></h4>
                        <p><?php echo $stmt['content']; ?> </p>
                  <?php } ?>   
                  <hr>
                  <p><?php echo $text1; ?></p>
                  <ul>
                     <?php
                        foreach($list1 as $list){
                     ?>   
                        <li><?php echo $list['title']; ?></li>
                     <?php } ?>   
                  </ul>
                  <p><?php echo $text2; ?></a></p>
               </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-3 p-0">
               <aside>
                  <div class="ourministers">
                     <h3><span><?php echo $heading2; ?></span></h3>
                     <ul>
                        <?php
                           foreach($list2 as $list){
                        ?>   
                           <li><a href="#"><?php echo $list['title']; ?></a></li>
                        <?php } ?>   
                     </ul>
                  </div>
                  <div class="address">
                    <?php echo $text3; ?>
                  </div>
               </aside>
            </div>
         </div>
      </div>
   </section>
   <!--section(banner-section) end's--> 
</div>
<!--div(inner-page) end's-->
<?php
   get_footer();
?>