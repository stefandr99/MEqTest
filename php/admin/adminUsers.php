<?php
require_once __DIR__ . "/../config.php";
require_once "MAdmin.php";
require_once "VAdmin.php";
require_once "CAdmin.php";

$controller = new CAdmin('searchUsers', null, null);

BD::opreste_conexiune();
?>