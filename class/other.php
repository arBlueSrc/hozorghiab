<?php
class user
{
	// تابع ارسال ایمیل
	function SendMail()
	{
		require_once('class.phpmailer.php');
		$mail = new PHPMailer(true);
		$mail->IsSMTP();
		try {    
		$mail->Host = "mail.example.com"; // آدرس SMTP سرور شما
	    $mail->SMTPAuth = true;                  // استفاده از SMTP authentication
	    $mail->Username = "yourname@example.com"; // نام کاربری SMTP
		$mail->Password = "************";        // کلمه عبور SMTP
		$mail->AddReplyTo('yourname@example.com', 'Your Name'); // افزودن پاسخ به ارسال کننده
		$mail->AddAddress('username@example.com', 'User Name'); // تنظیم آدرس گیرنده ایمیل
		$mail->SetFrom('yourname@example.com', 'Your Name'); // تنظیم قسمت ارسال کننده ایمیل
		$mail->Subject = 'PHPMailer تست'; // موضوع ایمیل
		$mail->AltBody = 'برنامه شما از این ایمیل پشتیبانی نمی کند، برای دیدن آن، لطفا از برنامه دیگری 		        استفاده نمائید'; // متنی برای کاربرانی که نمی توانند ایمیل را به درستی مشاهده کنند
		$mail->CharSet = 'UTF-8'; // یونیکد برای زبان فارسی
		$mail->ContentType = 'text/html'; // استفاده از html  
		$mail->MsgHTML('<html>
		<body>
		این یک <font color="#CC0000">تست</font> است!
		</body>
		</html>'); // متن پیام به صورت html
		  //$mail->AddAttachment('images/phpmailer.gif'); // ضمیمه کردن فایل
		  $mail->Send(); // ارسال
		  echo "پیام با موفقیت ارسال شد\n";
		} 
		catch (phpmailerException $e) {
			echo $e->errorMessage(); // پیام خطا از phpmailer
		} 
		catch (Exception $e) {
			echo $e->getMessage(); // سایر خطاها
		}
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
 
		//echo(GetIpHost("www.7learn.com"));
}
?>