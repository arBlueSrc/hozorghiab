<?php
if(!isset($_SESSION))
{
    session_start();ob_start();
}
$_SESSION['userLoginStateLog'] == true;
header("location:../index.php?State=ok");
?>