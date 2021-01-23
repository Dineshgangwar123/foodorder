<?php
session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
 
require_once "config.php";
$username = $password = "";
$username_err = $password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT id,fname, username, pass,role,preferences FROM login WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $id,$fname, $username, $hashed_password,$role,$preferences);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["fname"] = $fname;

                            $_SESSION["username"] = $username; 
                            $_SESSION['role'] = $role; 
                            $_SESSION['preferences'] = $preferences;  
                             
                             if($role == 'restaurants')
                             {
                             header("location: admin.php");
                              }
                         if($role== 'user'){
                          header("location: menu.php");
                          }
         
                         }else {
                         
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    mysqli_close($link);
}
?>

<?php
include('header.php');
?>
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="login-form">
                    <h2>Login</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="group-input <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label>Username</label>
                            <input type="text" name="username" placeholder="Register email " class="form-control" value="<?php echo $username; ?>">
                            <span class="help-block"><?php echo $username_err; ?></span>
                        </div>   
                        <div class="group-input<?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                            <span class="help-block"><?php echo $password_err; ?></span>
                        </div>
                        <div class="group-input">
                            <input type="submit" class="site-btn login-btn" value="Login">
                        </div>
                        <p>Don't have an account? <a href="userregister.php">Sign up now</a>.</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
include('footer.php');
?>