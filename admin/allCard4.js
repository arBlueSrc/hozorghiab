document.getElementById('save-button').onclick = function () {

    var size = <?php echo json_encode($size); ?>//;


    downloadImages(1, size)


}


function downloadImages(divId, size) {
    //your code to be executed after 1 second
    const divElement = document.getElementById('canvas'+divId);
    console.log(divId);
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
                if (divId <= size){
                    downloadImages(divId+1, size)
                }
            } else {
                //   alert("Error saving image.");
            }
        };
        xhr.send("image=" + encodeURIComponent(imgData));
        // Add image to zip
        // zip.file(`${divId}.png`, imgData.split(',')[1], { base64: true }); // Save the image as a base64 string
    })
}

$(document).ready(function () {
    // Your code to run since DOM is loaded and ready
    const imgIds = [];
    var size = <?php echo json_encode($size); ?>//;
    for (let i = 1; i <= size; i++) {
        imgIds.push((i).toString());
    }


    imgIds.forEach(imgIds => {

        document.getElementById('sourceImage' + imgIds).onload = function () {

            // Get the image element
            const img = document.getElementById('sourceImage' + imgIds);

            // Create a canvas and set its size
            const canvas = document.getElementById('canvasImg' + imgIds);
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