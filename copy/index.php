<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home Loan | LendingLeaf</title>
    <!-- Bootstrap 5 CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-auth-compat.js"></script> <!-- Google Tag Manager -->

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16887506757"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'AW-16887506757');
    </script>
    <script>
        gtag('event', 'conversion', {
            'send_to': 'AW-16887506757/3PSLCKCbmqoaEMXOy_Q-',
            'value': 1.0,
            'currency': 'USD',
            'transaction_id': ''
        });
    </script>
    <script>
        const firebaseConfig = {
            apiKey: "AIzaSyCkBfWKlDEAxDCTLVmwdwc6OqhCMSp8wKY",
            authDomain: "bajaj-finserv-81b28.firebaseapp.com",
            projectId: "bajaj-finserv-81b28",
            storageBucket: "bajaj-finserv-81b28.firebasestorage.app",
            messagingSenderId: "789970583260",
            appId: "1:789970583260:web:efdbdf5a94905673b03e19",
            measurementId: "G-GEZ6KRVN6Z"
        };

        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
    </script>

    <style>
        body {
            background-color: #f5f5f5;
        }

        /* Overlay that covers the entire screen */
        .loadoverlay-css {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* Semi-transparent background to dim the page */
            background: rgba(0, 0, 0, 0.4);
            z-index: 9999;
            /* ensure the loader is on top */
            display: flex;
            /* to center the spinner */
            align-items: center;
            justify-content: center;
        }

        .otp-card {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* max-width: 500px; */
            text-align: center;
        }

        .otp-card h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .otp-card .icon {
            font-size: 50px;
            margin-bottom: 20px;
        }

        .otp-inputs {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 20px 0;
        }

        .otp-inputs input {
            width: 40px;
            height: 40px;
            text-align: center;
            font-size: 18px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .change-number {
            color: #f97316;
            margin-bottom: 20px;
            cursor: pointer;
        }

        .resend {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .timer {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .checkbox {
            display: flex;
            align-items: center;
            margin: 20px 0;
            font-size: 14px;
        }

        .checkbox input {
            margin-right: 10px;
        }

        .proceed-btn {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            background: linear-gradient(to right, #f97316, #f99f16);
            color: white;
            border: none;
            border-radius: 24px;
            cursor: pointer;
        }

        .proceed-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
        }

        /* The circular spinner */
        .loader-css {
            width: 60px;
            height: 60px;
            /* Visible ring (white circle with a contrasting border) */
            border: 6px solid #f3f3f3;
            border-top: 6px solid #3498db;
            /* color of the moving part */
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        /* Spin animation */
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }


        .custom-header {
            background-color: #002855;
            color: #fff;
            padding: 0.4rem 0;
            /* Reduced height */
        }

        .custom-header .navbar-brand {
            color: #fff;
            font-weight: 600;
            font-size: 1.25rem;
        }

        .custom-header .nav-link {
            color: #fff !important;
        }

        .custom-footer {
            background-color: #002855;
            color: #fff;
            text-align: center;
            padding: 1rem 0;
            margin-top: 2rem;
        }

        .form-section {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        ul.timeline,
        ul.timeline>li {
            padding-left: 20px;
            position: relative
        }

        .active_timeline:after,
        .next_timeline:after {
            font-family: FontAwesome;
            padding-right: .5em;
            top: -10px;
            z-index: 999
        }

        ul.timeline:before,
        ul.timeline>li:before {
            content: ' ';
            z-index: 400;
            position: absolute;
            display: inline-block
        }

        .bhfl_card {
            border-radius: 10px;
            margin-bottom: 12px;
            position: relative;
            padding: 20px
        }

        .bhfl-primary-blue {
            background: #002953;
            color: #fff
        }

        .bhfl-primary-btn,
        .bhfl-submit-btn {
            background-image: linear-gradient(to right, #ff512f 0, #f09819 51%, #ff512f 100%);
            text-align: center;
            background-size: 200% auto
        }

        ul.timeline {
            list-style: none
        }

        ul.timeline>li {
            margin: 20px 0
        }

        ul.timeline:before {
            background: #d4d9df;
            left: 9px;
            width: 1px;
            height: 100%
        }

        .active_timeline:after {
            content: "\f058" !important;
            font-style: normal;
            text-decoration: inherit;
            color: #009800;
            font-size: 24px;
            position: absolute;
            left: -20px;
            font-weight: 700
        }

        ul.timeline>li p {
            cursor: default !important;
            font-size: 12px;
            color: #4a6784
        }

        .active_timeline p,
        .next_timeline p {
            color: #fff !important
        }

        .next_timeline:after {
            content: "\f192";
            color: #002a53;
            font-size: 26px;
            position: absolute;
            left: -21px
        }

        .timeline .next_timeline::before {
            box-shadow: 0 0 10px 1px #fff
        }

        ul.timeline>li:before {
            background: #4a6784;
            border-radius: 50%;
            left: -20px;
            width: 19px;
            height: 19px
        }

        .deskPR0 {
            padding-right: 0
        }

        .appForms-hl-lap {
            margin-top: 75px !important
        }

        .active_timeline:before,
        .next_timeline:before {
            background-color: #fff !important
        }

        .bhfl_card_title {
            font-size: 18px;
            font-weight: 500;
            color: #1a1a1a;
            line-height: normal;
            font-family: Rubik-Medium
        }

        .radio input[type=radio] {
            position: absolute;
            opacity: 0
        }

        .frmDetails .button-area {
            width: 50%
        }

        .button-area {
            margin: 10px auto;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            flex-wrap: wrap;
            padding: 0 10%
        }

        .button-area a {
            flex-grow: 1;
            text-align: center;
            height: 40px;
            margin: 0 10px
        }

        .bhfl-primary-btn {
            margin: 10px 15px 10px 10px;
            padding: 8px 30px;
            transition: .5s;
            color: #fff;
            border-radius: 30px;
            display: block
        }


        .form-banner-text {
            padding-top: 14px;
            padding-left: 7px;
            font-family: 'Rubik-Medium';
            font-size: 20px !important;
            color: darkblue;
            padding: 5px;
        }

        .btn-custom {
            background-color: #ff5f00;
            color: #fff;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
        }

        .btn-custom:hover {
            background-color: #e65200;
        }

        .indicator-text {
            color: #747474;
        }

        /* Style input placeholder similar to label */
        input::placeholder,
        textarea::placeholder,
        select::placeholder {
            color: #000000;
            /* Adjust to your label color */
            opacity: 1;
            font-weight: 400;
            font-size: 1rem;
        }
    </style>
</head>
<?php
//visitor entry
// Function to Get OS
$conn = new mysqli("localhost", "mediaris", "Laksena#1991", "mediaris_partners");
$conn->set_charset("utf8");
function getOS()
{
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $os_platform = "Unknown OS";

    $os_array = [
        '/windows nt 10/i' => 'Windows 10',
        '/windows nt 6.3/i' => 'Windows 8.1',
        '/windows nt 6.2/i' => 'Windows 8',
        '/windows nt 6.1/i' => 'Windows 7',
        '/windows nt 6.0/i' => 'Windows Vista',
        '/windows nt 5.1/i' => 'Windows XP',
        '/macintosh|mac os x/i' => 'Mac OS',
        '/linux/i' => 'Linux',
        '/iphone/i' => 'iPhone',
        '/android/i' => 'Android'
    ];

    foreach ($os_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $os_platform = $value;
        }
    }
    return $os_platform;
}

// Function to Get Browser
function getBrowser()
{
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $browser = "Unknown Browser";

    $browser_array = [
        '/msie/i' => 'Internet Explorer',
        '/firefox/i' => 'Firefox',
        '/safari/i' => 'Safari',
        '/chrome/i' => 'Chrome',
        '/edge/i' => 'Edge',
        '/opera/i' => 'Opera',
        '/mobile/i' => 'Mobile Browser'
    ];

    foreach ($browser_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $browser = $value;
        }
    }
    return $browser;
}

// Capture User Details
$ip_address = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$os = getOS();
$browser = getBrowser();
$referrer_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "Direct Visit";
$page_url = $_SERVER['REQUEST_URI'];
date_default_timezone_set('Asia/Kolkata');
$visit_time = date("Y-m-d H:i:s");
$clickId = "DM-" . time();
// Insert Data into Database
$sql = "INSERT INTO visitors (ip_address, user_agent, os, browser, referrer_url, page_url, visit_time, click_id) 
				VALUES ('$ip_address', '$user_agent', '$os', '$browser', '$referrer_url', '$page_url', '$visit_time', '$clickId')";

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
//end of visitor entry 
?>

<body>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg custom-header">
        <div class="container">
            <a class="navbar-brand" href="#">
                <!-- <img src="your-logo.png" alt="Logo" width="30" height="30" class="me-2" /> -->
                LendingLeaf
            </a>
        </div>
    </nav>

    <!-- Headline + Main Content -->
    <div class="col-md-12 bg-white">
        <h3 class="text-center form-banner-text">Home Loan Application Form</h3>
    </div>
    <div class="container py-4">
        <div class="row">
            <div class="col-md-9" id="form-div">
                <div class="form-section">
                    <h5 class="mb-4">Please share your basic details</h5>
                    <form id="loanForm" method="POST" action="loan-info.php">
                        <input type="hidden" name="utm_source" id="utm_source" value="<?= isset($_GET['utm_source']) ? $_GET['utm_source'] : '' ?>">
                        <input type="hidden" name="uniqueVal" id="uniqueVal" value="<?= isset($_GET['uniqueVal']) ? $_GET['uniqueVal'] : '' ?>">
                        <input type="hidden" name="utm_medium" id="utm_medium" value="<?= isset($_GET['utm_medium']) ? $_GET['utm_medium'] : '' ?>">
                        <input type="hidden" name="utm_campaign" id="utm_campaign" value="<?= isset($_GET['utm_campaign']) ? $_GET['utm_campaign'] : '' ?>">
                        <input type="hidden" name="utm_content" id="utm_content" value="<?= isset($_GET['utm_content']) ? $_GET['utm_content'] : '' ?>">
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="fullName"
                                    name="fullName"
                                    placeholder="Full Name"
                                    required />
                                <small class="indicator-text" id="fullNameError-text">Please enter your name as it appears on your PAN Card </small>

                                <small id="fullNameError" class="text-danger" style="display: none;"></small>
                            </div>
                            <div class="col-md-6">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="mobileNumber"
                                    name="mobile"
                                    placeholder="Mobile Number"
                                    required
                                    maxlength="10" />
                                <small class="indicator-text" id="mobileNumberError-text">Please enter your 10-digit phone number</small>
                                <small id="mobileNumberError" class="text-danger" style="display: none;"></small>
                            </div>
                        </div>

                        <!-- Employment Type + Net Monthly Income -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-12">
                                <!-- <label class="form-label d-block">Employment Type</label> -->
                                <div class="form-check form-check-inline">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="employmentType"
                                        id="salaried"
                                        value="Salaried"
                                        name="occupation"
                                        required />
                                    <label class="form-check-label" for="salaried">Salaried</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="employmentType"
                                        id="selfEmployed"
                                        name="occupation"
                                        value="Self-Employed" />
                                    <label class="form-check-label" for="selfEmployed">Self-Employed</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="employmentType"
                                        id="doctorCa"
                                        name="occupation"
                                        value="Doctor/CA" />
                                    <label class="form-check-label" for="doctorCa">Self-Employed Doctors/CAs</label>
                                </div>
                            </div>

                        </div>
                        <!-- Loader Overlay -->
                        <div class="loadoverlay-css" id="LendingLoaderId" style="display: none;">
                            <div class="loader-css"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="recaptcha-container"></div>
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <!-- <label for="loanType" class="form-label">Select Loan Type</label> -->
                                <select id="loanType" class="form-select" name="typeOfLoan" required>
                                    <option value="" disabled selected>Select Loan Type</option>
                                    <option value="HL-Fresh">Home Loan</option>
                                    <option value="HL-BT">Home Loan Balance Transfer</option>
                                    <option value="HL-BT-TopUp">Home Loan Balance Transfer + Top-up</option>
                                </select>
                                <small id="loanTypeError-text" class="indicator-text" style="">Please select the type of loan you would like to apply for</small>
                            </div>
                            <div id="netIncomeField" class="col-md-6">
                                <!-- <label for="income" class="form-label">Net Monthly Income</label> -->
                                <input
                                    type="number"
                                    class="form-control"
                                    id="income"
                                    name="netMonthlySalary"
                                    placeholder="Net Monthly Income" />
                                <small id="netIncomeError-text" class="indicator-text" style="">Please select the type of loan you would like to apply for</small>
                            </div>
                        </div>
                        <!-- Loan Type + PIN Code -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <!-- <label for="pinCode" class="form-label">PIN Code</label> -->
                                <input
                                    type="text"
                                    class="form-control"
                                    id="pinCode"
                                    placeholder="PIN Code"
                                    name="pinCode"
                                    maxlength="6"
                                    required />
                                <small id="pinCodeError-text" class="indicator-text" style="">Please enter PIN code</small>
                                <small id="pinCodeError" class="text-danger" style="display: none;"></small>
                                <!-- New small element to show serviceability status -->
                                <small id="pincodeServiceabilityStatus" style=""></small>
                            </div>

                            <div class="col-md-6">
                                <!-- <label for="loanAmount" class="form-label">Required Loan Amount</label> -->
                                <input
                                    type="number"
                                    class="form-control"
                                    id="loanAmount"
                                    name="requiredLoanAmount"
                                    placeholder="Required Loan Amount"
                                    required />
                            </div>
                        </div>

                        <!-- Loan Amount -->


                        <!-- Consent -->
                        <div class="form-check mb-3">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                value=""
                                id="consent"
                                name="termsAccepted"
                                required />
                            <label class="form-check-label" for="consent">
                                I authorize Bajaj Housing Finance Limited and its affiliates to contact me.
                                I agree to the <a href="#">Terms and Conditions</a>.
                            </label>
                        </div>

                        <!-- Submit -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-custom">Generate OTP</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-9" id="otp-div" style="display: none;">
                <div class="otp-card">
                    <h2>Enter your One Time Password (OTP)</h2>
                    <div class="icon">🔒</div>
                    <form id="otp-Form" action="" method="get">
                        <div class="otp-inputs">
                            <input type="text" id="otp-number-input-1" maxlength="1">
                            <input type="text" id="otp-number-input-2" maxlength="1">
                            <input type="text" id="otp-number-input-3" maxlength="1">
                            <input type="text" id="otp-number-input-4" maxlength="1">
                            <input type="text" id="otp-number-input-5" maxlength="1">
                            <input type="text" id="otp-number-input-6" maxlength="1">
                        </div>

                        <!-- <div class="change-number">Change Mobile Number?</div> -->

                        <!-- <div class="resend">
                            Didn't receive OTP? <a href="#">Resend OTP</a>
                        </div> -->

                        <div class="timer" id="timer">60 Seconds</div>

                        <div class="checkbox">
                            <input type="checkbox" id="consent" checked>
                            <label for="consent">
                                I authorise Bajaj Housing Finance Limited and its affiliates to contact me, overriding my registration for DNC/NDNC, and I agree with the <a href="#" style="color: #f97316;">Terms and Conditions</a>
                            </label>
                        </div>

                        <div class="error-message" id="error-message" style="display:none;"></div>

                        <button type="button" class="proceed-btn"  onclick="verifyOTPdgm()" id="proceed-btn" disabled>Proceed</button>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm p-3 bhfl_card bhfl-primary-blue"> <!-- Example 3 -->
                    <div class="mytracker_timeline border1 1p-3">
                        <h6>My Tracker</h6>
                        <ul class="timeline">
                            <li id="basictriggerId" class="next_timeline">
                                <p>Submit Basic Details</p>
                            </li>
                            <li id="generateTriggerId">
                                <p>Generate OTP</p>
                            </li>
                            <li>
                                <p>Review Loan Details</p>
                            </li> <!-- <li> <p>Personal Details</p> </li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="custom-footer">
        <div class="container">
            <p class="mb-0">Copyright © 2024 | Lendingleaf | Digitar Media</p>
            <!-- <p class="mb-0">© 2025 Bajaj Housing Finance Limited. All rights reserved.</p> -->
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        /**
         * Validates that the 'fullName' string has at least two words
         * (e.g. first name and last name) separated by a space,
         * and that each word contains only letters.
         * 
         * @param {string} fullName - The name to validate.
         * @returns {boolean} True if valid, otherwise false.
         */
        function validateFullName(fullName) {
            const pattern = /^[A-Za-z]+(\s[A-Za-z]+)+$/;
            return pattern.test(fullName.trim());
        }

        function validateMobileNumber(mobileNumber) {
            const pattern = /^[0-9]{10}$/;
            return pattern.test(mobileNumber.trim());
        }

        function validatePinCode(pinCode) {
            const pattern = /^[0-9]{6}$/; // 6 digits only
            return pattern.test(pinCode.trim());
        }

        function checkServiceability(pin) {
            return pin.startsWith("5") || pin.startsWith("6");
        }

        function otpTimer() {
            let timeLeft = 60;
            const timerDisplay = document.getElementById('timer');
            const countdown = setInterval(() => {
                timeLeft--;
                timerDisplay.textContent = timeLeft + ' Seconds';
                if (timeLeft <= 0) {
                    clearInterval(countdown);
                    timerDisplay.textContent = 'Time expired!';
                    // Optionally enable "Resend OTP" here.
                }
            }, 1000);
        }

        var confirmationResult;
        async function dgmSendOTP() {
            $("#otp-div").show();
            $("#form-div").hide();
            let phoneNumber = document.getElementById("mobileNumber").value.trim();
            if (!phoneNumber) {
                alert("Please enter a valid phone number.");
                return false;
            }

            phoneNumber = "+91" + phoneNumber;

            let appVerifier = new firebase.auth.RecaptchaVerifier("recaptcha-container", {
                'size': 'invisible',
                'callback': function(response) {
                    console.log("reCAPTCHA verified!");
                },
                'expired-callback': function() {
                    alert("reCAPTCHA expired, please verify again.");
                }
            });
            try {
                await firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier).then(function(confirmationResult) {
                    window.confirmationResult = confirmationResult;
                });

                otpTimer();
                $("#generateTriggerId").addClass("next_timeline");
                $("#basictriggerId").addClass("active_timeline")
                $("#basictriggerId").removeClass("next_timeline");
                return true;
            } catch (error) {
                console.error("Error sending OTP:", error);
                alert("Failed to send OTP: " + error.message);
                return false;
            }
        }
        var uniqueVal = null;

        async function manageState() {
            let otpSent = await dgmSendOTP();
            if (otpSent) {
                // this.submit();
                $('#LendingLoaderId').hide();
            }
        }

        const otpInputs = document.querySelectorAll('.otp-inputs input');

        otpInputs.forEach((input, index) => {
            input.addEventListener('input', (event) => {
                // Move focus to next input if current input has a value
                if (event.target.value.length === 1 && index < otpInputs.length - 1) {
                    otpInputs[index + 1].focus();
                }

                // Enable "Proceed" button if all inputs have values
                if (Array.from(otpInputs).every(input => input.value.length === 1)) {
                    document.getElementById('proceed-btn').disabled = false;
                }
            });

            input.addEventListener('keydown', (event) => {
                // Move focus to previous input if backspace is pressed and the current input is empty
                if (event.key === 'Backspace' && input.value.length === 0 && index > 0) {
                    otpInputs[index - 1].focus();
                }
            });
        });

        function verifyOTPdgm() {
            // if (!uniqueVal) {
            //     location.reload();
            //     return true;
            // }
            if ($("#proceed-btn").attr('disabled')) {
                return true;
            }

            $("#proceed-btn").attr('onclick', '');
            first = $("#otp-number-input-1").val();
            second = $("#otp-number-input-2").val();
            third = $("#otp-number-input-3").val();
            forth = $("#otp-number-input-4").val();
            fifth = $("#otp-number-input-5").val();
            sixth = $("#otp-number-input-6").val();
            let otp = first + second + third + forth + fifth + sixth;

            if (!otp) {
                alert("Please enter the OTP.");
                return;
            }

            confirmationResult.confirm(otp)
                .then((result) => {
                    $("#mytracker_timeline").addClass("next_timeline");
                    $("#generateTriggerId").addClass("active_timeline")
                    $("#generateTriggerId").removeClass("next_timeline");
                    var url = 'loan-info.php?' + $('#loanForm').serialize();
                    window.location.href = url; 
                }).catch(function(error) {
                    console.error('Error:', error);
                    console.error("OTP verification failed:", error);
                    alert("Invalid OTP. Please try again.");
                    // location.reload();
                });
        }


        $(document).ready(function() {
            $('input[name="employmentType"]').change(function() {
                if ($('#salaried').is(':checked') || !$('input[name="employmentType"]:checked').val()) {
                    $('#netIncomeField').show();
                } else {
                    $('#netIncomeField').hide();
                }
            });


            $('#fullName').on('input', function() {
                const nameVal = $(this).val().trim();
                if (nameVal.length > 0 && !validateFullName(nameVal)) {
                    $('#fullNameError')
                        .text('Please enter your full name (e.g. John Doe).')
                        .show();
                    $('#fullNameError-text').hide();
                } else {
                    $('#fullNameError').hide();
                    $('#fullNameError-text').show();
                }
            });

            // Form submission handler

            $('#mobileNumber').on('input', function() {
                const mobileVal = $(this).val().trim();
                if (mobileVal.length > 0 && !validateMobileNumber(mobileVal)) {
                    $('#mobileNumberError')
                        .text('Please enter a valid 10-digit mobile number. Only numbers are allowed.')
                        .show();
                    $('#mobileNumberError-text').hide();
                } else {
                    $('#mobileNumberError-text').show();
                    $('#mobileNumberError').hide();
                }
            });

            $('#pinCode').on('input', function() {
                const pinVal = $(this).val().trim();
                if (pinVal.length > 0 && !validatePinCode(pinVal)) {
                    $('#pinCodeError')
                        .text('Please enter your six-digit residential PIN code.')
                        .show();
                    $('#pinCodeError-text').hide();
                } else {
                    $('#pinCodeError').hide();
                    $('#pinCodeError-text').show();
                    $('#LendingLoaderId').show();

                    if (pinVal.length === 6) {
                        if (checkServiceability(pinVal)) {
                            $('#pincodeServiceabilityStatus')
                                .text('Serviceable.')
                                .css('color', 'green');
                            $('#pinCodeError-text').hide();
                        } else {
                            $('#pincodeServiceabilityStatus')
                                .text('This area is not serviceable.')
                                .css('color', 'red');
                            $('#pinCodeError-text').hide();
                        }
                    } else {
                        $('#pincodeServiceabilityStatus').text('');
                    }
                    $('#LendingLoaderId').hide();
                }

            });


            $('#loanForm').submit(function(e) {
                e.preventDefault();

                const nameVal = $('#fullName').val().trim();
                if (!validateFullName(nameVal)) {
                    $('#fullNameError')
                        .text('Please enter your full name (e.g. John Doe).')
                        .show();
                    return;
                }

                const mobileVal = $('#mobileNumber').val().trim();

                if (!validateMobileNumber(mobileVal)) {
                    $('#mobileNumberError')
                        .text('Please enter a valid 10-digit mobile number. Only numbers are allowed.')
                        .show();
                    return;
                }

                const pinVal = $('#pinCode').val().trim();
                if (!validatePinCode(pinVal)) {
                    $('#pinCodeError')
                        .text('Please enter your six-digit residential PIN code.')
                        .show();
                    return; // Stop form submission
                }
                $('#LendingLoaderId').show();
                manageState();
                let formData = $('#loanForm').serialize(); // Serialize form data
                formData += '&verifykey=' + confirmationResult + '&save1stStage=1'; // Append extra values
                $.ajax({
                    url: 'saveajax.php',
                    type: 'POST',
                    data: formData,
                    dataType: 'json', // Expect JSON response
                    success: function(data) {
                        uniqueVal = data.uniqueVal;
                        $("#uniqueVal").val(uniqueVal);
                        console.log('Success:', data);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        //location.reload();
                    }
                });
                

            });





        });
    </script>
</body>

</html>