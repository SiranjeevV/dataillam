<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $role = $_POST['role'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $job_type = $_POST['job_type'];
    $experience = $_POST['experience'];
    $source = $_POST['source'];
    $about = $_POST['about'];

    // Sanitize form data
    $role = filter_var($role, FILTER_SANITIZE_STRING);
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $job_type = filter_var($job_type, FILTER_SANITIZE_STRING);
    $experience = filter_var($experience, FILTER_SANITIZE_STRING);
    $source = filter_var($source, FILTER_SANITIZE_STRING);
    $about = filter_var($about, FILTER_SANITIZE_STRING);

    // Prepare email content
    $subject = 'New Application for ' . $role;
    $email_body = "Role: $role\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Job Type: $job_type\n";
    $email_body .= "Experience: $experience\n";
    $email_body .= "Source: $source\n";
    $email_body .= "About Yourself:\n$about\n";

    // Email settings
    $to = 'siranjeev@iqtechmax.com';  // Replace with your email address
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Handle file upload
    if (isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['resume']['tmp_name'];
        $file_name = $_FILES['resume']['name'];
        $file_type = $_FILES['resume']['type'];
        $file_size = $_FILES['resume']['size'];

        // Read file content
        $file_content = chunk_split(base64_encode(file_get_contents($file_tmp)));

        // Boundary for email
        $boundary = md5(time());

        // Email headers for attachments
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n\r\n";

        // Email body with attachment
        $email_body = "--$boundary\r\n";
        $email_body .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $email_body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $email_body .= "Role: $role\n";
        $email_body .= "Name: $name\n";
        $email_body .= "Email: $email\n";
        $email_body .= "Job Type: $job_type\n";
        $email_body .= "Experience: $experience\n";
        $email_body .= "Source: $source\n";
        $email_body .= "About Yourself:\n$about\n\r\n";
        $email_body .= "--$boundary\r\n";
        $email_body .= "Content-Type: $file_type; name=\"$file_name\"\r\n";
        $email_body .= "Content-Transfer-Encoding: base64\r\n";
        $email_body .= "Content-Disposition: attachment; filename=\"$file_name\"\r\n\r\n";
        $email_body .= $file_content . "\r\n";
        $email_body .= "--$boundary--";

        // Send the email
        if (mail($to, $subject, $email_body, $headers)) {
            echo "Thank you for your application, $name. We will get back to you shortly.";
        } else {
            echo "Sorry, there was an error sending your application. Please try again later.";
        }
    } else {
        echo "No file was uploaded or there was an upload error.";
    }
} else {
    echo "Invalid request.";
}
?>
