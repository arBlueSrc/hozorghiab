<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="admin/img/favicon.html">

    <title></title>

    <!-- Bootstrap core CSS -->
    <link href="admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="admin/css/style.css" rel="stylesheet">
    <link href="admin/css/style-responsive.css" rel="stylesheet" />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-body">

    <div class="container">

 <form class="form-signin" id="forgetForm" style="display:none" >
        <h2 class="form-signin-heading">همین حالا وارد شوید</h2>
        <div class="login-wrap">
        <input type="text" class="form-control" placeholder="نام کاربری" autofocus id="usernamef">
            <input type="text" class="form-control" placeholder="پست الکترونیکی" autofocus id="email">
          
<input type="text" id="txtCompare1"class="form-control" placeholder="کد امنیتی" /> 
<span class="pull-right" style="color:#E40003; display:none" id="feildCapcha">کد امنیتی نادرست می باشد</span> 
<input type="text" id="txtCaptcha1"  style="text-align: center; border: none; font-weight: bold; font-size: 20px; font-family: Modern" />  
       <input type="button" id="btnrefresh" value="بازیابی" onclick="GenerateCaptcha();" />  
          
     
            <span id="loading" style="display:none"><img  style="z-index:9999; position:absolute; margin-top:-8px; margin-right:110px;" src="/3.gif"></span>
            <button class="btn btn-lg btn-danger btn-block" type="button" id="forgetPassword"  onclick="alert(ValidCaptcha());"  >بازیابی کلمه عبور جدید</button>
 <button class="btn btn-lg btn-success btn-block" type="button"onClick="forgetForm(0)">ورود</button>
        </div>
       </form>


      <form class="form-signin" id="loginForm"  >
        <h2 class="form-signin-heading">همین حالا وارد شوید</h2>
        <div class="login-wrap">
            <input type="text" class="form-control" placeholder="نام کاربری" autofocus id="username">
            <input type="password" class="form-control" placeholder="کلمه عبور" id="password">
          
<input type="text" id="txtCompare"class="form-control" placeholder="کد امنیتی" /> 
<span class="pull-right" style="color:#E40003; display:none" id="feildCapcha">کد امنیتی نادرست می باشد</span> 
<input type="text" id="txtCaptcha"  style="text-align: center; border: none; font-weight: bold; font-size: 20px; font-family: Modern" />  
       <input type="button" id="btnrefresh" value="بازیابی" onclick="GenerateCaptcha();" />  
          
            <label class="checkbox">
                <input type="checkbox" value="remember-me" name="RememberMe"> مرا به خاطر بسپار
                
            </label>   
            <span id="loading" style="display:none"><img  style="z-index:9999; position:absolute; margin-top:-8px; margin-right:110px;" src="/3.gif"></span>
            
            <label ><span class="pull-right"> <a href="#" onClick="forgetForm(1)"> کلمه عبور را فراموش کرده اید؟</a></span></label>
            <button class="btn btn-lg btn-login btn-block" type="button" id="login"  onclick="alert(ValidCaptcha());"  >ورود</button>

        </div>
       </form>
</div>
<script src="jquery-1.11.1.min.js"></script>
<script>
function forgetForm(a){
	if(a==1){
	document.getElementById("loginForm").style.display = "none";
	document.getElementById("forgetForm").style.display = "block";	
	}else{
		document.getElementById("loginForm").style.display = "block";
		document.getElementById("forgetForm").style.display = "none";	
	}
}
function GenerateCaptcha() {
            var chr1 = Math.ceil(Math.random() * 10) + '';
            var chr2 = Math.ceil(Math.random() * 10) + '';
            var chr3 = Math.ceil(Math.random() * 10) + ''; 
            var str = new Array(4).join().replace(/(.|$)/g, function () { 
			return ((Math.random() * 16) | 0).toString(36)[Math.random() < .5? "toString" : "toUpperCase"](); 
			});
            var captchaCode = str + chr1 +  chr2 + chr3;
            document.getElementById("txtCaptcha").value = captchaCode;
			document.getElementById("txtCaptcha1").value = captchaCode;
        }	
 $(document).ready(function (){
	    GenerateCaptcha();
	 $('#login').click(function() {
	  
				 document.getElementById("loading").style.display = "block";
				 document.getElementById("login").disabled = "true";		 
				 var str1 = document.getElementById('txtCaptcha').value;
				 var str2 = document.getElementById('txtCompare').value;
				 if (str1 == str2) 			 
				{		 
					var usernameAdmin = document.getElementById("username").value;
					var password = document.getElementById("password").value;
					var dataString = 'usernameAdmin='+usernameAdmin+'&password='+password;
					$.ajax({
						type: "POST",
						url: "controler/login.php",
						data: dataString,
						cache: false,
						success: function(html)
						{	alert(html);
							if(html == "خوش امدید")
							{			
								 document.getElementById("login").disabled = false;	
								 document.getElementById("username").style.borderColor="#0B9E00";
								 document.getElementById("password").style.borderColor="#0B9E00";
								 document.getElementById("txtCompare").style.borderColor="#0B9E00";
								 window.location="admin/";
							}
							 else
							 {
								 GenerateCaptcha();
								 document.getElementById("login").disabled = false;
								 document.getElementById("username").style.borderColor="#FF0004";
								 document.getElementById("password").style.borderColor="#FF0004";
							 }
						} 
					});
				}
				 else
				 {
						document.getElementById("txtCompare").style.borderColor="#FF0004";
						document.getElementById("txtCompare").focus();
						document.getElementById("feildCapcha").style.display = "block";
						GenerateCaptcha();
						document.getElementById("loading").style.display = "none";
						document.getElementById("login").disabled = false;
				 }
			});
		 });
//forget passwird		 
 $(document).ready(function (){
	 GenerateCaptcha();
	 $('#forgetPassword').click(function() {
				 document.getElementById("loading").style.display = "block";
				 document.getElementById("forgetPassword").disabled = "true";		 
				 var str1 = document.getElementById('txtCaptcha1').value;
				 var str2 = document.getElementById('txtCompare1').value;
				 if (str1 == str2) 			 
				{		 
					var username = document.getElementById("usernamef").value;
					var email = document.getElementById("email").value;
					var dataString = 'username='+username+'&email='+email;
					
					$.ajax({
						type: "POST",
						url: "controler/forget.php",
						data: dataString,
						cache: false,
						success: function(html)
						{	
						alert(html);
							if(html == '1')
							{						
								 GenerateCaptcha();
								 document.getElementById("loading").style.display = "none";
								 document.getElementById("forgetPassword").disabled = false;	
								 document.getElementById("usernamef").style.borderColor="#0B9E00";
								 document.getElementById("email").style.borderColor="#0B9E00";
								 document.getElementById("txtCompare").style.borderColor="#0B9E00";
								 window.location="login.html";
							}
							 else
							 {
								 GenerateCaptcha();
								 document.getElementById("loading").style.display = "none";
								 document.getElementById("forgetPassword").disabled = false;
								 document.getElementById("usernamef").style.borderColor="#FF0004";
								 document.getElementById("email").style.borderColor="#FF0004";
							 }
						} 
					});
				}
				 else
				 {
						document.getElementById("txtCompare").style.borderColor="#FF0004";
						document.getElementById("txtCompare").focus();
						document.getElementById("feildCapcha").style.display = "block";
						GenerateCaptcha();
						document.getElementById("loading").style.display = "none";
						document.getElementById("forgetPassword").disabled = false;
				 }
			});
		 });
		 
</script>
  </body>
</html>
