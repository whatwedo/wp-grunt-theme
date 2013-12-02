<?php
/**
 * Header
 */
global $client; ?>
<!doctype html>

<!--[if lt IE 7]>            <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]> <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8">        <![endif]-->
<!--[if (IE 8)&!(IEMobile)]> <html <?php language_attributes(); ?> class="no-js lt-ie9">               <![endif]-->
<!--[if gt IE 8]><!-->       <html <?php language_attributes(); ?> class="no-js">                      <!--<![endif]-->

    <head>
        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title><?php wp_title(''); ?></title>

        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
        <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">

        <!--[if IE]>
            <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
        <![endif]-->

        <meta name="msapplication-TileColor" content="#f01d4f">
        <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

        <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
        <script src="<?php echo get_template_directory_uri(); ?>/javascripts/vendor/modernizr.js"></script>

        <?php wp_head(); ?>

    </head>

    <body <?php body_class(); ?>>
    <nav id="navigation-main" class="site-navigation" role="navigation">
    </nav>

    <!-- <a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a> -->
