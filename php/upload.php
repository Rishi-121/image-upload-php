<?php

require './connection.php';

if (isset($_POST['submit'])) {

    if ($mysqli->connect_errno) {
        echo "Failed to connect to database: " . $mysqli->connect_error;
        exit();
    } else {

        $imgDir = "../images";

        $tempName = $_FILES['image']['tmp_name'];
        $imgName = basename($_FILES['image']['name']);

        move_uploaded_file($tempName, "$imgDir/$imgName");

        $insert = " INSERT INTO `image_data`(`image`) VALUES('$imgName') ";

        if ($row = $mysqli->query($insert)) {
?>
            <script>
                alert("Image uploaded!");
                window.open('./fetchImage.php', '_self');
            </script>
<?php
        } else {
            die("Error: " . $mysqli->error);
        }
    }
} else {
    die("Error: " . $mysqli->error);
}
