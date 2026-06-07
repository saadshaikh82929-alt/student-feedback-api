<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

include 'db.php';

$result = $conn->query("SELECT * FROM feedback ORDER BY created_at DESC");

$feedbacks = [];
while ($row = $result->fetch_assoc()) {
    $feedbacks[] = $row;
}

echo json_encode(["success" => true, "feedbacks" => $feedbacks]);

$conn->close();
?>