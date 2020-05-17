<?php
require_once __DIR__ . "/../db_utils/database_conn.php";

class MAdmin {
    public function showDocuments() {
        $sql = 'SELECT d.ID, d.NAME, d.DESCRIPTION from documents d WHERE d.PUBLIC = 0';
        $stmt = BD::obtine_conexiune()->prepare($sql);
        $stmt -> execute ();
        return $stmt;
    }

    public function handleDocument($decision, $idDoc) {
        if($decision === 'accepted') {
            $sql = 'UPDATE documents d  SET d.PUBLIC = 1 WHERE d.ID = ' . $idDoc;
            $stmt = BD::obtine_conexiune()->prepare($sql);
            $stmt -> execute ();

        }
        elseif ($decision === 'refused') {
            $sql = 'DELETE FROM documents WHERE ID = ' . $idDoc;
            $stmt = BD::obtine_conexiune()->prepare($sql);
            $stmt -> execute ();
        }
    }

}
