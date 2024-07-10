<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Gather form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $company_email = $_POST['company_email'];
    $phone = $_POST['phone'];
    $company_size = $_POST['company_size'];
    $country = $_POST['country'];
    $message = $_POST['message'];

    // Compose email content
    $to = "your-email@example.com"; // Replace with your email address
    $subject = "New Contact Form Submission";
    $message_body = "First Name: $first_name\n";
    $message_body .= "Last Name: $last_name\n";
    $message_body .= "Company Email: $company_email\n";
    $message_body .= "Phone: $phone\n";
    $message_body .= "Company Size: $company_size\n";
    $message_body .= "Country: $country\n";
    $message_body .= "Message:\n$message\n";

    // Send email
    $headers = "From: $company_email\r\n";
    if (mail($to, $subject, $message_body, $headers)) {
        echo "Mail sent successfully.";
    } else {
        echo "Failed to send mail.";
    }
} else {
    // Redirect back to form if accessed directly
    header("Location: index.html");
    exit();
}
?>
