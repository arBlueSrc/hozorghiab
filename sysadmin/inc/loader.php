<?php
if(!isset($_SESSION))
{
    session_start();ob_start();
}
if($_SESSION['admin_log_true'] !== true)
{
    header("location:../login.php");
}else{
    include ("../config/config.php");
    include ("../class/security.php");
    include ("control/select.php");
    include ("../class/jdf.php");
    $fetch = new Select;
    $sec = new security;
}
?>