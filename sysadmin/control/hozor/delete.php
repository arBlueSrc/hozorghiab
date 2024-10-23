<?php
if(!isset($_SESSION))
{
    session_start();ob_start();
}
include("../../../config/config.php");
include("../../../class/security.php");
include("deleteClass.php");
include("../select.php");
$select = new Select;
$delete = new Delete;
$sec = new security;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

	if (isset($_GET['del-admin'])) {
		$id = intval($_GET['del-admin']);
		$a = array(":id" => $id);
		$delete->DelAdmin($a);
		header("location:../../users-list.php?info=100");
	}
}
?>