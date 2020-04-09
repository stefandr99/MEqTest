<?php 
require_once 'php/config.php';
require_once 'php/db_utils/database_conn.php';

        if(isset($_GET["id"])){
            $pageid = $_GET["id"];
            $quizcontent = '';
            $sql = 'SELECT CONTENT from quizzes where ID_DOCUMENT = :id';
            $stmt = BD::obtine_conexiune()->prepare($sql);
            $stmt -> execute ([
                'id' => $pageid
            ]);
            $quizcontent = $stmt->fetch(PDO::FETCH_ASSOC)['CONTENT'];         
            echo $quizcontent;
        }
        $conexiune_bd = null;
?>