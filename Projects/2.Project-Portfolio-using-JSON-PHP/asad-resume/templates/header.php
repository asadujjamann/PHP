<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Md. Asadujjaman Sabuj | Resume</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Md. Asadujjaman Sabuj || Resume" name="keywords">
        <meta content="Md. Asadujjaman Sabuj || Resume" name="description">

        <!-- Favicon -->
        <link href="img/site-icon/asad-logo.webp" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:300;400;600;700;800&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body data-spy="scroll" data-target=".navbar" data-offset="51">
        <div class="wrapper">
            <div class="sidebar">
                <div class="sidebar-header">
                    <a href="index.html">
                        <img src="img/site-icon/asad-logo.webp" alt="Asad">
                    </a>
                </div>
                <div class="sidebar-content">
                    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                        <a href="#" class="navbar-brand">Asad</a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <ul class="nav navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#header">
                                        Home
                                        <i class="fa fa-home"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#about">
                                        About
                                        <i class="fa fa-address-card"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#experience">
                                        Experience
                                        <i class="fa fa-star"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#service">
                                        Service
                                        <i class="fa fa-tasks"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#portfolio">
                                        Portfolio
                                        <i class="fa fa-file-archive"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#contact">
                                        Contact
                                        <i class="fa fa-envelope"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                
                <div class="sidebar-footer">

                    <?php 
                        $profile_links = $cv["contact"]["other_profile_links"];
                        foreach ($profile_links as $profile_link):
                    ?>
                    <a
                        href="<?= $profile_link['profile_link']?>"
                        target="<?php
                        $http_has = str_contains($profile_link['profile_link'], 'http');
                        echo $http_has == true ? '_blank' : '_self' ?>"
                    >
                        <i class="<?= $profile_link['icon_classes']?>"></i>
                    </a>
                    <?php endforeach ?>


                    <!--                     
                    <a href="#!"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#!"><i class="fa-brands fa-upwork"></i></a>
                    <a href="#!"><i class="fab fa-twitter"></i></a> 
                    -->

                </div>
                
            </div>