<?php
session_start(); // Start the session

// Check if the token is provided in the URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    // Compare the token from the URL with the one stored in the session
    if ($token === $_SESSION['verification_token']) {
        // Email verified successfully
        echo "Your email has been verified. You can now proceed with your account setup.";
        // Clear the verification token from the session (optional)
        unset($_SESSION['verification_token']);
        // Redirect the user or show a success message
    } else {
        // Token mismatch, show an error or redirect to an error page
        echo "Invalid verification token.";
    }
} else {
    // Token not provided in the URL, show an error or redirect
    echo "Verification token missing.";
}
?>
