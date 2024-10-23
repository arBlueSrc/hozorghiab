<!DOCTYPE html>
<html lang="en">

<head>
    <title>print</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="cards/card3/css/bootstrap.rtl.css">
    <link rel="stylesheet" href="cards/card3/css/style.css">
    <link rel="stylesheet" href="cards/card3/css/all.min.css">
    <script src="cards/card3/js/jquery.min.js"></script>
    <script src="cards/card3/js/bootstrap.min.js"></script>
    <script src="cards/card3/js/all.min.js"></script>
</head>

<body>

    <?php

    include("inc/loader.php");
    include('security/enc.php');
    $enc = new CipherSecurity();

    $users = $fetch->oneUser($_GET['userId']);
    $user = $users[0];
    ?>
    <div class="main d-flex justify-content-center">
        <div class="a4 text-color-white justify-content-center">
            <div class="sp-card">
                <div class="card-profile d-flex justify-content-center mx-auto pt-5">
                    <div class="img-border-2 mx-auto">
                        <img class="profile-img w-100 h-100 mx-auto " src="dist/images/logo.png">
                    </div>
                </div>
                <div class="sp-box-1">
                    <h3 class="text-shadow text-bold"><span class="sp-color-1">نام: </span><?php echo $enc->dec($user['name']); ?></h3>
                    <div class="mt-4 ">
                        <h3 class="text-shadow text-bold"><span class="sp-color-1">نام خانوادگی: </span><?php echo $enc->dec($user['family']); ?></h3>
                    </div>
                </div>
                <div class="justify-content-center">
                    <div class="card-qrcode img-border justify-content-center sp-mt-2 mb-2">
                        <div class="sp-box-2 pt-1">
                            <span class="text-center ">اسکن کنید</span>
                        </div>

                        <img class="qr-img w-100 h-100" src=<?php echo "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=https://hozor.nasraa.ir/api/checkUser.php?code='" . $user["id"] . "'&choe=UTF-8"; ?> title="welcome" />
                    </div>
                </div>
            </div>

        </div>
    </div>


</body>

</html>