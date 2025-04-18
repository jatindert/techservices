<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Email details
    $to = 'support@techservices.com';  // Updated email
    $subject = 'New Contact Us Message';
    $body = "Name: $name\nEmail: $email\nMessage:\n$message";

    // Sending email
    if (mail($to, $subject, $body)) {
        $successMessage = "Thank you for reaching out! We'll get back to you as soon as possible. If you need any immediate help, feel free to contact us directly at <strong>support@techservices.com</strong>.";
    } else {
        $errorMessage = "Sorry, something went wrong. Please try again later.";
    }
}
?>

<?php include 'include/header.php'; ?>

<style>
/* Contact Us Page Styling */
.contact-container {
    max-width: 800px;
    margin: 50px auto;
    padding: 40px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.contact-header {
    text-align: center;
    margin-bottom: 40px;
}

.contact-header h1 {
    font-size: 36px;
    color: #333;
}

.contact-header p {
    font-size: 18px;
    color: #555;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

.contact-form input, .contact-form textarea {
    width: 100%;
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 8px;
    border: 1px solid #ddd;
    font-size: 16px;
    color: #333;
}

.contact-form button {
    padding: 15px 30px;
    background-color: #0073aa;
    color: #fff;
    font-size: 18px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.contact-form button:hover {
    background-color: #005f7f;
}

.success-message, .error-message {
    text-align: center;
    margin-top: 20px;
    font-size: 18px;
    color: #28a745;
}

.error-message {
    color: #dc3545;
}
</style>

<div class="contact-container">
    <!-- Contact Header -->
    <div class="contact-header">
        <h1>Contact Us</h1>
        <p>If you have any questions or need assistance, please fill out the form below. We’re here to help!</p>
    </div>

    <!-- Contact Form -->
    <div class="contact-form">
        <?php if (isset($successMessage)): ?>
            <div class="success-message"><?= $successMessage; ?></div>
        <?php elseif (isset($errorMessage)): ?>
            <div class="error-message"><?= $errorMessage; ?></div>
        <?php else: ?>
            <form action="contact.php" method="POST">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
                <button type="submit">Send Message</button>
            </form>
        <?php endif; ?>
    </div>

    <!-- Message under form -->
    <div class="contact-message">
        <p>If you need help or have any questions, please don't hesitate to contact us directly at <strong>support@techservices.com</strong>.</p>
    </div>
</div>

<?php include 'include/footer.php'; ?>
