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

    public function insertDocument($title, $content, $quiz)
    {
        $sql = 'INSERT INTO documents (name, description, content) values (:name, :description, :content)';
        $stmt = BD::obtine_conexiune()->prepare($sql);
        if ($stmt->execute([
            'name' => $title,
            'description' => strtok(strip_tags($content), '.'),
            'content' => $content
        ])) {
            $sql1 = 'SELECT max(id) as maxi from documents';
            $stmt1 = BD::obtine_conexiune()->prepare($sql1);
            $id_document = null;
            if ($stmt1->execute()) {
                $row = $stmt1->fetch(PDO::FETCH_ASSOC);
                $id_document = $row['maxi'];
            }

            $sql2 = 'INSERT INTO quizzes (id_document, quiz_title, content) values (:id_document, "Quiz", :content)';
            $stmt2 = BD::obtine_conexiune()->prepare($sql2);
            if ($stmt2->execute([
                'id_document' => $id_document,
                'content' => $quiz
            ])) {
                header("location: postpage.php?id=" . $row['maxi']);
            }
        }
    }
}
