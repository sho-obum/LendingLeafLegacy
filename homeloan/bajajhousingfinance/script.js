// For Firebase JS SDK v7.20.0 and later, measurementId is optional
// const firebaseConfig = {
//     apiKey: "AIzaSyDU4GhNyMI2jiRxsG096KKCHNzKUskdk9k",
//     authDomain: "bajajfinserv-209a3.firebaseapp.com",
//     projectId: "bajajfinserv-209a3",
//     storageBucket: "bajajfinserv-209a3.firebasestorage.app",
//     messagingSenderId: "605219843890",
//     appId: "1:605219843890:web:c5556a9a40905218d1312b",
//     measurementId: "G-NG4QNP9CQK"
// };

const firebaseConfig = {
    apiKey: "AIzaSyCkBfWKlDEAxDCTLVmwdwc6OqhCMSp8wKY",
    authDomain: "bajaj-finserv-81b28.firebaseapp.com",
    projectId: "bajaj-finserv-81b28",
    storageBucket: "bajaj-finserv-81b28.firebasestorage.app",
    messagingSenderId: "789970583260",
    appId: "1:789970583260:web:efdbdf5a94905673b03e19",
    measurementId: "G-GEZ6KRVN6Z"
  };

// Initialize Firebase SDK
firebase.initializeApp(firebaseConfig);

// Setup reCAPTCHA
window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
    'size': 'invisible'
});

// Function to send OTP
function dgmSendOTP() {
    let number = document.getElementById('number').value.trim();

    // Validate phone number
    if (!number) {
        alert("Please enter a valid phone number.");
        return;
    }

    firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier)
        .then(function (confirmationResult) {
            window.confirmationResult = confirmationResult;
            sessionStorage.setItem("confirmationResult", JSON.stringify(confirmationResult)); // Store it in session
            document.querySelector('.number-input').style.display = 'none';
            document.querySelector('.verification').style.display = '';
        })
        .catch(function (error) {
            alert("Error sending OTP: " + error.message);
        });
}

// Function to verify OTP
function verifyOTPdgm() {
        let code;
        first = $("#otp-number-input-1").val();
        second = $("#otp-number-input-2").val();
        third = $("#otp-number-input-3").val();
        forth = $("#otp-number-input-4").val();
        fifth = $("#otp-number-input-5").val();
        sixth = $("#otp-number-input-6").val();
        otp = first + second + third + forth + fifth + sixth;

    //let code = document.getElementById('verificationCode').value.trim();

    // Retrieve confirmationResult from session storage if lost
    if (!window.confirmationResult) {
        let storedResult = sessionStorage.getItem("confirmationResult");
        if (storedResult) {
            window.confirmationResult = JSON.parse(storedResult);
        }
    }

    if (!window.confirmationResult) {
        alert("OTP session expired. Please request a new OTP.");
        window.location.href = "otp_request.php"; // Redirect to OTP request page
        return;
    }

    window.confirmationResult.confirm(code)
        .then(function (result) {
            let user = result.user;
            document.querySelector('.verification').style.display = 'none';
            document.querySelector('.result').style.display = '';
            document.querySelector('.correct').style.display = '';
            console.log('OTP Verified. User:', user.phoneNumber);

            // Send verified phone number to the server
            fetch("verify.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ phoneNumber: user.phoneNumber })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = "dashboard.php";
                } else {
                    alert("Error in verification.");
                }
            });
        })
        .catch(function () {
            document.querySelector('.verification').style.display = 'none';
            document.querySelector('.result').style.display = '';
            document.querySelector('.incorrect').style.display = '';
            console.log('OTP Not correct');
        });
}
