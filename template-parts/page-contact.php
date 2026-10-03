<?php
/**
 * Contact Page Template
 * Includes custom PHP contact form handler
 */

get_header();

$contact_title = get_field('contact_title') ?: 'Contact Us';
$contact_description = get_field('contact_description') ?: 'Have questions? We\'d love to hear from you.';

// Handle form submission
$form_submitted = false;
$form_error = false;
$form_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_form'])) {
    // Verify nonce
    if (!isset($_POST['contact_nonce']) || !wp_verify_nonce($_POST['contact_nonce'], 'contact_form_nonce')) {
        $form_error = true;
        $form_message = 'Security check failed. Please try again.';
    } else {
        // Sanitize inputs
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $phone = sanitize_text_field($_POST['phone']);
        $subject = sanitize_text_field($_POST['subject']);
        $message = sanitize_textarea_field($_POST['message']);
        
        // Validate
        if (empty($name) || empty($email) || empty($message)) {
            $form_error = true;
            $form_message = 'Please fill in all required fields.';
        } elseif (!is_email($email)) {
            $form_error = true;
            $form_message = 'Please enter a valid email address.';
        } else {
            // Get settings
            $recipient_email = get_field('contact_email', 'option') ?: get_option('admin_email');
            $email_subject = get_field('contact_subject', 'option') ?: 'New Contact Form Submission';
            
            // Build email
            $email_to = $recipient_email;
            $email_subject = $subject ?: $email_subject;
            
            $email_body = "You have received a new message from your website contact form.\n\n";
            $email_body .= "Name: {$name}\n";
            $email_body .= "Email: {$email}\n";
            $email_body .= "Phone: {$phone}\n";
            $email_body .= "Subject: {$subject}\n";
            $email_body .= "Message:\n{$message}\n";
            
            // Send email
            $headers = array('Content-Type: text/plain; charset=UTF-8');
            
            if (wp_mail($email_to, $email_subject, $email_body, $headers)) {
                $form_submitted = true;
                $form_message = get_field('success_message', 'option') ?: 'Thank you! Your message has been sent.';
            } else {
                $form_error = true;
                $form_message = 'Sorry, there was an error sending your message. Please try again.';
            }
        }
    }
}

?>

<main id="content" class="site-main">

    <!-- Hero Section -->
    <section class="page-hero" style="background: linear-gradient(135deg, #3b82f6, #2563eb);">
        <div class="container">
            <div class="hero-content">
                <h1 style="color: var(--background);"><?php echo esc_html($contact_title); ?></h1>
                <p style="opacity: 0.9;"><?php echo esc_html($contact_description); ?></p>
            </div>
        </div>
    </section>

    <!-- Contact Form -->
    <section class="contact-section">
        <div class="container">
            <div class="grid grid-2" style="align-items: start; gap: 3rem;">
                
                <!-- Contact Form -->
                <div class="contact-form-wrapper">
                    <?php if($form_submitted): ?>
                        <div class="success-message" style="background: var(--success); color: var(--background); padding: 1.5rem; border-radius: 0.5rem; margin-bottom: 1rem;">
                            <?php echo esc_html($form_message); ?>
                        </div>
                    <?php elseif($form_error): ?>
                        <div class="error-message" style="background: #ef4444; color: var(--background); padding: 1.5rem; border-radius: 0.5rem; margin-bottom: 1rem;">
                            <?php echo esc_html($form_message); ?>
                        </div>
                    <?php endif; ?>
                    
                    <form class="contact-form" method="POST" action="<?php the_permalink(); ?>">
                        <?php wp_nonce_field('contact_form_nonce', 'contact_nonce'); ?>
                        
                        <div class="form-group">
                            <label for="name">Name *:</label>
                            <input type="text" id="name" name="name" required value="<?php echo esc_attr($_POST['name'] ?? ''); ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email *:</label>
                            <input type="email" id="email" name="email" required value="<?php echo esc_attr($_POST['email'] ?? ''); ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="tel" id="phone" name="phone" value="<?php echo esc_attr($_POST['phone'] ?? ''); ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="subject">Subject:</label>
                            <input type="text" id="subject" name="subject" value="<?php echo esc_attr($_POST['subject'] ?? ''); ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="message">Message *:</label>
                            <textarea id="message" name="message" rows="6" required><?php echo esc_textarea($_POST['message'] ?? ''); ?></textarea>
                        </div>
                        
                        <button type="submit" name="contact_form" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
                
                <!-- Contact Info -->
                <div class="contact-info">
                    <h3 style="font-size: 1.5rem; margin-bottom: 1.5rem;">Get in Touch</h3>
                    
                    <div style="margin-bottom: 1.5rem;">
                        <strong>Email:</strong><br>
                        <a href="mailto:<?php echo esc_attr(get_option('admin_email')); ?>"><?php echo esc_html(get_option('admin_email')); ?></a>
                    </div>
                    
                    <div style="margin-bottom: 1.5rem;">
                        <strong>Phone:</strong><br>
                        +1 (555) 123-4567
                    </div>
                    
                    <div style="margin-bottom: 1.5rem;">
                        <strong>Address:</strong><br>
                        123 Business Street<br>
                        City, State 12345
                    </div>
                    
                    <div>
                        <strong>Business Hours:</strong><br>
                        Monday - Friday: 9:00 AM - 6:00 PM<br>
                        Saturday: 10:00 AM - 4:00 PM
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
?>