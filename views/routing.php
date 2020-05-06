
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "ta";

    // Create connection
    $db = new mysqli($servername, $username, $password, $db);

    // Check connection
    if (mysqli_connect_error()) {
        die("Database connection failed: " . mysqli_connect_error());
    }
?>