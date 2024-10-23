<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(!isset($_SESSION))
{
    session_start();ob_start();
}
include("../../../config/config.php");
include("../../../class/security.php");
include("insertClass.php");
include("../select.php");
include("../../../class/jdf.php");
include('../../security/enc.php');

$enc = new CipherSecurity();
$select = new Select;
$insert = new Insert;
$sec = new security;

require '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


if (isset($_POST['save-user'])) {

    if(!isset($_SESSION))
    {
        session_start();ob_start();
    }

    $id = $_SESSION['admin_log_id'];
    $name = $sec->check_post($_POST['name']);
    $username = $sec->check_post($_POST['username']);
    $password = md5($_POST['password']);

    $a = array(":name" => $name, ":email" => $username, ":password" => $password, ":user_type" => "2", ":parent_user" => "0");
    $insert->insert_user($a);
    header("location:../../users-list.php");
}

