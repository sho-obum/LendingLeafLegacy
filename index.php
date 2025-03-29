<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LendingLeaf - Home Loans and Financial Services</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container">
            <nav class="navbar">
                <div class="logo">
                    <a href="index.php">
                        <svg class="logo-svg" viewBox="0 0 200 60" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20,15 Q40,5 60,15 T100,15" fill="none" stroke="#2E7D32" stroke-width="3"/>
                            <text x="40" y="40" fill="#2E7D32" font-size="20" font-weight="bold">LendingLeaf</text>
                        </svg>
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
                        <a href="#calculator" class="nav-link">EMI Calculator</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <div class="hero-content">
                    <h1>
                        <span class="animated-text">Rooting your dreams</span>
                        <span class="animated-text delay">Branching your future</span>
                    </h1>
                    <p>Unlock the door to your future home with LendingLeaf's hassle-free loan solutions.</p>
                    <a href="homeloan.php" class="btn btn-primary">Get Started</a>
                </div>
            </div>
        </section>

        <section class="features">
            <div class="container">
                <h2>Why Choose LendingLeaf?</h2>
                <div class="feature-grid">
                    <div class="feature-card">
                        <i class="fas fa-percentage"></i>
                        <h3>Competitive Rates</h3>
                        <p>Get access to the best interest rates in the market, starting at just 8.25% p.a.</p>
                    </div>
                    <div class="feature-card">
                        <i class="fas fa-bolt"></i>
                        <h3>Quick Approvals</h3>
                        <p>Get in-principle approval within 24 hours and move closer to your dream home.</p>
                    </div>
                    <div class="feature-card">
                        <i class="fas fa-file-alt"></i>
                        <h3>Minimal Documentation</h3>
                        <p>Our streamlined process requires minimal paperwork to save you time and effort.</p>
                    </div>
                    <div class="feature-card">
                        <i class="fas fa-hands-helping"></i>
                        <h3>Expert Guidance</h3>
                        <p>Our loan experts will guide you through every step of the home loan journey.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="calculator" class="calculator-section">
            <div class="container">
                <h2>EMI Calculator</h2>
                <p>Calculate your monthly EMI based on loan amount, interest rate, and tenure.</p>
                
                <div class="calculator-container">
                    <div class="calculator-form">
                        <div class="form-group">
                            <label for="loan-amount">Loan Amount (₹)</label>
                            <input type="number" id="loan-amount" min="100000" max="10000000" value="2000000">
                            <div class="range-slider">
                                <input type="range" id="loan-amount-slider" min="100000" max="10000000" step="100000" value="2000000">
                                <div class="range-labels">
                                    <span>1L</span>
                                    <span>1Cr</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="interest-rate">Interest Rate (% p.a.)</label>
                            <input type="number" id="interest-rate" min="5" max="20" step="0.1" value="8.5">
                            <div class="range-slider">
                                <input type="range" id="interest-rate-slider" min="5" max="20" step="0.1" value="8.5">
                                <div class="range-labels">
                                    <span>5%</span>
                                    <span>20%</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="loan-tenure">Loan Tenure (Years)</label>
                            <input type="number" id="loan-tenure" min="1" max="30" value="20">
                            <div class="range-slider">
                                <input type="range" id="loan-tenure-slider" min="1" max="30" step="1" value="20">
                                <div class="range-labels">
                                    <span>1</span>
                                    <span>30</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="calculator-result">
                        <div class="result-card">
                            <h3>Monthly EMI</h3>
                            <p class="emi-amount">₹ <span id="emi-result">17,416</span></p>
                        </div>
                        
                        <div class="result-details">
                            <div class="result-item">
                                <span>Principal</span>
                                <strong>₹ <span id="principal-amount">20,00,000</span></strong>
                            </div>
                            <div class="result-item">
                                <span>Interest</span>
                                <strong>₹ <span id="interest-amount">21,79,777</span></strong>
                            </div>
                            <div class="result-item">
                                <span>Total Amount</span>
                                <strong>₹ <span id="total-amount">41,79,777</span></strong>
                            </div>
                        </div>
                        
                        <a href="homeloan.php" class="btn btn-secondary">Apply for Home Loan</a>
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
                        <path d="M20,15 Q40,5 60,15 T100,15" fill="none" stroke="#FFFFFF" stroke-width="3"/>
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

    <script src="js/main.js"></script>
    <script src="js/calculator.js"></script>
</body>
</html>
