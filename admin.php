

 <?php

session_start();
include('config.php');

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
     // if(isset($_SESSION['loggedin'])&&isset($_SESSION['role']))

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

if(isset($_POST['done']))
    {  
        
        $user_check= $_POST["aid"];
        $i=0;

        mysqli_query($link,"UPDATE `menuitem` SET activate_status = ' $i' where id='$user_check'");
         
    }
    if(isset($_POST['deactivate']))
    {  
        
        $user_check= $_POST["did"];
        $i=1;

      mysqli_query($link,"UPDATE `menuitem` SET activate_status = ' $i' where id='$user_check'");
         
    }
  
?> 
 <br>
                  <h3 align="center"><?php echo $_SESSION["fname"]; ?> Menu Items</h3><br>

 <table border="2px"  style="padding-top:200px ">

             <thead>
              <tr style="background-color: pink ">
                 <th style="width: 30px">ID</th>
                 <th style="width: 200px">Categories</th>
                 <th style="width: 200px">Name</th>
                 <th style="width: 200px">Image</th>
                 <th style="width: 200px">Food Price</th>
                 <th style="width: 200px">Disciption</th>
                 <th style="width: 200px">Date</th>
                 <th style="width: 200px">Action</th>
                 <th></th>
              </tr>
             </thead>
             <tbody>
              <?php 


              $hotel_name=$_SESSION['fname'];
              
             $result = mysqli_query($link,"SELECT * FROM `menuitem` where restaurants_name='$hotel_name' "); 
                
              while($row = mysqli_fetch_assoc($result)){?>
              <tr>
                 <td style="padding:0 0px"><?php echo $row['id'];?></td>
                 <td style="padding:0 0px"><?php echo $row['category'];?></td>
                 <td style="padding:0 0px"><?php echo $row['food_name'];?></td>
                 <td style="padding:0 0px"><img src="<?php echo( $row['image']); ?>"  height="50" width="50" ></td>
                 <td><?php echo $row['food_price']?></td>
                 <td><?php echo $row['discription']?></td>
                 <td><?php echo $row['added_at']?></td>

                <td>

                <?php if($row['activate_status']==1){ ?>

                <div>
                <span class="badge badge-complete">
                <form action="" method="POST">
                        <input type="hidden" name="aid" value="<?php echo($row['id']); ?>">
                        <button name="done" style="background-color: #23B70C">Activate </button>
                </form>
                </span>

                <?php } else { ?>

                  <span class="badge badge-complete">
                  <form action="" method="POST">
                        <input type="hidden" name="did" value="<?php echo($row['id']); ?>">
                        <button name="deactivate" style="background-color: red">Deactivate </button>
                  </form>
                  </span>
                <?php } ?>
                </div>
                 </td>
              </tr>
              <?php } ?>
             </tbody>
            </table>

 <?php 
include('footer.php');

    ?>