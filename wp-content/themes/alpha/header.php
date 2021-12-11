<?php
   /**
    * The header for our theme
    *
    * This is the template that displays all of the <head> section and everything up until <div id="content">
    *
    * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
    *
    * @package alpha
    */
$worship_title_text = get_field('worship_title_text','option');
$sunday_school_time = get_field('sunday_school_time','option');
$sunday_services_time = get_field('sunday_services_time','option');
$wednesday_bible_study_time = get_field('wednesday_bible_study_time','option');
$member_log_in_text = get_field('member_log_in_text','option');
$member_log_in_link_type = get_field('member_log_in_link_type','option');
$member_log_in_page = get_field('member_log_in_page','option');
$member_log_in_external = get_field('member_log_in_external','option');
   ?>
<!doctype html>
<html <?php language_attributes(); ?>>
   <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="profile" href="http://gmpg.org/xfn/11">
       <link rel="icon" type="image/ico" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico"/>
      <?php wp_head(); ?>
      <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">


   </head>
   <body <?php body_class(); ?>>
      <div id="page" class="site">
      <!--a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'alpha' ); ?></a-->
      <header id="masthead" class="site-header mb-3">
         <div class="container">
            <div class="row">
               <div class="col-sm-12 col-md-4 d-none d-md-block">
                <?php if(!empty($worship_title_text) && (!empty($sunday_school_time) || !empty($sunday_services_time) || !empty($wednesday_bible_study_time)) ) { ?>
                  <div class="worship">
                     <?php if(!(empty($worship_title_text)))  { ?><h3><?php echo $worship_title_text; ?> </h3> <?php } ?>
                     <?php if(!empty($sunday_school_time)) { ?>
                     <p>Sunday school (all ages): <span><?php echo $sunday_school_time; ?></span></p>
                     <?php } ?>
                     <?php if(!empty($sunday_services_time)) { ?>
                     <p>Sunday services: <span><?php echo $sunday_services_time; ?></span></p>
                     <?php } ?>
                     <?php if(!empty($wednesday_bible_study_time)) { ?>
                     <p>Wednesday Bible Study/Prayer: <span><?php echo $wednesday_bible_study_time; ?></span></p>
                     <?php } ?>
                  </div>
                <?php } ?>
               </div>
               <div class="col-sm-12 col-md-5">
                  <div class="logo">
                     <a  href="<?php echo esc_url( home_url( '/' ) ); ?>">
                     <img src="<?php echo get_template_directory_uri();?>/images/logo.png" alt="logo image"/>
                     </a>
                  </div>
               </div>
               <?php if(!empty($member_log_in_text)) { ?>
               <div class="col-sm-12 col-md-3 d-none d-md-block">
                <?php if($member_log_in_link_type == 'page' && !empty($member_log_in_page)) { ?>
                  <a href="<?php echo $member_log_in_page; ?>" class="btn login">
                    <span><?php echo $member_log_in_text; ?></span>
                  </a>
                <?php } elseif($member_log_in_link_type == 'external' && !empty($member_log_in_external)) { ?>
                  <a <?php echo alpha_inc_link_fillter($member_log_in_external,true); ?> class="btn login"><span><?php echo $member_log_in_text; ?></span></a>
                <?php } ?>
               </div>
               <?php } ?>
            </div>
         </div>
         <div class="header-right">
            <div class="navigation">
               <nav id="site-navigation" class="main-navigation" role="navigation">
                  <?php wp_nav_menu(array('menu' => "primary menu")); ?>
               </nav>
               <?php if(!empty($worship_title_text) && (!empty($sunday_school_time) || !empty($sunday_services_time) || !empty($wednesday_bible_study_time)) ) { ?>
               <div class="worship d-sm-block d-md-none">
                   <?php if(!(empty($worship_title_text)))  { ?><h3><?php echo $worship_title_text; ?> </h3> <?php } ?>
                   <?php if(!empty($sunday_school_time)) { ?>
                   <p>Sunday school (all ages): <span><?php echo $sunday_school_time; ?></span></p>
                   <?php } ?>
                   <?php if(!empty($sunday_services_time)) { ?>
                   <p>Sunday services: <span><?php echo $sunday_services_time; ?></span></p>
                   <?php } ?>
                   <?php if(!empty($wednesday_bible_study_time)) { ?>
                   <p>Wednesday Bible Study/Prayer: <span><?php echo $wednesday_bible_study_time; ?></span></p>
                   <?php } ?>
               </div>
               <?php } ?>
               <?php if($member_log_in_link_type == 'page' && !empty($member_log_in_page)) { ?>
                  <a href="<?php echo $member_log_in_page; ?>" class="btn login d-sm-block d-md-none">
                    <span><?php echo $member_log_in_text; ?></span>
                  </a>
                <?php } elseif($member_log_in_link_type == 'external' && !empty($member_log_in_external)) { ?>
                  <a <?php echo alpha_inc_link_fillter($member_log_in_external,true); ?> class="btn login d-sm-block d-md-none"><span><?php echo $member_log_in_text; ?></span></a>
                <?php } ?>
            </div>
         </div>
         <div class="text-center d-block d-md-none mobile-icon"><a href="javascript:void(0);">Menu</a></div>
      </header>
      <!-- #masthead -->
      <div id="content" class="site-content">