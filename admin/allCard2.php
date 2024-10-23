<!DOCTYPE html>
<html lang="en">

<head>
    <title>print</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="cards/card2/css/bootstrap.rtl.css">
    <link rel="stylesheet" href="cards/card2/css/style.css">
    <link rel="stylesheet" href="cards/card2/css/all.min.css">
    <script src="cards/card2/js/jquery.min.js"></script>
    <script src="cards/card2/js/bootstrap.min.js"></script>
    <script src="cards/card2/js/all.min.js"></script>
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

        <div class="main d-flex justify-content-center">
        <div class="a4 text-color-white justify-content-center">
            <img class="position-absolute w-100 " src="cards/card2/img/shape.png">
            <img class="card-background position-absolute w-100" src="cards/card2/img/img1.png">
            <div class="d-flex justify-content-center">
                <h1 class="text-bold w-100 m-3 sp-mt-1 d-flex justify-content-center position-absolute sp-title-color-3">کارت شناسایی </h1>
                <div class="card-profile d-flex justify-content-center mx-auto">
                    <div class="img-border-2 mx-auto">
                        <img class="profile-img w-100 h-100 mx-auto " src="dist/images/logo.png">
                    </div>
                </div>
            </div>


            <div class=" sp-mt-2 d-flex justify-content-center ">
                <h2 class="text-shadow text-bold"><span class=" me-5 sp-color-1">نام: </span><?php echo $enc->dec($user['name']); ?></h2>
            </div>
            <div class="mt-4 d-flex justify-content-center ">
                <h2 class="text-shadow text-bold"><span class=" me-5 sp-color-1">نام خانوادگی: </span><?php echo $enc->dec($user['family']); ?></h2>
            </div>

            <div class="justify-content-center">
                <div class="card-qrcode img-border d-flex justify-content-center sp-mt-3 mb-2">
                    <img class="qr-img w-100 h-100" src=<?php echo "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=https://hozor.nasraa.ir/api/checkUser.php?code='" . $user["id"] . "'&choe=UTF-8"; ?> title="welcome" />
                </div>
                <span class="d-flex justify-content-center sp-title-color-2"> این کارت را هنگام حضور به همراه داشته باشید</span>
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