<?php
require_once 'php/config.php';
require_once 'php/db_utils/database_conn.php';

session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: php/welcome.php");
    exit;
}
 
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
    
    if(empty($username_err) && empty($password_err)){
        $sql = 'SELECT id, username, password FROM users WHERE username = :usrname';
        
        $stmt = BD::obtine_conexiune()->prepare($sql);
        $stmt -> execute ([
                'usrname' => $username
            ]);  
        $array = $stmt->fetch(PDO::FETCH_ASSOC);
        $temp_username = $array['username'];
        $temp_id = $array['id'];
        $temp_pass = $array['password'];
          
        // Check if username exists, if yes then verify password
        if($temp_username != null){                 
            if(password_verify($password, $temp_pass)){
                    session_start();

                    $_SESSION["loggedin"] = true;
                    $_SESSION["userid"] = $temp_id;
                    $_SESSION["username"] = $temp_username;                            

                    header("location: php/welcome.php");
                } else{
                    $password_err = "The password you entered was not valid.";
                }

        } else{
            $username_err = "No account found with that username.";
        }  
    }
    unset($_POST);
    $conexiune_bd = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <link rel="stylesheet" href="css/style_signup.css">
</head>
<body>
  <div class="login-container">
    <h1>Log In</h1>
    <form action="" method="post">
      <p>Username</p>
      <input type="text" name="username" placeholder="Enter Username" required="required">
      <span class="help-block"><?php echo $username_err; ?></span>
      <p>Password</p>
      <input type="password" name="password" placeholder="Enter Password" required="required">
      <span class="help-block"><?php echo $password_err; ?></span>
      <input type="submit" name="" value="Login">
      
      <a href="#">Forgot your password?</a><br>
      <a href="register.php">Don't have an account?</a>
    </form>
  </div>
</body>
</html>