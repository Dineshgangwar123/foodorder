<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title >Food Order</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/styles.css" type="text/css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
  .carousel-inner img {
    width: 100%;
    height: 45%;
  }
  </style>
    <style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 85%;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}


</style>
</head>


<?php

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

?>
<body style="background-image: url('img/b2.jpg');"> 

    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> 


    <!-- Header Section Begin -->
    <header class="header-section">
       
        <div class="nav-item">
            <div class="container">
              
                <nav class=" nav-menu mobile-menu col-sm-6 col-md-4 col-lg-12 mb-2" >
                    <ul> 
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="./menu.php">Menu</a></li>
                         <li><a href="#">My Account</a>
                            <ul class="dropdown">
                                <li><a href="useraccount.php">Your Account</a></li>
                                <li><a href="yourorder.php">Your Order</a></li>
                                <li><a href="./logout.php">Logout</a></li>
                            </ul>
                        </li>
                         <li class="cart-icon"><a href="shopping-cart.php">
                                    <i class="icon_bag_alt"></i>
                                    <span id="cart-item" >
                                    </span> 
                                </a>
                                <ul class="dropdown">
                                <div class="cart-hover">
                                    
                                    <div class="select-button">
                                        <a href="./shopping-cart.php" class="primary-btn view-card">VIEW CARD</a>
                                        <a href="./checkout.php" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>
                            </ul>
                            </li>
                        </ul>
                    </nav>
                    <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>


<?php
}
else
{

?>
<body style="background-image: url('img/b2.jpg');"> 
<header class="header-section">
       
        <div class="nav-item">
            <div class="container">
              
                <nav class="nav-menu mobile-menu" >
                    <ul> 
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="./menu.php">Menu</a></li>
                        <li><a href="./rest_login.php">Restaurants Login</a>
                        <li><a href="./login.php">User Login</a>
                        
                        </li>
                          <li class="cart-icon"><a href="shopping-cart.php">
                                    <i class="icon_bag_alt"></i>
                                    <span id="cart-item" >
                                    </span> 
                                </a>
                                <ul class="dropdown">
                                <div class="cart-hover">
                                    
                                    <div class="select-button">
                                        <a href="./shopping-cart.php" class="primary-btn view-card">VIEW CARD</a>
                                        <a href="./checkout.php" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>
                            </ul>
                            </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>

<?php

}?>