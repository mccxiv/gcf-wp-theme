<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://bootswatch.com/paper/bootstrap.min.css">
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>

        <div class="background default" style="background-image: url(<?php root(); ?>img/bg.png)"></div>

        <nav class="sidebar shadow">
            <img class="logo" src="<?php root(); ?>img/logobw.png">
            <hr>
            <div class="menu">
                <a href="#" data-accent="accent-1">Home & Blog</a>
                <a href="#" data-accent="accent-2">Who We Are</a>
                <a href="#" data-accent="accent-3" data-background-image="url(<?php root(); ?>img/recogiendolatas.jpg)">Who We Support</a>
                <a href="#" data-accent="accent-4" data-background-image="url(<?php root(); ?>img/pescador.jpg)">Contributing</a>
                <a href="#" data-accent="accent-5" data-background-image="url(<?php root(); ?>img/recogiendolatas.jpg)">Our Friends</a>
                <a href="#" data-accent="accent-6" >Contact Us</a>
                <a href="#" data-accent="accent-7" >Apply for Assistance</a>
            </div>

            <div class="footer">
                <hr>
                <a href="#" class="btn btn-primary btn-lg contribute-button">Contribute</a>
                <br>
                <span class="smaller">Tax deductible in the <br>United States and Costa Rica</span>
            </div>
        </nav>
