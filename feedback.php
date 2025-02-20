<?php
$servername = "projectformjs";
$name = "root";
$p = "";
$dbname =  "bulka";
$conn = mysqli_connect($servername, $name, $p, $dbname);
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
    }


$username = $_POST['username'];
$useremail = $_POST['email'];

$sql = "INSERT INTO akcii (name, email) VALUES ('$username', '$useremail')";
mysqli_query($conn, $sql);
$conn->close();
?>