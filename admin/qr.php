<!DOCTYPE html>
<html lang="fa">

<head>
    <title>چاپ qrcode</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="dist/vendors/bootstrap/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="dist/css/stylePrint.css">
    <style>
        .A4 {
            width: 21cm;
            height: 297mm;
            background: unset;
            margin: 10mm auto;
            background: white;
            box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
        }

        .card {
            width: 21cm;
            height: 297mm;
            float: left;
            border: 1px solid #fff;
            margin: 2px;
        }

        .sp-box-1 {
            overflow: hidden;
            display: inline-block !important;
            position: relative;
            width: 21cm;
            background: rgb(25, 64, 143);
            height: 297mm;
            -webkit-print-color-adjust: exact;
            color-adjust: exact;
        }

        .logo-1 {
            width: 160px;
            border-radius: 40px;
        }

        .text-extrabold h3 {
            font-size: 36px;
        }

        .profile-img {
            width: 190px;
            height: 190px;
        }

        h5.blod {
            font-size: 34px;
        }

        .sp-margin-1 {
            margin-left: 284px;
            height: 320px;
        }

        .container-fluid {
            padding: 0
        }

        .qrcode-box {
            background: unset;
            width: auto;
            border-radius: unset;
        }

        .qrcode-img {
            width: 300px;
            border-radius: 40px;
        }
    </style>
</head>

<!--<div class="qrcode-box">-->
<!---->
<!--    --><?php //include("inc/loader.php"); ?>
<!--    --><?php //include('..\vendor\chillerlan\php-qrcode\src\QRCode.php'); ?>
<!--    --><?php //$users = $fetch->oneUser($_GET['userId']);
//    $user = $users[0];
//
//    echo "../vendor/autoload.php";
//
//    require __DIR__ . "../vendor/autoload.php";
//
////    \BaconQrCode\Encoder\QrCode::png('https://github.com/drbiko/php-qr-code', false, "test", 10, 0);
//
//    ?>
<!--    <!--                                <img class="qrcode-img"-->-->
<!--    <!--                                    src=-->--><?php ////echo "https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl=https://hozor.nasraa.ir/api/checkUser.php?code='".$user["id"]."'&choe=UTF-8";?>
<!--    <!--                                    title="welcome" />-->-->
<!--    -->
<!--    -->
<!--</div>-->

<div class="qrcode-box">

    <?php include("inc/loader.php"); ?>
    <?php $users = $fetch->oneUser($_GET['userId']);
    $user = $users[0];


    //    \BaconQrCode\Encoder\QrCode::png('https://github.com/drbiko/php-qr-code', false, "test", 10, 0);

    ?>
    <img class="qrcode-img"
         src=<?php echo "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://hozor.nasraa.ir/api/checkUser.php?code='" . $user["id"]; ?> />
</div>


</body>

</html>