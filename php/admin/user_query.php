<?php
    require_once '../config.php';
    require_once '../db_utils/database_conn.php';

    $username = null;
    $id = null;

    if(isset($_GET['name']))
        $username = $_GET['name'];
    if(isset($_GET['id']))
        $id = $_GET['id'];
   
    $like = '%' . strtolower(trim(htmlspecialchars($username))) . '%';

    $sql = null;
    $stmt = null;

    if ($username != null && $id != null){
        $sql = 'SELECT ID, USERNAME, IMAGE_PATH, SCORE, ROLE, CREATED_AT from users where USERNAME like :name and id = :id';
        $stmt = BD::obtine_conexiune()->prepare($sql);
        $stmt -> execute ([
        'name' => $like,
        'id' => $id
        ]);
    }
    else if($username != null){
        $sql = 'SELECT ID, USERNAME, IMAGE_PATH, SCORE, ROLE, CREATED_AT from users where USERNAME like :name';
        $stmt = BD::obtine_conexiune()->prepare($sql);
        $stmt -> execute ([
            'name' => $like
        ]);
    }
    else if ($id != null){
        $sql = 'SELECT ID, USERNAME, IMAGE_PATH, SCORE, ROLE, CREATED_AT from users where id = :id';
        $stmt = BD::obtine_conexiune()->prepare($sql);
        $stmt -> execute ([
        'id' => $id
        ]);
    }

    $found = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    echo json_encode($found); //this is sent as json to js/admin/user_ajaxsearch.js
    exit();

?>