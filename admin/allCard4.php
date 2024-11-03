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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.qrcode/1.0/jquery.qrcode.min.js"></script>

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

$userIdArray = [];

foreach ($students as $row) {
    $users = $fetch->oneUser($row['student']);
    $user = $users[0];
    array_push($userIdArray,  $user["id"] );
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
                    <div id="qrcode<?php echo $number ?>"></div>
                </div>
                <span class="d-flex justify-content-center sp-title-color-2 mt-last-line"> این کارت را هنگام حضور به همراه داشته
                    باشید</span>
            </div>
        </div>

    </div>


    <?php $number++;
} ?>

<script >
    document.getElementById('save-button').onclick = function () {

        var size = <?php echo json_encode($size); ?>//;


            downloadImages(1, size)


    }


    function downloadImages(divId, size) {
        //your code to be executed after 1 second
        const divElement = document.getElementById('canvas'+divId);
         html2canvas(divElement).then(canvas => {
            // Convert canvas to data URL
            const imgData = canvas.toDataURL('image/png');

            // Send image data to the server
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../saveImages.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onload = function () {
                if (xhr.status === 200) {
                    // alert("Image saved successfully!");
                    console.log(divId + " ok")
                    if (divId <= size){
                        downloadImages(divId+1, size)
                    }
                } else {
                    //   alert("Error saving image.");
                    console.log(divId + " false")
                }
            };
            xhr.send("image=" + encodeURIComponent(imgData));
            // Add image to zip
            // zip.file(`${divId}.png`, imgData.split(',')[1], { base64: true }); // Save the image as a base64 string
        })
    }

    $(document).ready(function () {

        var jsArray = <?php echo json_encode($userIdArray); ?>;
        var number = 1;

        jsArray.forEach(userIds => {

            console.log(userIds)


            var qrcodeData = "https://hozor.nasraa.ir/api/checkUser.php?code=" + userIds + "'"; // Replace with your content
            $("#qrcode"+number).qrcode({
                width: 150,
                height: 150,
                text: qrcodeData
            });

            number++;

        });


    });
</script>


</body>


</html>