<?php
if (isset($_POST['image'])) {
    $data = $_POST['image'];

    // Remove the "data:image/png;base64," part
    $data = str_replace('data:image/png;base64,', '', $data);
    $data = str_replace(' ', '+', $data);

    // Decode the base64 data
    $data = base64_decode($data);

    // Define the path where you want to save the image
    $filePath = 'images/captured_image_' . time() . rand(1000000,9999999) . '.png'; // Ensure the 'images' folder exists

    // Save the file to the designated path
    if (file_put_contents($filePath, $data)) {
        echo "Image saved successfully at " . $filePath;
    } else {
        echo "Failed to save image.";
    }
} else {
    echo "No image data received.";
}
?>