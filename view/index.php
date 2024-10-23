<?php
if(!isset($_SESSION))
{
    session_start();ob_start();
}
include ("config/config.php");include "model/select.php"; $fetch = new Select; ?><!DOCTYPE html>
<html lang="en">
<head>
    <title>الاسرار </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="view/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="view/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="view/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="view/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="view/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="view/vendor/select2/select2.min.css">

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="view/css/util.css">
    <link rel="stylesheet" type="text/css" href="view/css/main.css">
    <link rel="stylesheet" type="text/css" href="view/css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="view/css/select-css.css">
    <!-- The core Firebase JS SDK is always required and must be listed first -->

</head>
<body>

<div class="limiter">




    <img src="view/images/1.png" class="bg-tahzib">
    <div class="container-login100" >

        <div class="menu-mobile-panel" id="menu-mobile-panel">

            <div class="" style="margin: 100px 10px 0px 10px;">

                <button class="login100-form-btn" id="btnM-1" onClick="ShowPageM(1);">
                    كتيب
                </button>

                <button class="login100-form-btn" id="btnM-2" onClick="ShowPageM(2);">
                    ابراج الزواج
                </button>

                <button class="login100-form-btn" id="btnM-3" onClick="ShowPageM(3);">
                    أبجد استخارة
                </button>

                <button class="login100-form-btn" id="btnM-4" onClick="ShowPageM(4);">
                    شرط غائب
                </button>
                <button class="login100-form-btn" id="btnM-5" onClick="ShowPageM(5);">
                    شراكة بين شخصين
                </button>
                <button class="login100-form-btn" id="btnM-6" onClick="ShowPageM(6);">
                    تلبية الحاجة
                </button>
                <button class="login100-form-btn" id="btnM-7" onClick="ShowPageM(7);">
                    وقت الموت
                </button>
                <button class="login100-form-btn" id="btnM-8" onClick="ShowPageM(8);">
                    الإقامة في مکان معین
                </button>

                <button class="login100-form-btn" id="btnM-9" onClick="ShowPageM(9);">
                    اسم التوأم
                </button>
                <button class="login100-form-btn" id="btnM-10" onClick="ShowPageM(10);">
                    تفاصیل الإسم
                </button>


            </div>

        </div>
        <a href="#" id="menu-mobile" class="menu-mobile" onclick="MobileMenuOpen();"><img src="view/images/btn-close.png" ></a>


        <div class="show-modal" tabindex="-1" id="show-register">
            <button type="button" class="btn btn-danger" onclick="closeLoginForm()" style="margin: 0px 0px 10px 350px;"><i class="fa fa-close" ></i></button>
            <div class="wrap-input100 validate-input" >
                <span class="">Email :</span>
                <input  maxlength="23" class="input100" type="email" id="email" autocomplete="off" style="background-color: #0e0f12;border:2px solid #ffcb2e;padding: 15px">
            </div>
            <div class="wrap-input100 validate-input" >
                <span class="" >Password : </span>
                <input  maxlength="23" class="input100" type="password" id="password" autocomplete="off" style="background-color: #0e0f12;border:2px solid #ffcb2e;padding: 15px">
            </div>
            <div class="wrap-input100 validate-input" align="center" >
                <button class="btn btn-success font-ar" onclick="SaveData()"  value="" type="button">استمر وادفع</button>
            </div>
            <div class="wrap-input100 validate-input" align="center" >
               <button onclick="GoogleSignIn()" class="golden-btn" style="width: 200px">Signin Google</button>
            </div>
        </div>
        <script src="https://www.gstatic.com/firebasejs/7.15.5/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.15.5/firebase-auth.js"></script>

        <script>
            // Your web app's Firebase configuration
            var firebaseConfig = {
                apiKey: "AIzaSyA2_7bZRWfaiiR3yGvEe_3PMj_8rRnxYDg",
                authDomain: "alasraar-296fd.firebaseapp.com",
                databaseURL: "https://alasraar-296fd.firebaseio.com",
                projectId: "alasraar-296fd",
                storageBucket: "alasraar-296fd.appspot.com",

                messagingSenderId: "971326432243",
                appId: "1:971326432243:web:9741bd98697a4b7739a886",
                measurementId: "G-KG5L67TTGP"
            };
            firebase.initializeApp(firebaseConfig);
            var provider = new firebase.auth.GoogleAuthProvider();
            function  GoogleSignIn()
            {

                firebase.auth().signInWithPopup(provider).then(function(user) {
                    console.log(user);
                    if (user) {
                        alert("h");
                        let displayName = user.displayName;
                        let email = user.email;
                        let dataStringUser = 'save-data-user-email='+email+"&save-data-user-password=&gender=&bd-day=&bd-m=&bd-y=&name="+displayName;

                        $.ajax({
                            url: "ajax.php",
                            data: dataStringUser,
                            type : "post",
                            success : function (html) {

                            }
                        })

                    } else {

                    }


                }).catch(function(err) {
                    console.log("err")
                });

            }



        </script>

        <img src="view/images/2.png" class="tahzib-img">
        <div class="wrap-login100">

            <div class="model-result" id="modal-result">

                <b id="rrrrrr" style="color:rgba(255,255,255,1.00);text-align: justify;margin-top: 50px"></b>



            </div>

            <form class="login100-form validate-form">

                <div id="page-1">
                    <span class="login100-form-title">کتیب</span>

                    <div class="wrap-input100 validate-input" style="text-align:center;" >

                        <div>
                            <label>
                                <span class="text-light font-ar">مونث</span>
                                <input  maxlength="23" type="radio" class="option-input radio" value="2" id="txtValSarketab-2" name="example" />

                            </label>
                            <label>
                                <span class="text-light font-ar">مذکر</span>
                                <input  maxlength="23" type="radio" class="option-input radio" value="1" id="txtValSarketab-1" name="example" />

                            </label>

                        </div>
                    </div>

                    <div class="wrap-input100 validate-input" >

                        <input  maxlength="23" type="number" class="select-date-year" id="txtValSarketab-3" placeholder="سال" style="" minlength="4" min="1300" maxlength="4" max="1600">

                        <select style="" class="select-date" id="txtValSarketab-4">
                            <option value="" selected>الشهر</option>
                            <?php $m=1;while($m <= 12){ ?>
                                <option value="<?php echo $m; ?>"><?php echo $m; ?></option>
                                <?php $m++;} ?>
                        </select>

                        <select style="" class="select-date" id="txtValSarketab-5">
                            <option value="0" selected>الیوم</option>
                            <?php $d=1;while($d <= 30){ ?>
                                <option value="<?php echo $d; ?>"><?php echo $d; ?></option>
                                <?php $d++;} ?>
                        </select>

                    </div>

                    <div class="wrap-input100 validate-input" >
                        <input  maxlength="23" class="input100" type="text" id="BoyName" maxlength="23" placeholder="نام پسر" onKeyUp="AbjadConvert(this.value,1);"  autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<b id="txt-1"></b>
							<input  maxlength="23" type="hidden" id="txtVal-1">
						</span>
                    </div>

                    <div class="wrap-input100 validate-input" >
                        <input  maxlength="23" class="input100" type="text" id="BoymamName"  placeholder="نام مادر پسر"  onKeyUp="AbjadConvert(this.value,2);" autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<b id="txt-2"></b>
							<input  maxlength="23" type="hidden" id="txtVal-2">
						</span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" style="height: 50px" onClick="calculationSarketab();" type="button" >
                            طالع بینی
                        </button>
                    </div>

                </div>

                <div id="page-2" style="display: none">



					<span class="login100-form-title">
						ابراج الزواج
					</span>

                    <div class="wrap-input100 validate-input" >
                        <input  maxlength="23" class="input100" type="text" id="txtMarriage-3" placeholder="نام پسر" onKeyUp="AbjadConvert(this.value,3);"  autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<b id="txt-3"></b>
							<input  maxlength="23" type="hidden" id="txtVal-3">
						</span>
                    </div>

                    <div class="wrap-input100 validate-input" >
                        <input  maxlength="23" class="input100" type="text" id="txtMarriage-4"  placeholder="نام مادر پسر"  onKeyUp="AbjadConvert(this.value,4);" autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<b id="txt-4"></b>
							<input  maxlength="23" type="hidden" id="txtVal-4">
						</span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <input  maxlength="23" class="input100" type="text" id="txtMarriage-5" placeholder="نام دختر" onKeyUp="AbjadConvert(this.value,5);" autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<b id="txt-5"></b>
							<input  maxlength="23" type="hidden" id="txtVal-5">
						</span>
                    </div>


                    <div class="wrap-input100 validate-input" >
                        <input  maxlength="23" class="input100" type="text" id="txtMarriage-6" placeholder="نام مادر دختر" onKeyUp="AbjadConvert(this.value,6);" autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<b id="txt-6"></b>
							<input  maxlength="23" type="hidden" id="txtVal-6">
						</span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" style="height: 50px" onclick="calculationMarriage()">
                            طالع بینی
                        </button>
                    </div>

                </div>

                <div id="page-3" style="display: none;text-align: center;padding: 7px;" align="center">
            <span class="login100-form-title">
						ابجد استخاره
            </span>

                    <div class="box-raund">
                        <input  maxlength="23" type="search" id="txtVal-7" value="" readonly="" class="input-raund">
                    </div>

                    <div class="box-raund">
                        <input  maxlength="23" type="search" id="txtVal-8" value="" readonly="" class="input-raund">
                    </div>

                    <div class="box-raund">
                        <input  maxlength="23" type="search" id="txtVal-9" value="" readonly="" class="input-raund">
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" style="height: 50px" onclick="RaundomAbjad()" id="btn-click-estekhare">
                            کلیک گن
                        </button>
                        <button class="login100-form-btn" style="height: 50px;display: none;" id="btn-estekhare" onclick="calculationMarriage()">
                            طالع بینی
                        </button>
                    </div>

                </div>

                <div id="page-4" style="display: none">



					<span class="login100-form-title">
						شرط الغائب
					</span>

                    <div class="wrap-input100 validate-input" >
                        <input  maxlength="23" class="input100" type="text" id="txtAbsent-3" placeholder="نام غائب" onKeyUp="AbjadConvert(this.value,10);"  autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<b id="txt-10"></b>
							<input  maxlength="23" type="hidden" id="txtVal-10">
						</span>
                    </div>

                    <div class="wrap-input100 validate-input" >
                        <input  maxlength="23" class="input100" type="text" id="txtAbsent-4"  placeholder="نام مادر غائب"  onKeyUp="AbjadConvert(this.value,11);" autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<b id="txt-11"></b>
							<input  maxlength="23" type="hidden" id="txtVal-11">
						</span>
                    </div>


                    <div class="wrap-input100 validate-input" >
                        <select class="select-date" id="txtVal-12" style="width: 100%;direction: rtl;text-align: right; padding: 2px 20px 2px 6px">
                            <?php foreach($fetch->Week() as $week){ ?>
                                <option value="<?php echo $week['id']; ?>"> <?php echo $week['title']; ?></option>
                            <?php } ?>
                        </select>
                        <span class="focus-input100"></span>

                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" style="height: 50px" onclick="calculationAbsentStatus()">
                            طالع بینی
                        </button>
                    </div>

                </div>

                <div id="page-5" style="display: none">



					<span class="login100-form-title">
					 شراكة بين شخصين
					</span>

                    <div class="wrap-input100 validate-input" >
                        <input  maxlength="23" class="input100" type="text" id="Partnership-13" placeholder="نام شخص الاول" onKeyUp="AbjadConvert(this.value,13);"  autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<b id="txt-13"></b>
							<input  maxlength="23" type="hidden" id="txtVal-13">
						</span>
                    </div>

                    <div class="wrap-input100 validate-input" >
                        <input  maxlength="23" class="input100" type="text" id="Partnership-14"  placeholder="نام شخص الثانی"  onKeyUp="AbjadConvert(this.value,14);" autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<b id="txt-14"></b>
							<input  maxlength="23" type="hidden" id="txtVal-14">
						</span>
                    </div>




                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" style="height: 50px" onclick="calculationPartnership()">
                            طالع بینی
                        </button>
                    </div>

                </div>

                <div id="page-6" style="display: none">



					<span class="login100-form-title">
					  تلبية الحاجة
					</span>

                    <div class="wrap-input100 validate-input" >
                        <input  maxlength="23" class="input100" type="text" id="Need-15" placeholder="نام شخص الاول" onKeyUp="AbjadConvert(this.value,15);"  autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<b id="txt-15"></b>
							<input  maxlength="23" type="hidden" id="txtVal-15">
						</span>
                    </div>

                    <div class="wrap-input100 validate-input" >
                        <input  maxlength="23" class="input100" type="text" id="Need-16"  placeholder="نام شخص الثانی"  onKeyUp="AbjadConvert(this.value,16);" autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<b id="txt-16"></b>
							<input  maxlength="23" type="hidden" id="txtVal-16">
						</span>
                    </div>
                    <div class="wrap-input100 validate-input" >
                        <input  maxlength="23" class="input100" type="text" id="Need-17"  placeholder="نام الحاجت"  onKeyUp="AbjadConvert(this.value,17);" autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<b id="txt-17"></b>
							<input  maxlength="23" type="hidden" id="txtVal-17">
						</span>
                    </div>




                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" style="height: 50px" onclick="calculationNeed()">
                            طالع بینی
                        </button>
                    </div>

                </div>

                <div id="page-7" style="display: none">



					<span class="login100-form-title">
					 وقت الموت
					</span>

                    <div class="wrap-input100 validate-input" >
                        <input  maxlength="23" class="input100" type="text" id="Need-18" placeholder="نام پسر" onKeyUp="AbjadConvert(this.value,18);"  autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<b id="txt-18"></b>
							<input  maxlength="23" type="hidden" id="txtVal-18">
						</span>
                    </div>

                    <div class="wrap-input100 validate-input" >
                        <input  maxlength="23" class="input100" type="text" id="Need-19"  placeholder="نام مادر پسر "  onKeyUp="AbjadConvert(this.value,19);" autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<b id="txt-19"></b>
							<input  maxlength="23" type="hidden" id="txtVal-19">
						</span>
                    </div>
                    <div class="wrap-input100 validate-input" >
                        <input  maxlength="23" class="input100" type="text" id="Need-20"  placeholder="نام دختر"  onKeyUp="AbjadConvert(this.value,20);" autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<b id="txt-20"></b>
							<input  maxlength="23" type="hidden" id="txtVal-20">
						</span>
                    </div>
                    <div class="wrap-input100 validate-input" >
                        <input  maxlength="23" class="input100" type="text" id="Need-21"  placeholder="نام مادر دختر"  onKeyUp="AbjadConvert(this.value,21);" autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<b id="txt-21"></b>
							<input  maxlength="23" type="hidden" id="txtVal-21">
						</span>
                    </div>




                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" style="height: 50px" onclick="calculationDeath()">
                            طالع بینی
                        </button>
                    </div>

                </div>

                <div id="page-8" style="display: none">

					<span class="login100-form-title">
					 الإقامة في المنطقة
					</span>

                    <div class="wrap-input100 validate-input" >
                        <input  maxlength="23" class="input100" type="text" id="Location-22" placeholder="اسم خود" onKeyUp="AbjadConvert(this.value,22);"  autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<b id="txt-22"></b>
							<input  maxlength="23" type="hidden" id="txtVal-22">
						</span>
                    </div>

                    <div class="wrap-input100 validate-input" >
                        <input  maxlength="23" class="input100" type="text" id="Location-19"  placeholder="نام مادر پسر "  onKeyUp="AbjadConvert(this.value,23);" autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<b id="txt-23"></b>
							<input  maxlength="23" type="hidden" id="txtVal-23">
						</span>
                    </div>
                    <div class="wrap-input100 validate-input" >
                        <input  maxlength="23" class="input100" type="text" id="Location-24"  placeholder="اسم محل اقامت"  onKeyUp="AbjadConvert(this.value,24);" autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<b id="txt-24"></b>
							<input  maxlength="23" type="hidden" id="txtVal-24">
						</span>
                    </div>





                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" style="height: 50px" onclick="calculationLocation()">
                            طالع بینی
                        </button>
                    </div>

                </div>

                <div id="page-9" style="display: none">

					<span class="login100-form-title">
					 اسم التوأم
					</span>

                    <div class="wrap-input100 validate-input" >
                        <input  maxlength="23" class="input100" type="text" id="Twin-25" placeholder="اسم خود" onKeyUp="AbjadConvert(this.value,25);"  autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<b id="txt-25"></b>
							<input  maxlength="23" type="hidden" id="txtVal-25">
						</span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" style="height: 50px" onclick="calculationTwin()">
                            طالع بینی
                        </button>
                    </div>

                </div>

                <div id="page-10" style="display: none">

					<span class="login100-form-title">
					  تغيير الاسم
					</span>

                    <div class="wrap-input100 validate-input" >
                        <input  maxlength="23" class="input100" type="text" id="ChangeName-26" placeholder="اسم خود" onKeyUp="AbjadConvert(this.value,26);"  autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<b id="txt-26"></b>
							<input  maxlength="23" type="hidden" id="txtVal-26">
						</span>
                    </div>

                    <div class="wrap-input100 validate-input" >
                        <input  maxlength="23" class="input100" type="text" id="ChangeName-27" placeholder="اسم مادر" onKeyUp="AbjadConvert(this.value,27);"  autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<b id="txt-27"></b>
							<input  maxlength="23" type="hidden" id="txtVal-27">
						</span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" style="height: 50px" onclick="calculationChangeName()">
                            طالع بینی
                        </button>
                    </div>

                </div>

            </form>
            <div class="login100-pic js-tilt" data-tilt>

                <button class="login100-form-btn" id="btn-1" onClick="ShowPage(1);">
                    كتيب
                </button>

                <button class="login100-form-btn" id="btn-2" onClick="ShowPage(2);">
                    ابراج الزواج
                </button>

                <button class="login100-form-btn" id="btn-3" onClick="ShowPage(3);">
                    أبجد استخارة
                </button>

                <button class="login100-form-btn" id="btn-4" onClick="ShowPage(4);">
                    شرط غائب
                </button>
                <button class="login100-form-btn" id="btn-5" onClick="ShowPage(5);">
                    شراكة بين شخصين
                </button>
                <button class="login100-form-btn" id="btn-6" onClick="ShowPage(6);">
                    تلبية الحاجة
                </button>
                <button class="login100-form-btn" id="btn-7" onClick="ShowPage(7);">
                    وقت الموت
                </button>
                <button class="login100-form-btn" id="btn-8" onClick="ShowPage(8);">
                    الإقامة في مکان معین
                </button>

                <button class="login100-form-btn" id="btn-9" onClick="ShowPage(9);">
                    اسم التوأم
                </button>
                <button class="login100-form-btn" id="btn-10" onClick="ShowPage(10);">
                    تفاصیل الإسم
                </button>


            </div>
        </div>


        <div class="menu">
            <ul>
                <li><a href="" target="_blank">مدونة الويب</a> </li>
                <li><a href="" target="_blank">اتصل بنا</a> </li>
                <li><a href="" target="_blank"> معلومات عنا</a> </li>
            </ul>
        </div>

    </div>

</div>



<style>
    .show-modal{
        width: 447px;
        min-height: 200px;
        background-color: #fff;
        border: 1px solid #0bb2d4;
        border-radius: 6px;
        z-index: 999999;
        position: fixed;
        display: none;
        margin: 0px auto;
        padding: 30px;
        top: 20%;
    }
</style>



<!--===============================================================================================-->
<script src="view/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="view/js/jquery-ui.js"></script>
<script src="view/js/filter.js"></script>
<script>

    function  ShowModal(id) {
        document.getElementById("show-register").style.display = "block";
    }

function HiddenResultModal() {
    $('#modal-result').toggle("slide", {direction: "right"}, 200);

}
    function MobileMenuOpen()
    {
       $('#menu-mobile-panel').toggle("slide", {direction: "right"}, 200);
    }
    function ShowPageM(a)
    {
        var i=1;
        $("#page-"+a).slideDown();
        for(i=1;i <= 11;i++)
        {
            if(a === i)
            {
                $("#btnM-"+a).addClass("active");
            }
            else{
                $("#page-"+i).slideUp();
                $("#btnM-"+i).removeClass("active");
                document.getElementById("menu-mobile-panel").style.display="none";
            }
        }
    }




    function ShowPage(a)
    {
        var i=1;
        $("#page-"+a).slideDown();
        for(i=1;i <= 11;i++)
        {
            if(a === i)
            {
                $("#btn-"+a).addClass("active");
            }
            else{
                $("#page-"+i).slideUp();
                $("#btn-"+i).removeClass("active");
                document.getElementById("modal-result").style.display="none";
            }
        }

    }


    function AbjadConvert(a,b)
    {
        var dataString = 'Abjad-calculation='+a;
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: dataString,
            cache: false,
            success: function(html)
            {
                document.getElementById("txt-"+b).innerHTML = html;
                document.getElementById("txtVal-"+b).value = html;
            }
        });
    }
    function calculationChangeName()
    {
        var a = document.getElementById("txtVal-26").value;
        var b = document.getElementById("txtVal-27").value;

        if(a.length == 0)
        {
            document.getElementById("ChangeName-26").style.border = "1px solid red";
            return false;
        }
        if(b.length == 0)
        {
            document.getElementById("ChangeName-27").style.border = "1px solid red";
            return false;
        }
        $('#modal-result').toggle("slide", {direction: "left"}, 100);
        var a = parseInt(a);
        var b = parseInt(b);
        var ans = (a+b) % 12;
        if(ans === 0)
            ans =12;
        var dataString = 'ChangeName-result-free='+ans;
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: dataString,
            cache: false,
            success: function(html)
            {
                document.getElementById("rrrrrr").innerHTML = html;

            }
        });
        document.getElementById("rrrrrr").innerHTML=ans;
    }


    function calculationTwin()
    {
        var a = document.getElementById("txtVal-25").value;
        if(a.length === 0)
        {
            document.getElementById("Twin-25").style.border = "1px solid red";
            return false;
        }
        $('#modal-result').toggle("slide", {direction: "left"}, 100);
        var l = a.length;
        var ans = '';
        if(l === 4)
        {
            var t1 = a.substr(0,1);
            var q1 = 1000 * t1;
            var t2 = a.substr(1,1);
            var q2 = 100 * t2;
            var t3 = a.substr(2,1);
            var q3 = 10 * t3;
            var t4 = a.substr(3,1);
            var q4 = 1 * t4;
            var ans = q1+"-"+q2+"-"+q3+"-"+q4;

        }
        if(l === 3)
        {
            var t22 = a.substr(0,1);
            var q22 = 100 * t22;
            var t33 = a.substr(1,1);
            var q33 = 10 * t33;
            var t44 = a.substr(2,1);
            var q44 = 1 * t44;
            var ans = q22+"-"+q33+"-"+q44;
        }
        if(l === 2)
        {
            let t333 = a.substr(0,1);
            var q333 = 10 * t333;
            var t444 = a.substr(1,1);
            var q444 = 1 * t444;
            var ans = q333+"-"+q444;
        }
        if(l === 1) {
            var t45 = a.substr(0, 1);
            var q45 = 1 * t45;
            var ans = q45;
        }
        var dataString = 'Twin-result-free='+ans;
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: dataString,
            cache: false,
            success: function(html)
            {
                document.getElementById("rrrrrr").innerHTML = html;

            }
        });
        //document.getElementById("rrrrrr").innerHTML=ans;
    }


    function calculationLocation()
    {
        var a = document.getElementById("txtVal-22").value;
        var b = document.getElementById("txtVal-23").value;
        var c = document.getElementById("txtVal-24").value;

        if(a.length === 0)
        {
            document.getElementById("Location-22").style.border = "1px solid red";
            return false;
        }
        if(b.length === 0)
        {
            document.getElementById("Location-23").style.border = "1px solid red";
            return false;
        }
        if(c.length === 0)
        {
            document.getElementById("Location-24").style.border = "1px solid red";
            return false;
        }

        $('#modal-result').toggle("slide", {direction: "left"}, 100);
        var a = parseInt(a);
        var b = parseInt(b);
        var c = parseInt(c);

        var ans = (a+b+c+65) % 4;
        if(ans === 0)
            ans =4;
        var dataString = 'Location-result-free='+ans;
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: dataString,
            cache: false,
            success: function(html)
            {
                document.getElementById("rrrrrr").innerHTML = html;

            }
        });
        document.getElementById("rrrrrr").innerHTML=ans;
    }

    function calculationDeath()
    {
        var a = document.getElementById("txtVal-18").value;
        var b = document.getElementById("txtVal-19").value;
        var c = document.getElementById("txtVal-20").value;
        var d = document.getElementById("txtVal-21").value;
        if(a.length === 0)
        {
            document.getElementById("Death-18").style.border = "1px solid red";
            return false;
        }
        if(b.length === 0)
        {
            document.getElementById("Death-19").style.border = "1px solid red";
            return false;
        }
        if(c.length === 0)
        {
            document.getElementById("Death-20").style.border = "1px solid red";
            return false;
        }
        if(d.length === 0)
        {
            document.getElementById("Death-21").style.border = "1px solid red";
            return false;
        }

        $('#modal-result').toggle("slide", {direction: "left"}, 100);
        var a = parseInt(a);
        var b = parseInt(b);
        var c = parseInt(c);
        var d = parseInt(d);

        var ans = (a+b+c+d) % 5;
        ans = ans % 2;
        var dataString = 'Death-result-free='+ans;
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: dataString,
            cache: false,
            success: function(html)
            {
                document.getElementById("rrrrrr").innerHTML = html;

            }
        });
        document.getElementById("rrrrrr").innerHTML=ans;
    }


    function calculationNeed()
    {
        var a = document.getElementById("txtVal-15").value;
        var b = document.getElementById("txtVal-16").value;
        var c = document.getElementById("txtVal-17").value;
        if(a.length === 0)
        {
            document.getElementById("Need-15").style.border = "1px solid red";
            return false;
        }
        if(b.length === 0)
        {
            document.getElementById("Need-16").style.border = "1px solid red";
            return false;
        }
        if(c.length === 0)
        {
            document.getElementById("Need-17").style.border = "1px solid red";
            return false;
        }

        $('#modal-result').toggle("slide", {direction: "left"}, 100);
        var a = parseInt(a);
        var b = parseInt(b);
        var c = parseInt(c);

        var ans = (a+b+c) % 3;
        var dataString = 'Need-result-free='+ans;
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: dataString,
            cache: false,
            success: function(html)
            {
                document.getElementById("rrrrrr").innerHTML = html;

            }
        });
        document.getElementById("rrrrrr").innerHTML=ans;
    }


    function calculationPartnership()
    {
        var a = document.getElementById("txtVal-13").value;
        var b = document.getElementById("txtVal-14").value;
        if(a.length == 0)
        {
            document.getElementById("Partnership-14").style.border = "1px solid red";
            return false;
        }
        if(b.length == 0)
        {
            document.getElementById("Partnership-14").style.border = "1px solid red";
            return false;
        }

        $('#modal-result').toggle("slide", {direction: "left"}, 100);
        var a = parseInt(a);
        var b = parseInt(b);
        var ans = (a+b) % 5;
        if(ans == 0)
            ans = 5;
        var dataString = 'Partnership-result-free='+ans;
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: dataString,
            cache: false,
            success: function(html)
            {
                document.getElementById("rrrrrr").innerHTML = html;

            }
        });
        document.getElementById("rrrrrr").innerHTML=ans;
    }



    function calculationSarketab()
    {
        let gender = 0;
        var a = document.getElementById("txtValSarketab-1").checked;
        var b = document.getElementById("txtValSarketab-2").checked;
        var d = document.getElementById("txtValSarketab-4").value;
        var e = document.getElementById("txtValSarketab-5").value;
        var f = document.getElementById("txtVal-1").value;
        var g = document.getElementById("txtVal-2").value;

        if(a.checked === true)
             gender = 1;
        else if(b.checked === true)  gender =2;

        if(a === false && b === false)
        {
            document.getElementById("txtValSarketab-1").style.border = "2px solid red";
            document.getElementById("txtValSarketab-2").style.border = "2px solid red";
            return false;
        }
        if(e.length === 0)
        {
            document.getElementById("txtValSarketab-5").style.border = "1px solid red";
            return false;
        }
        if(d.length === 0)
        {
            document.getElementById("txtValSarketab-4").style.border = "1px solid red";
            return false;
        }

        if(f.length === 0)
        {
            document.getElementById("BoyName").style.border = "1px solid red";
            return false;
        }
        if(g.length === 0)
        {
            document.getElementById("BoymamName").style.border = "1px solid red";
            return false;
        }
        $('#modal-result').toggle("slide", {direction: "left"}, 100);
        var f = parseInt(f);
        var g = parseInt(g);
        var ans = (f+g) % 12;
        if(ans === 0)
            ans = 12;
        var dataString = 'headbook-result-free='+ans+"&gender="+gender+"&day="+e;
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: dataString,
            cache: false,
            success: function(html)
            {
                document.getElementById("rrrrrr").innerHTML = html;

            }
        });
        document.getElementById("rrrrrr").innerHTML=ans;
    }

    function calculationMarriage()
    {
        var a = document.getElementById("txtVal-3").value;
        var b = document.getElementById("txtVal-4").value;
        var c = document.getElementById("txtVal-5").value;
        var d = document.getElementById("txtVal-6").value;
        if(a.length === 0)
        {
            document.getElementById("txtMarriage-3").style.border = "1px solid red";
            return false;
        }
        if(b.length === 0)
        {
            document.getElementById("txtMarriage-4").style.border = "1px solid red";
            return false;
        }

        if(c.length === 0)
        {
            document.getElementById("txtMarriage-5").style.border = "1px solid red";
            return false;
        }
        if(d.length === 0)
        {
            document.getElementById("txtMarriage-6").style.border = "1px solid red";
            return false;
        }
        $('#modal-result').toggle("slide", {direction: "left"}, 100);
        var a = parseInt(a);
        var b = parseInt(b);
        var c = parseInt(c);
        var d = parseInt(d);
        var ans = (a+b+c+d) % 5;
        var dataString = 'Marriage-result-free='+ans;
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: dataString,
            cache: false,
            success: function(html)
            {
                document.getElementById("rrrrrr").innerHTML = html;
            }
        });
        document.getElementById("rrrrrr").innerHTML=ans;
    }

    function  RaundomAbjad()
    {
        var myArray = new Array();
        myArray[0] = "ا";
        myArray[1] = "ب";
        myArray[2] = "ج";
        myArray[3] = "د";

        var item = myArray[Math.floor(Math.random() * myArray.length)];

        var a =  document.getElementById("txtVal-7").value;
        var b =  document.getElementById("txtVal-8").value;
        var c =  document.getElementById("txtVal-9").value;

        if( a === '')
            document.getElementById("txtVal-7").value=item;

        else if(b === '')
            document.getElementById("txtVal-8").value=item;

        else if(c === '')
        {
            document.getElementById("txtVal-9").value=item;
            document.getElementById("btn-click-estekhare").style.display="none";
            document.getElementById("btn-estekhare").style.display="block";
        }
        var a =  document.getElementById("txtVal-7").value;
        var b =  document.getElementById("txtVal-8").value;
        var c =  document.getElementById("txtVal-9").value;

        if(a !== '' && b !== '' && c !== '')
        {
            var ans= a+" "+b+" "+c;
            var dataString = 'Estekhare-result-free='+ans;
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: dataString,
                cache: false,
                success: function(html)
                {
                    $('#modal-result').toggle("slide", {direction: "left"}, 100);
                    document.getElementById("rrrrrr").innerHTML = html;
                    document.getElementById("txtVal-7").value='';
                    document.getElementById("txtVal-8").value='';
                    document.getElementById("txtVal-9").value='';
                    document.getElementById("btn-click-estekhare").style.display="block";
                    document.getElementById("btn-estekhare").style.display="none";
                }
            });
            document.getElementById("rrrrrr").innerHTML=ans;
        }

    }

    function  calculationAbsentStatus()
    {
        var a = document.getElementById("txtVal-10").value;
        var b = document.getElementById("txtVal-11").value;
        var c = document.getElementById("txtVal-12").value;

        var a = parseInt(a);
        var b = parseInt(b);
        var c = parseInt(c);
        var ans = (a+b+c) % 12;
        if(ans === 0)
            ans = 12;

        var dataString = 'AbsentStatus-result-free='+ans;
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: dataString,
            cache: false,
            success: function(html)
            {
                $('#modal-result').toggle("slide", {direction: "left"}, 100);
                document.getElementById("rrrrrr").innerHTML = html;
            }
        });
        document.getElementById("rrrrrr").innerHTML=ans;


    }

    function calculationAbjadIstikharah()
    {
        var a = document.getElementById("txtVal-3").value;
        var b = document.getElementById("txtVal-4").value;
        var c = document.getElementById("txtVal-5").value;
        if(a.length == 0)
        {
            document.getElementById("txtMarriage-3").style.border = "1px solid red";
            return false;
        }
        if(b.length == 0)
        {
            document.getElementById("txtMarriage-4").style.border = "1px solid red";
            return false;
        }

        if(c.length === 0)
        {
            document.getElementById("txtMarriage-5").style.border = "1px solid red";
            return false;
        }
        $('#modal-result').toggle("slide", {direction: "left"}, 100);
        var a = parseInt(a);
        var b = parseInt(b);
        var c = parseInt(c);
        var ans = (a+b+c+d) % 5;
        var dataString = 'Marriage-result-free='+ans;
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: dataString,
            cache: false
            success: function(html)
            {
                document.getElementById("rrrrrr").innerHTML = html;
            }
        });
        document.getElementById("rrrrrr").innerHTML=ans;
    }







    function closeLoginForm(){
        document.getElementById("show-register").style.display="none";
    }
    function SaveData()
    {
        let gender = 0;
        let password = document.getElementById("password").value;
        let email = document.getElementById("email").value;
        let a = document.getElementById("txtValSarketab-1");
        let b = document.getElementById("txtValSarketab-2");
        let d = document.getElementById("txtValSarketab-4").value;
        let e = document.getElementById("txtValSarketab-5").value;
        let g = document.getElementById("txtValSarketab-3").value;

        if(a.checked === true)
             gender = 1;
        else if(b.checked === true)  gender =2;

        if(email === '')
        {
            document.getElementById("email").style.border="2px solid red";
            document.getElementById("email").focus(); return false;
        }else {document.getElementById("email").style.border="";}
        if(password === '')
        {
            document.getElementById("password").style.border="2px solid red";
            document.getElementById("password").focus();
            return false;
        }else {document.getElementById("password").style.border="";}

        var dataStringUser = 'save-data-user-email='+email+"&save-data-user-password="+password+"&gender="+gender+"&bd-day="+d+"&bd-m="+e+"&bd-y="+g;
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: dataStringUser,
            cache: false,
            success: function(data)
            {
                if(data===true)
                    location.href="view/payment.php";
                else return false;
            }
        });

    }


</script>

<!--===============================================================================================-->
<script src="view/vendor/bootstrap/js/popper.js"></script>
<script src="view/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="view/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="view/vendor/tilt/tilt.jquery.min.js"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>

<!--===============================================================================================-->
<script src="view/js/main.js"></script>
<script src="view/js/sweetalert.min.js"></script>
<?php if(isset($_GET['State']) == "ok") { ?>
    <script>
        swal("شكراً !", "  لك تم الدفع بنجاح", "success");
    </script>
<?php  } ?>

</body>
</html>