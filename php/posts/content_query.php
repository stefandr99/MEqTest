<?php
require_once 'php/config.php';
require_once 'php/db_utils/database_conn.php';
session_start();
if(isset($_GET['id'])){
    $_SESSION['currentpageid'] = $_GET['id'];
    $id = $_GET['id'];
    $sql = 'SELECT CONTENT, NAME from documents where id = :id';
    $stmt = BD::obtine_conexiune()->prepare($sql);
    $stmt -> execute ([
        'id' => $id
    ]);
    $found = $stmt->fetch(PDO::FETCH_ASSOC); 
    echo '<div class="title-main">' . $found['NAME'] . '</div><hr class="section-divider-bar">';
    echo $found['CONTENT'];
    echo '<p style="text-align: center; font-size: 30px; margin-top: 2%;">Think you got it? Then try solving the problems! </p>
    <div style="text-align: center; align-content: center;">
        <button class="button-regular" type="button" onclick="window.open(\'quiz.php?id=' . $id . '\');">Practice</button>
    </div>';
}
else {
    header("location: /meq/search.php");
}
?>