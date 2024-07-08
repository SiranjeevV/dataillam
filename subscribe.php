
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

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you for your comment!";
    } else {
        echo "Sorry, there was an error sending your message.";
    }
} else {
    // If accessed directly, redirect back to the form
    header("Location: index.html");
}
?>
