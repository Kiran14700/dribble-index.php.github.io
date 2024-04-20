<?php
session_start(); // Start the session

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['Name'];
    $username = $_POST['Username'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    // Generate a verification token (you can use a library for better security)
    $token = bin2hex(random_bytes(16)); // Generates a 32-character hexadecimal token

    // Store the token in the session (for verification later)
    $_SESSION['verification_token'] = $token;

    // Compose the email
    $to = $email;
    $subject = "Verify Your Email on Dribble";
    $message = "Dear $name,<br><br>";
    $message .= "Thank you for signing up on Dribble. Please click the link below to verify your email address:<br>";
    $message .= "<a href='http://dribble.com/verify_email.php?token=$token'>Verify Email</a><br><br>";
    $message .= "If you did not sign up for an account on Dribble, please ignore this email.<br><br>";
    $message .= "Best regards,<br>The Dribble Team";

    // Set headers for HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // Send the email
    $result = mail($to, $subject, $message, $headers);

    if ($result) {
        // Email sent successfully
        echo "A verification email has been sent to your email address. Please check your inbox (and spam/junk folder if needed).";
        // Redirect the user or show a message to check their email
    } else {
        // Error sending email
        echo "Error sending verification email. Please try again later.";
        // You might want to handle the error gracefully or show a message to the user
    }
} else {
    // Redirect or show an error if someone accesses this page directly without submitting the form
    echo "Access denied.";
}
?>
