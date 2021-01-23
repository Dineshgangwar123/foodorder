
 
<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values

$fname= $username = $password = $confirm_password = "";
$fname_err = $username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $fname =$_POST["fname"];
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM login WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    if(empty(trim($_POST["fname"]))){
        $fname_err = "Please enter a username.";
    }
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
   
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($fname_err)){
        
        // Prepare an insert statement
        $role="restaurants";
        $sql = "INSERT INTO login (fname,username, pass,role) VALUES ('$fname',?, ?,'$role')";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss",$param_username, $param_password);
            
            // Set parameters
            $param_fname=$fname;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>




<?php
// session_start();
// include('config.php');
include('header.php');
?>

    <!-- Header End -->

   

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3" style="background-color: white">
                    <div class="register-form">
                        <h2>Restaurants Register</h2>
            

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="group-input <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label for="username">Restaurants Name*</label>

                <input type="text" name="fname" class="form-control" value="<?php echo $fname; ?>">
                <span class="help-block"><?php echo $fname_err; ?></span> 
            </div> 
            <div class="group-input <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label for="username">Email Address *</label>

                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="group-input<?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label for="pass">Password *</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="group-input <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                  <label for="con-pass">Confirm Password *</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="group-input">
                <input type="submit" class="site-btn register-btn" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="rest_login.php">Login here</a>.</p>
          </form>





                       
                    </div>
                </div>
            </div>
        </div>
    </div>
   

   <?php 
include('footer.php');

    ?>