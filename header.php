<!DOCTYPE html>
<html <?php language_attributes(); ?> class="accent-1">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<link rel="stylesheet" href="https://bootswatch.com/paper/bootstrap.min.css">-->
        <link href='http://fonts.googleapis.com/css?family=Kreon' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/css/materialize.min.css">
        <?php wp_head(); ?>
        <script>
            var $ = jQuery;
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/js/materialize.min.js"></script>
        <noscript>
            <style>
                /* Fallback. Normally js would unhide the content */
                .sidebar, .content {
                    opacity: 1;
                }
            </style>
        </noscript>
    </head>

    <body <?php body_class(); ?>>

        <div class="background default" style="background-image: url(<?php
            echo get_field('background-image')?
                get_field('background-image') :
                root().'img/default-background.jpg';
        ?>)"></div>

        <div class="main">
            <nav class="sidebar">
                <img class="logo" src="<?php root(); ?>img/logobw.png">
                <hr>
                <?php wp_nav_menu(); ?>
                <div class="footer">
                    <hr>
                    <a href="<?php echo get_permalink(get_page_by_path('donate')->ID); ?>" class="waves-effect waves-light btn contribute-button">Contribute</a>
                    <br>
                    <span class="smaller">Tax deductible in the <br>United States and Costa Rica</span>
                </div>
            </nav>