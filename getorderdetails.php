

<?php 
session_start();
include('config.php');

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

  if($_SESSION['role'] == 'restaurants')
  {

  }
  elseif($_SESSION['role'] == 'user')
  {
       header("location: index.php");
  }
}
else{
    header("location: login.php");
  }
include('config.php');
include('adminheader.php');
 ?>
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">     
            </div>
        </div>
    </div>

    <section class="product-shop spad page-details">
        <div class="container">
           
                <div class="col-lg-16">
                  <h3 align="center"><?php echo $_SESSION["fname"]; ?> Order Details</h3><br>
                    <table border="2px" style="background: #ff9999">
                        <thead>
                        <tr style="background:#ffff1a ">
                            <th style="width:30px">Order_id</th>
                            <th>User_id</th>
                            <th> Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Payment Mode</th>
                            <th>Restaurants</th>
                            <th>Food(QTY)</th>
                            <th>Ammount</th>
                            <th>Product Id</th>
                            <th>Order Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $hotel_name=$_SESSION["fname"];
                      
                         $link=mysqli_connect($servername, $username, $password,$dbname);
                         $qry="SELECT  `id`, `user_id`, `name`, `email`, `phone`, `address`, `pmode`, `food_name`, `amount_paid`, `food_id`, `restaurants_name`, `added_at` FROM `order` where restaurants_name='" .$hotel_name. "'  ";
                         $result=mysqli_query($link, $qry);
                         if( mysqli_num_rows($result) > 0)
                         {
                            while ($row= mysqli_fetch_assoc($result)){
                               echo "<tr >
                               <td> ".$row["id"]." </td> 
                               <td> ".$row["user_id"]." </td>
                               <td> ".$row["name"]." </td>
                               <td> ".$row["email"]." </td>
                               <td> ".$row["phone"]." </td>
                               <td> ".$row["address"]." </td>
                               <td> ".$row["pmode"]." </td>
                               <td> ".$row["restaurants_name"]." </td>
                               <td> ".$row["food_name"]." </td>
                               <td> ".$row["amount_paid"]." </td>
                               <td> ".$row["food_id"]." </td>
                               <td> ".$row["added_at"]." </td>
                              </tr>";
                              } 
                            echo "</tbody> </table>";
                         }
                         else
                         {
                            echo "0 result";
                         }
                           mysqli_close($link);
                        ?>
                    </div>    
                    </div>
                </div>
            </div>
        </div>
    </section>
  
 <?php 
include('footer.php');

    ?>