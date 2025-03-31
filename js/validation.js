document.addEventListener("DOMContentLoaded", function () {
  const formInputs = document.querySelectorAll("input, select, textarea");

  // Error message container creation
  formInputs.forEach((input) => {
    const errorEl = document.createElement("small");
    errorEl.classList.add("error-msg");
    input.insertAdjacentElement("afterend", errorEl);

    input.addEventListener("input", () => handleValidation(input));
    input.addEventListener("blur", () => handleValidation(input));
  });

  function handleValidation(field) {
    const name = field.name;
    const value = field.value.trim();
    const errorEl = field.nextElementSibling;

    const result = validateFieldByName(name, value);
    if (result === true) {
      field.classList.remove("error");
      errorEl.textContent = "";
    } else {
      field.classList.add("error");
      errorEl.textContent = result;
    }
  }

  function validateFieldByName(name, value) {
    const validator = Validators[name];
    if (!validator) return true;
    const result = validator(value);
    return result === true ? true : result;
  }

  const Validators = {
    fullName: (val) =>
      val.length >= 3 || "We need your full name, not a nickname!",
    mobileNumber: (val) =>
      /^\d{10}$/.test(val) || "That doesn’t dial right — 10 digits please!",
    email: (val) =>
      /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val) ||
      "That email seems lost in the internet ether.",
    dateOfBirth: (val) => {
      if (!val) return "Your birthdate helps us count you in.";
      const date = new Date(val);
      if (isNaN(date)) return "This date seems off. Double-check it.";
      const today = new Date();
      const age = today.getFullYear() - date.getFullYear();
      const isBirthdayPassed =
        today.getMonth() > date.getMonth() ||
        (today.getMonth() === date.getMonth() &&
          today.getDate() >= date.getDate());
      const realAge = isBirthdayPassed ? age : age - 1;
      return realAge >= 18
        ? true
        : "You need to be at least 18 to adult your way into a loan.";
    },
    reqdloanAmount: (val) =>
      parseInt(val) >= 100000 ||
      "That’s too little. We only deal in serious dreams (₹1L+).",
    residencePincode: (val) =>
      /^\d{6}$/.test(val) || "6 digits only! Let’s not confuse your address.",
    netMonthlyIncome: (val) =>
      parseInt(val) >= 10000 || "Too low! We need stable income (₹10k+).",
    currentEmployer: (val) =>
      val.length >= 2 || "Your employer deserves a proper name!",
    workEmail: (val) =>
      /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val) ||
      "Work email looks off. Boss might disapprove.",
    yearsOfExperience: (val) =>
      parseFloat(val) >= 0 ||
      "Experience can’t be negative. Unless you time travel?",
    businessType: (val) =>
      val.length > 1 || "Business type can’t be a mystery!",
    annualTurnover: (val) =>
      parseInt(val) >= 500000 ||
      "That turnover won’t turn heads. Minimum ₹5L please.",
    businessPincode: (val) =>
      /^\d{6}$/.test(val) || "6 digits only for business area too!",
    yearsInBusiness: (val) =>
      parseInt(val) >= 0 || "Can't have negative years in business!",
    profession: (val) =>
      val.length > 1 || "Your profession can’t be... undefined?",
    annualReceipts: (val) =>
      parseInt(val) >= 300000 || "Receipts too low. Show us the money (₹3L+)!",
    officePincode: (val) =>
      /^\d{6}$/.test(val) || "That office pincode doesn’t quite pin it.",
    yearsOfPractice: (val) =>
      parseInt(val) >= 0 || "Experience counts, even for professionals!",
  };

  // Auto format number inputs on blur
  const currencyInputs = document.querySelectorAll("input[type='number']");
  currencyInputs.forEach((input) => {
    input.addEventListener("blur", function () {
      const val = this.value.trim();
      if (val && !isNaN(val)) this.value = Math.round(parseFloat(val));
    });
  });
  
  function scrollToFirstError() {
    const firstErrorField = document.querySelector(
      "input.error, select.error, textarea.error"
    );
    if (firstErrorField) {
      firstErrorField.scrollIntoView({ behavior: "smooth", block: "center" });

      // Optional: Add temporary shake animation
      firstErrorField.classList.add("shake");
      setTimeout(() => firstErrorField.classList.remove("shake"), 500);
    }
  }
  window.scrollToFirstError = scrollToFirstError; // make accessible globally
});
