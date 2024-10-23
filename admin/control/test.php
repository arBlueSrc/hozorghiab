<!-- <?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../../config/config.php");
include("hozor/insertClass.php");
include ("hozor/updateClass.php");
include("select.php");
include "../security/enc.php";

$insert = new Insert;
$dbase = new DataBase;
$update = new Update;
$fetch = new Select;
$enc = new CipherSecurity();


$all_user = $fetch->User2("DESC", "0", "500000", "");

foreach ($all_user as $user) {
    
    $name = $enc->enc($user['national_code']);
    $family = $enc->enc($user['name']);
    $national_code = $enc->enc($user['family']);
    $id = $user['id'];

    // echo $id."\n";
    // echo $name."\n";
    // echo $family."\n";
    // echo $national_code."\n";

    // echo $user['name']."\n";
    // echo $user['family']."\n";
    // echo $user['national_code']."\n";


    $a = array(":nameUser" => $name, ":family" => $family, ":national_code" => $national_code, ":id" => $id);
    $update->updateUser($a);
} -->


