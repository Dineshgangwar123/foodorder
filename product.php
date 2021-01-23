
<?php
session_start();
include('config.php');
include('header.php');
?>
<section class="product-shop spad page-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-6">
                        <?php
                        if (isset($_GET['pid'])) 
                            { 
                                $pid=$_GET['pid'];
                                $result = mysqli_query($link,"SELECT * FROM `products` where product_id='$pid' ");
                                while($row = mysqli_fetch_assoc($result))
                                {
                                ?>
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="<?php echo $row['image']; ?>" alt="">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    <div class="pt active" data-imgbigurl="<?php echo $row['image']; ?>"><img src="<?php echo $row['image']; ?>" alt="">
                                    </div>
                                    <div class="pt" data-imgbigurl="<?php echo $row['image2']; ?>"><img src="<?php echo $row['image2']; ?>" alt="">
                                    </div>
                                    <div class="pt" data-imgbigurl="<?php echo $row['image3']; ?>"><img src="<?php echo $row['image3']; ?>" alt="">
                                    </div>
                                    <div class="pt" data-imgbigurl="<?php echo $row['image4']; ?>"><img src="<?php echo $row['image4']; ?>" alt="">
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                        <div class="col-lg-6">
                            <?php
                             $result = mysqli_query($link,"SELECT * FROM `menuitem` where id='$pid' ");
                             while($row = mysqli_fetch_assoc($result))
                                { ?>
                                    <div class="product-details">
                                        <div class="pd-title">
                                            <h3 style="font-size:20px "><?php echo $row['food_name']; ?></h3>
                                        </div>
                                        <div class="pd-desc">
                                            <p style="font-size:14px "><?php echo $row['discription']; ?></p>
                                            <h5 align="left" style="font-size:15px "> Food Price :<br>
                                                <span style="color: #C53318;font-size:18px"><b>&#x20B9  
                                                    <?=number_format( $row['food_price'],1)?></b></span>
                                            </h5>
                                        </div>
                                        <div class="quantity">
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
                                        <div id="message" ></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>  
<?php
 } } 

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