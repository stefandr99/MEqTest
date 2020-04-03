<?php
//Config file for db connection

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'meq');
 
$dbc = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($dbc === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>