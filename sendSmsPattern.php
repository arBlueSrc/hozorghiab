<?php
    class SMS 
    {
        public function SendSms($number, $code)
    	{
    		$client = new SoapClient("http://ippanel.com/class/sms/wsdlservice/server.php?wsdl");
        	$user = "09178459003"; 
        	$pass = "4220296451"; 
        	$fromNum = "+983000505"; 
        	$toNum = array($number); 
        	$pattern_code = "wgooh05zay"; 
        	$input_data = array( "verification-code" => $code); 
        
        	$client->sendPatternSms($fromNum,$toNum,$user,$pass,$pattern_code,$input_data);

        	return "sms sended";
    	}
    	

    }
?>