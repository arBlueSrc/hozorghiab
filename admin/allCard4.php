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


        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />

        <div class="main d-flex justify-content-center">
            <div class="a4"  id="canvas<?php echo $number ?>">

                <div class="sp-line"></div>

                <div class=" sp-mt-2  ">
                    <h3 class="text-black text-bold name"> <?php echo $enc->dec($user['name']); ?> <?php echo $enc->dec($user['family']); ?></h3>
                </div>

                <div class=" sp-mt-2  ">
                    <h3 class="city"> <?php echo $enc->dec($user['city']); ?></h3>
                </div>

                <div class="justify-content-center">
                    <div class="card-qrcode d-flex justify-content-center ">
                        <img id="sourceImage<?php echo $number ?>"  style="display:none;"  crossOrigin="anonymous"
                             src=<?php echo "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://hozor.nasraa.ir/api/checkUser.php?code=" . $user["id"]; ?> />
                        <canvas id="canvasImg<?php echo $number ?>"></canvas>
                     </div>
                    <span class="d-flex justify-content-center sp-title-color-2 mt-last-line"  > این کارت را هنگام حضور به همراه داشته
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
    <?php $number++; } ?>

<script>
    //document.getElementById('save-button').addEventListener('click', function () {
    //    // Create a container for the divs
    //    var container = document.createElement('div');
    //    var size = <?php //echo json_encode($size); ?>//;
    //
    //    for (let i = 1; i <= size; i++) {
    //        container.appendChild(document.getElementById('canvas'+((i).toString())).cloneNode(true));
    //    }
    //
    //
    //    // Append this container to the body (it won't be visible)
    //    document.body.appendChild(container);
    //
    //    html2canvas(container).then(function (canvas) {
    //        // Remove the container
    //        document.body.removeChild(container);
    //
    //        // Create a link and set the image as the href
    //        var link = document.createElement('a');
    //        link.href = canvas.toDataURL("image/png");
    //        link.download = 'div-image.png';
    //        document.body.appendChild(link);
    //        link.click();
    //        document.body.removeChild(link);
    //    });
    //});

    document.getElementById('save-button').onclick = function() {

        var size = <?php echo json_encode($size); ?>//;

        const divIds = []; // Add your div IDs here
         // Add your div IDs here

        for (let i = 1; i <= size; i++) {
            divIds.push(('canvas'+((i).toString())));
          }

        const zip = new JSZip();
        const promises = [];

        divIds.forEach(divId => {

            var delayInMilliseconds = 1000; //1 second

            setTimeout(function() {
                //your code to be executed after 1 second
                const divElement = document.getElementById(divId);
                promises.push(
                    html2canvas(divElement).then(canvas => {
                        // Convert canvas to data URL
                        const imgData = canvas.toDataURL('image/png');

                        // Send image data to the server
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "../saveImages.php", true);
                        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                        xhr.onload = function() {
                            if (xhr.status === 200) {
                                // alert("Image saved successfully!");
                            } else {
                                //   alert("Error saving image.");
                            }
                        };
                        xhr.send("image=" + encodeURIComponent(imgData));
                        // Add image to zip
                        // zip.file(`${divId}.png`, imgData.split(',')[1], { base64: true }); // Save the image as a base64 string
                    })
                );
            }, delayInMilliseconds);


        });

        // Promise.all(promises).then(() => {
        //     // Generate the zip file
        //     zip.generateAsync({ type: 'blob' }).then(content => {
        //         // Trigger file download
        //         saveAs(content, 'divs.zip');
        //     });
        // });

    };

    $(document).ready(function() {
        // Your code to run since DOM is loaded and ready
        const imgIds = [];
        var size = <?php echo json_encode($size); ?>//;
        for (let i = 1; i <= size; i++) {
            imgIds.push(((i).toString()));
        }
        imgIds.forEach(imgIds => {
            document.getElementById('sourceImage'+imgIds).onload = function() {
                // Get the image element

                const img = document.getElementById('sourceImage'+imgIds);

                // Create a canvas and set its size
                const canvas = document.getElementById('canvasImg'+imgIds);
                canvas.width = img.width;
                canvas.height = img.height;

                // Draw the image onto the canvas
                const ctx = canvas.getContext('2d');
                ctx.drawImage(img, 0, 0);

                // Convert canvas to JPG
                const jpgDataUrl = canvas.toDataURL('image/jpeg');
            };
        });
    });



</script>


</body>



</html>