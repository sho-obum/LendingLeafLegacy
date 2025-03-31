<?php
header("Content-Type: application/json");

// Capture POST data
$data = $_POST;

// Check required fields
if (empty($data['mobileNumber']) || empty($data['applicationId'])) {
    echo json_encode(["success" => false, "error" => "Missing required fields"]);
    exit;
}

// Simulate saving or processing
$response = [
    "success" => true,
    "message" => "Form received successfully",
    "data" => $data
];

// Optional: Uncomment to enable MySQL saving
/*
$host = "localhost";
$user = "root";
$password = ""; // Default in XAMPP
$dbname = "lendingleaf";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    echo json_encode(["success" => false, "error" => "DB connection failed"]);
    exit;
}

$stmt = $conn->prepare("INSERT INTO applications (fullName, mobile, email, loanAmount, applicationId) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssds", 
    $data['fullName'], 
    $data['mobileNumber'], 
    $data['email'], 
    $data['reqdloanAmount'], 
    $data['applicationId']
);

if ($stmt->execute()) {
    $response['mysql'] = "Data inserted";
} else {
    $response['mysql'] = "Insert failed: " . $stmt->error;
}

$stmt->close();
$conn->close();
*/

echo json_encode($response);
