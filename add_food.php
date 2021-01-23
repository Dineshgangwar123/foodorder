

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


    if(isset($_POST['submit']))
    {
     if(getimagesize($_FILES['image']['tmp_name'])==FALSE)
     {
        echo " error ";
     }
     else
     {
       $image = $_FILES['image']['name'];
        $tempimage = $_FILES['image']['tmp_name'];
        $folder="img/products/".$image;
        move_uploaded_file($tempimage , $folder);

        $image2 = $_FILES['image2']['name'];
        $tempimage2 = $_FILES['image2']['tmp_name'];
        $folder2="img/products/".$image2;
        move_uploaded_file($tempimage2 , $folder2);

        $image3 = $_FILES['image3']['name'];
        $tempimage3 = $_FILES['image3']['tmp_name'];
        $folder3="img/products/".$image3;
        move_uploaded_file($tempimage3 , $folder3);

        $image4 = $_FILES['image4']['name'];
        $tempimage4 = $_FILES['image4']['tmp_name'];
        $folder4="img/products/".$image4;
        move_uploaded_file($tempimage4 , $folder4);

         $image5 = $_FILES['image5']['name'];
        $tempimage5 = $_FILES['image5']['tmp_name'];
        $folder5="img/products/".$image5;
        move_uploaded_file($tempimage5 , $folder5);

    $hotel_name=$_SESSION["fname"];
    $food_name=$_POST["food_name"];
    $food_price=$_POST["food_price"];
    $food_dis=$_POST["food_dis"];
    $category=$_POST["category"];
        
    saveimage($hotel_name,$food_name, $food_price, $food_dis,$category,$folder,$folder2,$folder3,$folder4,$folder5);
     }
    }
    function saveimage($hotel_name,$food_name, $food_price, $food_dis,$category,$folder,$folder2,$folder3,$folder4,$folder5)
    {
      

include('config.php');

        $qry="INSERT INTO `menuitem`(`restaurants_name`, `food_name`, `food_price`, `image`, `discription`,  `category`) VALUES ('$hotel_name','$food_name','$food_price','$folder','$food_dis','$category')";
        $result=mysqli_query($link,$qry);
        if($result)
        {
            
             $res = mysqli_query($link,"  SELECT * FROM `menuitem` WHERE id=(SELECT MAX(id) FROM `menuitem`) ");
                    while($row = mysqli_fetch_assoc($res))
                      {
                        $proid=$row['id'];
                   $qry2="INSERT INTO `products`(`product_id`, `image`, `image2`, `image3`, `image4`) VALUES ('$proid','$folder2','$folder3','$folder4','$folder5')";
                                  $result2=mysqli_query($link,$qry2);
                                  if ($result2) 
                                  {
                                    echo "insted";
                                  }        
                       }
        }
        else 
        {
            echo " error ";
        }
    }
    include('adminheader.php');
?> 
<section class="product-shop spad page-details">
  <div class="container">
    <div class="col-lg-16">
      <div class="row">
        <div class="col-lg-4">
         <form action="" method="post" enctype="multipart/form-data">
          <input type="file" name="image" accept="image/*"  onchange="loadFile(event)" multiple>
          <img id="output"/>
          <div><input type="file" name="image2" ></div>
          <div><input type="file" name="image3" ></div>
          <div><input type="file" name="image4" ></div>
          <div><input type="file" name="image5" ></div>
        </div>
        <script>
          var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
          } };
        </script>
         <div class="col-lg-8">
          <div class="product-details">
            <div align="left" class="col-lg-6">
              <label for="zip"><b>Food Name</b></label>
              <input align="center" style="margin-left: 30px" type="text" name="food_name">
            </div>
            <div align="left" class="col-lg-6">
              <label for="cun"><b>Food Price</b><span></span></label>
              <input align="center" style="margin-left: 55px" type="text" name="food_price">
            </div>
            <div align="left" class="col-lg-6">
              <label for="cun"><b> Select Category: *</b> </label>
              <input type="radio" name="category" value="Veg">
              <label>Veg </label>
              <input type="radio" name="category" value="Non-veg">
              <label>Non-veg</label>
            </div>
            <div align="left" class="col-lg-6">
              <label for="cun"><b> Product Discription</b><span>*</span></label>
              <textarea name="food_dis" class="form-control" rows="3"  placeholder="Enter Discription Here..." required="" autocomplete="off"></textarea>
            </div>
            <div align="left" class="col-lg-6">
              <label for="zip">  </label>
              <input type="submit" name="submit" value="Upload"/>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</section>

   

  <?php 
include('footer.php');

    ?>








