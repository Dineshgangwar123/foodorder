
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
    //
  }
}
else{
    header("location: login.php");
  }


include('header.php');
?>
    <section class="shopping-cart spad">
      
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                      <h4 align="center" style="color: Green"><b> Menu Cart</b> </h4>

                    <div class="cart-table">
                        <table style="background-color: white">
                            <thead>
                                <tr>
                                    <th>Restaurant  </th>&nbsp;
                                    <th >Image</th>
                                    <th>Food Name</th>
                                    <th>Food Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th><a href="action.php?clear=all" class="badge-danger badge p-1" onclick="return confirm('Are you sure want to clear your cart?');"><i class="fas fa-trash"></i> &nbsp;  Clear Cart</a></th>
                                    <!-- <th><i class="ti-close"></i></th> -->
                                </tr>
                              


                            </thead>
                            <tbody>
  <?php  
  // require 'config.php';
  $userid= $_SESSION["id"];
  $stmt=$link->prepare("SELECT * FROM cart WHERE user_id=$userid");
  $stmt->execute();
  $res=$stmt->get_result();
  $grand_total=0;
  while ($row=$res->fetch_assoc())
  { 
      
  ?> 
  <tr>
      <td><?php echo($row['restaurants_name']); ?></td>
      <input type="hidden" class="pid" value="<?php echo($row['id']); ?>">
      <td>
         <a href="product.php?pid=<?php echo $row['food_id'] ?>"><img src="<?php echo( $row['food_image']); ?>"  width="100" ></a>

      </td>
      <td><?php echo($row['food_name']); ?></td>
       <td> <i class="fas fa-rupee-sign"></i>
                  <?= number_format( $row['food_price'],2)?>/-
                  </td>
    <input type="hidden" class="pprice" value="<?php echo ($row['food_price']); ?>">              
    <td><input type="number" class="form-control itemQty" value="<?php echo($row['qty']); ?>" style="width: 75px;">
        </td>
    <td><?php echo($row['total_price']); ?></td>
    <td>
        <a href="action.php?remove=<?php echo $row['id'] ?>" class="text-danger lead" onclick="return confirm('Are you sure want to remove this item from cart?'); ">
           <i class="ti-close"></i>
        </a>
    </td>
  </tr> 
  <?php $grand_total +=$row['total_price']; ?>

  <?php  } ?>  
  <tr>
      <td colspan="3">
        <a href="index.php" class="btn btn-success"> <i class="fas fa-cart-plus"></i>Continue Shopping</a>  
      </td>
      <td colspan="2"><b>Grand Total</b></td>
      <td><i class="fas fa-rupee-sign"></i>
        <b><?= number_format( $grand_total,2)?>/-</b>
                  </td>
       <td><a href="checkout.php" class="btn btn-info"  <?php ($grand_total>1)?'':'disabled'; ?>
       
       > Check Out</a></td>           
  </tr>                         
                                

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                          
                        </div>

   



                    </div>
                </div>
            </div>
        </div>
    </section>
    
 -->    <!-- Partner Logo Section End -->
 <script type="text/JavaScript">
     $(document).ready(function(){

        $(".itemQty").on('change',function(){
        var $el=$(this).closest('tr');
        var pid= $el.find(".pid").val();
        var pprice= $el.find(".pprice").val();
        var qty= $el.find(".itemQty").val();
        location.reload(true);
        $.ajax(
        {
            url: 'action.php',
        method: 'post',
        cache: false,
        data: {qty:qty,pid:pid,pprice:pprice},
        success: function(response){
          console.log(response);  
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
       $(document).ready(function(){

        $(".itemQty").on('change',function(){
        var $el=$(this).closest('tr');
        var pid= $el.find(".pid").val();
        var pprice= $el.find(".pprice").val();
        var qty= $el.find(".itemQty").val();
        location.reload(true);
        $.ajax(
        {
            url: 'action2.php',
        method: 'post',
        cache: false,
        data: {qty:qty,pid:pid,pprice:pprice},
        success: function(response){
          console.log(response);  
        }
        });
        });
        load_cart_item_numbers();
        function load_cart_item_numbers()
        { $.ajax({
            url: 'action2.php',
            method: 'get', 
            data: {cartItem:"cart_items"},
            success:function(response){
                $("#cart-items").html(response);
            }

        });

        }

     });
 </script>

     <?php 
include('footer.php');

    ?>