<?php


session_start();
include('config.php');

if(isset( $_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

if (isset($_GET['pid'])) {
	$pid=$_GET['pid'];
	$rest_name=$_GET['rname'];
	$fname=$_GET['fname'];
	$fprice=$_GET['fprice'];
	$fimage=$_GET['fimage'];
	$fcode=$_GET['fcode'];
	$userid= $_SESSION["id"];
	$pqty=1;
	 $sql = "SELECT food_id FROM cart WHERE user_id=$userid and food_id = ?";
	 $stmt = mysqli_prepare($link, $sql);
	 mysqli_stmt_bind_param($stmt, "s", $fcode);
	 mysqli_stmt_execute($stmt);
	 $res=$stmt->get_result();
	 $row=$res->fetch_assoc();
	
	 $code=$row['food_id'];
	 if(!$code)
	 {
	 	$quary="INSERT INTO `cart`(`user_id`, `food_id`, `restaurants_name`, `food_name`, `food_price`, `food_image`, `qty`, `total_price`) VALUES (?,?,?,?,?,?,?,?)";
	 	 $stmt = mysqli_prepare($link, $quary);
	 	  mysqli_stmt_bind_param($stmt, "iissisii",$userid,$fcode, $rest_name,$fname,$fprice,$fimage,$pqty,$fprice);
	 	  mysqli_stmt_execute($stmt); 
	 	  echo "Added to Menu Cart";

	 }
	 else{
	 	echo "Already Added In Menu Cart";

	 }
	}

	 if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') 
	 {
	 	$userid= $_SESSION["id"];
	 	$sql = "SELECT * FROM cart WHERE user_id=$userid";

     $stmt=mysqli_query($link, $sql);
     $rowcount=mysqli_num_rows($stmt);
     echo  $rowcount ;	
	 }

	 if (isset($_GET['clear'])) 
	 { 
	 	// $id=$_GET['clear'];
        $userid= $_SESSION["id"];
	 	$stmt=$link->prepare("DELETE FROM cart WHERE user_id=?");
	 	$stmt->bind_param("i",$userid);
	 	$stmt->execute();
	 	$_SESSION['showAleart']='block';
	 	$_SESSION['message']='Item removerd from cart!';
	 	header('location:shopping-cart.php');
 
	 }

	 if (isset($_GET['remove'])) 
	 { 
	 	$id=$_GET['remove'];

	 	$stmt=$link->prepare("DELETE FROM cart WHERE id=?");
	 	$stmt->bind_param("i",$id);
	 	$stmt->execute();
	 	$_SESSION['showAleart']='block';
	 	$_SESSION['message']='Item removerd from cart!';
	 	header('location:shopping-cart.php');
 
	 }
	 if (isset($_POST['qty'])) {
	 	$qty=$_POST['qty'];
	 	$pid=$_POST['pid'];
	 	$pprice=$_POST['pprice'];
	 	$tprice=$qty*$pprice;
	 	$stmt=$link->prepare("UPDATE cart SET qty=?,total_price=? WHERE id=?");

	 	$stmt->bind_param("isi",$qty,$tprice,$pid);
	 	$stmt->execute();
	 }
 if (isset($_POST['action']) && isset($_POST['action'])=='order' )
  {
 	$name=$_POST['name'];
 	$email=$_POST['email'];
 	$phone=$_POST['phone'];
 	$rest_name=$_POST['rest_name'];
 	$products=$_POST['products'];
 	$grand_total=$_POST['grand_total'];
 	$address=$_POST['address'];
 	$pmode=$_POST['pmode'];
 	$pcode=$_POST['pcode'];
 	$userid= $_SESSION["id"];
 	$restaurants_name=0;
 	$data='';
 	$rest_names=array();
 	$rest_names=explode(",",$rest_name);
 	$pcodes=array();
 	$pcodes=explode(",",$pcode);
 	$newproduct=array();
 	$newproduct=explode(",",$products);
 	$itemprice=array();
 	$itemprice=explode(",",$grand_total);

 	 for ($i=0; $i <sizeof($pcodes) ; $i++) { 
 		# code...
 	// print_r("  $pcodes[1] ");die();
 	 	$foodid="  $pcodes[$i] ";
 	 	$restaurants_name="$rest_names[$i]";
 	 	$foodname="$newproduct[$i]";
 	 	$itemwizeprice="  $itemprice[$i] ";
 	 	 // print_r($new);die();
 	$stmt=$link->prepare("INSERT INTO `order`( `user_id`, `name`, `email`, `phone`, `address`, `pmode`, `food_name`, `amount_paid`, `food_id`, `restaurants_name`) VALUES (?,?,?,?,?,?,?,?,?,?)");
 	$stmt->bind_param("issssssiis",$userid,$name,$email,$phone,$address,$pmode,$foodname,$itemwizeprice,$foodid,$restaurants_name);
 	$stmt->execute();
 }
 	$data.='<div class="text-center">
 	<h1 class="display-4 mt-2 " style="color: green">Thank You </h1> 
 	<h2 class="text-seccess"> Your Order Successfully Placed</h2>
 	<h4 class=" bg-danger text-light rounded p-2"> Items Purchased : '.$products.'</h4>
 	<h4 > Your Nmae : '.$name.'</h4>
 		<h4 > Your E-mail : '.$email.'</h4>
 			<h4 > Your Phone : '.$phone.'</h4>
 				<h4 > Total Ammount To Be Paid : '.$grand_total.'</h4>
 			<h4 > Payment Mode : '.$pmode.'</h4>
 				<h3>Within 2 Hour We Will Contact You </h3>
 			 <a href="index.php" class="btn btn-success"> <i class="fas fa-cart-plus"></i>Continue Shopping</a> 


 	</div>';
 	echo $data;

 }

}

?>