<?php
/**
 * NexCore Technologies - Contact Form Handler
 * 
 * This PHP script handles contact form submissions.
 * It validates input, sanitizes data, and sends email notifications.
 * 
 * Instructions:
 * 1. Update the $to_email variable with your actual email address
 * 2. Configure your server's mail settings (SMTP recommended)
 * 3. Ensure proper file permissions on the server
 */

// Enable error reporting for development (disable in production)
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// Security Headers
header('Content-Type: application/json');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');

// Configuration
$to_email = "info@nexcore.tech"; // ⚠️ CHANGE THIS to your actual email
$from_email = "noreply@nexcore.tech";
$from_name = "NexCore Website";
$subject_prefix = "[NexCore Contact Form]";

// Initialize response
$response = [
    'success' => false,
    'message' => ''
];

// Check if request is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $response['message'] = 'Invalid request method.';
    http_response_code(405);
    echo json_encode($response);
    exit;
}

// Validate and sanitize inputs
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

// Get form data
$name = isset($_POST['name']) ? sanitize_input($_POST['name']) : '';
$email = isset($_POST['email']) ? sanitize_input($_POST['email']) : '';
$phone = isset($_POST['phone']) ? sanitize_input($_POST['phone']) : '';
$subject = isset($_POST['subject']) ? sanitize_input($_POST['subject']) : 'General Inquiry';
$message = isset($_POST['message']) ? sanitize_input($_POST['message']) : '';

// Validation
$errors = [];

// Validate name
if (empty($name) || strlen($name) < 2) {
    $errors[] = 'Please provide a valid name (minimum 2 characters).';
}

// Validate email
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please provide a valid email address.';
}

// Validate message
if (empty($message) || strlen($message) < 10) {
    $errors[] = 'Please provide a message (minimum 10 characters).';
}

// Check for errors
if (!empty($errors)) {
    $response['message'] = implode(' ', $errors);
    http_response_code(400);
    echo json_encode($response);
    exit;
}

// Basic spam protection (honeypot field - add this to your HTML form if needed)
if (isset($_POST['website']) && !empty($_POST['website'])) {
    $response['message'] = 'Spam detected.';
    http_response_code(403);
    echo json_encode($response);
    exit;
}

// Rate limiting (simple IP-based)
session_start();
$current_time = time();
$rate_limit_duration = 60; // 1 minute

if (isset($_SESSION['last_submission_time'])) {
    $time_since_last = $current_time - $_SESSION['last_submission_time'];
    if ($time_since_last < $rate_limit_duration) {
        $response['message'] = 'Please wait before submitting another message.';
        http_response_code(429);
        echo json_encode($response);
        exit;
    }
}

// Prepare email content
$email_subject = $subject_prefix . ' ' . $subject;

$email_body = "
New Contact Form Submission from NexCore Website
=================================================

Name: {$name}
Email: {$email}
Phone: {$phone}
Subject: {$subject}

Message:
{$message}

=================================================
Submitted on: " . date('Y-m-d H:i:s') . "
IP Address: {$_SERVER['REMOTE_ADDR']}
User Agent: {$_SERVER['HTTP_USER_AGENT']}
";

// Email headers
$headers = [
    "From: {$from_name} <{$from_email}>",
    "Reply-To: {$name} <{$email}>",
    "X-Mailer: PHP/" . phpversion(),
    "MIME-Version: 1.0",
    "Content-Type: text/plain; charset=UTF-8"
];

// Send email
$mail_sent = mail($to_email, $email_subject, $email_body, implode("\r\n", $headers));

if ($mail_sent) {
    // Update session for rate limiting
    $_SESSION['last_submission_time'] = $current_time;
    
    // Optional: Send auto-reply to user
    send_auto_reply($email, $name);
    
    // Optional: Log submission (recommended)
    log_submission($name, $email, $subject);
    
    $response['success'] = true;
    $response['message'] = 'Thank you for contacting us! We will get back to you soon.';
    http_response_code(200);
} else {
    $response['message'] = 'Failed to send message. Please try again later or contact us directly.';
    http_response_code(500);
}

echo json_encode($response);
exit;

/**
 * Send automatic reply to the user
 */
function send_auto_reply($user_email, $user_name) {
    global $from_email, $from_name;
    
    $subject = "Thank you for contacting NexCore Technologies";
    
    $message = "
Dear {$user_name},

Thank you for reaching out to NexCore Technologies!

We have received your message and one of our team members will get back to you within 24 hours during business days.

In the meantime, feel free to explore our website:
- Services: https://yourwebsite.com/services.html
- About Us: https://yourwebsite.com/about.html

If you have an urgent inquiry, please call us at +92 123 456 7890.

Best regards,
The NexCore Technologies Team

---
This is an automated message. Please do not reply to this email.
For support, contact us at info@nexcore.tech
";
    
    $headers = [
        "From: {$from_name} <{$from_email}>",
        "MIME-Version: 1.0",
        "Content-Type: text/plain; charset=UTF-8"
    ];
    
    mail($user_email, $subject, $message, implode("\r\n", $headers));
}

/**
 * Log submission to file (optional)
 */
function log_submission($name, $email, $subject) {
    $log_file = 'contact_submissions.log';
    $log_entry = date('Y-m-d H:i:s') . " | {$name} | {$email} | {$subject}\n";
    
    // Append to log file
    file_put_contents($log_file, $log_entry, FILE_APPEND | LOCK_EX);
}
?>
