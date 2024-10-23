<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(!isset($_SESSION))
{
    session_start();ob_start();
}

include 'security/enc.php';
include 'control/hozor/updateClass.php';
include '../config/config.php';
include '../class/security.php';
include ('control/select.php');

$update = new Update;
$select = new Select;
$sec = new security;
$enc = new CipherSecurity();

// $name = "arash";

// $encrypted = $enc->enc($name);

// echo $encrypted."\n";

// $decrypter = $enc->dec($encrypted);

// echo $decrypter;


include('inc/loader.php');
$all_user = $fetch->User("DESC", "0", "500000", "");

foreach ($all_user as $user) {
    echo "1";
    $name = $enc->enc($user['national_code']);
    $family = $enc->enc($user['name']);
    $national_code = $enc->enc($user['family']);


    $a = array(":nameUser" => $name, ":family" => $family, ":national_code" => $national_code, ":id" => $id);
    $update->updateUser($a);
}
