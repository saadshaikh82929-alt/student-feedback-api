<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

$student_id = $data['student_id'] ?? '';
$student_name = $data['student_name'] ?? '';
$subject = $data['subject'] ?? '';
$message = $data['message'] ?? '';

if (empty($student_id) || empty($subject) || empty($message)) {
    echo json_encode(["success" => false, "message" => "All fields are required"]);
    exit;
}

$stmt = $conn->prepare("INSERT INTO feedback (student_id, student_name, subject, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("isss", $student_id, $student_name, $subject, $message);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Feedback submitted successfully"]);
} else {
    echo json_encode(["success" => false, "message" => "Failed to submit feedback"]);
}

$stmt->close();
$conn->close();
?>