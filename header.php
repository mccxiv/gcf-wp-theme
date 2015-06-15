<!DOCTYPE html>
<html <?php language_attributes(); ?> class="accent-1">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://bootswatch.com/paper/bootstrap.min.css">
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>

        <div class="background default" style="background-image: url(<?php
            echo get_field('background-image')? get_field('background-image') : root().'img/default-background.jpg';
        ?>)"></div>

        <nav class="sidebar shadow">
            <img class="logo" src="<?php root(); ?>img/logobw.png">
            <hr>
            <?php wp_nav_menu(); ?>
            <div class="footer">
                <hr>
                <a href="#" class="btn btn-primary btn-lg contribute-button">Contribute</a>
                <br>
                <span class="smaller">Tax deductible in the <br>United States and Costa Rica</span>
            </div>
        </nav>
