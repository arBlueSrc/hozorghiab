<!DOCTYPE html>
<html lang="fa">

<head>
    <title>print</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="dist/vendors/bootstrap/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="dist/css/stylePrint.css">
    <style>
        .A4 {
            width: 21cm;
            height: 296mm;
            background: unset;
            margin: 10mm auto;
            background: white;
            box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
        }

        .card {
            width: 21cm;
            height: 287mm;
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
            height: 287mm;
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
            width: 230px;
            border-radius: 40px;
        }
    </style>
</head>


<?php

include("inc/loader.php");
include('security/enc.php');

$enc = new CipherSecurity();
$students = $fetch->getAssignedUser("DESC", "0", "500000", "`course`=" . $_POST['course-id']);

foreach ($students as $row) { ?>
    <div class="A4">
        <div class="card">
            <div class="main">
                <div class="container-fluid">
                    <div class=" d-flex justify-content-center">
                        <div class="sp-box-1" style="background-image: url('dist/images/pattern1.png');">

                            <?php $users = $fetch->oneUser($row['student']);
                            $user = $users[0];
                            ?>

                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />

                            <div class="d-flex justify-content-center">
                                <div class="qrcode-box">
                                    <img class="qrcode-img" src=<?php echo "https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=https://hozor.nasraa.ir/api/checkUser.php?code='" . $user["id"] . "'&choe=UTF-8"; ?> title="welcome" />
                                </div>
                            </div>

                            <br />
                            <br />
                            <div class="d-flex justify-content-center">
                                <h5 class="blod">نام : <?php echo $enc->dec($user['name']); ?></h5>
                            </div>
                            <div class="d-flex justify-content-center">
                                <h5 class="blod">نام خانوادگی : <?php echo $enc->dec($user['family']); ?></h5>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>


    <style>
        .bottom-three {
            margin-bottom: 18cm;
        }
    </style>

    <div class="bottom-three"></div>
<?php } ?>




</body>

</html>