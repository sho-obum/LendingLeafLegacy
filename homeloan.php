<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Loan - LendingLeaf</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container">
            <nav class="navbar">
                <div class="logo">
                    <a href="index.html">
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
                            <a href="homeloan.html">Home Loan</a>
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
                        <a href="index.html#calculator" class="nav-link">EMI Calculator</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="breadcrumb">
            <div class="container">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li>Home Loan</li>
                </ul>
            </div>
        </section>

        <section class="loan-hero">
            <div class="container">
                <div class="loan-hero-content">
                    <h1>Make Your Dream Home a Reality with LendingLeaf</h1>
                    <p>Quick approvals, competitive interest rates, and hassle-free processing to help you finance your perfect home.</p>
                    
                    <div class="features-list">
                        <div class="feature">
                            <i class="fas fa-percentage"></i>
                            <div>
                                <h3>Competitive Interest Rates</h3>
                                <p>Starting from 8.25% p.a. with flexible repayment options</p>
                            </div>
                        </div>
                        
                        <div class="feature">
                            <i class="fas fa-bolt"></i>
                            <div>
                                <h3>Quick Approvals</h3>
                                <p>Get in-principle approval within 24 hours</p>
                            </div>
                        </div>
                        
                        <div class="feature">
                            <i class="fas fa-file-alt"></i>
                            <div>
                                <h3>Minimal Documentation</h3>
                                <p>Simplified process with minimal paperwork</p>
                            </div>
                        </div>
                    </div>
                    
                    <a href="application.html" class="btn btn-primary">Apply Now</a>
                </div>
            </div>
        </section>

        <section class="loan-details">
            <div class="container">
                <h2>Home Loan Details</h2>
                
                <div class="details-grid">
                    <div class="detail-card">
                        <h3>Loan Amount</h3>
                        <p>₹ 10 Lakhs to ₹ 10 Crores</p>
                    </div>
                    
                    <div class="detail-card">
                        <h3>Interest Rate</h3>
                        <p>Starting from 8.25% p.a.</p>
                    </div>
                    
                    <div class="detail-card">
                        <h3>Loan Tenure</h3>
                        <p>Up to 30 years</p>
                    </div>
                    
                    <div class="detail-card">
                        <h3>Processing Fee</h3>
                        <p>Up to 0.5% of loan amount</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="eligibility">
            <div class="container">
                <h2>Eligibility Criteria</h2>
                
                <div class="eligibility-grid">
                    <div class="eligibility-card">
                        <h3>Age</h3>
                        <ul>
                            <li>Minimum: 21 years</li>
                            <li>Maximum: 65 years at loan maturity</li>
                        </ul>
                    </div>
                    
                    <div class="eligibility-card">
                        <h3>Income</h3>
                        <ul>
                            <li>Salaried: Minimum ₹ 25,000 per month</li>
                            <li>Self-employed: Minimum ₹ 3 Lakhs per annum</li>
                        </ul>
                    </div>
                    
                    <div class="eligibility-card">
                        <h3>Employment</h3>
                        <ul>
                            <li>Salaried: Minimum 2 years of work experience</li>
                            <li>Self-employed: Minimum 3 years in business/profession</li>
                        </ul>
                    </div>
                    
                    <div class="eligibility-card">
                        <h3>Credit Score</h3>
                        <ul>
                            <li>Minimum 700+ preferred</li>
                            <li>Clean credit history</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="cta-section">
            <div class="container">
                <div class="cta-content">
                    <h2>Ready to Own Your Dream Home?</h2>
                    <p>Apply now and get one step closer to owning your dream home with our hassle-free home loan process.</p>
                    <a href="application.html" class="btn btn-primary">Apply Now</a>
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
                        <li><a href="homeloan.html">Home Loan</a></li>
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
</body>
</html>
