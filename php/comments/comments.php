<?php
session_start();

require_once __DIR__ . "/../config.php";
require_once "MComment.php";
require_once "VComment.php";
require_once "CComment.php";


$controller = "CComment";
$actiune = null;
if (isset($_POST["actiune"])) $actiune = $_POST["actiune"];
    
if ($actiune == "Post Comment"){
    if(isset($_SESSION["userid"]) && $_SESSION["loggedin"] === true){
        $parametri = array(1, $_SESSION["userid"], $_POST["comment"]);
        $control = new $controller("adaugaComment", $parametri);
        unset($_POST);
        header("Location: ".$_SERVER['PHP_SELF']);
    } else{
        header("location: login.php");
        unset($_POST);
    }
    
}

$control = new $controller("afiseazaComments", array(1));

$conexiune_bd = null;

?>