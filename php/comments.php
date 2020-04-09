<?php
session_start();

require_once "config.php";
require_once "MComment.php";
require_once "VComment.php";
require_once "CComment.php";


$controller = "CComment";

if (isset($_POST["actiune"])) $actiune = $_POST["actiune"];

if ($actiune == "adaugaComment"){
    $parametri = array(1, 1, $_POST["comment"]);
    $control = new $controller($actiune, $parametri);
}


$control = new $controller("afiseazaComments", array(1));

?>