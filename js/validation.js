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

    const result = validateFieldByName(name, value, field);
    if (result === true) {
      field.classList.remove("error");
      errorEl.textContent = "";
    } else {
      field.classList.add("error");
      errorEl.textContent = result;
    }
  }

  function validateFieldByName(name, value, field) {
    const validator = Validators[name];
    if (!validator) return true;
    const result = validator(value, field);
    return result === true ? true : result;
  }

  const Validators = {
    fullName: (val) => val.length >= 3 || "We need your full name, not a nickname!",
    mobileNumber: (val) => /^\d{10}$/.test(val) || "That doesn’t dial right — 10 digits please!",
    email: (val) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val) || "That email seems lost in the internet ether.",
    dateOfBirth: (val) => {
      if (!val) return "Your birthdate helps us count you in.";
      const date = new Date(val);
      if (isNaN(date)) return "This date seems off. Double-check it.";
      const today = new Date();
      const age = today.getFullYear() - date.getFullYear();
      const isBirthdayPassed =
        today.getMonth() > date.getMonth() ||
        (today.getMonth() === date.getMonth() && today.getDate() >= date.getDate());
      const realAge = isBirthdayPassed ? age : age - 1;
      return realAge >= 18 ? true : "You need to be at least 18 to adult your way into a loan.";
    },typeOfLoan: () => {
      const selected = document.querySelector('input[name="typeOfLoan"]:checked');
      return selected ? true : "Select a loan type to continue.";
    },
    reqdloanAmount: (val, field) => {
      const raw = field.dataset.raw || val.replace(/,/g, '');
      const num = parseInt(raw);
      if (num < 100000) return "That’s too little. We only deal in serious dreams (₹1L+).";
      if (num > 100000000) return "That's too ambitious. Let's cap it at ₹10 Cr.";
      return true;
    },
    residencePincode: (val) => /^\d{6}$/.test(val) || "6 digits only! Let’s not confuse your address.",
    netMonthlyIncome: (val, field) => {
      const raw = field.dataset.raw || val.replace(/,/g, '');
      return parseInt(raw) >= 10000 || "Too low! We need stable income (₹10k+).";
    },
    currentEmployer: (val) => val.length >= 2 || "Your employer deserves a proper name!",
    workEmail: (val) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val) || "Work email looks off. Boss might disapprove.",
    yearsOfExperience: (val) =>
      /^\d{1,2}$/.test(val) || "Experience must be 1 or 2 digits max. Don’t overdo it!",
    businessType: (val) => val.length > 1 || "Business type can’t be a mystery!",
    annualTurnover: (val, field) => {
      const raw = field.dataset.raw || val.replace(/,/g, '');
      return parseInt(raw) >= 500000 || "That turnover won’t turn heads. Minimum ₹5L please.";
    },
    businessPincode: (val) => /^\d{6}$/.test(val) || "6 digits only for business area too!",
    yearsInBusiness: (val) => /^\d{1,2}$/.test(val) || "Can't have more than 2 digits in years!",
    profession: (val) => /^[A-Za-z\s]{2,}$/.test(val) || "Your profession can’t be... numbers!",
    annualReceipts: (val, field) => {
      const raw = field.dataset.raw || val.replace(/,/g, '');
      return parseInt(raw) >= 300000 || "Receipts too low. Show us the money (₹3L+)!";
    },
    officePincode: (val) => /^\d{6}$/.test(val) || "That office pincode doesn’t quite pin it.",
    yearsOfPractice: (val) => /^\d{1,2}$/.test(val) || "Only 2 digits allowed for experience!",
  };

  function scrollToFirstError() {
    const firstErrorField = document.querySelector("input.error, select.error, textarea.error");
    if (firstErrorField) {
      firstErrorField.scrollIntoView({ behavior: "smooth", block: "center" });
      firstErrorField.classList.add("shake");
      setTimeout(() => firstErrorField.classList.remove("shake"), 500);
    }
  }
  window.scrollToFirstError = scrollToFirstError;

  const textOnlyFields = ["profession", "businessType", "currentEmployer"];
  textOnlyFields.forEach((id) => {
    const field = document.getElementById(id);
    if (!field) return;
    field.addEventListener("keypress", function (e) {
      if (/\d/.test(e.key)) e.preventDefault(); // Block numbers
    });
  });

  const yearFields = ["yearsOfExperience", "yearsInBusiness", "yearsOfPractice"];
  yearFields.forEach((id) => {
    const field = document.getElementById(id);
    if (!field) return;

    field.setAttribute("maxlength", "2");

    field.addEventListener("input", function () {
      this.value = this.value.replace(/[^0-9]/g, "").slice(0, 2);
    });
  });


  const inrFields = ["reqdloanAmount", "netMonthlyIncome", "annualTurnover", "annualReceipts"];
  inrFields.forEach((id) => {
    const field = document.getElementById(id);
    if (!field) return;

    field.addEventListener("input", function () {
      const cleanValue = this.value.replace(/[^0-9]/g, "");
      this.setAttribute("data-raw", cleanValue);
      this.value = formatINR(cleanValue);
    });

    field.addEventListener("blur", function () {
      const cleanValue = this.value.replace(/[^0-9]/g, "");
      this.setAttribute("data-raw", cleanValue);
      this.value = formatINR(cleanValue);
    });

    field.addEventListener("focus", function () {
      const raw = this.getAttribute("data-raw") || this.value.replace(/[^0-9]/g, "");
      this.value = raw;
    });
  });

  function formatINR(val) {
    const x = val.toString();
    const lastThree = x.slice(-3);
    const other = x.slice(0, -3);
    return other.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + (other ? "," : "") + lastThree;
  }
});