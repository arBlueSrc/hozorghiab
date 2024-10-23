<?php
if(!isset($_SESSION))
{
    session_start();ob_start();
}
include ("../../config/config.php");
include ("../../class/security.php");
include ("send_notif_class.php");
include ("../../class/jdf.php");
include("../../model/select.php");

$send_notif = new fcm;
$sec = new security;
$q_b = new query_builder;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{   
    
	if(isset($_POST['send_notification']))
	 {				
	     
	        //get tokens
            $data = [
                "table"=>"firebase_token",
                "colu"=>"token",
            ];
            $token = $q_b->Read($data);
            
	        //send notification
			$title = $sec->check_post($_POST['title']);
            $message = $sec->check_post($_POST['txt']);
            $link = $sec->check_post($_POST['link']);
			$image = $sec->check_post($_POST['image']);
			$android_channel_id = $sec->check_post($_POST['channel']);
			$data = array("link"=>$link);
			
			$send_notif->sendGCM($title,$message,$data,$token,$image,$android_channel_id);
			
			header("location:../send_notif_post.php?info=100");	 	
	}

}
?>