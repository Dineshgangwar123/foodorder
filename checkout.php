<?php
session_start();
require 'config.php';

  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

  if($_SESSION['role'] == 'restaurants')
  {
       header("location: admin.php");

  }
  elseif($_SESSION['role'] == 'user')
  {
     $id=$_SESSION['id'];
     $sql="SELECT * FROM cart where user_id='" .$id. "'";

     $result=mysqli_query($link,$sql);
     $rowcount=mysqli_num_rows($result);
     if ( $rowcount>0) {
       //
     }
     else
     {
     header("location: login.php");
     }
  }
}
else{
    header("location: login.php");
  }
?>
<?php
$grand_total=0;
$allItems='';
$allpcode='';
$foodprices='';
$rest_name='';
$user_check=$_SESSION["id"];
$r_name = array( );
$items = array( );
$pcodei = array( );
$foodprice = array( );
$sql="SELECT CONCAT(food_name,'(',qty,')') AS ItemQty,total_price,restaurants_name FROM cart WHERE `user_id`='$user_check'  ";
$stmt=$link->prepare($sql);
$stmt->execute();
$result=$stmt->get_result();
while ($row=$result->fetch_assoc()) {
    $grand_total +=$row['total_price'];
    $r_name[]=$row['restaurants_name'];
    $items[]=$row['ItemQty'];
    $foodprice[]=$row['total_price'];


}
$rest_name=implode(",",$r_name);
$allItems= implode(",", $items);
$foodprices= implode(",", $foodprice);


$sqls="SELECT food_id FROM cart WHERE `user_id`='$user_check'  ";
$stmts=$link->prepare($sqls);
$stmts->execute();
$results=$stmts->get_result();
while ($rows=$results->fetch_assoc()) {
    $pcodei[]=$rows['food_id'];

}
$allpcode= implode(",", $pcodei);

?>


<?php

include('header.php');
?>
<div class="container"><br>
  <h4 align="center">Complete Your Order</h4></br>
  <div class="row" align="center">
    <div class="col-sm-3 col-md-6 col-lg-12" id="order">
      <div class=" jumbotron text-center">
        <h6 class="lead"><b>Product(s) :</b> <?php echo $allItems; ?> </h6>
        <h5> <b>Paybale Amount :</b><?= number_format( $grand_total,2)?>/- </h5>
        <form action="" method="post" id="placeOrder">
          <input type="hidden" name="rest_name" value="<?= $rest_name; ?>">
          <input type="hidden" name="products" value="<?= $allItems; ?>">
          <input type="hidden" name="pcode" value="<?= $allpcode; ?>">
          <input type="hidden" name="grand_total" value="<?= $foodprices; ?>">
          <div  class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter E-mail" required>
          </div>
          <div class="form-group">
            <input type="tel" name="phone" class="form-control" placeholder="Enter 10 Digit Phone Number" pattern="[0-9]{10}" required>
          </div>
          <div class="form-group">
            <textarea name="address" class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address Here..." required></textarea>
          </div>
          <h6 class="text-center lead">Select Payment Mode</h6> 
          <div class="form-group">
            <select name="pmode" class="form-control" required>
              <option value="" selected disabled >-Select Payment Mode-</option>
              <option value="cod">Bank Transfer</option>
              <option value="netbanking">Phonepe</option>
              <option value="cards">Google Pay</option>
            </select>
        </div>
        <div class="form-group  ">
          <input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block">
        </div>
      </div> 
    </form> 
  </div> 
</div>
</div>
</div>

            <script type="text/JavaScript">
     $(document).ready(function(){
       $("#placeOrder").submit(function(e){
       e.preventDefault();
       $.ajax({
        url : 'action.php',
        method: 'post',
        data : $('form').serialize()+"&action=order",
        success: function(response)
        {
            $("#order").html(response);
        }
       });
       });
       

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