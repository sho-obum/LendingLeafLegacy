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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />


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

        .highlight-box {
            background-color: #ffffff;
            padding: 1rem 1rem;
            border-radius: 12px;
            margin-bottom: 0rem;
        }

        .highlight-box strong {
            font-weight: bold;
        }
    </style>
</head>


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

    <!-- User Info Highlight -->
    <div class="container">
        <div class="highlight-box">
            <p><strong><?= trim($_GET['fullName']) ?>,</strong> you are only a few details away from completing your loan application!</p>
        </div>
    </div>
    <div class="container py-4">
        <div class="row">
            <div class="col-md-9" id="form-div">
                <div class="form-section">
                    <?php
                    if (isset($_GET) && $_GET['employmentType'] == 'Self-Employed' && $_GET['typeOfLoan'] == 'HL-Fresh') {
                    ?>
                        <h5 class="mb-4">Please share your financial details</h5>
                        <form id="addForm" action="thank-you.php" method="POST">
                            <input type="hidden" name="uniqueVal" id="uniqueVal" value="<?= isset($_GET['uniqueVal']) ? $_GET['uniqueVal'] : '' ?>">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <!-- <label class="form-label">Property Identified?</label> -->
                                    <select class="form-select " name="propertyIdentified" required>
                                        <option value="" disabled selected>Property Identified?</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    <small class="indicator-text">Please indicate if you have identified the property you wish to purchase</small>
                                </div>

                                <div class="col-md-6">
                                    <!-- <label class="form-label"></label> -->
                                    <select class="form-select" name="propertyType" required>
                                        <option value="" disabled selected>Property Type</option>
                                        <option value="Ready-to-move-in Property">Ready-to-move-in Property</option>
                                        <option value="Under-construction property">Under-construction property</option>
                                        <option value="Plot">Plot</option>
                                        <option value="Resale">Resale</option>
                                    </select>
                                    <small class="indicator-text">Please select the type of property you wish to purchase</small>
                                </div>

                                <div class="col-md-6">
                                    <!-- <label class="form-label">Estimated Property Value</label> -->
                                    <input type="number" class="form-control" placeholder="Estimated Property Value" name="estimationPropertyValue" required />
                                    <small class="indicator-text">Please enter the estimated current market value of your property</small>
                                </div>

                                <div class="col-md-6">
                                    <!-- <label class="form-label">Down Payment Completed?</label> -->
                                    <select class="form-select" name="downPaymentCompleted" required>
                                        <option value="" disabled selected>Down Payment Completed?</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    <small class="indicator-text">Please indicate if you have paid your contribution towards the property purchase</small>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Monthly Obligation</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="monthlyObligation" placeholder="Please enter your total monthly obligations/current EMIs" required />
                                        <span class="input-group-text info-icon" title="Enter the estimated current market value of your property">ℹ️</span>
                                        <small class="indicator-text">Please enter your total monthly obligations/current EMIs</small>
                                    </div>
                                </div>

                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-custom">Submit</button>
                                </div>
                            </div>
                        </form>
                    <?php
                    } elseif (isset($_GET) && $_GET['employmentType'] == 'Self-Employed' && $_GET['typeOfLoan'] == 'HL-BT') {
                    ?>
                        <div class="form-group">
                            <label>Current Lender</label>
                            <input type="text" placeholder="Please select your current Home Loan provider">
                        </div>

                        <div class="form-group">
                            <label>Sanctioned Loan Amount</label>
                            <input type="text" placeholder="Please enter your sanction loan amount">
                        </div>

                        <div class="form-group">
                            <label>Loan Start Date<span class="info-icon">&#9432;</span></label>
                            <input type="text" placeholder="Please enter your loan start date in the MM/YYYY format">
                        </div>

                        <div class="form-group">
                            <label>Monthly Obligation<span class="info-icon">&#9432;</span></label>
                            <input type="text" placeholder="Please enter your total monthly obligations/current EMIs">
                        </div>

                        <button class="submit-btn">Submit</button>

                        <p style="margin-top: 20px; font-size: 14px;">
                            I authorise Bajaj Housing Finance Limited and its affiliates to contact me, overriding my registration for DNC/NDNC, if any, and I have understood and agree with the <strong>Terms and Conditions</strong>
                        </p>
                </div>
            <?php
                    }
            ?>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm p-3 bhfl_card bhfl-primary-blue"> <!-- Example 3 -->
                <div class="mytracker_timeline border1 1p-3">
                    <h6>My Tracker</h6>
                    <ul class="timeline">
                        <li id="basictriggerId" class="active_timeline">
                            <p>Submit Basic Details</p>
                        </li>
                        <li id="generateTriggerId" class="active_timeline">
                            <p>Generate OTP</p>
                        </li>
                        <li class="next_timeline">
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
        function checkServiceability(pin) {
            return pin.startsWith("5") || pin.startsWith("6");
        }


        $(document).ready(function() {
            // $("#mytracker_timeline").addClass("active_timeline");
            // $("#generateTriggerId").addClass("active_timeline")
            // $("#generateTriggerId").removeClass("next_timeline");

            $('#addForm').submit(function(e) {
                e.preventDefault();

                let formData = $('#addForm').serialize(); // Serialize form data
                formData += '&finalStange=1';

                $.ajax({
                    url: 'saveajax.php',
                    type: 'POST',
                    data: formData,
                    dataType: 'json', // Expect JSON response
                    success: function(data) {
                        var url = 'thank-you.php?' + $('#addForm').serialize();
                        window.location.href = url;
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });
        });
    </script>
</body>

</html>