<!DOCTYPE html>
<html dir="rtl" lang="en">
    <!-- START: Head-->
<head>
        <meta charset="UTF-8">
        <title>سامانه حضور و غیاب</title>
        <link rel="shortcut icon" href="admin/dist/images/favicon.ico" />
        <meta name="viewport" content="width=device-width,initial-scale=1"> 

        <!-- START: Template CSS-->
        <link rel="stylesheet" href="admin/dist/vendors/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="admin/dist/vendors/jquery-ui/jquery-ui.min.css">
        <link rel="stylesheet" href="admin/dist/vendors/jquery-ui/jquery-ui.theme.min.css">
        <link rel="stylesheet" href="admin/dist/vendors/simple-line-icons/css/simple-line-icons.css">
        <link rel="stylesheet" href="admin/dist/vendors/flags-icon/css/flag-icon.min.css">
        <link rel="stylesheet" href="admin/dist/vendors/flag-select/css/flags.css">
        <!-- END Template CSS-->

        <!-- START: Page CSS-->   
        <link rel="stylesheet" href="admin/dist/vendors/social-button/bootstrap-social.css"/>
        <!-- END: Page CSS-->

        <!-- START: Custom CSS-->
        <link rel="stylesheet" href="admin/dist/css/main.css">
        <!-- END: Custom CSS-->
    </head>
    <!-- END Head-->

    <!-- START: Body-->
    <body id="main-container" class="default semi-dark">
        <!-- START: Main Content-->
        <div class="container">
            <div class="row vh-100 justify-content-between align-items-center">
                <div class="col-12">
                    <form action="#" class="row row-eq-height lockscreen  mt-5 mb-5">
                        <div class="lock-image col-12 col-sm-5"></div>
                        <div class="login-form col-12 col-sm-7">
                            <div class="form-group mb-3">
                                <label for="emailaddress">نام کاربری </label>
                                <input class="form-control" type="username" id="username" required="" placeholder="نام کاربری ">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">رمز عبور</label>
                                <input class="form-control" type="password" required="" id="password" placeholder="رمز عبور خود را بنویسید">
                            </div>
                            <div class="input-group mb-3">
                                <label for="password">کد امنیتی</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2"><i class="ti-key"></i></span>
                                </div>
                                <input type="text" id="txtCompare" class="form-control" style="width: 35%" placeholder="Security Key" />
                                <input type="text" id="txtCaptcha"  style="text-align: center; border: none; font-weight: bold; font-size: 20px; font-family: Modern;width: 35%" readonly  disabled />
                                <a type="button" id="btnrefresh"  class="btn" onclick="GenerateCaptcha();" ><i class="ti-reload"></i></a>
                            </div>
                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked="">
                                    <label class="custom-control-label" for="checkbox-signin">مرا به خاطر بسپار</label>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <button class="btn btn-primary" id="login" type="button"> وارد شوید </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- END: Content-->

        <!-- START: Template JS-->
        <script src="admin/dist/vendors/jquery/jquery-3.3.1.min.js"></script>
        <script src="admin/dist/vendors/jquery-ui/jquery-ui.min.js"></script>
        <script src="admin/dist/vendors/moment/moment.js"></script>
        <script>

            function GenerateCaptcha() {
                var chr1 = Math.ceil(Math.random() * 10) + '';
                var chr2 = Math.ceil(Math.random() * 10) + '';
                var chr3 = Math.ceil(Math.random() * 10) + '';
                var str = new Array(4).join().replace(/(.|$)/g, function () {
                    return ((Math.random() * 16) | 0).toString(36)[Math.random() < .5? "toString" : "toUpperCase"]();
                });
                var captchaCode = str + chr1 +  chr2 + chr3;
                document.getElementById("txtCaptcha").value = captchaCode;
            }

            $(document).ready(function (){
                $('#login').click(function() {
                    document.getElementById("login").disabled = "true";
                    var str1 = document.getElementById('txtCaptcha').value;
                    var str2 = document.getElementById('txtCompare').value;

                    //if (str1 === str2)
					if (true)
                    {
                        var usernameAdmin = document.getElementById("username").value;
                        var password = document.getElementById("password").value;
                        var dataString = "usernameAdmin="+usernameAdmin+"&passwordAdmin="+password;
                        $.ajax({
                            type: "POST",
                            url: "control/login.php",
                            data: dataString,
                            cache: false,
                            success: function(html)
                            {
								 alert(html);
                                if(html === "کاربر گرامی، خوش آمدید.")
                                {
                                    document.getElementById("login").disabled = false;
                                    document.getElementById("username").style.borderColor="#0B9E00";
                                    document.getElementById("password").style.borderColor="#0B9E00";
                                    document.getElementById("txtCompare").style.borderColor="#0B9E00";
                                    window.location="admin";
                                }
                                else if(html === "مدیر اصلی، خوش آمدید.")
                                {
                                    document.getElementById("login").disabled = false;
                                    document.getElementById("username").style.borderColor="#FF0004";
                                    document.getElementById("password").style.borderColor="#FF0004";
                                    document.getElementById("txtCompare").style.borderColor="";
                                    window.location="sysadmin";
                                }
                                else if(html !== "خوش امدید")
                                {
                                    document.getElementById("login").disabled = false;
                                    document.getElementById("username").style.borderColor="#FF0004";
                                    document.getElementById("password").style.borderColor="#FF0004";
                                    document.getElementById("txtCompare").style.borderColor="";
                                    GenerateCaptcha();
                                }
                            },
                            error(html){
                                alert(html);
                            }
                        });
                        document.getElementById("login").disabled = false;
                    }
                    else
                    {
                        document.getElementById("txtCompare").style.borderColor="#FF0004";
                        document.getElementById("txtCompare").focus();
                        document.getElementById("txtCompare").value = '';
                        document.getElementById("login").disabled = false;
                        GenerateCaptcha();
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
                    if (str1 === str2)
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
                                if(html === '1')
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
        <script src="admin/dist/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="admin/dist/vendors/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="admin/dist/vendors/flag-select/js/jquery.flagstrap.min.js"></script>
        <!-- END: Template JS-->  
    </body>
    <!-- END: Body-->

</html>
