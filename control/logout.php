<?php 

	// echo "hi";

	session_start();

    require ("../config/config.php");
    include ("../class/security.php");
    include ("../model/select.php");

    $sec = new security;
    $fetch = new Select();
    
    if(isset($_GET['logout']))
    {
          $r = $fetch->logout($u, $p);
          header("Location: http://hozor.nasraa.ir/admin");
    }

?>