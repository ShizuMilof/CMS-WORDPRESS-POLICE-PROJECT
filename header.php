<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php the_title(); ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(). '/style.css' ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <?php wp_head(); ?> 
        <style>
        
    .navbar-brand {
        display: flex;
        align-items: center;
        display:none;
    }

    .navbar-light img {
        max-height: 160px;
        max-width: 400px;
        margin-right: 100px;
        margin-top:30px;
    }

    #mainNav {
    display: flex;
    justify-content: space-evenly;
    width:80%;
   
  
     } 



    .overlay{
     }


    .navbar-nav li a {
        font-size: 30px !important; 
       
    }



.masthead{}
</style>

    </head>
    <body <?php body_class(); ?>>
        <nav class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top" id="mainNav">
            <img src="<?php echo get_template_directory_uri() . '/img/grb.png' ?>" alt="Police Icon">
            <div class="container" id="mainMenu">

                <a class="navbar-brand  navbar-brand-text" href="<?php echo home_url(); ?>">

                    <?php echo get_bloginfo('name'); ?>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <?php
                wp_nav_menu( array(
                    'theme_location'    => 'glavni-menu',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse',
                    'container_id'      => 'navbarResponsive',
                    'menu_class'        => 'navbar-nav ml-auto',
                    'fallback_cb'       =>  'WP_Bootstrap_Navwalker::fallback',
                    'walker'            =>  new WP_Bootstrap_Navwalker(),
                ) );
                ?>
            </div>
        </nav>

        

        <?php wp_footer(); ?>
    </body>
</html>
