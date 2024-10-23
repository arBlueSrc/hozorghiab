<?php
header('Content-Type: text/html; charset=utf-8');
include("config/config.php");
include("model/select.php");
$fetch = new Select;
function strrev_utf8($str) {
    return join("", array_reverse(
        preg_split("//u", $str)
    ));
}
if(isset($_POST['sarketab']))
{
    $a = array();
    foreach($fetch->HeadBook("") as $row)
    {
       array_push($a,$row);
    }
    echo json_encode($a);
}
if(isset($_POST['abjad']))
{
    $a = array();
    foreach($fetch->Abjad("") as $row)
    {
        array_push($a,$row);
    }
    echo json_encode($a);
}
if(isset($_POST['abjad_istikharah']))
{
    $a = array();
    foreach($fetch->Estekhare("") as $row)
    {
        array_push($a,$row);
    }
    echo json_encode($a);
}
if(isset($_POST['absent_status']))
{
    $a = array();
    foreach($fetch->AbsentStatus("") as $row)
    {
        array_push($a,$row);
    }
    echo json_encode($a);
}
if(isset($_POST['changename']))
{
    $a = array();
    foreach($fetch->ChangeName("") as $row)
    {
        array_push($a,$row);
    }
    echo json_encode($a);
}
if(isset($_POST['death']))
{
    $a = array();
    foreach($fetch->Death("") as $row)
    {
        array_push($a,$row);
    }
    echo json_encode($a);
}
if(isset($_POST['location']))
{
    $a = array();
    foreach($fetch->Location("") as $row)
    {
        array_push($a,$row);
    }
    echo json_encode($a);
}
if(isset($_POST['marriage']))
{
    $a = array();
    foreach($fetch->Marriage("") as $row)
    {
        array_push($a,$row);
    }
    echo json_encode($a);
}
if(isset($_POST['need']))
{
    $a = array();
    foreach($fetch->Need("") as $row)
    {
        array_push($a,$row);
    }
    echo json_encode($a);
}
if(isset($_POST['partnership']))
{
    $a = array();
    foreach($fetch->Partnership("") as $row)
    {
        array_push($a,$row);
    }
    echo json_encode($a);
}

if (isset($_POST['mail'])){
   $arr = array();
   $mail = $_POST['mail'];
$pass = $_POST['pass'];

$aa = array(":email"=>$mail);

if($fetch->CountUserEmail($aa) == 0)
{

$bb = array(":email"=>$mail, ":password"=>$pass, ":d"=>0, ":m"=>0, ":y"=>0, ":gender"=>0);
$r = $fetch->InsertUser($bb);
if($r == 1) $arr['message'] ="ok";else $arr['message'] ="no";
}
else
{
$arr['message'] ="ok";
}
   
   $a = array();
   array_push($a , $arr);
   echo json_encode($a);




}
?>