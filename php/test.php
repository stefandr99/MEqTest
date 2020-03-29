<?php
//connection example
$dbc = @mysqli_connect('localhost', 'root', '', 'meq')
OR die('error on connect db ' . mysqli_connect_error());

$query = "SELECT * from comments";
$query1 = "INSERT INTO `comments` (`ID_USER`, `ID_DOCUMENT`, `TEXT`) VALUES ('123', '555', 'abcasdasd')";

$response = @mysqli_query($dbc, $query1);
$response = @mysqli_query($dbc, $query);
if($response){
	while($row = mysqli_fetch_array($response)){
		echo '<p>' . $row['ID'] . ' ' . $row['ID_USER'] . ' ' . $row['ID_DOCUMENT'] . ' ' . $row['TEXT'] . '</p>';
	}
} else {
	echo 'query didnt work';
	echo mysqli_error($dbc);
}
mysqli_close($dbc);
?>