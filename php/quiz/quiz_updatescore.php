<?php 
require_once __DIR__ . "/../config.php";
require_once __DIR__ . "/../db_utils/database_conn.php";

session_start();

if(isset($_SESSION['loggedin']) && isset($_SESSION["userid"]) && isset($_SESSION['currentpageid'])){
        $sql = 'update users set score = score + 1 where id = :iduser';
        $stmt = BD::obtine_conexiune()->prepare($sql);
        if ($stmt -> execute ([
            'iduser' => $_SESSION["userid"]
        ])){
            //header("location: postpage.php?id=" . $_SESSION['currentpageid']);
        }      
}
BD::opreste_conexiune();

?>