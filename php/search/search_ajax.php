<?php
require_once '../config.php';
require_once '../db_utils/database_conn.php';

$postTitle = $_GET['title'];
$startFrom = $_GET['page'];

$username = trim(htmlspecialchars($postTitle));
$startFrom = filter_var($startFrom, FILTER_VALIDATE_INT);

$like = '%' . strtolower($postTitle) . '%';

$sql = 'SELECT ID, NAME, DESCRIPTION, CREATED_AT from documents where lower(NAME) like :name';
$stmt = BD::obtine_conexiune()->prepare($sql);
$stmt -> execute ([
    'name' => $like
]);
$found = $stmt->fetchAll(PDO::FETCH_ASSOC); 
echo json_encode($found); //this is sent as json to js
exit();

?>