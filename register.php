<?php
require_once "php/config.php";
require_once "php/utils.php";
 
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
 if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($dbc, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = trim($_POST["username"]);
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        		
        $sql = 'INSERT INTO users (id_user, username, password, created_on) VALUES (?, ?, ?, sysdate())';
        $query = 'select max(id_user) as id from users';
	
		$response = @mysqli_query($dbc, $query);
		$row = mysqli_fetch_array($response);
		
		$newid = $row['id'] + 1;
		
        if($stmt = mysqli_prepare($dbc, $sql)){
            mysqli_stmt_bind_param($stmt, 'iss', $newid, $param_username, $param_password);
            
            $param_username = $username;
			
			      //Creates a password hash. This php function generates salt too.
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            
            if(mysqli_stmt_execute($stmt)){
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    mysqli_close($dbc);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>

  <link rel="stylesheet" href="css/style_signup.css">
</head>
<body>
  <div class="login-container">
    <h1>Sign Up</h1>
    <form action="" method="post">
      <p>Username</p>
      <input type="text" name="username" placeholder="Enter Username" required="required">
      <span class="help-block"><?php echo $username_err; ?></span>
      <p>Password</p>
      <input type="password" name="password" placeholder="Enter Password" required="required">
      <span style="font-size:10px; color: red;" class="help-block"><?php echo $password_err; ?></span>
      <p>Confirm your Password</p>
      <input type="password" name="confirm_password" placeholder="Confirm Password" required="required">
      <span class="help-block"><?php echo $confirm_password_err; ?></span>

      <input type="submit" name="" value="Sign Up">
      <a href="login.php">Already have an account?</a>
    </form>
  </div>
</body>
</html>