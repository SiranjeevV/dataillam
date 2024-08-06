<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['text'];

    // Email address where you want to receive the emails
    $to = "siranjeev@iqtechmax.com";

    // Subject of the email
    $subject = "New Message from $name";

    // Compose the email message
    $message = "Name: $name\n\n";
    $message .= "Email: $email\n\n";
    $message .= "Comment:\n$comment";

    // Set headers
    $headers = "From: $email";

    if (mail($to, $subject, $message, $headers)) { // Changed $body to $message
        // Email sent successfully, redirect to thank you page
        header('Location: index.html');
        exit; // Ensure script stops execution after redirection
    } else {
        // Email sending failed
        echo "Failed to send email. Please try again later.";
    }
} else {
    // If accessed directly, redirect back to the form
    header("Location: index.html");
}
?>

