<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $home = get_template_directory_uri(); ?>

    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="<?= $home; //ele acha o local do style.css que esta distante ?>/style.css"/>

    <link rel="stylesheet" type="text/css" href="<?= $home; //ele acha o local do reset.css que esta distante ?>/reset.css"/>

    <title>
            <?php /* geraTitulo();*/ ?>
       
      
    
        <?php 
        //atalho para mudar o title dentro do wordpress
        bloginfo('name');
        if( !is_home() ) echo ' | ' ?>
        <?php the_title(); ?>
        
    </title>
    
    <?php wp_head(); ?>
 
  </head>
  <header>
    <div class="container menu collapse navbar-collapse pull-left">
   <p> <?php 

      $args = array(
          'theme_location' => 'menu'
        );
        wp_nav_menu( $args );
      ?> </p>
    </div>
  </header>
<body>
