<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Loan Application - LendingLeaf</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .popup-content {
            background: white;
            padding: 2rem;
            max-width: 400px;
            width: 90%;
            border-radius: 10px;
            text-align: center;
            position: relative;
            animation: slideFade 0.3s ease-in-out;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .hidden {
            display: none !important;
        }


        input.error,
        select.error {
            border: 1px solid #e53935;
        }

        .error-msg {
            color: #e53935;
            font-size: 0.8rem;
            margin-top: 4px;
        }

        .bank-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .bank-card {
            position: relative;

            border: 1px solid #e0e0e0;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s ease;
            overflow: hidden;

        }

        .bank-card:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transform: translateY(-5px);
        }

        .bank-card:not(.eligible) .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            opacity: 1;
            transition: opacity 0.3s ease;
        }

        .bank-card:not(.eligible) .overlay img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.8;
        }

        .bank-card:not(.eligible):hover .overlay {
            opacity: 0.9;
        }

        .bank-card.eligible {
            border-color: #2E7D32;
            background-color: #e8f5e9;
        }

        .bank-card .eligibility-badge {
            display: none;
        }

        .bank-card.eligible .eligibility-badge {
            display: block;
            color: #2E7D32;
            font-weight: bold;
            margin-top: 10px;
        }

        .radio-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 10px;
        }

        .radio-option {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding: 10px 16px;
            border: 1px solid #ccc;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            background-color: #fff;
            flex: 1 1 calc(33.33% - 12px);
            box-sizing: border-box;
            min-width: 220px;
        }

        .radio-option:hover {
            border-color: #2e7d32;
        }

        .radio-option input[type="radio"] {
            accent-color: #2e7d32;
            margin-right: 10px;
            width: 16px;
            height: 16px;
        }

        .radio-option label {
            font-size: 0.95rem;
            cursor: pointer;
            user-select: none;
            white-space: nowrap;
        }

        .radio-option.selected {
            border-color: #2e7d32;
            background-color: #e8f5e9;
        }

        @media (max-width: 768px) {
            .radio-option {
                flex: 1 1 100%;
            }
        }
    </style>
    <script
        src="https://my.rtmark.net/p.js?f=sync&lr=1&partner=2e7f5d96134b5c2e35715c316954f73c6c302da95228645da8c53ea8d0602ac8"
        defer></script>
    <noscript><img
            src="https://my.rtmark.net/img.gif?f=sync&lr=1&partner=2e7f5d96134b5c2e35715c316954f73c6c302da95228645da8c53ea8d0602ac8"
            width="1" height="1" /></noscript>
</head>

<body>

    <body>
        <header>
            <div class="container">
                <nav class="navbar">
                    <div class="logo">
                        <a href="index.php">
                            <!-- <svg class="logo-svg" viewBox="0 0 200 60" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20,15 Q40,5 60,15 T100,15" fill="none" stroke="#2E7D32" stroke-width="3" />
                                <text x="40" y="40" fill="#2E7D32" font-size="20" font-weight="bold">LendingLeaf</text>
                            </svg> -->
                            <img src="/LogoLL.png" alt="LendingLeaf" srcset="" style="width: 140px;">

                        </a>
                    </div>

                    <div class="menu-toggle">
                        <i class="fas fa-bars"></i>
                    </div>

                    <ul class="nav-menu">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link">Loans <i class="fas fa-chevron-down"></i></a>
                            <div class="dropdown-menu">
                                <a href="homeloan.php">Home Loan</a>
                                <a href="#">Personal Loan</a>
                                <a href="#">Business Loan</a>
                                <a href="#">Car Loan</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link">Insurance <i class="fas fa-chevron-down"></i></a>
                            <div class="dropdown-menu">
                                <a href="#">Health Insurance</a>
                                <a href="#">Life Insurance</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link">Credit Card <i class="fas fa-chevron-down"></i></a>
                            <div class="dropdown-menu">
                                <a href="#">HDFC</a>
                                <a href="#">SBI</a>
                                <a href="#">Other Banks</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="index.php#calculator" class="nav-link">EMI Calculator</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

        <main>
            <section class="breadcrumb">
                <div class="container">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="homeloan.php">Home Loan</a></li>
                        <li>Application</li>
                    </ul>
                </div>
            </section>

            <section class="form-section">
                <div class="container">
                    <div class="form-container">
                        <!-- Progress Bar -->
                        <div class="progress-container">
                            <div class="progress-bar">
                                <div class="progress" id="form-progress"></div>
                            </div>

                            <div class="step-indicators">
                                <div class="step active" data-step="1">
                                    <div class="step-number">1</div>
                                    <span class="step-text">Personal</span>
                                </div>
                                <div class="step" data-step="2">
                                    <div class="step-number">2</div>
                                    <span class="step-text">Property</span>
                                </div>
                                <div class="step" data-step="3">
                                    <div class="step-number">3</div>
                                    <span class="step-text">Employment</span>
                                </div>
                                <div class="step" data-step="4">
                                    <div class="step-number">4</div>
                                    <span class="step-text">Details</span>
                                </div>
                                <div class="step" data-step="5">
                                    <div class="step-number">5</div>
                                    <span class="step-text">Submit</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-header">
                            <h1 class="animate-text">Home Loan Application</h1>
                        </div>

                        <!-- Error Message Display -->
                        <!-- <div class="error-message" id="error-message"></div> -->

                        <!-- Form Steps -->
                        <div class="form-steps-container">
                            <!-- Step 1: Personal Information -->
                            <div class="form-step" id="step-1">
                                <h2>Personal Information</h2>
                                <form id="personal-info-form">
                                    <input type="hidden" name="utm_source" id="utm_source"
                                        value="<?= isset($_GET['utm_source']) ? $_GET['utm_source'] : '' ?>">
                                    <input type="hidden" name="uniqueVal" id="uniqueVal"
                                        value="<?= isset($_GET['uniqueVal']) ? $_GET['uniqueVal'] : '' ?>">
                                    <input type="hidden" name="utm_medium" id="utm_medium"
                                        value="<?= isset($_GET['utm_medium']) ? $_GET['utm_medium'] : '' ?>">
                                    <input type="hidden" name="utm_campaign" id="utm_campaign"
                                        value="<?= isset($_GET['utm_campaign']) ? $_GET['utm_campaign'] : '' ?>">
                                    <input type="hidden" name="utm_content" id="utm_content"
                                        value="<?= isset($_GET['utm_content']) ? $_GET['utm_content'] : '' ?>">
                                    <div class="form-grid">
                                        <div class="form-group">
                                            <label for="fullName">Full Name</label>
                                            <input type="text" id="fullName" name="fullName"
                                                placeholder="Enter your name">
                                            <div class="error-text"></div>

                                        </div>

                                        <div class="form-group">
                                            <label for="mobileNumber">Mobile Number</label>
                                            <input type="tel" id="mobileNumber" name="mobileNumber"
                                                placeholder="Enter your 10-digit mobile number" maxlength="10">
                                            <div class="error-text"></div>

                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" name="email" placeholder="Enter your email">
                                            <div class="error-text"></div>

                                        </div>

                                        <div class="form-group">
                                            <label for="dateOfBirth">Date of Birth</label>
                                            <input type="date" id="dateOfBirth" name="dateOfBirth">
                                            <div class="error-text"></div>

                                        </div>

                                        <div class="form-group">
                                            <label for="reqdloanAmount">Required Loan Amount</label>

                                            <input type="text" id="reqdloanAmount" name="reqdloanAmount" data-inr="true"
                                                placeholder="Enter loan amount">

                                            <div class="error-text"></div>

                                        </div>



                                        <div class="form-group">
                                            <label for="residencePincode">Residence Pincode</label>
                                            <input type="text" id="residencePincode" name="residencePincode"
                                                placeholder="Enter your 6-digit pincode" maxlength="6">
                                            <div class="error-text"></div>

                                        </div>
                                        <div class="form-group full-width">
                                            <label>Loan Type</label>
                                            <div class="loan-type-options radio-wrapper">
                                                <label class="radio-option">
                                                    <input type="radio" name="typeOfLoan" value="HL-Fresh" />
                                                    <span>Home Loan</span>
                                                </label>
                                                <label class="radio-option">
                                                    <input type="radio" name="typeOfLoan" value="HL-BT" />
                                                    <span>Home Loan Balance Transfer</span>
                                                </label>
                                                <label class="radio-option">
                                                    <input type="radio" name="typeOfLoan" value="HL-BT-TopUp" />
                                                    <span>Home Loan Balance Transfer + Top-up</span>
                                                </label>
                                            </div>
                                            <div class="error-text"></div>
                                        </div>
                                    </div>
                            </div>

                            <!-- Step 2: Property Type -->
                            <div class="form-step hidden" id="step-2">
                                <h2>Property Type</h2>
                                <div class="selection-options">
                                    <div class="option-card" data-value="Ready to Move">
                                        <i class="fas fa-home"></i>
                                        <h3>Ready to Move</h3>
                                        <p>Completed property that is ready for possession</p>
                                    </div>

                                    <div class="option-card" data-value="Under Construction">
                                        <i class="fas fa-hard-hat"></i>
                                        <h3>Under Construction</h3>
                                        <p>Property still being built by a developer</p>
                                    </div>

                                    <div class="option-card" data-value="Plot Purchase">
                                        <i class="fas fa-map-marked-alt"></i>
                                        <h3>Plot Purchase</h3>
                                        <p>Buying land for future construction</p>
                                    </div>

                                    <div class="option-card" data-value="Home Renovation">
                                        <i class="fas fa-tools"></i>
                                        <h3>Home Renovation</h3>
                                        <p>Upgrades or repairs to existing property</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 3: Employment Type -->
                            <div class="form-step hidden" id="step-3">
                                <h2>Employment Type</h2>
                                <div class="selection-options">
                                    <div class="option-card" data-value="Salaried">
                                        <i class="fas fa-briefcase"></i>
                                        <h3>Salaried</h3>
                                        <p>Employed with a company and receive regular salary</p>
                                    </div>

                                    <div class="option-card" data-value="Self Employed Business">
                                        <i class="fas fa-store"></i>
                                        <h3>Self Employed Business</h3>
                                        <p>Own a business or are a business proprietor</p>
                                    </div>

                                    <div class="option-card" data-value="Self Employed Professional">
                                        <i class="fas fa-user-md"></i>
                                        <h3>Self Employed Professional</h3>
                                        <p>Work as a professional like doctor, lawyer, etc.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 4: Employment Details (Dynamic based on Step 3 selection) -->
                            <div class="form-step hidden" id="step-4">
                                <!-- Salaried Employment Details (shown/hidden based on selection) -->
                                <div id="salaried-details">
                                    <h2>Employment Details - Salaried</h2>
                                    <div id="salaried-form">
                                        <div class="form-grid">
                                            <div class="form-group">
                                                <label for="netMonthlyIncome">Net Monthly Income</label>
                                                <input type="text" id="netMonthlyIncome" name="netMonthlyIncome"
                                                    data-inr="true" placeholder="Enter monthly income">
                                                <div class="error-text"></div>

                                            </div>

                                            <div class="form-group">
                                                <label for="currentEmployer">Current Employer</label>
                                                <input type="text" id="currentEmployer" name="currentEmployer"
                                                    placeholder="Enter your employer name">
                                                <div class="error-text"></div>

                                            </div>

                                            <div class="form-group">
                                                <label for="workEmail">Work Email</label>
                                                <input type="email" id="workEmail" name="workEmail"
                                                    placeholder="Enter your work email">
                                                <div class="error-text"></div>

                                            </div>

                                            <div class="form-group">
                                                <label for="yearsOfExperience">Years of Experience</label>
                                                <input type="number" id="yearsOfExperience" name="yearsOfExperience"
                                                    placeholder="Enter total years of experience">
                                                <div class="error-text"></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Self Employed Business Details -->
                                <div id="self-employed-business-details" class="hidden">
                                    <h2>Employment Details - Business</h2>
                                    <div id="business-form">
                                        <div class="form-grid">
                                            <div class="form-group">
                                                <label for="annualTurnover">Annual Turnover</label>
                                                <input type="text" id="annualTurnover" name="annualTurnover"
                                                    data-inr="true" placeholder="Enter annual turnover">
                                                <div class="error-text"></div>

                                            </div>

                                            <div class="form-group">
                                                <label for="businessType">Business Type</label>
                                                <input type="text" id="businessType" name="businessType"
                                                    placeholder="Enter type of business">
                                                <div class="error-text"></div>

                                            </div>

                                            <div class="form-group">
                                                <label for="businessPincode">Business Pincode</label>
                                                <input type="text" id="businessPincode" name="businessPincode"
                                                    placeholder="Enter business pincode" maxlength="6">
                                                <div class="error-text"></div>

                                            </div>

                                            <div class="form-group">
                                                <label for="yearsInBusiness">Years in Business</label>
                                                <input type="number" id="yearsInBusiness" name="yearsInBusiness"
                                                    placeholder="Enter years in business">
                                                <div class="error-text"></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Self Employed Professional Details -->
                                <div id="self-employed-professional-details" class="hidden">
                                    <h2>Employment Details - Professional</h2>
                                    <div id="professional-form">
                                        <div class="form-grid">
                                            <div class="form-group">
                                                <label for="annualReceipts">Annual Receipts</label>
                                                <input type="text" id="annualReceipts" name="annualReceipts"
                                                    data-inr="true" placeholder="Enter annual receipts">
                                                <div class="error-text"></div>

                                            </div>

                                            <div class="form-group">
                                                <label for="profession">Profession</label>
                                                <input type="text" id="profession" name="profession"
                                                    placeholder="Enter your profession">
                                                <div class="error-text"></div>

                                            </div>

                                            <div class="form-group">
                                                <label for="officePincode">Office Pincode</label>
                                                <input type="text" id="officePincode" name="officePincode"
                                                    placeholder="Enter office pincode" maxlength="6">
                                                <div class="error-text"></div>

                                            </div>

                                            <div class="form-group">
                                                <label for="yearsOfPractice">Years of Practice</label>
                                                <input type="number" id="yearsOfPractice" name="yearsOfPractice"
                                                    placeholder="Enter years of practice">
                                                <div class="error-text"></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Step 5: Terms and Conditions -->
                            <div class="form-step hidden" id="step-5">
                                <h2>Review & Submit</h2>

                                <div class="summary-container">
                                    <h3>Application Summary</h3>
                                    <div id="application-summary"></div>
                                </div>

                                <div class="terms-container">
                                    <div class="terms-checkbox">
                                        <input type="checkbox" id="terms-checkbox">
                                        <label for="terms-checkbox">I confirm that all information provided is accurate
                                            and complete. I authorize LendingLeaf to verify the information and consent
                                            to credit checks as required for loan processing.</label>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <!-- Thank You Screen -->
                            <div class="form-step hidden" id="thank-you">
                                <div class="thank-you-content">
                                    <div class="success-icon">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <h2>Application Submitted Successfully!</h2>
                                    <p class="application-id">Your application number: <span id="application-number"
                                            class="highlight">LF-2024-5678</span></p>

                                    <div class="loan-options">
                                        <h3>Home Loan Options</h3>
                                        <p class="text-center mb-4">Banks that match your profile</p>

                                        <div class="bank-grid">

                                            <!-- Eligible Card -->
                                            <div class="bank-card eligible" data-bank="Bajaj Finserv">
                                                <h4>Bajaj Finserv</h4>
                                                <img src="https://pixelpod.in/admin/uploads/bajaj-finserv-logo1743060868.png"
                                                    alt="Bajaj">
                                                <div class="eligibility-badge">
                                                    <i class="fas fa-check-circle"></i> Highly Eligible
                                                </div>
                                            </div>

                                            <!-- Non-Eligible Cards with Full Blur Overlay -->
                                            <div class="bank-card" data-bank="ICICI Bank">
                                                <div class="overlay">
                                                    <img src="https://pixelpod.in/admin/uploads/2491743153450.jpg"
                                                        alt="Not Eligible" class="overlay-image">
                                                </div>
                                                <img src="https://pixelpod.in/admin/uploads/icici1743060843.png"
                                                    alt="ICICI Bank">
                                                <h4>ICICI Bank</h4>
                                            </div>

                                            <div class="bank-card" data-bank="PNB Housing">
                                                <div class="overlay">
                                                    <img src="https://pixelpod.in/admin/uploads/2491743153450.jpg"
                                                        alt="Not Eligible" class="overlay-image">
                                                </div>
                                                <img src="https://pixelpod.in/admin/uploads/pnb1743060839.png"
                                                    alt="PNB">
                                                <h4>PNB Housing</h4>
                                            </div>

                                            <div class="bank-card" data-bank="SBI">
                                                <div class="overlay">
                                                    <img src="https://pixelpod.in/admin/uploads/2491743153450.jpg"
                                                        alt="Not Eligible" class="overlay-image">
                                                </div>
                                                <img src="https://pixelpod.in/admin/uploads/hdfc-bank1743060749.png"
                                                    alt="HDFC Bank">
                                                <h4>HDFC Bank</h4>
                                            </div>

                                            <div class="bank-card" data-bank="SBI">
                                                <div class="overlay">
                                                    <img src="https://pixelpod.in/admin/uploads/2491743153450.jpg"
                                                        alt="Not Eligible" class="overlay-image">
                                                </div>
                                                <img src="https://pixelpod.in/admin/uploads/sbi1743061036.png"
                                                    alt="SBI Bank">
                                                <h4>State Bank of India</h4>
                                            </div>

                                            <div class="bank-card" data-bank="ICICI">
                                                <div class="overlay">
                                                    <img src="https://pixelpod.in/admin/uploads/2491743153450.jpg"
                                                        alt="Not Eligible" class="overlay-image">
                                                </div>
                                                <img src="https://pixelpod.in/admin/uploads/icici1743060843.png"
                                                    alt="ICICI Bank">
                                                <h4>ICICI Bank</h4>
                                            </div>

                                        </div>


                                    </div>

                                    <!-- <div class="next-steps">
                                        <h4>What happens next?</h4>
                                        <ol>
                                            <li>Our loan officer will contact you within 24 hours</li>
                                            <li>Complete documentation verification</li>
                                            <li>Select your preferred bank option</li>
                                            <li>Receive final approval and disbursement</li>
                                        </ol>
                                    </div> -->
                                    <!-- <a href="index.php" class="btn btn-primary">Back to Home</a> -->
                                </div>
                            </div>

                            <!-- Form Navigation Buttons -->
                            <div class="form-controls">
                                <button type="button" id="prev-button" class="btn btn-secondary"><i
                                        class="fas fa-arrow-left"></i> Back</button>
                                <button type="button" id="next-button" class="btn btn-primary">Next <i
                                        class="fas fa-arrow-right"></i></button>
                                <button type="button" id="submit-button" class="btn btn-primary hidden" disabled>
                                    Submit Application
                                </button>


                            </div>
                        </div>
                    </div>
            </section>
        </main>

        <footer>
            <div class="container">
                <div class="footer-grid">
                    <div class="footer-logo">
                        <svg class="logo-svg" viewBox="0 0 200 60" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20,15 Q40,5 60,15 T100,15" fill="none" stroke="#FFFFFF" stroke-width="3" />
                            <text x="40" y="40" fill="#FFFFFF" font-size="20" font-weight="bold">LendingLeaf</text>
                        </svg>
                        <p>Rooting your dreams, branching your future</p>
                    </div>

                    <div class="footer-links">
                        <h4>Quick Links</h4>
                        <ul>
                            <li><a href="homeloan.php">Home Loan</a></li>
                            <li><a href="#">Personal Loan</a></li>
                            <li><a href="#">Business Loan</a></li>
                            <li><a href="#">Car Loan</a></li>
                        </ul>
                    </div>

                    <div class="footer-links">
                        <h4>Insurance</h4>
                        <ul>
                            <li><a href="#">Health Insurance</a></li>
                            <li><a href="#">Life Insurance</a></li>
                        </ul>
                    </div>

                    <div class="footer-contact">
                        <h4>Contact Us</h4>
                        <p><i class="fas fa-phone"></i> 1800-123-4567</p>
                        <p><i class="fas fa-envelope"></i> support@lendingleaf.com</p>
                        <div class="social-icons">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>

                <div class="footer-bottom">
                    <p>&copy; 2023 LendingLeaf. All rights reserved.</p>
                </div>
            </div>
        </footer>

        <!-- jQuery CDN (latest version) -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="js/validation.js"></script>
        <script src="js/form.js"></script>
        <script src="js/main.js"></script>


        <div id="bajaj-popup" class="popup-overlay hidden">
            <div class="popup-content">
                <span class="close-btn" id="close-popup">&times;</span>
                <h2>Thanks for choosing Bajaj Finserv 🎉</h2>
                <p>Our representative will reach out to you shortly with your personalized offer details.</p>
                <button class="btn btn-primary" id="popup-ok">Got it!</button>
            </div>
        </div>

    </body>

</html>