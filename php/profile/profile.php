<?php
require_once __DIR__ . "/../config.php";
require_once "MProfile.php";
require_once "VProfile.php";
require_once "CProfile.php";

  session_start();
  $controller = new CProfile();
  $controller->showProfileInfo($_SESSION['userid']);

  BD::opreste_conexiune();
?>