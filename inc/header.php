<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-N9WB623MVP"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-N9WB623MVP');
    </script>

    <!-- Slick Styling -->
    <link rel="stylesheet" type="text/css" href ="assets/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href ="assets/slick/slick-theme.css" />

    <!-- Lightbox -->
    <link href="assets/lightbox/dist/css/lightbox.css" rel="stylesheet" />
    
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href ="style.css" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather|Odibee+Sans|Quicksand&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png" type="image/png">

    <!-- Meta Tags -->
    <meta name="description" content="">
    <meta name="keywords" content=""> 
    <meta name="image" content="">

    <!-- FACEBOOK: Open Graph -->
    <meta property="og:title" content="<?php bloginfo( "name" ); ?> Title">
    <meta property="og:description" content="">
    <meta property="og:image" content="">
    <meta property="og:url" content="">

    <!-- TWITTER: Open Graph -->
    <meta name="twitter:title" content="<?php bloginfo( "name" ); ?> Title">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">
    <meta name="twitter:card" content="jgdm_blog_2023">

    <!-- Canonical link -->
    <link rel="canonical" href="">

    <!-- Page Title -->
    <title><?php bloginfo( "name" ); ?> Title</title>
    
    </head>
    
        <body>
            
            <header>
                
                <h1>JGDM Blog</h1>
            
                <nav class="navigation">
                    
                    <!--<li><a href="http://localhost/jgdm_blog/">Posts</a></li>
                    <li><a href="http://localhost/jgdm_blog/blog_posts/2/page/1/">Blog Posts</a></li>
                    <li><a href="http://localhost/jgdm_blog/blog_posts">Blog Posts</a></li>
                    <li><a href="#">Three</a></li>
                    <li><a href="#">About</a></li>-->
                    
                    <!-- Main Nav Menu -->
                    <?php wp_nav_menu( array( 
                        'theme_location'  => 'Main Menu',
                        'menu' => 'Main Menu',
                        'orderby' => 'menu_order'
                        ) );
                    ?>                             
            
                    <!-- WP Menu -->
                    <!-- <?php echo dynamic_sidebar( "main_site_menu" ); ?> -->
                    
                </nav>
            
            </header>

            <main class="container">
                
                <?php wp_head(); ?>