<?php
session_start();
include('config.php');
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

  if($_SESSION['role'] == 'restaurants')
  {
       header("location: admin.php");

  }
  elseif($_SESSION['role'] == 'user')
  {
  }
}

include('header.php');

?>
    <div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">

    <div class="carousel-item active">
      <img src="img/banner1.jpg" alt="Los Angeles" width="1100" height="500">
      <a href="menu.php" style="position: absolute;top: 50%; left: 50%; transform: translate(-50%, -50%);display: inline-block;font-size: 16px;padding: 1px 1px 1px 1px;color: #ffffff;background: #e7ab3c;text-transform: uppercase;"> ORDER NOW</a>
     
    </div>
    <div class="carousel-item ">
      <img src="img/banner2.jpg" alt="Los Angeles" width="1100" height="500">
       <a href="menu.php" style="position: absolute;top: 50%; left: 50%; transform: translate(-50%, -50%);display: inline-block;font-size: 16px;padding: 1px 1px 1px 1px;color: #ffffff;background: #e7ab3c;text-transform: uppercase;"> ORDER NOW</a>
     </div>
     <div class="carousel-item ">
      <img src="img/banner3.jpg" alt="Los Angeles" width="1100" height="500">
       <a href="menu.php" style="position: absolute;top: 50%; left: 50%; transform: translate(-50%, -50%);display: inline-block;font-size: 16px;padding: 1px 1px 1px 1px;color: #ffffff;background: #e7ab3c;text-transform: uppercase;"> ORDER NOW</a>
     </div>
   
  </div>
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
  
</div>

     <script type="text/JavaScript">
     $(document).ready(function(){
             load_cart_item_number();
        function load_cart_item_number()
        { $.ajax({
            url: 'action.php',
            method: 'get', 
            data: {cartItem:"cart_item"},
            success:function(response){
                $("#cart-item").html(response);
            }
        });
        }
     });
 </script>
   <?php 
include('footer.php');
    ?>