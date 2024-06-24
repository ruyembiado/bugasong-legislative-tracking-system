<?php
require_once '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['verify_otp'])) {
    // Assuming you've stored OTP and expiry in session during OTP generation
    $expectedOTP = $_SESSION['otp']; // Retrieve OTP from session
    $enteredOTP = "";

    // Combine digits into OTP
    for ($i = 1; $i <= 6; $i++) {
        $enteredOTP .= $_POST["digit$i"];
    }

    // Verify OTP
    if ($enteredOTP == $expectedOTP && $_SESSION['otp_expiry'] >= time()) {
        // OTP is valid and within expiry time
        unset($_SESSION['otp']); // Clear OTP from session once verified
        unset($_SESSION['otp_expiry']); // Clear OTP expiry from session
        setFlash('success', 'Verified.');
        redirect('reset_password');
    } else {
        // Invalid OTP or expired
        setFlash('failed', 'Invalid OTP. Please try again.');
        redirect('reset_otp'); // Redirect back to OTP entry page
        exit();
    }
} else {
    setFlash('failed', 'Verification failed.');
    redirect('reset_otp');
    exit();
}
