<?php
require_once 'php/config.php';
require_once 'CPostContent.php';
require_once 'MPostContent.php';
require_once 'VPostContent.php';

session_start();
$title = $content = null;
if(isset($_POST["docTitle"]))
    $title = $_POST["docTitle"];
if(isset($_POST["docContent"]))
    $content = $_POST["docContent"];

$controller = new CPostContent('insertContent', array($title, $content));
BD::opreste_conexiune();

?>