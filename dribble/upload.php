<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["myfile"])) {
    $targetDir = "uploads/"; // Specify the directory where you want to save uploaded files
    $targetFile = $targetDir . basename($_FILES["myfile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["myfile"]["tmp_name"]);
    if ($check !== false) {
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
            echo "Sorry, only JPG, JPEG, PNG files are allowed.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($targetFile)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size (optional)
        if ($_FILES["myfile"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Upload file if everything is ok
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $targetFile)) {
                echo "The file " . basename($_FILES["myfile"]["name"]) . " has been uploaded.";
                // You can also save other form data like location here
                $location = $_POST["location"];
                echo "<br>Your location: $location";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
?>
