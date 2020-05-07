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

    public function insertDocument($title, $content) {
        $sql = 'INSERT INTO documents (name, description, content) values (:name, :description, :content)';
        $stmt = BD::obtine_conexiune()->prepare($sql);
        if($stmt -> execute ([
            'name' => $title,
            'description' => strtok(strip_tags($content), '.'),
            'content' => $content
        ])) {
            $sql = 'SELECT max(id) as maxi from documents';
            $stm = BD::obtine_conexiune()->prepare($sql);
            if($stm -> execute ()) {
                $row = $stm->fetch(PDO::FETCH_ASSOC);
                header("location: postpage.php?id=".$row['maxi']);
            }
        }
    }
}

?>