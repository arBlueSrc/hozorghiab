<!DOCTYPE html>
<html lang="fa">


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
            width: 120px;
            border-radius: 40px;
            bottom: 50%;
            transform: translate(0%, 15%);
            margin-top: 7mm;
            margin-right: 8mm;
        }

        #front {
            background-image: url("../assets/images/hc.png");
            background-size: cover;
            width: 90mm;
            height: 54mm;
            border-radius: 4px;
            margin: 0 5px;
            box-shadow: 0 0 15px #000;

        }

        .business-hor {
            display: flex;
            align-items: center;
            justify-content: space-around;
            height: 100vh;
            flex-wrap: wrap;
            position: relative;
            margin: 0 10px;
        }

    </style>
</head>


<?php include("inc/loader.php");
include('security/enc.php');
$enc = new CipherSecurity();
$students = $fetch->getAssignedUser("DESC", "0", "500000", "`course`=" . $_POST['course-id']);

foreach ($students as $row) {
    $users = $fetch->oneUser($row['student']);
    $user = $users[0];
    ?>
        <div class="row" id="front" style="margin-top: 6mm">
            <div class="col-6">
                <img class="qrcode-img"
                     src=<?php echo "https://chart.googleapis.com/chart?chs=120x120&cht=qr&chl=https://hozor.nasraa.ir/api/checkUser.php?code='" . $user["id"] . "'&choe=UTF-8"; ?>
                     title="welcome"/>
            </div>
            <div class="col-6">
                <p class="qrcode-img" style="margin-top: 17mm">
                    <b style="color: black">
                        <?php echo $enc->dec($user['name']) . " " . $enc->dec($user['family']); ?>
                    </b>
                </p>

                <p style="color: black; font-size: 12px; margin-right: 7mm">
                    <?php echo "کدملی : " . $enc->dec($user['national_code']); ?>
                </p>
            </div>
        </div>

<?php } ?>


</body>

</html>