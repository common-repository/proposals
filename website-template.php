<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />

<title><?php

global $page, $paged;

wp_title( '|', true, 'right' );

// Add the blog description for the home/front page.
$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) )
     echo " | $site_description";

// Add a page number if necessary:
if ( $paged >= 2 || $page >= 2 )
     echo ' | ' . sprintf( __( 'Page %s', 'lab' ), max( $paged, $page ) );

?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<link rel="stylesheet" href="<?php echo plugins_url( '/css/app.css', __FILE__ ); ?>" type="text/css" media="all">
<!-- <script src="<?php echo plugins_url( '/js/app.js', __FILE__ ); ?>"></script> -->

</head>
<body>

     <div id="page" class="row">
          <div id="primary" class="twelve columns"><?php
          
          if( have_posts() ) :
               
               while( have_posts() ) : the_post();
               
               ?>
               <article <?php post_class(); ?>>
                    <header class="page-header">
                         <h1><?php the_title(); ?></h1>
                         <div class="page-meta row">
                              <div class="four columns">
                                   <h4>Prepared On</h4>
                                   <h3><?php the_date('F d, Y'); ?></h3>
                              </div>
                              
                              <div class="four columns">
                                   <h4>Client</h4>
                                   <h3><?php echo get_post_meta( $post->ID, '_lab_client_name', true ); ?></h3>
                              </div>
                              
                              <div class="four columns">
                                   <h4>Prepared By</h4>
                                   <h3><?php echo get_post_meta( $post->ID, '_lab_prepared_person', true ); ?></h3>
                              </div>
                         </div>
                    </header>
                    
                    <div class="entry-content">
                         <?php the_content(); ?>
                    </div><!--.entry-content-->
                    
                    <footer class="footer-meta">
                         <?php comments_template(); ?>                         
                    </footer><!--.footer-meta-->                           
               </article><?php
               
               endwhile;
               
          endif; ?>
          </div><!--#primary-->
          
          <div id="secondary" class="four columns">
               <nav></nav>
          </div><!--#secondary-->        
     </div><!--#page-->
     
</body>
</html>