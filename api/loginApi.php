
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include ("../config/config.php");
include ("../model/select.php");

$fetch = new Select;


$result["result"]=$fetch->checkLogin($_GET['user'],$_GET['password']);

echo json_encode($result);