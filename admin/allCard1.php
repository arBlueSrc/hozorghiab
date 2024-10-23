<!DOCTYPE html>
<html lang="en">

<head>
    <title>print</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="cards/card1/css/bootstrap.rtl.css">
    <link rel="stylesheet" href="cards/card1/css/style.css">
    <link rel="stylesheet" href="cards/card1/css/all.min.css">
    <script src="cards/card1/js/jquery.min.js"></script>
    <script src="cards/card1/js/bootstrap.min.js"></script>
    <script src="cards/card1/js/all.min.js"></script>
</head>

<body>
    <?php

    include("inc/loader.php");
    include('security/enc.php');

    $enc = new CipherSecurity();
    $students = $fetch->getAssignedUser("DESC", "0", "500000", "`course`=" . $_POST['course-id']);

    foreach ($students as $row) {
        $users = $fetch->oneUser($row['student']);
        $user = $users[0];
    ?>

        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />

        <div class="d-flex justify-content-center">
            <div class="a4 text-color-white ">
                <h1 class="text-bold m-3 sp-mt-1 d-flex justify-content-center">کارت شناسایی
                    <div class="card-profile d-flex justify-content-center ">
                        <div class="img-border">
                            <img class="profile-img w-100 h-100 " src="dist/images/logo.png">
                        </div>
                    </div>
                </h1>

                <div class="sp-line"></div>
                <div class=" sp-mt-2 d-flex justify-content-center ">
                    <h3 class="sp-title-color text-bold"> <span class="text-light me-5">نام: </span><?php echo $enc->dec($user['name']); ?></h3>
                </div>
                <div class="mt-4 d-flex justify-content-center ">
                    <h3 class="sp-title-color text-bold"> <span class="text-light me-5">نام خانوادگی: </span><?php echo $enc->dec($user['family']); ?></h3>
                </div>

                <div class="justify-content-center">
                    <div class="card-qrcode img-border d-flex justify-content-center sp-mt-3 mb-2">
                        <img class="qr-img w-100 h-100" src=<?php echo "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=https://hozor.nasraa.ir/api/checkUser.php?code='" . $user["id"] . "'&choe=UTF-8"; ?> title="welcome" />
                    </div>
                    <span class="d-flex justify-content-center sp-title-color-2"> این کارت را هنگام حضور به همراه داشته
                        باشید</span>
                </div>
            </div>
        </div>


        <!-- <style>
            .bottom-three {
                margin-bottom: 20cm;
            }
        </style>

        <div class="bottom-three"></div> -->
    <?php } ?>




</body>

</html>