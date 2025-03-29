<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.bajajhousingfinance.in/o/quick-apply/validate-pincode',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "occupation": "Salaried",
    "pincode": "110015",
    "typeOfLoan": "",
    "journey": "HLA"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Cookie: JSESSIONID=42692BD40309A34480D7701FA8FB860E; SERVER_ID=3e4a486530cf55a4'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
