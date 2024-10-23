
<?php

include ("../config/config.php");
include ("../class/security.php");
include ("../model/select.php");
include ("../class/jdf.php");
$fetch = new Select;
$sec = new security;

$result["classes"]=$fetch->classes("DESC", "0", "500000", "");

echo json_encode($result);