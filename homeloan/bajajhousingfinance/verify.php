<?php
header("Content-Type: application/json");
$data = json_decode(file_get_contents("php://input"), true);
$mysqli = new mysqli("localhost", "mediaris", "Laksena#1991", "mediaris_partners");
$date = date('Y-m-d H:i:s');
$mysqli->query("INSERT INTO `test`(`uid`, `res`, `created_at`) VALUES ('11','$phone','$date')");

if (isset($data['phoneNumber'])) {
    $phoneNumber = $data['phoneNumber'];
        $mysqli->query("UPDATE `bajajfinservleads` SET `status`='1' WHERE mobile = '$phone'");
    // TODO: Save phone number to database (if required)
    // Sample success response
    echo json_encode(["success" => true, "message" => "Phone number verified successfully.", "phone" => $phoneNumber]);
} else {
    echo json_encode(["success" => false, "message" => "Invalid request."]);
}
?>

