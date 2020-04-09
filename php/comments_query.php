<?php
require_once "config.php"; //db connection is $dbc

$query = 'SELECT USERNAME, IMAGE_PATH, TEXT from comments c join users u on u.id_user = c.id_user where ID_DOCUMENT = 555';

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