<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set("Asia/Kolkata");
$mysqli = new mysqli("localhost", "mediaris", "Laksena#1991", "mediaris_partners");
$mysqli->set_charset("utf8");

$stmt = $mysqli->prepare("SELECT * FROM bajajfinservleads WHERE backend_status='0'");
$stmt->execute();
$result = $stmt->get_result();
$requestData = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

// Generate unique MESSAGEID


// API Endpoint
$url = "https://oneweb-n2p.bajajhousingfinance.in/plms-api/services/campaignRest/createCampaign";

// Headers

foreach($requestData as $dbData){
    $messageId = date('m/d/Y') . mt_rand();
    $headers = [
        "Authorization: dXNlcjpBRE1JTjpKYW5AMjAxOQ==",
        "MESSAGEID: $messageId",
        "Content-Type: application/json",
        "ENTITYID: 1",
        "SERVICEVERSION: 1",
        "LANGUAGE: EN",
        "REQUESTTIME: " . date('Y-m-d\TH:i:s'),
        "SERVICENAME: createCampaign"
    ];

    $fullName = explode(" ",$dbData['person']);
    $data = array(
        "leadDetails" => array(
            "firstName" => isset($fullName[0]) ? $fullName[0] : '',
            "middleName" => "",
            "lastName" => isset($fullName[1]) ? $fullName[1] : '',
            // "emailId" => "imrahulktiwari@gmail.com",
            "leadSource" => "ONLINE",
            "uniqueId" => "",
            "profession" => "",
            "leadType" => "",
            // "dateOfBirth" => "1991-01-06T00:00:00",
            "monthlyObligations" => "",
            "employmentType" => "",
            "employerName" => "",
            "natureOfBusiness" => "",
            "leadReference" => "",
            "nameOfDegree" => "",
            "grossReceipt" => "",
            "turnOver" => "",
            "netProfit" => "",
            "pinCode" => $dbData['pinCode'],
            "netSalary" => "",
            "currExperience" => "",
            "experience" => "",
            "gender" => "",
            "hostLeadId" => "",
            "specialization" => "",
            "appliedTenor" => "",
            "mobileNumber" => $dbData['mobile'],
            "addressDetails" => array(
                array(
                    "addrType"    => "CURRES",
                    "pinCode"     => $dbData['pinCode'],
                    "country"     => "IN",
                    "district"    => "",
                    "landmark"    => "",
                    "locality"    => "",
                    "priority"    => 5,
                    "street"      => "",
                    "city"        => "",
                    "houseNumber" => "",
                    "flatNumber"  => ""
                )
            ),
            "phoneDetails" => array(
                array(
                    "phoneNumber"   => $dbData['mobile'],
                    "phoneTypeCode" => "MOBILE",
                    "priority"      => 5
                )
            ),
            // "emailDetails" => array(
            //     array(
            //         "emailId"   => "imrahulktiwari@gmail.com",
            //         "emailTypeCode" => "PERSONAL",
            //         "priority"      => 5
            //     )
            // ),
        ),
        "productOffer" => array(
            "businessVertical"   => "SHOL",
            "offerProduct"       => "HHL",
            "processType"        => "",
            "offerName"          => "Campaign PO",
            "baseProduct"        => "",
            "bT"                 => "Fresh",
            "extCustSeg"         => "NEW",
            "productOfferSource" => "",
            // "ownerId"            => "VLAPTELE",
            "ownerType"          => "Queue",
            "loanType"           => "HHL",
            "dataMartStatus"     => "LIVE",
            "pOValidity"         => "",
            "campaignDetails"    => array(
                "campaignType"           => "",
                "campaignName"           => "",
                "campaignDate"           => "",
                "utmSource"              => $dbData['utm_source'] != '' ? $dbData['utm_source'] : "BOT",
                "utmMedium"              => $dbData['utm_medium'] != '' ? $dbData['utm_medium'] : "SMS",
                "utmCampaign"            => $dbData['utm_campaign'] != '' ? $dbData['utm_campaign'] : "DD_ETB_SELAP_BFL_FRESH_18022025",
                "utmContent"             => $dbData['utm_content'] != '' ? $dbData['utm_content'] : "IB_BFL_SMS",
                "utmProduct"             => "",
                "downPaymentReceived"    => "",
                "propertyType"           => "",
                "itrFieldlast3Years"     => "",
                "requiredLoanamount"     => "",
                "currentBankName"        => "",
                "currentRateOfInterest"  => "",
                "propertyIdentified"     => "",
                "propertyLocation"       => "",
                "vouchers"               => "--NO-INPUT--",
                "responseType"           => "WARM",
                "propensity"             => ""
            ),
            "loanDetails" => array(
                "loanType"          => "HHL",
                "appliedLoanAmount" => 0,
                "appliedTenor"      => 0,
                "appliedROI"        => 0
            ),
            "sourcingDetails" => array(
                "sourcingBranch"         => "",
                "sourcingChannelCategory"=> "",
                "source"                 => "",
                "aSMName"                => "",
                "sourcingChannel"        => ""
            )
        )
    );

    $jsonData = json_encode($data);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);
    echo '<pre>';
    // print_R($response );exit;
    $db_id = trim($dbData['id']);
    $q = "UPDATE bajajfinservleads SET backend_status='1' , msg_id='".$messageId."', payload='".$jsonData."' , api_response='".$response."' , api_time='".date("Y-m-d H:i:s")."' WHERE id=".$db_id;
    $mysqli->query($q);
}
$mysqli->close();
?>
