<?php
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!--  CSS  -->
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="./css/bootstrap-icons.css">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>

  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
  <link rel="stylesheet" href="css/<?php echo $css_file?>">
  <!-- GOOGLE FONTS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet" />
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200;1,300;1,400;1,500&display=swap"
    rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Prata&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title><?php echo $page_title?></title>


</head>
<body>

    <!-- static navbar  -->
    <header class="headerMenu сlearfix sb-page-header">   
        <div class="nav-header">
            <a class="navbar-brand" href="">
                Admin Panel
            </a> 
        </div>

        <div class="nav-controls top-nav">
            <ul class="nav top-menu">
                <li id="user-btn" class="main-li " style="background:none;">
                <a class="btn btn-secondary  " href="logout.php">
                                <i class="fas fa-sign-out-alt"></i>
                                <span style="padding-left:6px">
                                    Logout
                                </span>
                 </a>
                </li>
                <li class="main-li webpage-btn">
                    <a class="nav-item-button " href="../index.php" >
                        <i class="fas fa-binoculars"></i>
                        <span>View website</span>
                    </a>
                </li>
            </ul>
        </div>
    </header>

    <!-- VERTICAL NAVBAR -->

    <aside class="vertical-menu" id="vertical-menu">
        <div>
            <ul class="menu-bar">
                <div class="sidenav-menu-heading">
                    Core
                </div>

                <div class="dropdown-divider"></div>

                <li>
                    <a href="dashboard.php" class="a-verMenu dashboard_link">
                        <i class="fas fa-tachometer-alt icon-ver"></i>
                        <span style="padding-left:6px;">Dashboard</span>
                    </a>
                </li>

                <div class="dropdown-divider"></div> 

                <div class="sidenav-menu-heading">
                    Menus
                </div>

                <div class="dropdown-divider"></div>

                <li>
                    <a href="menu_categories.php" class="a-verMenu menu_categories_link">
                        <i class="fas fa-list icon-ver"></i>
                        <span style="padding-left:6px;">Menu Categories</span>
                    </a>
                </li>
                <li>
                    <a href="menus.php" class="a-verMenu menus_link">
                        <i class="fas fa-utensils icon-ver"></i>
                        <span style="padding-left:6px;">Menus</span>
                    </a>
                </li>
                <li>
                    <a href="gallery.php" class="a-verMenu gallery_link">
                        <i class="far fa-image icon-ver"></i>
                        <span style="padding-left:6px;">Gallery</span>
                    </a>
                </li>

                <li>
                    <a href="orders.php" class="a-verMenu users_link">
                        <i  class="fa-solid fa-pizza-slice icon-ver"></i>
                        <span style="padding-left:6px;">Orders</span>
                    </a>
                </li>
                
           

                <li>
                    <a href="tabels.php" class="a-verMenu users_link">
                         <i class="fa-solid fa-chair icon-ver"></i>
                        <span style="padding-left:6px;">Tabels</span>
                    </a>
                </li>
                
                <div class="dropdown-divider"></div>
                
                <div class="sidenav-menu-heading">
                    Clients & Staff
                </div>
                
                <div class="dropdown-divider"></div>
                
                <li>
                    <a href="clients.php" class="a-verMenu clients_link">
                        <i class="far fa-address-card icon-ver"></i>
                        <span style="padding-left:6px;">Clients</span>
                    </a>
                </li>
                <li>
                    <a href="users.php" class="a-verMenu users_link">
                        <i class="far fa-user icon-ver"></i>
                        <span style="padding-left:6px;">Users</span>
                    </a>
                </li>
                

                <div class="dropdown-divider"></div>

              

                

            </ul>
        </div>
    </aside>

    <!-- START BODY CONTENT  -->

    <div id="content" style="margin-left:240px;">
      <section class="content-wrapper" style="width: 100%;padding: 70px 0 0;">
        <div class="inside-page" style="padding:20px">
          <div class="page_title_top" style="margin-bottom: 1.5rem!important;">
            <h1
              style="color: #5a5c69!important;font-size: 1.75rem;font-weight: 400;line-height: 1.2;">
              <?php  echo "Hello ".$_SESSION['name']?>
            </h1>