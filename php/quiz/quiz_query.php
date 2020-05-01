<?php 
require_once __DIR__ . "/../config.php";
require_once __DIR__ . "/../db_utils/database_conn.php";

if(isset($_GET["id"])){
        $pageid = $_GET["id"];
        $quizcontent = '';
        $sql = 'SELECT q.CONTENT, d.NAME from quizzes q join documents d on q.id_document = :id and d.id = :id';
        $stmt = BD::obtine_conexiune()->prepare($sql);
        $stmt -> execute ([
            'id' => $pageid
        ]);
        $quizcontent = $stmt->fetch(PDO::FETCH_ASSOC);         
        echo json_encode($quizcontent);
}
BD::opreste_conexiune();

?>