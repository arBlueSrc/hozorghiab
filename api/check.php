

<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

use EasyJalali\JalaliDate;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include ("../config/config.php");
include ("../class/security.php");
include ("../model/select.php");
include ("../class/jdf.php");

include ("../model/insertClass.php");
include("../model/gregorian_jalali.php");

$fetch = new Select;
$sec = new security;
$insert = new InsertPresent;


$check_exist = $fetch->checkUsersPresent($_GET['code'],$_GET['class']);

if(count($check_exist) > 0){
    $result["result"] = "حضور شما قبلا در این کلاس ثبت شده است";
}else{

    // $classDate = $fetch->classes("DESC",0,1,"`id`=".$_GET['class'])[0];

    // //first check time
    // // jalali_to_gregorian($classDate)

    // $strTime=  $classDate['date']." ".$classDate['end_time'];
    //  echo JalaliDate::fromJalali($jalaliDate, 'Y-d-m H:i:s');
    

    $insert->insert_present($_GET['code'],$_GET['class']);
    $result["result"] = "حضور شما با موفقیت ثبت شد";

}



echo json_encode($result);