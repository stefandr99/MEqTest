<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: userAccount/login.php");
    exit;
}
else {
    $now = time(); // Checking the time now when home page starts.

    if ($now > $_SESSION['expire']) {
        session_destroy();
        echo "Your session has expired! <a href='http://localhost/MEq/php/userAccount/login.php'>Login again here.</a>";
    }
    else {
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site. THIS IS JUST A TEST PAGE</h1>
    </div>
    <p>
        <a href="userAccount/reset.php" class="btn btn-warning">Reset Your Password</a>
        <a href="userAccount/logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
</body>
</html>

    <?php } }?>