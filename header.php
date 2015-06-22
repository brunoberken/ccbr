<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Creative Commons Brasil</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

                <!-- bxSlider CSS file -->
        <link href="<?php echo get_template_directory_uri(); ?>/css/jquery.bxslider.css" rel="stylesheet" />

        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
        <script src="<?php echo get_template_directory_uri(); ?>/js/modernizr-2.6.2.min.js"></script>
    </head>
    <?php wp_head(); ?>
    <body <?php body_class(); ?>>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.3&appId=1631125383788420";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <!--[if lt IE 7]>
            <p class="browsehappy">Você está usando um navegador <strong>desatualizado</strong>. Por favor <a href="http://browsehappy.com/">atualize seu navegador</a> para melhorar sua experiência.</p>
        <![endif]-->
        <header class="main-header">
            <div class="header-content">
                <h1><a href="<?php echo site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/cc-logo.png"></a></h1>
                <span class="menu-anchor"></span>
                <div class="menu-right">
                    <div class="social-nav">
                        <ul>
                            <li class="facebook-icon"><a href="https://www.facebook.com/creativecommonsbr" target="_blank" title="Facebook"></a></li>
                            <li class="twitter-icon"><a href="https://twitter.com/CC_BR" target="_blank" title="Twitter"></a></li>
                            <li class="feed-icon"><a href="<?php echo get_feed_link(); ?>" target="_blank"></a></li>
                        </ul>
                        <div class="search-form">
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                    <?php

                        $defaults = array(
                            'menu'            => 'primary',
                            'container'       => 'nav',
                            'container_class' => 'top-menu',
                            'menu_class'      => 'main-menu',
                            'echo'            => true,
                            'fallback_cb'     => 'wp_page_menu',
                            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',

                        );

                        wp_nav_menu( $defaults );

                    ?>
                </div>
            </div>
        </header>