<?php
require_once "config.php"; //db connection is $dbc

$dbc = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($dbc === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$query = 'SELECT USERNAME, IMAGE_PATH, TEXT from comments c 
			join users u on u.id = c.id_user where ID_DOCUMENT = 1';

$response = @mysqli_query($dbc, $query1);
$response = @mysqli_query($dbc, $query);

if($response){
	while($row = mysqli_fetch_array($response)){
		echo '<div class="comment-imgwrapper"><img src=' . $row["IMAGE_PATH"] . ' alt="img" class="comment-img"/></div>';
		echo '<div class="comment-username">' . $row["USERNAME"] . '</div>';
		echo '<div class="coment-content"><p>' . $row["TEXT"] . '</p></div>';
	}
} else {
	echo 'Query didnt work ';
	echo mysqli_error($dbc);
}
mysqli_close($dbc);
?>