<?php
/**
 * About Page Template
 * Dedicated informational page about the company/services
 */

get_header();

$about_title = get_field('about_title') ?: 'About Us';
$about_content = get_field('about_content');
$about_image = get_field('about_image');

?>

<main id="content" class="site-main">

    <!-- Hero/Breadcrumb -->
    <section class="page-hero" style="background: linear-gradient(135deg, #3b82f6, #2563eb);">
        <div class="container">
            <div class="hero-content">
                <h1 style="color: var(--background);"><?php echo esc_html($about_title); ?></h1>
                <nav aria-label="breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>" style="color: rgba(255,255,255,0.8); margin-right: 0.5rem;">Home</a>
                    <span style="color: rgba(255,255,255,0.8);"> / About</span>
                </nav>
            </div>
        </div>
    </section>

    <!-- About Content -->
    <section class="about-section">
        <div class="container">
            <div class="grid grid-2" style="align-items: center; gap: 3rem;">
                <?php if($about_image): ?>
                    <div class="about-image">
                        <?php echo wp_get_attachment_image($about_image, 'large', false, array('class' => 'img-responsive')); ?>
                    </div>
                <?php else: ?>
                    <div class="about-image">
                        <div style="aspect-ratio: 16/9; background: var(--border); border-radius: 0.75rem; display: flex; align-items: center; justify-content: center;">
                            <span style="font-size: 2rem; color: var(--muted-foreground);">About Image</span>
                        </div>
                    </div>
                <?php endif; ?>
                
                <div class="about-text">
                    <?php if($about_content): ?>
                        <div class="content">
                            <?php echo wp_kses_post($about_content); ?>
                        </div>
                    <?php else: ?>
                        <div class="content">
                            <p>We are a dedicated team of professionals committed to delivering exceptional digital solutions.</p>
                            <p>With years of experience in web development, mobile applications, and cloud infrastructure, we help businesses transform their digital presence.</p>
                            <p>Our approach is collaborative, transparent, and focused on achieving your business goals.</p>
                            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary" style="display: inline-block; margin-top: 1rem;">Contact Us</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Vision Values -->
    <section class="stats-section" style="padding: 4rem 0; background: var(--background);">
        <div class="container">
            <div class="grid grid-3">
                <div class="stat-item" style="text-align: center;">
                    <div style="font-size: 3rem; font-weight: 700; color: var(--primary);">10+</div>
                    <p style="color: var(--muted-foreground);">Years Experience</p>
                </div>
                <div class="stat-item" style="text-align: center;">
                    <div style="font-size: 3rem; font-weight: 700; color: var(--primary);">500+</div>
                    <p style="color: var(--muted-foreground);">Clients Worldwide</p>
                </div>
                <div class="stat-item" style="text-align: center;">
                    <div style="font-size: 3rem; font-weight: 700; color: var(--primary);">A+</div>
                    <p style="color: var(--muted-foreground);">Quality Rating</p>
                </div>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
?>