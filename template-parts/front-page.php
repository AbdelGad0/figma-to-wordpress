<?php
/**
 * Front Page Template - Hero + Features + Services + Testimonials + CTA
 * This template handles the main landing page layout
 */

get_header();

// Check if ACF is active and get fields
$hero_title = get_field('hero_title');
$hero_subtitle = get_field('hero_subtitle');
$cta_text = get_field('cta_text');
$cta_link = get_field('cta_link');

// Get features
$features = get_field('features');

// Get services
$services = get_field('services');

// Get testimonials
$testimonials = get_field('testimonials');

?>

<main id="content" class="site-main">

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1><?php echo esc_html($hero_title ?: 'Welcome to Positively'); ?></h1>
                <p class="subtitle"><?php echo esc_html($hero_subtitle ?: 'Discover amazing solutions for your business.'); ?></p>
                <?php if($cta_text && $cta_link): ?>
                    <a href="<?php echo esc_url($cta_link['url']); ?>" class="btn btn-primary"><?php echo esc_html($cta_text); ?></a>
                <?php else: ?>
                    <a href="#services" class="btn btn-primary">Learn More</a>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <h2><?php echo esc_html(get_field('features_title') ?: 'Key Features'); ?></h2>
            <div class="grid grid-3">
                <?php if($features): ?>
                    <?php foreach($features as $feature): ?>
                        <div class="feature-item">
                            <span class="icon"><?php echo esc_html($feature['icon'] ?: '★'); ?></span>
                            <h3><?php echo esc_html($feature['title'] ?: 'Feature Title'); ?></h3>
                            <p><?php echo esc_html($feature['description'] ?: 'Feature description.'); ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="feature-item">
                        <span class="icon">★</span>
                        <h3>Elegant Design</h3>
                        <p>Pixel-perfect design that looks great on every device.</p>
                    </div>
                    <div class="feature-item">
                        <span class="icon">★</span>
                        <h3>Fast Performance</h3>
                        <p>Optimized for speed and user experience.</p>
                    </div>
                    <div class="feature-item">
                        <span class="icon">★</span>
                        <h3>Custom Built</h3>
                        <p>Built specifically for your business needs.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section" id="services">
        <div class="container">
            <h2><?php echo esc_html(get_field('services_title') ?: 'Our Services'); ?></h2>
            <div class="grid grid-3">
                <?php if($services): ?>
                    <?php foreach($services as $service): ?>
                        <div class="service-item">
                            <span class="icon"><?php echo esc_html($service['icon'] ?: '⚙️'); ?></span>
                            <h3><?php echo esc_html($service['title'] ?: 'Service Title'); ?></h3>
                            <p><?php echo esc_html($service['description'] ?: 'Service description here.'); ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="service-item">
                        <span class="icon">⚙️</span>
                        <h3>Web Development</h3>
                        <p>Modern, responsive websites built for performance.</p>
                    </div>
                    <div class="service-item">
                        <span class="icon">📱</span>
                        <h3>Mobile Apps</h3>
                        <p>Native and cross-platform mobile applications.</p>
                    </div>
                    <div class="service-item">
                        <span class="icon">☁️</span>
                        <h3>Cloud Solutions</h3>
                        <p>Infrastructure and deployment solutions.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="container">
            <h2>What Our Clients Say</h2>
            <div class="grid grid-2">
                <?php if($testimonials): ?>
                    <?php foreach($testimonials as $testimonial): ?>
                        <div class="testimonial-item">
                            <p class="quote">"{<?php echo esc_html($testimonial['quote'] ?: 'Amazing service and quality!'); ?>"</p>
                            <div class="author"><?php echo esc_html($testimonial['name'] ?: 'Client Name'); ?></div>
                            <div class="role"><?php echo esc_html($testimonial['role'] ?: 'Client Role'); ?></div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="testimonial-item">
                        <p class="quote">"This team delivered exactly what we needed. Excellent communication and quality work!"</p>
                        <div class="author">John Smith</div>
                        <div class="role">CEO, TechCorp</div>
                    </div>
                    <div class="testimonial-item">
                        <p class="quote">"Outstanding project management and technical expertise. Highly recommend!"</p>
                        <div class="author">Sarah Johnson</div>
                        <div class="role">Marketing Director</div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2>Ready to Get Started?</h2>
            <p>Let's discuss your project and create something amazing together.</p>
            <a href="#contact" class="btn btn-secondary">Contact Us Today</a>
        </div>
    </section>

</main>

<?php
get_footer();
?>