
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


include('adminheader.php');

 if(isset($_POST['submit']))
    {  
        $newname=$_POST['name'];
        $user_check= $_SESSION["id"];
        $result="";

        mysqli_query($link,"UPDATE `login` SET fname = '$newname' WHERE id ='$user_check' ");
         
    }

    if(isset($_POST['mobiles']))
    {  
        $newname=$_POST['mobile'];
        $user_check= $_SESSION["id"];
        $result="";

         mysqli_query($link,"UPDATE `login` SET mobile = '$newname' WHERE id ='$user_check' ");
        
    }

    if(isset($_POST['emails']))
    {  
        $newname=$_POST['email'];
        $user_check= $_SESSION["id"];
        $result="";

         mysqli_query($link,"UPDATE `login` SET username = '$newname' WHERE id ='$user_check' ");
         
    }



if(isset($_POST['submits']))
    {
        if(!empty($_FILES['image']['tmp_name']))
        {
          if( getimagesize($_FILES['image']['tmp_name'])==FALSE)
          {
            echo " error ";
          }
          else
          {
            $image = $_FILES['image']['name'];
            $tempimage = $_FILES['image']['tmp_name'];
            $folder="img/products/".$image;
            move_uploaded_file($tempimage , $folder);
            $user_check= $_SESSION["id"];
            saveimage($folder);
          }
        }
    }
    function saveimage($folder)
    {
      include('config.php');
      $user_check= $_SESSION["id"];
      mysqli_query($link,"UPDATE `login` SET image = '$folder' WHERE id ='$user_check' ");
         
    }


?>

<section class="shopping-cart spad" >
  <div class="container" style="background-color: white"><br>
    <div class="col-lg-12" >
      <div class="row">
        <div class="col-lg-4">
          <div class="">
            <?php
            $userid= $_SESSION["id"];
            $result = mysqli_query($link,"SELECT * FROM `login` where id='$userid'");
            while($row = mysqli_fetch_assoc($result))
            {?>
            <img src="<?php echo $row['image']; ?>" width="250"  height="250">
            <?php } ?>
            <form action="" method="post" enctype="multipart/form-data">
              <input type="file" name="image" accept="image/*"  onchange="loadFile(event)" multiple>
              <input type="submit" name="submits" value="Upload" style="background-color: green">
              <img id="output"/>
              <script>
                var loadFile = function(event) {
                  var output = document.getElementById('output');
                  output.src = URL.createObjectURL(event.target.files[0]);
                  output.onload = function() {
                  URL.revokeObjectURL(output.src) // free memory
                }
                };
              </script>
            </form>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="product-details">
            <?php
            $userid= $_SESSION["id"];
            $result = mysqli_query($link,"SELECT * FROM `login` where id='$userid'");
            while($row = mysqli_fetch_assoc($result))
            {?>
              <div><label style=" font-size:24px " >Name  <b> <span style="margin-left: 30px;color:blue; font-size:24px " > <?php echo $row['fname'];   ?></span></b>
              </label><br>
            </div>
            <div><label style=" font-size:24px " >Mobile  <b> <span style="margin-left: 30px;color:blue; font-size:24px " > <?php echo $row['mobile'];   ?></span></b>
               </label><br>
            </div>
            <div><label style=" font-size:24px " >Email  <b> <span style="margin-left: 30px;color:blue; font-size:24px " > <?php echo $row['username'];   ?></span></b>
              </label><br>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="col-lg-4">
        <div class="product-details">
           <div>
            <form action="" method="POST">
              <input type="text" placeholder="Update name" name="name" style="margin-left: 10px">
              <button name="submit" style="background-color: gray">Update </button>
            </form>
          </div><br>
          <div>
            <form action="" method="POST">
              <input type="text" placeholder="Update mobile No." name="mobile" style="margin-left: 10px">
              <button name="mobiles" style="background-color: gray">Update </button>
            </form>
          </div><br>
          <div>
            <form action=""  method="POST">
              <input type="text" placeholder="Update name" name="email" style="margin-left: 10px">
              <button name="emails" style="background-color: gray">Update </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div><br>
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

     });
 </script>
               

   <?php 
include('footer.php');

    ?>