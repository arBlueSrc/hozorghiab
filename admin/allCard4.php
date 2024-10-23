<!DOCTYPE html>
<?php
header('Access-Control-Allow-Origin: *');

?>
<html lang="fa">

<head>


    <title>print 4</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="cards/card4/css/bootstrap.rtl.css">
    <link rel="stylesheet" href="cards/card4/css/style.css">
    <link rel="stylesheet" href="cards/card4/css/all.min.css">
    <script src="cards/card4/js/jquery.min.js"></script>
    <script src="cards/card4/js/bootstrap.min.js"></script>
    <script src="cards/card4/js/all.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@latest/dist/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

</head>

<body>


<button id="save-button">Download as Image</button>

<?php

include("inc/loader.php");
include('security/enc.php');


$enc = new CipherSecurity();
$students = $fetch->getAssignedUser("DESC", "0", "500000", "`course`=" . $_POST['course-id']);

$size = sizeof($students);

$number = 1;


foreach ($students as $row) {
    $users = $fetch->oneUser($row['student']);
    $user = $users[0];
    ?>


    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>

    <div class="main d-flex justify-content-center">
        <div class="a4" id="canvas<?php echo $number ?>">

            <div class="sp-line"></div>

            <div class=" sp-mt-2  ">
                <h3 class="text-black text-bold name"> <?php echo $enc->dec($user['name']); ?> <?php echo $enc->dec($user['family']); ?></h3>
            </div>

            <div class=" sp-mt-2  ">
                <h3 class="city"> <?php echo $enc->dec($user['city']); ?></h3>
            </div>

            <div class="justify-content-center">
                <div class="card-qrcode d-flex justify-content-center ">
                    <img id="sourceImage<?php echo $number ?>" style="display:none;" crossOrigin="anonymous"
                         src=<?php echo "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://hozor.nasraa.ir/api/checkUser.php?code=" . $user["id"] . "'"; ?>/>
                    <canvas id="canvasImg<?php echo $number ?>"></canvas>
                </div>
                <span class="d-flex justify-content-center sp-title-color-2 mt-last-line"> این کارت را هنگام حضور به همراه داشته
                    باشید</span>
            </div>
        </div>

    </div>


    <?php $number++;
} ?>

<script src="allCard4.js"></script>


</body>


</html>