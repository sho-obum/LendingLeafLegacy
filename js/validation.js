// Form Validation Utility Functions
document.addEventListener("DOMContentLoaded", function() {
    // Add input event listeners to all form fields
    const formInputs = document.querySelectorAll("input, select, textarea");
    
    formInputs.forEach(input => {
        input.addEventListener("input", function() {
            validateField(this);
        });
        
        input.addEventListener("blur", function() {
            validateField(this);
        });
    });
    
    // Validate individual field
    window.validateField = function(field) {
        // Reset field styles
        field.classList.remove("error");
        
        // Get field type and value
        const type = field.type;
        const value = field.value.trim();
        const name = field.name;
        
        // Skip validation for optional fields that are empty
        if (!value && !field.hasAttribute("required")) {
            return true;
        }
        
        // Validate based on field type
        let isValid = true;
        
        switch (type) {
            case "text":
                if (name === "fullName") {
                    isValid = value.length >= 3;
                } else if (name === "currentEmployer" || name === "businessType" || name === "profession") {
                    isValid = value.length >= 2;
                }
                break;
                
            case "email":
                isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
                break;
                
            case "tel":
                if (name === "mobileNumber") {
                    isValid = /^\d{10}$/.test(value);
                }
                break;
                
            case "number":
                isValid = !isNaN(value) && parseFloat(value) > 0;
                break;
                
            case "date":
                isValid = isValidDate(value);
                break;
                
            case "checkbox":
                isValid = field.checked;
                break;
                
            default:
                isValid = value.length > 0;
        }
        
        // Special validations for specific fields
        if (name === "residencePincode" || name === "businessPincode" || name === "officePincode") {
            isValid = /^\d{6}$/.test(value);
        }
        
        // Mark field as error if invalid
        if (!isValid) {
            field.classList.add("error");
        }
        
        return isValid;
    }
    
    // Check if a date is valid
    function isValidDate(dateString) {
        if (!dateString) return false;
        
        const date = new Date(dateString);
        
        // Check if date is valid
        if (isNaN(date.getTime())) return false;
        
        // Check if date is not in the future
        const today = new Date();
        if (date > today) return false;
        
        // Check if person is at least 18 years old
        const minAge = 18;
        const birthDate = new Date(dateString);
        const ageDate = new Date(today - birthDate);
        const age = Math.abs(ageDate.getUTCFullYear() - 1970);
        
        return age >= minAge;
    }
    
    // Format currency input (for loan amount)
    const currencyInputs = document.querySelectorAll("input[type='number'][id='reqdloanAmount'], input[type='number'][id='netMonthlyIncome'], input[type='number'][id='annualTurnover'], input[type='number'][id='annualReceipts']");
    
    currencyInputs.forEach(input => {
        input.addEventListener("blur", function() {
            const value = this.value.trim();
            if (value && !isNaN(value)) {
                // Round to nearest integer
                this.value = Math.round(parseFloat(value));
            }
        });
    });
});
