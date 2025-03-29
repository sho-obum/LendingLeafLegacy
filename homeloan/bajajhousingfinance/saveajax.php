<?php
function isAjaxRequest() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
}
// if(!isAjaxRequest()){
//     header('Location: index.php');
//     exit;
// }

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$mysqli = new mysqli("localhost", "mediaris", "Laksena#1991", "mediaris_partners");

header("Content-Type: application/json");
// set charset to UTF-8
error_reporting(1);
$mysqli->set_charset("utf8");
date_default_timezone_set("Asia/Kolkata");
if (isset($_POST) && !empty($_POST) && isset($_POST['save1stStage']) && $_POST['save1stStage'] == '1') {
    $fullName = $_POST['_home_loan_application_web_HomeLoanApplicationWebPortlet_INSTANCE_RlYaoD2bnPpy_fullName'];
    $mobile = $_POST['_home_loan_application_web_HomeLoanApplicationWebPortlet_INSTANCE_RlYaoD2bnPpy_mobileNumber'];
    $occupation = $_POST['_home_loan_application_web_HomeLoanApplicationWebPortlet_INSTANCE_RlYaoD2bnPpy_occupation'];
    $typeOfLoan = $_POST['_home_loan_application_web_HomeLoanApplicationWebPortlet_INSTANCE_RlYaoD2bnPpy_typeOfLoan'];
    $netMonthlySalary = $_POST['_home_loan_application_web_HomeLoanApplicationWebPortlet_INSTANCE_RlYaoD2bnPpy_netMonthlySalary'];
    $pinCode = $_POST['_home_loan_application_web_HomeLoanApplicationWebPortlet_INSTANCE_RlYaoD2bnPpy_pinCode'];
    $requiredLoanAmount = $_POST['_home_loan_application_web_HomeLoanApplicationWebPortlet_INSTANCE_RlYaoD2bnPpy_requiredLoanAmount'];
    $journey = $_POST['_home_loan_application_web_HomeLoanApplicationWebPortlet_INSTANCE_RlYaoD2bnPpy_journey'];
    
    $utm_content = isset($_POST['utm_content']) ? $_POST['utm_content'] : '';
    $utm_campaign = isset($_POST['utm_campaign']) ? $_POST['utm_campaign'] : '';
    $utm_medium = isset($_POST['utm_medium']) ? $_POST['utm_medium'] : '';
    $utm_source = isset($_POST['utm_source']) ? $_POST['utm_source'] : '';

    //mysqli connect method
    // $insert='INSERT INTO bajajfinservleads (person, mobile, status, otp, occupation, typeOfLoan, netMonthlySalary, pinCode, requiredLoanAmount, journey, created_at) VALUES ("'.$fullName.'","'.$mobile.'","'.$occupation.'","'.$typeOfLoan.'","'.$netMonthlySalary.'","'.$pinCode.'","'.$requiredLoanAmount.'", "'.$journey.'", "'.date("Y-m-d H:s:i").'")';
    // $result = $mysqli->query($insert);
    $stmt = $mysqli->prepare("INSERT INTO bajajfinservleads (person, mobile, otp_verify, occupation, typeOfLoan, netMonthlySalary, pinCode, requiredLoanAmount, journey, created_at, state, utm_source, utm_medium, utm_campaign, utm_content, backend_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $status = 0;
    $backend_status = '0';
    $created_at = date("Y-m-d H:i:s"); // Current timestamp
    $state ='initiated';
    $stmt->bind_param("ssssssssssssssss", $fullName, $mobile, $status, $occupation, $typeOfLoan, $netMonthlySalary, $pinCode, $requiredLoanAmount, $journey, $created_at, $state, $utm_source, $utm_medium, $utm_campaign, $utm_content, $backend_status);

    if ($stmt->execute()) {
        $last= $stmt->insert_id;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();
    echo json_encode(['uniqueVal'=> $last]);
    exit();
}else if (isset($_POST['verifyStage'])) {
    $mysqli->query("UPDATE `bajajfinservleads` SET `otp_verify`=1, state='verified'  WHERE id = ".$_POST['uniqueVal']);
    echo json_encode(["success" => true, "message" => "Phone number verified successfully.", "phone" => $phoneNumber]);
    $mysqli->close();
    exit();
}
else if (isset($_POST['finalStange'])) {
    $mysqli->query("UPDATE `bajajfinservleads` SET `ext`= '".json_encode($_POST)."'  WHERE id = ".$_POST['uniqueVal']);
    echo json_encode(["success" => true, "message" => "Phone number verified successfully.", "phone" => $phoneNumber]);
    $mysqli->close();
    exit();
}
?>