<?php

header("Content-Type: application/json");



$conn = new mysqli("localhost", "mediaris", "Laksena#1991", "mediaris_partners");

if ($conn->connect_error) {
    echo json_encode(["error" => "Database connection failed: " . $conn->connect_error]);
    exit();
}

// Ensure it's a POST request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["error" => "Only POST method is allowed"]);
    exit();
}


if (!isset($_SERVER['HTTP_ACCESS']) || $_SERVER['HTTP_ACCESS'] !== 'd80ab55f5b7538f146d96f171f7eeefb') {
    echo json_encode(["error" => "Unauthorized access"]);
    exit();
}

// Get POST data
$data = json_decode(file_get_contents("php://input"), true);

// Validate input
if (!isset($data['mobileNumber']) || !isset($data['userId'])) {
    echo json_encode(["error" => "Missing required fields: mobile"]);
    exit();
}


// Sanitize and assign variables
// $fullName = isset($data['fullName']) ? htmlspecialchars(strip_tags($data['fullName'])) : null;
// $mobileNumber = isset($data['mobileNumber']) ? htmlspecialchars(strip_tags($data['mobileNumber'])) : null;
// $email = isset($data['email']) ? htmlspecialchars(strip_tags($data['email'])) : null;
// $reqdloanAmount = isset($data['reqdloanAmount']) ? htmlspecialchars(strip_tags($data['reqdloanAmount'])) : null;
// $dateOfBirth = isset($data['dateOfBirth']) ? htmlspecialchars(strip_tags($data['dateOfBirth'])) : null;
// $formState = isset($data['formState']) ? htmlspecialchars(strip_tags($data['formState'])) : null;

// $propertyType = isset($data['propertyType']) ? htmlspecialchars(strip_tags($data['propertyType'])) : null;
// $employmentType = isset($data['employmentType']) ? htmlspecialchars(strip_tags($data['employmentType'])) : null;

// $netMonthlyIncome = isset($data['netMonthlyIncome']) ? htmlspecialchars(strip_tags($data['netMonthlyIncome'])) : null;
// $oldloanTenure = isset($data['oldloanTenure']) ? htmlspecialchars(strip_tags($data['oldloanTenure'])) : null;
// $isVerified = isset($data['isVerified']) ? htmlspecialchars(strip_tags($data['isVerified'])) : null;

// $residencePincode = isset($data['residencePincode']) ? htmlspecialchars(strip_tags($data['residencePincode'])) : null;
// $currentEmployer = isset($data['currentEmployer']) ? htmlspecialchars(strip_tags($data['currentEmployer'])) : null;
// $workEmail = isset($data['workEmail']) ? htmlspecialchars(strip_tags($data['workEmail'])) : null;
// $yearsOfExperience = isset($data['yearsOfExperience']) ? htmlspecialchars(strip_tags($data['yearsOfExperience'])) : null;

// $annualTurnover = isset($data['annualTurnover']) ? htmlspecialchars(strip_tags($data['annualTurnover'])) : null;
// $businessType = isset($data['businessType']) ? htmlspecialchars(strip_tags($data['businessType'])) : null;
// $businessPincode = isset($data['businessPincode']) ? htmlspecialchars(strip_tags($data['businessPincode'])) : null;
// $yearsInBusiness = isset($data['yearsInBusiness']) ? htmlspecialchars(strip_tags($data['yearsInBusiness'])) : null;

// $annualReceipts = isset($data['annualReceipts']) ? htmlspecialchars(strip_tags($data['annualReceipts'])) : null;
// $profession = isset($data['profession']) ? htmlspecialchars(strip_tags($data['profession'])) : null;
// $officePincode = isset($data['officePincode']) ? htmlspecialchars(strip_tags($data['officePincode'])) : null;
// $loanTenure = isset($data['loanTenure']) ? htmlspecialchars(strip_tags($data['loanTenure'])) : null;
// $yearsOfPractice = isset($data['yearsOfPractice']) ? htmlspecialchars(strip_tags($data['yearsOfPractice'])) : null;
// $propertyAddress = isset($data['propertyAddress']) ? htmlspecialchars(strip_tags($data['propertyAddress'])) : null;
// $propertyCity = isset($data['propertyCity']) ? htmlspecialchars(strip_tags($data['propertyCity'])) : null;
// $propertyPincode = isset($data['propertyPincode']) ? htmlspecialchars(strip_tags($data['propertyPincode'])) : null;
// $termsAccepted = isset($data['termsAccepted']) ? htmlspecialchars(strip_tags($data['termsAccepted'])) : null;

$fields = [
    'person' => isset($data['fullName']) ? htmlspecialchars(strip_tags($data['fullName'])) : null,
    'u_id' => isset($data['userId']) ? htmlspecialchars(strip_tags($data['userId'])) : null,
    'mobile' => isset($data['mobileNumber']) ? htmlspecialchars(strip_tags($data['mobileNumber'])) : null,
    'email' => isset($data['email']) ? htmlspecialchars(strip_tags($data['email'])) : null,
    'requiredLoanAmount' => isset($data['reqdloanAmount']) ? htmlspecialchars(strip_tags($data['reqdloanAmount'])) : null,
    'dob' => isset($data['dateOfBirth']) ? htmlspecialchars(strip_tags($data['dateOfBirth'])) : null,
    'formState' => isset($data['formState']) ? htmlspecialchars(strip_tags($data['formState'])) : null,
    'propertyType' => isset($data['propertyType']) ? htmlspecialchars(strip_tags($data['propertyType'])) : null,
    'occupation' => isset($data['employmentType']) ? htmlspecialchars(strip_tags($data['employmentType'])) : null,
    'netMonthlySalary' => isset($data['netMonthlyIncome']) ? htmlspecialchars(strip_tags($data['netMonthlyIncome'])) : null,
    'oldloanTenure' => isset($data['oldloanTenure']) ? htmlspecialchars(strip_tags($data['oldloanTenure'])) : null,
    'otp_verify' => isset($data['isVerified']) ? (htmlspecialchars(strip_tags($data['isVerified'])) == true ? 1 : 0) : null,
    'pinCode' => isset($data['residencePincode']) ? htmlspecialchars(strip_tags($data['residencePincode'])) : null,
    'currentEmployer' => isset($data['currentEmployer']) ? htmlspecialchars(strip_tags($data['currentEmployer'])) : null,
    'workEmail' => isset($data['workEmail']) ? htmlspecialchars(strip_tags($data['workEmail'])) : null,
    'yearsOfExperience' => isset($data['yearsOfExperience']) ? htmlspecialchars(strip_tags($data['yearsOfExperience'])) : null,
    'annualTurnover' => isset($data['annualTurnover']) ? htmlspecialchars(strip_tags($data['annualTurnover'])) : null,
    'businessType' => isset($data['businessType']) ? htmlspecialchars(strip_tags($data['businessType'])) : null,
    'businessPincode' => isset($data['businessPincode']) ? htmlspecialchars(strip_tags($data['businessPincode'])) : null,
    'yearsInBusiness' => isset($data['yearsInBusiness']) ? htmlspecialchars(strip_tags($data['yearsInBusiness'])) : null,
    'annualReceipts' => isset($data['annualReceipts']) ? htmlspecialchars(strip_tags($data['annualReceipts'])) : null,
    'profession' => isset($data['profession']) ? htmlspecialchars(strip_tags($data['profession'])) : null,
    'officePincode' => isset($data['officePincode']) ? htmlspecialchars(strip_tags($data['officePincode'])) : null,
    'loanTenure' => isset($data['loanTenure']) ? htmlspecialchars(strip_tags($data['loanTenure'])) : null,
    'yearsOfPractice' => isset($data['yearsOfPractice']) ? htmlspecialchars(strip_tags($data['yearsOfPractice'])) : null,
    'propertyAddress' => isset($data['propertyAddress']) ? htmlspecialchars(strip_tags($data['propertyAddress'])) : null,
    'propertyCity' => isset($data['propertyCity']) ? htmlspecialchars(strip_tags($data['propertyCity'])) : null,
    'propertyPincode' => isset($data['propertyPincode']) ? htmlspecialchars(strip_tags($data['propertyPincode'])) : null,
    'termsAccepted' => isset($data['termsAccepted']) ? htmlspecialchars(strip_tags($data['termsAccepted'])) : null,
    'created_at'=>date("Y-m-d H:i:s")
];

// Filter out null fields
$fields = array_filter($fields, function($value) {
    return !is_null($value);
});

if (isset($fields['u_id'])) {
    $u_id = $fields['u_id'];
    $checkStmt = $conn->prepare("SELECT COUNT(*) FROM bajajfinservleads WHERE u_id = ? AND mobile = ?");
    $checkStmt->bind_param("ss", $u_id, $fields['mobile']);
    $checkStmt->execute();
    $checkStmt->bind_result($count);
    $checkStmt->fetch();
    $checkStmt->close();

    if ($count > 0) {
        $updateFields = implode(", ", array_map(fn($key) => "$key = ?", array_keys($fields)));
        $updateStmt = $conn->prepare("UPDATE bajajfinservleads SET $updateFields WHERE u_id = ?");

        if ($updateStmt) {
            $types = str_repeat("s", count($fields)) . "s";
            $values = array_merge(array_values($fields), [$u_id]);
            $updateStmt->bind_param($types, ...$values);

            if ($updateStmt->execute()) {
                echo json_encode(["success" => true, "message"=>"Data updated successfully"]);
            } else {
                echo json_encode(["error" => true, "message"=>"Server error"]);
            }

            $updateStmt->close();
        }
        $conn->close();
        exit();
    }
}


// Insert new record
if (count($fields) > 0) {
    $columns = implode(", ", array_keys($fields));
    $placeholders = implode(", ", array_fill(0, count($fields), '?'));

    $stmt = $conn->prepare("INSERT INTO bajajfinservleads ($columns) VALUES ($placeholders)");

    if ($stmt) {
        $types = str_repeat("s", count($fields));
        $values = array_values($fields);
        $stmt->bind_param($types, ...$values);

        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message"=>"Data inserted successfully"]);
        } else {
            echo json_encode(["error" => true, "message"=>"Server error".$stmt->error]);
        }

        $stmt->close();
    }
}

$conn->close();

?>

