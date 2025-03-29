// Loan Application Form Functionality
document.addEventListener("DOMContentLoaded", function() {
    // Form state management
    let currentStep = 1;
    const totalSteps = 5;
    let formData = loadFormData() || {}; // Load existing form data from localStorage or start fresh
    let propertyType = null;
    let employmentType = null;
    
    // Elements
    const formProgress = document.getElementById("form-progress");
    const stepIndicators = document.querySelectorAll(".step");
    const formSteps = document.querySelectorAll(".form-step");
    const prevButton = document.getElementById("prev-button");
    const nextButton = document.getElementById("next-button");
    const submitButton = document.getElementById("submit-button");
    const errorMessage = document.getElementById("error-message");
    const optionCards = document.querySelectorAll(".option-card");
    const termsCheckbox = document.getElementById("terms-checkbox");
    const summaryContainer = document.getElementById("application-summary");
    
    // Initialize form
    initializeForm();
    
    // Previous button click handler
    if (prevButton) {
        prevButton.addEventListener("click", function() {
            if (currentStep > 1) {
                goToStep(currentStep - 1);
            }
        });
    }
    
    // Next button click handler
    if (nextButton) {
        nextButton.addEventListener("click", function() {
            if (validateStep(currentStep)) {
                saveCurrentStepData();
                
                if (currentStep < totalSteps) {
                    goToStep(currentStep + 1);
                }
            }
        });
    }
    
    // Submit button click handler
    if (submitButton) {
        submitButton.addEventListener("click", function() {
            if (validateStep(currentStep)) {
                saveCurrentStepData();
                submitApplication();
            }
        });
    }
    
    // Option cards click handler (for property and employment type selection)
    optionCards.forEach(card => {
        card.addEventListener("click", function() {
            const parentStep = this.closest(".form-step");
            const stepCards = parentStep.querySelectorAll(".option-card");
            
            // Remove selected class from all cards in this step
            stepCards.forEach(c => c.classList.remove("selected"));
            
            // Add selected class to clicked card
            this.classList.add("selected");
            
            // Store selected value based on step
            const value = this.getAttribute("data-value");
            
            if (parentStep.id === "step-2") {
                propertyType = value;
                formData.propertyType = value;
            } else if (parentStep.id === "step-3") {
                employmentType = value;
                formData.employmentType = value;
                
                // Update step 4 visibility based on employment type
                toggleEmploymentDetailsForm(value);
            }
            
            // Clear error message
            hideErrorMessage();
        });
    });
    
    // Terms checkbox change handler
    if (termsCheckbox) {
        termsCheckbox.addEventListener("change", function() {
            formData.termsAccepted = this.checked;
            hideErrorMessage();
        });
    }
    
    // Initialize form with existing data
    function initializeForm() {
        // Set initial progress
        updateProgress();
        
        // Load saved data into form fields
        populateFormFields();
        
        // Update button visibility for first step
        updateButtonVisibility();
        
        // Pre-select options if saved
        if (formData.propertyType) {
            propertyType = formData.propertyType;
            selectOptionCard("step-2", propertyType);
        }
        
        if (formData.employmentType) {
            employmentType = formData.employmentType;
            selectOptionCard("step-3", employmentType);
            toggleEmploymentDetailsForm(employmentType);
        }
    }
    
    // Navigate to specific step
    function goToStep(step) {
        // Hide current step
        hideStep(currentStep);
        
        // Show new step
        currentStep = step;
        showStep(currentStep);
        
        // Update progress bar
        updateProgress();
        
        // Update button visibility
        updateButtonVisibility();
        
        // If step 5, update summary
        if (currentStep === 5) {
            updateApplicationSummary();
        }
        
        // Scroll to top of form
        const formContainer = document.querySelector(".form-container");
        if (formContainer) {
            formContainer.scrollIntoView({ behavior: "smooth" });
        }
    }
    
    // Show a step
    function showStep(step) {
        const stepElement = document.getElementById(`step-${step}`);
        if (stepElement) {
            stepElement.classList.remove("hidden");
        }
        
        // Update step indicator
        if (stepIndicators[step - 1]) {
            stepIndicators[step - 1].classList.add("active");
        }
    }
    
    // Hide a step
    function hideStep(step) {
        const stepElement = document.getElementById(`step-${step}`);
        if (stepElement) {
            stepElement.classList.add("hidden");
        }
        
        // Update step indicator
        if (stepIndicators[step - 1]) {
            stepIndicators[step - 1].classList.remove("active");
        }
    }
    
    // Update progress bar
    function updateProgress() {
        if (formProgress) {
            const progressPercentage = ((currentStep - 1) / (totalSteps - 1)) * 100;
            formProgress.style.width = `${progressPercentage}%`;
        }
        
        // Update step indicators
        stepIndicators.forEach((indicator, index) => {
            if (index + 1 < currentStep) {
                indicator.classList.add("completed");
            } else {
                indicator.classList.remove("completed");
            }
            
            if (index + 1 === currentStep) {
                indicator.classList.add("active");
            } else {
                indicator.classList.remove("active");
            }
        });
    }
    
    // Update button visibility based on current step
    function updateButtonVisibility() {
        if (prevButton) {
            prevButton.style.display = currentStep === 1 ? "none" : "block";
        }
        
        if (nextButton) {
            nextButton.style.display = currentStep === totalSteps ? "none" : "block";
        }
        
        if (submitButton) {
            submitButton.style.display = currentStep === totalSteps ? "block" : "none";
        }
    }
    
    // Toggle employment details forms based on employment type
    function toggleEmploymentDetailsForm(type) {
        const salariedDetails = document.getElementById("salaried-details");
        const businessDetails = document.getElementById("self-employed-business-details");
        const professionalDetails = document.getElementById("self-employed-professional-details");
        
        if (salariedDetails) salariedDetails.classList.add("hidden");
        if (businessDetails) businessDetails.classList.add("hidden");
        if (professionalDetails) professionalDetails.classList.add("hidden");
        
        if (type === "Salaried" && salariedDetails) {
            salariedDetails.classList.remove("hidden");
        } else if (type === "Self Employed Business" && businessDetails) {
            businessDetails.classList.remove("hidden");
        } else if (type === "Self Employed Professional" && professionalDetails) {
            professionalDetails.classList.remove("hidden");
        }
    }
    
    // Select option card based on saved value
    function selectOptionCard(stepId, value) {
        const step = document.getElementById(stepId);
        if (!step) return;
        
        const cards = step.querySelectorAll(".option-card");
        cards.forEach(card => {
            if (card.getAttribute("data-value") === value) {
                card.classList.add("selected");
            } else {
                card.classList.remove("selected");
            }
        });
    }
    
    // Validate current step
    function validateStep(step) {
        hideErrorMessage();
        
        // Validation rules based on step
        if (step === 1) {
            // Personal Information Validation
            const fullName = document.getElementById("fullName")?.value;
            const mobileNumber = document.getElementById("mobileNumber")?.value;
            const email = document.getElementById("email")?.value;
            const dateOfBirth = document.getElementById("dateOfBirth")?.value;
            const loanAmount = document.getElementById("reqdloanAmount")?.value;
            const pincode = document.getElementById("residencePincode")?.value;
            
            if (!fullName || fullName.trim() === "") {
                showErrorMessage("Please enter your full name");
                return false;
            }
            
            if (!mobileNumber || !/^\d{10}$/.test(mobileNumber)) {
                showErrorMessage("Please enter a valid 10-digit mobile number");
                return false;
            }
            
            if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                showErrorMessage("Please enter a valid email address");
                return false;
            }
            
            if (!dateOfBirth) {
                showErrorMessage("Please enter your date of birth");
                return false;
            }
            
            if (!loanAmount || loanAmount <= 0) {
                showErrorMessage("Please enter a valid loan amount");
                return false;
            }
            
            if (!pincode || !/^\d{6}$/.test(pincode)) {
                showErrorMessage("Please enter a valid 6-digit pincode");
                return false;
            }
            
        } else if (step === 2) {
            // Property Type Validation
            if (!propertyType) {
                showErrorMessage("Please select a property type");
                return false;
            }
            
        } else if (step === 3) {
            // Employment Type Validation
            if (!employmentType) {
                showErrorMessage("Please select your employment type");
                return false;
            }
            
        } else if (step === 4) {
            // Employment Details Validation based on employment type
            if (employmentType === "Salaried") {
                const monthlyIncome = document.getElementById("netMonthlyIncome")?.value;
                const employer = document.getElementById("currentEmployer")?.value;
                
                if (!monthlyIncome || monthlyIncome <= 0) {
                    showErrorMessage("Please enter a valid monthly income");
                    return false;
                }
                
                if (!employer || employer.trim() === "") {
                    showErrorMessage("Please enter your current employer");
                    return false;
                }
                
            } else if (employmentType === "Self Employed Business") {
                const turnover = document.getElementById("annualTurnover")?.value;
                const businessType = document.getElementById("businessType")?.value;
                
                if (!turnover || turnover <= 0) {
                    showErrorMessage("Please enter a valid annual turnover");
                    return false;
                }
                
                if (!businessType || businessType.trim() === "") {
                    showErrorMessage("Please enter your business type");
                    return false;
                }
                
            } else if (employmentType === "Self Employed Professional") {
                const receipts = document.getElementById("annualReceipts")?.value;
                const profession = document.getElementById("profession")?.value;
                
                if (!receipts || receipts <= 0) {
                    showErrorMessage("Please enter valid annual receipts");
                    return false;
                }
                
                if (!profession || profession.trim() === "") {
                    showErrorMessage("Please enter your profession");
                    return false;
                }
            }
            
        } else if (step === 5) {
            // Terms and Conditions Validation
            if (!termsCheckbox || !termsCheckbox.checked) {
                showErrorMessage("Please accept the terms and conditions to proceed");
                return false;
            }
        }
        
        return true;
    }
    
    // Save current step data
    function saveCurrentStepData() {
        // Different data collection based on step
        if (currentStep === 1) {
            // Personal Information
            formData.fullName = document.getElementById("fullName")?.value;
            formData.mobileNumber = document.getElementById("mobileNumber")?.value;
            formData.email = document.getElementById("email")?.value;
            formData.dateOfBirth = document.getElementById("dateOfBirth")?.value;
            formData.reqdloanAmount = document.getElementById("reqdloanAmount")?.value;
            formData.residencePincode = document.getElementById("residencePincode")?.value;
            
        } else if (currentStep === 2) {
            // Property Type (already saved in click handler)
            formData.propertyType = propertyType;
            
        } else if (currentStep === 3) {
            // Employment Type (already saved in click handler)
            formData.employmentType = employmentType;
            
        } else if (currentStep === 4) {
            // Employment Details based on type
            if (employmentType === "Salaried") {
                formData.netMonthlyIncome = document.getElementById("netMonthlyIncome")?.value;
                formData.currentEmployer = document.getElementById("currentEmployer")?.value;
                formData.workEmail = document.getElementById("workEmail")?.value;
                formData.yearsOfExperience = document.getElementById("yearsOfExperience")?.value;
                
            } else if (employmentType === "Self Employed Business") {
                formData.annualTurnover = document.getElementById("annualTurnover")?.value;
                formData.businessType = document.getElementById("businessType")?.value;
                formData.businessPincode = document.getElementById("businessPincode")?.value;
                formData.yearsInBusiness = document.getElementById("yearsInBusiness")?.value;
                
            } else if (employmentType === "Self Employed Professional") {
                formData.annualReceipts = document.getElementById("annualReceipts")?.value;
                formData.profession = document.getElementById("profession")?.value;
                formData.officePincode = document.getElementById("officePincode")?.value;
                formData.yearsOfPractice = document.getElementById("yearsOfPractice")?.value;
            }
        }
        
        // Add application ID if not present
        if (!formData.applicationId) {
            formData.applicationId = generateApplicationId();
        }
        
        // Save to localStorage
        saveFormData();
    }
    
    // Populate form fields with saved data
    function populateFormFields() {
        // Personal Information
        if (document.getElementById("fullName")) document.getElementById("fullName").value = formData.fullName || "";
        if (document.getElementById("mobileNumber")) document.getElementById("mobileNumber").value = formData.mobileNumber || "";
        if (document.getElementById("email")) document.getElementById("email").value = formData.email || "";
        if (document.getElementById("dateOfBirth")) document.getElementById("dateOfBirth").value = formData.dateOfBirth || "";
        if (document.getElementById("reqdloanAmount")) document.getElementById("reqdloanAmount").value = formData.reqdloanAmount || "";
        if (document.getElementById("residencePincode")) document.getElementById("residencePincode").value = formData.residencePincode || "";
        
        // Salaried Employment Details
        if (document.getElementById("netMonthlyIncome")) document.getElementById("netMonthlyIncome").value = formData.netMonthlyIncome || "";
        if (document.getElementById("currentEmployer")) document.getElementById("currentEmployer").value = formData.currentEmployer || "";
        if (document.getElementById("workEmail")) document.getElementById("workEmail").value = formData.workEmail || "";
        if (document.getElementById("yearsOfExperience")) document.getElementById("yearsOfExperience").value = formData.yearsOfExperience || "";
        
        // Business Employment Details
        if (document.getElementById("annualTurnover")) document.getElementById("annualTurnover").value = formData.annualTurnover || "";
        if (document.getElementById("businessType")) document.getElementById("businessType").value = formData.businessType || "";
        if (document.getElementById("businessPincode")) document.getElementById("businessPincode").value = formData.businessPincode || "";
        if (document.getElementById("yearsInBusiness")) document.getElementById("yearsInBusiness").value = formData.yearsInBusiness || "";
        
        // Professional Employment Details
        if (document.getElementById("annualReceipts")) document.getElementById("annualReceipts").value = formData.annualReceipts || "";
        if (document.getElementById("profession")) document.getElementById("profession").value = formData.profession || "";
        if (document.getElementById("officePincode")) document.getElementById("officePincode").value = formData.officePincode || "";
        if (document.getElementById("yearsOfPractice")) document.getElementById("yearsOfPractice").value = formData.yearsOfPractice || "";
        
        // Terms and conditions
        if (document.getElementById("terms-checkbox")) document.getElementById("terms-checkbox").checked = formData.termsAccepted || false;
    }
    
    // Update application summary on step 5
    function updateApplicationSummary() {
        if (!summaryContainer) return;
        
        let html = '';
        
        // Personal Information
        html += `<div class="summary-section">
            <h4>Personal Information</h4>
            <div class="summary-item">
                <div class="summary-label">Name</div>
                <div class="summary-value">${formData.fullName || 'Not provided'}</div>
            </div>
            <div class="summary-item">
                <div class="summary-label">Mobile</div>
                <div class="summary-value">${formData.mobileNumber || 'Not provided'}</div>
            </div>
            <div class="summary-item">
                <div class="summary-label">Email</div>
                <div class="summary-value">${formData.email || 'Not provided'}</div>
            </div>
            <div class="summary-item">
                <div class="summary-label">Date of Birth</div>
                <div class="summary-value">${formData.dateOfBirth || 'Not provided'}</div>
            </div>
            <div class="summary-item">
                <div class="summary-label">Loan Amount</div>
                <div class="summary-value">₹ ${formData.reqdloanAmount || 'Not provided'}</div>
            </div>
            <div class="summary-item">
                <div class="summary-label">Residence Pincode</div>
                <div class="summary-value">${formData.residencePincode || 'Not provided'}</div>
            </div>
        </div>`;
        
        // Property Information
        html += `<div class="summary-section">
            <h4>Property Information</h4>
            <div class="summary-item">
                <div class="summary-label">Property Type</div>
                <div class="summary-value">${formData.propertyType || 'Not selected'}</div>
            </div>
        </div>`;
        
        // Employment Information
        html += `<div class="summary-section">
            <h4>Employment Information</h4>
            <div class="summary-item">
                <div class="summary-label">Employment Type</div>
                <div class="summary-value">${formData.employmentType || 'Not selected'}</div>
            </div>`;
        
        // Employment details based on type
        if (formData.employmentType === "Salaried") {
            html += `<div class="summary-item">
                <div class="summary-label">Monthly Income</div>
                <div class="summary-value">₹ ${formData.netMonthlyIncome || 'Not provided'}</div>
            </div>
            <div class="summary-item">
                <div class="summary-label">Current Employer</div>
                <div class="summary-value">${formData.currentEmployer || 'Not provided'}</div>
            </div>
            <div class="summary-item">
                <div class="summary-label">Work Experience</div>
                <div class="summary-value">${formData.yearsOfExperience || 'Not provided'} years</div>
            </div>`;
        } else if (formData.employmentType === "Self Employed Business") {
            html += `<div class="summary-item">
                <div class="summary-label">Annual Turnover</div>
                <div class="summary-value">₹ ${formData.annualTurnover || 'Not provided'}</div>
            </div>
            <div class="summary-item">
                <div class="summary-label">Business Type</div>
                <div class="summary-value">${formData.businessType || 'Not provided'}</div>
            </div>
            <div class="summary-item">
                <div class="summary-label">Years in Business</div>
                <div class="summary-value">${formData.yearsInBusiness || 'Not provided'} years</div>
            </div>`;
        } else if (formData.employmentType === "Self Employed Professional") {
            html += `<div class="summary-item">
                <div class="summary-label">Annual Receipts</div>
                <div class="summary-value">₹ ${formData.annualReceipts || 'Not provided'}</div>
            </div>
            <div class="summary-item">
                <div class="summary-label">Profession</div>
                <div class="summary-value">${formData.profession || 'Not provided'}</div>
            </div>
            <div class="summary-item">
                <div class="summary-label">Years of Practice</div>
                <div class="summary-value">${formData.yearsOfPractice || 'Not provided'} years</div>
            </div>`;
        }
        
        html += `</div>`;
        
        summaryContainer.innerHTML = html;
    }
    
    // Submit application
    function submitApplication() {
        // Since this is a frontend-only implementation, we'll simulate submission
        
        // Show loading state
        submitButton.disabled = true;
        submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
        
        // Simulate API call with timeout
        setTimeout(() => {
            // Hide all steps
            formSteps.forEach(step => {
                step.classList.add("hidden");
            });
            
            // Show thank you screen
            const thankYouScreen = document.getElementById("thank-you");
            if (thankYouScreen) {
                thankYouScreen.classList.remove("hidden");
            }
            
            // Display application number
            const applicationNumberElement = document.getElementById("application-number");
            if (applicationNumberElement) {
                applicationNumberElement.textContent = formData.applicationId;
            }
            
            // Generate loan options
            generateLoanOptions();
            
            // Hide navigation buttons
            if (prevButton) prevButton.style.display = "none";
            if (nextButton) nextButton.style.display = "none";
            if (submitButton) submitButton.style.display = "none";
            
            // Clear stored form data on successful submission
            localStorage.removeItem("homeLoanApplicationData");
            
        }, 2000); // 2 second delay to simulate processing
    }
    
    // Generate loan options for the thank you screen
    function generateLoanOptions() {
        const optionsContainer = document.getElementById("loan-options-container");
        if (!optionsContainer) return;
        
        // Calculate loan amount from form data
        const loanAmount = parseInt(formData.reqdloanAmount) || 2000000;
        
        // Calculate monthly EMI for comparison (simplified calculation)
        function calculateSimpleEMI(principal, rate, years) {
            const monthlyRate = rate / 12 / 100;
            const totalMonths = years * 12;
            const emi = (principal * monthlyRate * Math.pow(1 + monthlyRate, totalMonths)) / 
                        (Math.pow(1 + monthlyRate, totalMonths) - 1);
            return Math.round(emi);
        }
        
        // Generate bank loan options with detailed information
        const options = [
            {
                bank: "HDFC Bank",
                logo: "assets/banks/hdfc-bank.svg",
                name: "HDFC MaxGain Home Loan",
                rate: "8.25% p.a.",
                processingFee: "0.50%",
                years: 20,
                tag: "RECOMMENDED",
                specialOffer: "Zero processing fee for women applicants",
                features: [
                    "20-year tenure with flexible repayment",
                    "Part-payment facility without charges",
                    "Doorstep document collection",
                    "Property search assistance"
                ]
            },
            {
                bank: "State Bank of India",
                logo: "assets/banks/sbi-bank.svg",
                name: "SBI Privilege Home Loan",
                rate: "8.40% p.a.",
                processingFee: "0.35%",
                years: 25,
                tag: "",
                specialOffer: "Special rates for government employees",
                features: [
                    "Up to 25-year repayment tenure",
                    "Free property valuation & legal services",
                    "Dedicated relationship manager",
                    "Balance transfer option available"
                ]
            },
            {
                bank: "ICICI Bank",
                logo: "assets/banks/icici-bank.svg",
                name: "ICICI Express Home Loan",
                rate: "8.60% p.a.",
                processingFee: "0.40%",
                years: 20,
                tag: "FAST APPROVAL",
                specialOffer: "Digital approval within 48 hours",
                features: [
                    "Approval within 48 hours",
                    "Minimal documentation required",
                    "Online account management",
                    "Interest saver options with multiple EMI dates"
                ]
            },
            {
                bank: "Axis Bank",
                logo: "assets/banks/axis-bank.svg",
                name: "Axis Power Home Loan",
                rate: "8.50% p.a.",
                processingFee: "0.45%",
                years: 30,
                tag: "LONGEST TENURE",
                specialOffer: "Offers insurance covers at discounted rates",
                features: [
                    "Longest tenure option up to 30 years",
                    "Home loan overdraft facility",
                    "Step-up EMI option for increasing income",
                    "No hidden charges"
                ]
            }
        ];
        
        let html = '';
        
        options.forEach(option => {
            // Calculate EMI for this loan option
            const emi = calculateSimpleEMI(loanAmount, parseFloat(option.rate), option.years);
            
            html += `
            <div class="loan-option-card">
                ${option.tag ? `<div class="tag">${option.tag}</div>` : ''}
                <img src="${option.logo}" alt="${option.bank} Logo" class="bank-logo">
                <h4>${option.name}</h4>
                <div class="rate">${option.rate}</div>
                <div class="emi">Monthly EMI: ₹${emi.toLocaleString('en-IN')}</div>
                ${option.specialOffer ? `<div class="special-offer">✨ ${option.specialOffer}</div>` : ''}
                <ul>
                    ${option.features.map(feature => `<li>${feature}</li>`).join('')}
                </ul>
                <a href="#" class="btn btn-primary">Apply Now</a>
            </div>`;
        });
        
        optionsContainer.innerHTML = html;
    }
    
    // Show error message
    function showErrorMessage(message) {
        if (errorMessage) {
            errorMessage.textContent = message;
            errorMessage.style.display = "block";
        }
    }
    
    // Hide error message
    function hideErrorMessage() {
        if (errorMessage) {
            errorMessage.style.display = "none";
        }
    }
    
    // Save form data to localStorage
    function saveFormData() {
        localStorage.setItem("homeLoanApplicationData", JSON.stringify(formData));
    }
    
    // Load form data from localStorage
    function loadFormData() {
        const savedData = localStorage.getItem("homeLoanApplicationData");
        return savedData ? JSON.parse(savedData) : null;
    }
    
    // Generate a unique application ID
    function generateApplicationId() {
        const timestamp = new Date().getTime();
        const random = Math.floor(Math.random() * 10000);
        return `HL${timestamp.toString().slice(-6)}${random}`;
    }
});
