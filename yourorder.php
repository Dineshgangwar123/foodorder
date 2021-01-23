
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
else{
    header("location: login2.php");
  }


  if(isset($_POST['ret']))
    {  
        $user_check= $_POST["pid"];
 
              $result = mysqli_query($link,"SELECT * FROM `order` where id=$user_check  ");
               while($row = mysqli_fetch_assoc($result))
                 { 
          if ($row['delivery']==0) {


        $newname=4;
        $user_check= $_POST["pid"];
        // $res= $_POST["val"];
        // $result="";

         if (mysqli_query($link,"UPDATE `order` SET statuss = ' $newname' where id='$user_check' "))
         { // $result="updated";
         }
    }

  
  }
}



include('header.php');
?>


    <!-- Header End -->

    <section class="shopping-cart spad">
      
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                      <h3 align="center" style="color: green">Your Order Details</h3>
                        <table border="2px">
                            <thead>
                                <tr style="background-color: #F1C40F ">
                                    <th >Order ID</th>
                                    <th >Image</th>
                                    <th >Food Item</th>
                                    <th>Price</th>
                                    <th >Address</th>
                                    <th >Payment Mode</th>
                                    <th >Date</th>
                                    
                                </tr>
                              
                            </thead>
                            <tbody>
  <?php  
   $userid= $_SESSION["id"];
 
  $result = mysqli_query($link,"SELECT * FROM `order` where user_id=$userid   ");
   while($row = mysqli_fetch_assoc($result))
    { ?>  
  
  <tr>
    <td style="background-color:  #EBF5FB"><?php echo $row['id'];?></td>
    <td style="background-color:  #D6EAF8">
      <?php 
     $pcode=$row['food_id'];
     // echo "pcode={$pcode}";
          $results = mysqli_query($link,"SELECT * FROM `menuitem` where id='$pcode' ");
               $rows= mysqli_fetch_array($results );
                ?>
                <a href="product.php?pid=<?php echo $rows['id'] ?>">
                <img src="<?php echo( $rows['image']); ?> "  height="90" width="90">
                               </a>

                                

    </td>
    <td style="background-color:  #AED6F1"><?php echo $row['food_name'];?></td>
    <td style="background-color:  #85C1E9"><?php echo $row['amount_paid'];?></td>
    <td style="background-color: #5DADE2"><?php  echo " ".$row['name']." ". $row['phone']." <br>". $row['address']."  ";?>   
    </td>
    <td style="background-color:  #3498DB"><?php echo $row['pmode'];?></td>
    <td style="background-color: #3498DB"><?php $newdate= date_create( $row['added_at']);
    echo date_format($newdate,'y-m-d'); 
    ?> 
    </td>
  </tr>


  <?php  } ?>  
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