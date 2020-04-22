<?php 
require_once __DIR__ . "/../db_utils/database_conn.php";

class MPostContent{
    public function getPostContent($id_document){ 
        $sql = 'SELECT CONTENT, NAME from documents where id = :id';
        $stmt = BD::obtine_conexiune()->prepare($sql);
        $stmt -> execute ([
            'id' => $id_document
        ]);
        return $stmt;
    }
}

?>