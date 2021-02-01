<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <title>Fetched Image</title>
</head>

<body>
    <?php

    require './connection.php';
    if ($mysqli->connect_errno) {
        echo "Failed to connect to database: " . $mysqli->connect_error;
        exit();
    } else {

        $select = "SELECT * FROM `image_data`";

        $result = $mysqli->query($select);

        while ($row = $result->fetch_assoc()) {
            echo "<img src='../images/" . $row['image'] . "' alt='image' />";
        }
    }

    ?>

    <a href="../index.html">Back to Home</a>
</body>

</html>