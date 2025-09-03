<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../images/mik's.png" type="image/gif" sizes="20x20">
    <title> M&M CARWASH</title>
    <link rel="stylesheet" href="../assets/css/miks.css">
    <!-- Bootstrap CSS (place inside <head>) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
            <link
            rel="canonical"
            href="https://getbootstrap.com/docs/5.3/examples/carousel/"
        />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

        <script src="../assets/js/color-modes.js"></script>
        <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet" />
        <meta name="theme-color" content="#712cf9" />
        <link href="../assets/css/carousel.css" rel="stylesheet" />
        
        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }
            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
            .b-example-divider {
                width: 100%;
                height: 3rem;
                background-color: #0000001a;
                border: solid rgba(0, 0, 0, 0.15);
                border-width: 1px 0;
                box-shadow: inset 0 0.5em 1.5em #0000001a,
                    inset 0 0.125em 0.5em #00000026;
            }
            .b-example-vr {
                flex-shrink: 0;
                width: 1.5rem;
                height: 100vh;
            }
            .bi {
                vertical-align: -0.125em;
                fill: currentColor;
            }
            .nav-scroller {
                position: relative;
                z-index: 2;
                height: 2.75rem;
                overflow-y: hidden;
            }
            .nav-scroller .nav {
                display: flex;
                flex-wrap: nowrap;
                padding-bottom: 1rem;
                margin-top: -1px;
                overflow-x: auto;
                text-align: center;
                white-space: nowrap;
                -webkit-overflow-scrolling: touch;
            }
            .btn-bd-primary {
                --bd-violet-bg: #712cf9;
                --bd-violet-rgb: 112.520718, 44.062154, 249.437846;
                --bs-btn-font-weight: 600;
                --bs-btn-color: var(--bs-white);
                --bs-btn-bg: var(--bd-violet-bg);
                --bs-btn-border-color: var(--bd-violet-bg);
                --bs-btn-hover-color: var(--bs-white);
                --bs-btn-hover-bg: #6528e0;
                --bs-btn-hover-border-color: #6528e0;
                --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
                --bs-btn-active-color: var(--bs-btn-hover-color);
                --bs-btn-active-bg: #5a23c8;
                --bs-btn-active-border-color: #5a23c8;
            }
            .bd-mode-toggle {
                z-index: 1500;
            }
            .bd-mode-toggle .bi {
                width: 1em;
                height: 1em;
            }
            .bd-mode-toggle .dropdown-menu .active .bi {
                display: block !important;
            }

            .carousel-item {
              transition: transform 1s ease-in-out; /* Smooth slide */
            }
            .carousel-item {
              will-change: transform;
            }

            .color{
                background-color: rgba(0, 0, 0, 0.774) !important;
                border-bottom: 8px solid rgba(255, 0, 149, 0.678);
                border-left: 7px solid rgba(195, 0, 255, 0.418);
                border-right: 2px  solid rgba(255, 0, 149, 0.678);
                border-top: 2px solid rgba(195, 0, 255, 0.418);
                border-radius: 100px 0px 100px 0px;

            }  

        </style>
</head>
<body>

        <nav class="navbar navbar-expand-lg bg-dark p-4 fixed-top" data-bs-theme="dark">
          <div class="container">
            <a class="navbar-brand text-white b1" href="#">M&M CARWASH</a>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
                
            <div class="collapse navbar-collapse" id="navbarScroll" style="font-size: 25px;">
              <ul class="navbar-nav ms-auto my-3 my-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="#"  onclick="underConstruction()">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="#"  onclick="underConstruction()">Contact</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="#services">Service</a>
                </li>
                <li class="nav-item">
                         <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal">
                          SIGN-IN
                        </button>
                </li>
              </ul>
            </div>
          </div>
        </nav>
<?php include "../views/index.php"?>