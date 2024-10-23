<?php 

	// echo "hi";

	session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

    require ("../config/config.php");
    include ("../class/security.php");
    include ("../model/select.php");

    $sec = new security;
    $fetch = new Select();
    
    if(isset($_POST['usernameAdmin']))
    {
          $u = $fetch->CheckPost($_POST['usernameAdmin']);
          $p = $sec->HashPassword($_POST['passwordAdmin']);
          $r = $fetch->check_login_admin($u, $p);

         if($r === 2)
         {
            echo "کاربر گرامی، خوش آمدید.";
         }else if($r === 1){
            echo "مدیر اصلی، خوش آمدید.";
         }else{
            echo "نام کاربری یا رمز عبور اشتباه است.";
         }
    }

	 if(isset($_POST['arash']))
    {
         echo "heelo";
    }
?>