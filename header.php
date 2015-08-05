<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="<?php root(); ?>img/logo-no-text.png" />
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:700' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <?php wp_head(); ?>
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
                <div class="background-image"></div>
                <img class="logo" src="<?php root(); ?>img/logo-color-bw.png">
                <ul class="language-menu clearfix center-align"><?php pll_the_languages();?></ul>
                <hr>
                <div class="menu-wrapper">
                    <div class="background-highlighter transition250"></div>
                    <?php wp_nav_menu(['theme_location' => 'primary']); ?>
                </div>
                <div class="footer">
                    <hr>
                    <!--<a href="<?php /*echo get_permalink(pll_get_post(get_page_by_path('donate')->ID)); */?>" class="waves-effect waves-light btn contribute-button">
                        <?php /*_e('Donate', 'gcf'); */?>
                    </a>
                    <br>
                    <span class="smaller"><?php /*_e('Tax deductible in the <br>United States and Costa Rica', 'gcf'); */?></span>-->
                    <a  class="facebook-link" href="https://www.facebook.com/guanacastefund" target="_blank">
                        <img src="<?php root(); ?>img/facebook.png">
                    </a>
                </div>
            </nav>