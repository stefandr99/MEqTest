<?php
require_once 'php/config.php';
require_once 'php/db_utils/database_conn.php';

$id = $_GET['id'];
$sql = 'SELECT CONTENT from documents where id = :id';
$stmt = BD::obtine_conexiune()->prepare($sql);
$stmt -> execute ([
    'id' => $id
]);
$found = $stmt->fetch(PDO::FETCH_ASSOC)['CONTENT']; 
echo $found;
exit();
?>