<?php
require_once '../config/config.php';
require_once '../vendor/autoload.php'; // Include Composer's autoloader

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reset_password'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Check if the email exists in the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Email exists, generate OTP
        $otp = rand(100000, 999999);
        $_SESSION['otp'] = $otp;
        $_SESSION['otp_expiry'] = time() + 180; // Current time + 180 seconds (3 minutes)
        $user = find('users', ['email' => $_POST['email']]);
        $_SESSION['user_id'] = $user['user_id'];
        // Send OTP via PHPMailer
        $mail = new PHPMailer(true); // Passing `true` enables exceptions

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';  // SMTP server address
            $mail->SMTPAuth   = true;                 // Enable SMTP authentication
            $mail->Username   = 'rosevicfortin388@gmail.com'; // SMTP username
            $mail->Password   = 'ctpwpooyagbuzomj';       // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 587;  // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            // Recipients
            $mail->setFrom('admin.blts@gmail.com', 'Admin BLTS');
            $mail->addAddress($email); // Add a recipient

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Your Password Reset OTP';
            $mail->Body    = "Your OTP for password reset is $otp. This OTP will expire in 3 minutes.";

            $mail->send();

            removeValue(); // Remove the retained value in inputs
            setFlash('success', 'OTP has been sent to your email.'); // Set success message
            redirect('reset_otp'); // Redirect to OTP verification page
        } catch (Exception $e) {
            retainValue(); // Retain form input values
            setFlash('failed', "Failed to send OTP. Error: {$mail->ErrorInfo}"); // Set error message
            redirect('reset_form'); // Redirect back to reset password form
        }
    } else {
        setFlash('failed', 'Email not found.'); // Set error message
        redirect('reset_form'); // Redirect back to reset password form
    }
}
