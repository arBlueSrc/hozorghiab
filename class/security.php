<?php
class security
{
	
	//<font color="red"> تابع چک کردن post</font>
	function check_post($value)
	{
		$Return2 = htmlspecialchars($value);
		$Return3 = stripslashes($Return2);
		$Return4 = htmlentities($Return3);//xss حفاظت در برابر حملات 
		$Return5 = strip_tags($Return4);//xss حفاظت در برابر حملات 
		$Return6 = trim($Return5);
		return $Return6;		
	}
	function check_get($value)
	{
		$Return2 = htmlspecialchars($value);
		$Return3 = stripslashes($Return2);
		$Return4 = htmlentities($Return3);//xss حفاظت در برابر حملات 
		$Return5 = strip_tags($Return4);//xss حفاظت در برابر حملات 
		$Return6 = trim($Return5);
		$Return7 = intval($Return6);
		return $Return7;		
	}
	function safe_redirect($page,$param='')
	{
		$page = htmlspecialchars($page);
		$param = htmlspecialchars($param);

		
		if($param =='')
			header("location:".$page.".php");
		else
			header("location:".$page.".php?".$param."");
	}
	
	function HashPassword($value)
	{
		//return $hash = md5((base64_encode(md5($value.md5($value)))."*&*(jh0955*/bf052|KJ").sha1("#%&^@!jh"));
		return md5($value);
	}
	//تابع بدست آوردن آی پی کاربر
	function GetRealIp()
	{
		if (!empty($_SERVER['HTTP_CLIENT_IP']))
			//check ip from share internet
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
			//to check ip is pass from proxy
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else
			$ip = $_SERVER['REMOTE_ADDR'];
		return $ip;
	}
	 
	//echo(GetRealIp());
	//تابع بدست آوردن آی پی سایت
	function GetIpHost($ip)
	{
    	$ip = gethostbyname($ip);
    	return $ip;
	}
	function Showtext($text)
	{
		return $show=htmlspecialchars_decode(html_entity_decode($text));
	}

}

?>