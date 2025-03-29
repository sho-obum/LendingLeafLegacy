// EMI Calculator Functionality
document.addEventListener("DOMContentLoaded", function() {
    // Get calculator elements
    const loanAmountInput = document.getElementById("loan-amount");
    const loanAmountSlider = document.getElementById("loan-amount-slider");
    const interestRateInput = document.getElementById("interest-rate");
    const interestRateSlider = document.getElementById("interest-rate-slider");
    const loanTenureInput = document.getElementById("loan-tenure");
    const loanTenureSlider = document.getElementById("loan-tenure-slider");
    
    // Get result elements
    const emiResult = document.getElementById("emi-result");
    const principalAmount = document.getElementById("principal-amount");
    const interestAmount = document.getElementById("interest-amount");
    const totalAmount = document.getElementById("total-amount");
    
    // Initialize calculator
    if (loanAmountInput && interestRateInput && loanTenureInput) {
        // Sync input fields with sliders
        syncInputWithSlider(loanAmountInput, loanAmountSlider);
        syncInputWithSlider(interestRateInput, interestRateSlider);
        syncInputWithSlider(loanTenureInput, loanTenureSlider);
        
        // Calculate initial EMI on page load
        calculateEMI();
        
        // Attach event listeners
        loanAmountInput.addEventListener("input", handleInputChange);
        loanAmountSlider.addEventListener("input", handleSliderChange);
        interestRateInput.addEventListener("input", handleInputChange);
        interestRateSlider.addEventListener("input", handleSliderChange);
        loanTenureInput.addEventListener("input", handleInputChange);
        loanTenureSlider.addEventListener("input", handleSliderChange);
    }
    
    // Function to sync input field with slider
    function syncInputWithSlider(inputField, slider) {
        if (!inputField || !slider) return;
        
        inputField.addEventListener("input", function() {
            const value = parseFloat(inputField.value);
            const min = parseFloat(slider.min);
            const max = parseFloat(slider.max);
            
            if (value < min) inputField.value = min;
            if (value > max) inputField.value = max;
            
            slider.value = inputField.value;
            calculateEMI();
        });
        
        slider.addEventListener("input", function() {
            inputField.value = slider.value;
            calculateEMI();
        });
    }
    
    // Handle input field changes
    function handleInputChange(e) {
        const input = e.target;
        const slider = document.getElementById(`${input.id}-slider`);
        
        if (slider) {
            const value = parseFloat(input.value);
            const min = parseFloat(input.min);
            const max = parseFloat(input.max);
            
            if (value < min) input.value = min;
            if (value > max) input.value = max;
            
            slider.value = input.value;
            calculateEMI();
        }
    }
    
    // Handle slider changes
    function handleSliderChange(e) {
        const slider = e.target;
        const inputId = slider.id.replace("-slider", "");
        const input = document.getElementById(inputId);
        
        if (input) {
            input.value = slider.value;
            calculateEMI();
        }
    }
    
    // Calculate EMI and update results
    function calculateEMI() {
        if (!emiResult || !principalAmount || !interestAmount || !totalAmount) return;
        
        const P = parseFloat(loanAmountInput.value); // Principal loan amount
        const r = parseFloat(interestRateInput.value) / 12 / 100; // Monthly interest rate
        const n = parseFloat(loanTenureInput.value) * 12; // Total number of monthly installments
        
        // EMI calculation formula: EMI = P * r * (1+r)^n / ((1+r)^n - 1)
        if (P > 0 && r > 0 && n > 0) {
            const emi = (P * r * Math.pow(1 + r, n)) / (Math.pow(1 + r, n) - 1);
            const totalPayment = emi * n;
            const totalInterest = totalPayment - P;
            
            // Update the result elements with formatted values
            emiResult.textContent = formatCurrency(emi);
            principalAmount.textContent = formatIndianCurrency(P);
            interestAmount.textContent = formatIndianCurrency(totalInterest);
            totalAmount.textContent = formatIndianCurrency(totalPayment);
        } else {
            // Handle edge case of zero values
            emiResult.textContent = "0";
            principalAmount.textContent = formatIndianCurrency(P);
            interestAmount.textContent = "0";
            totalAmount.textContent = formatIndianCurrency(P);
        }
    }
    
    // Format currency to 2 decimal places
    function formatCurrency(amount) {
        return Math.round(amount).toLocaleString('en-IN');
    }
    
    // Format Indian currency (with commas at correct positions)
    function formatIndianCurrency(amount) {
        // Convert to string with 2 decimal places
        let strAmount = Math.round(amount).toString();
        
        // Split the string into array by decimal point
        let parts = strAmount.split('.');
        let wholePart = parts[0];
        let result = '';
        
        // Format the whole part with Indian number system
        let firstGroup = wholePart.length % 3 || 3;
        result = wholePart.substring(0, firstGroup);
        
        for (let i = firstGroup; i < wholePart.length; i += 2) {
            result += ',' + wholePart.substring(i, i + 2);
        }
        
        return result;
    }
});
