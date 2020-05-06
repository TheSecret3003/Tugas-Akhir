<?php
$name = $_POST["name"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$address = $_POST["address"];
$phone_number = $_POST["phone_number"];
$image = "../img/book.jpg";

include 'dbh.inc.php';

$tabel = "user";
$sql = "INSERT INTO " . $tabel . " (email, password, address, username, name, phone_number, image) VALUES ('" .
    $email . "','" .
    $password ."','" .
    $address . "','" .
    $username . "','" .
    $name . "','" .
    $phone_number . "','" .
    $image . "')";

echo ($sql);
$result = $conn->query($sql);

if ($result) {
    $sql = "SELECT * FROM user WHERE username='" . $username . "'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    include 'set_cookie.php';
}
else {
    header("Location: ../register.php?login=failAddingDataToDB");
    exit();
}
?>