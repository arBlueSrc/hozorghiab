<!DOCTYPE html>
<html lang="fa">

<head>

    <title>print</title>
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
    <div class="a4"  id="canvas">

        <div class="sp-line"></div>

        <div class=" sp-mt-2 d-flex justify-content-center ">
            <h3 class="text-black text-bold name"> <?php echo $enc->dec($user['name']); ?> <?php echo $enc->dec($user['family']); ?></h3>
        </div>


        <div class="justify-content-center">
            <div class="card-qrcode d-flex justify-content-center ">
                <img
                        src=<?php echo "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://hozor.nasraa.ir/api/checkUser.php?code='" . $user["id"]; ?>/>
            </div>
            <span class="d-flex justify-content-center sp-title-color-2 mt-last-line"  > این کارت را هنگام حضور به همراه داشته
                    باشید</span>
        </div>
    </div>

</div>

<button id="download">Download as Image</button>



<script>
    document.getElementById('download').addEventListener('click', function() {
        html2canvas(document.getElementById('canvas')).then(function(canvas) {
            // Convert to data URL
            var link = document.createElement('a');
            link.download = 'downloaded-image.png';
            link.href = canvas.toDataURL('image/png');
            link.click();
        });
    });
</script>



</body>

</html>