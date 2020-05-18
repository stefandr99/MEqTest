<?php

require_once __DIR__ . "/../config.php";
require_once "MAdmin.php";
require_once "VAdmin.php";
require_once "CAdmin.php";

$decision = $idDoc = null;
if(isset($_GET['decision']) && isset($_GET['id'])) {
    $decision = $_GET['decision'];
    $idDoc = $_GET['id'];
}

$controller = new CAdmin('showDocuments', $decision, $idDoc);

BD::opreste_conexiune();
?>
