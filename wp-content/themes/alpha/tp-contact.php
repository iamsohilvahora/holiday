<?php 
   /*
       Template Name: contact
   */
   get_header();

   $title = get_field('title', 'options');
   $content = get_field('content', 'options');
   $socials = get_field('social', 'options'); 
?>
  
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-10 offset-md-1">
          <h3 class="display-3 text-center"><?php echo $title; ?></h3>
          <p class="lead"><?php echo $content; ?></p>
      </div>
    </div>

    <h4 class='text-center'>You can contact us on our social media:</h4>  
    <div class="row"> 
        <div class="offset-md-4 col-md-4 offset-sm-4 col-sm-4">    
                  <ul class="list-inline list-unstyled">
                    <?php
                      foreach ($socials as $social) {
                        $title = $social['title'];
                        $url = $social['url'];
                        $icon = $social['icon'];
                        $target = $social['target'];
                    ?>
                    <li class="list-inline-item mx-4"><a href="<?php echo $url; ?>" target="<?php echo $target; ?>"><i class="<?php echo $icon; ?>" aria-hidden="true"></i>  <?php //echo $title; ?></a></li>
                    <?php } ?>
                  </ul>
        </div>
    </div>
  </div>
   
<?php
   get_footer();
?>