<?php


session_start();
ob_start();
include("../config/config.php");
include("../class/security.php");
include("insertClass.php");
include("select.php");
include("../class/jdf.php");

$select = new Select;
$insert = new Insert;
$sec = new security;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST['ChangePasswordUser'])) {

		$OldPass = $sec->check_post($_POST['old-password']);
		$Pass = $sec->check_post($_POST['new-password']);
		$Pass2 = $sec->check_post($_POST['new-password2']);
		$id_user = intval($_SESSION['user_id']);
		if ($Pass != $Pass2) {
			header("location:/?account=-3");
			return (false);
			exit();
		} else {

			$pass = $select->HashPassword($Pass);
			$a1 = array(":password" => $pass);
			$w1 = "`id`='" . $id_user . "'";
			$r = $insert->Update_Users_Password($a1, $w1);
			header("location:/?account=100");
		}
	}
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

	if (isset($_GET['code'])) {

		$code = $sec->check_get($_POST['code']);
		$class = $sec->check_get($_POST['class']);

		$a1 = array(":code" => $code, ":class" => $class);
		$r = $insert->insert_present($a1);
		header("location:/");

	}

}
