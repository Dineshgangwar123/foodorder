
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

    <section class="product-shop spad">
        <div class="container">
            <?php
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            ?>
            <a href="pref_menu.php"><h3 align="center" style="background-color: white">Hey Click Here To See Your Preference's Foods</h3></a>
            <br>
            <?php
        }
            ?>

            <div class="row">

                <div id="message"  style="color: #f44336;"></div> 
                <div class="col-lg-12 order-1 order-lg-2"> 
                    <div class="product-list">
                        <div class="row">
                            <?php
                            $result = mysqli_query($link,"SELECT * FROM `menuitem` where  activate_status=1");
                                while($row = mysqli_fetch_assoc($result))
                                {
                                ?>
  <div class="col-sm-6 col-md-4 col-lg-3 mb-2 col-md-4 mobile-pad-gap">
    <div class="card-deck">
        <div class="card p-2 border-secondary mb-2">
            <a href="product.php?pid=<?php echo $row['id'] ?>"><img src="<?= $row['image'] ?>" class="card-img-top" height="200"></a>
            <div class="card-body p-1">
                <h4 class="card-title text-center text-info" style="font-size: 14px;line-height: 1.5em;height: 3em;overflow: hidden;text-overflow: ellipsis;width: 100%;">
                    <?php
                    if ($row['category']=="Veg") {
                        echo "<img src='img/veg.png' height='13'> ";
                    }else
                    {
                        echo "<img src='img/nonveg.png' height='13'> ";
                    }
                    echo $row['food_name'];
                    ?></h4>

                <h5 align="center" style="color: #FF9E00;font-size: 12px;line-height: 1.5em; height: 3em; overflow: hidden;text-overflow: ellipsis; width: 100%;"> Restaurants :<?= $row['restaurants_name']?></h5>

                <h5 align="center" style="font-size:15px "> Price :<span style="color: #C53318;font-size:18px"><b>&#x20B9 <?=number_format( $row['food_price'],1)?></b></span></h5>
            </div>
            <div class="card-footer p-1">
                <form action=""  class="form-submit">
                    <input type="hidden" class="pid" value="<? =$row['id'] ?>">
                    <input type="hidden" class="rname" value="<?php echo($row['restaurants_name']); ?>">

                    <input type="hidden" class="fname" value="<?php echo($row['food_name']); ?>">
                    <input type="hidden" class="fprice" value="<?php echo($row['food_price']); ?>">
                    <input type="hidden" class="fimage" value="<?php echo( $row['image']); ?>">
                    <input type="hidden" class="fcode" value="<?php echo( $row['id']); ?>">
                    <?php
                    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){?>
                      <button  class="btn btn-info btn-block addItemBtn " > Add to Menu Cart</button>
                    <?php } else{ ?>
                      <input type="button" class="btn btn-info btn-block "  onclick="location.href='login.php';" value="Add to Menu Cart" /> <?php } ?>
                </form>  
            </div>
          </div>
        </div>   
        </div>   <?php } ?>         
         </div>
       </div> 
     </div>
   </div>
 </div>
</section>





<?php

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    ?>


 <script type="text/JavaScript">
     $(document).ready(function(){
        $(".addItemBtn").click(function(e){
            e.preventDefault();
            var $form =$(this).closest(".form-submit");
            var pid=$form.find(".pid").val();
            var rname=$form.find(".rname").val();
            var fname=$form.find(".fname").val();
            var fprice=$form.find(".fprice").val();
            var fimage=$form.find(".fimage").val();
            var fcode=$form.find(".fcode").val();
            $.ajax({
                url: 'action.php',
                method: 'get',
                data: {pid:pid,rname:rname,fname:fname,fprice:fprice,fimage:fimage,fcode:fcode},
                success:function(response)
                {
                    $("#message").html(response);
                    load_cart_item_number();

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
}
?>

 <?php 
include('footer.php');

    ?>