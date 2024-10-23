<?php
if(!isset($_SESSION))
{
    session_start();ob_start();
}
include ("../../../config/config.php");
include ("../../../class/security.php");
include ("updateClass.php");
include ("../select.php");
include('../../security/enc.php');

$enc = new CipherSecurity();
$select = new Select;
$update = new Update;
$sec = new security;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    if(isset($_POST['update-user']))
    {
        $national_code = $enc->enc($_POST['national_code']);
        $name = $enc->enc($_POST['name']);
        $family = $enc->enc($sec->check_post($_POST['family']));
        $id = $sec->check_post($_POST['id']);

        $a = array(":nameUser"=>$name,":family"=>$family,":national_code"=>$national_code, ":id"=>$id);
        $update->updateUser($a);

        header("location:../../users-list.php?info=100");
    }

    if(isset($_POST['update-user-2']))
    {
        $national_code = $_POST['national_code'];
        $name = $_POST['name'];
        $family = $sec->check_post($_POST['family']);
        $id = $sec->check_post($_POST['id']);

        $a = array(":nameUser"=>$name,":family"=>$family,":national_code"=>$national_code, ":id"=>$id);
        $update->updateUser($a);

    }

}

?>