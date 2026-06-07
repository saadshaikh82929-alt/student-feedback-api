<?php
$host = "acela.proxy.rlwy.net";
$port = 37604;
$user = "root";
$password = "UhymfkmzylVDFBuZyrLjKOTcXIrztdbR";
$database = "railway";

$conn = new mysqli($host, $user, $password, $database, $port);

if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Connection failed: " . $conn->connect_error]));
}
?>
