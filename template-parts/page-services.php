<?php
/**
 * Services Page Template
 * Detailed services page with individual service sections
 */

get_header();

$services_title = get_field('services_page_title') ?: 'Our Services';
$services_description = get_field('services_description');

?>

<main id="content" class="site-main">

    <!-- Hero Section -->
    <section class="page-hero" style="background: linear-gradient(135deg, #3b82f6, #2563eb);">
        <div class="container">
            <div class="hero-content">
                <h1 style="color: var(--background);"><?php echo esc_html($services_title); ?></h1>
                <p style="opacity: 0.9; max-width: 600px; margin: 0 auto;">
                    <?php echo esc_html($services_description ?: 'We provide comprehensive solutions to help your business grow and succeed.'); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Individual Service Items -->
    <section class="services-page">
        <div class="container">
            <div class="grid grid-2" style="gap: 3rem; align-items: start;">
                
                <!-- Web Development -->
                <div class="service-detail" style="display: flex; gap: 2rem;">
                    <div style="font-size: 2.5rem;">💻</div>
                    <div>
                        <h2 style="font-size: 1.5rem; margin-bottom: 1rem;">Web Development</h2>
                        <ul style="list-style: none; padding: 0;">
                            <li style="margin-bottom: 0.5rem;">✓ Responsive WordPress themes</li>
                            <li style="margin-bottom: 0.5rem;">✓ Custom plugin development</li>
                            <li style="margin-bottom: 0.5rem;">✓ E-commerce solutions</li>
                            <li style="margin-bottom: 0.5rem;">✓ Performance optimization</li>
                        </ul>
                    </div>
                </div>

                <!-- Mobile Apps -->
                <div class="service-detail" style="display: flex; gap: 2rem;">
                    <div style="font-size: 2.5rem;">📱</div>
                    <div>
                        <h2 style="font-size: 1.5rem; margin-bottom: 1rem;">Mobile Applications</h2>
                        <ul style="list-style: none; padding: 0;">
                            <li style="margin-bottom: 0.5rem;">✓ iOS & Android development</li>
                            <li style="margin-bottom: 0.5rem;">✓ Cross-platform solutions (Flutter, React Native)</li>
                            <li style="margin-bottom: 0.5rem;">✓ App store optimization</li>
                            <li style="margin-bottom: 0.5rem;">✓ Backend API integration</li>
                        </ul>
                    </div>
                </div>

                <!-- Cloud Solutions -->
                <div class="service-detail" style="display: flex; gap: 2rem;">
                    <div style="font-size: 2.5rem;">☁️</div>
                    <div>
                        <h2 style="font-size: 1.5rem; margin-bottom: 1rem;">Cloud Solutions</h2>
                        <ul style="list-style: none; padding: 0;">
                            <li style="margin-bottom: 0.5rem;">✓ AWS & Google Cloud deployment</li>
                            <li style="margin-bottom: 0.5rem;">✓ Docker containerization</li>
                            <li style="margin-bottom: 0.5rem;">✓ CI/CD pipeline setup</li>
                            <li style="margin-bottom: 0.5rem;">✓ Scalable infrastructure</li>
                        </ul>
                    </div>
                </div>

                <!-- SEO & Marketing -->
                <div class="service-detail" style="display: flex; gap: 2rem;">
                    <div style="font-size: 2.5rem;">📈</div>
                    <div>
                        <h2 style="font-size: 1.5rem; margin-bottom: 1rem;">SEO & Marketing</h2>
                        <ul style="list-style: none; padding: 0;">
                            <li style="margin-bottom: 0.5rem;">✓ Technical SEO audit</li>
                            <li style="margin-bottom: 0.5rem;">✓ Google Analytics setup</li>
                            <li style="margin-bottom: 0.5rem;">✓ Conversion rate optimization</li>
                            <li style="margin-bottom: 0.5rem;">✓ Content strategy</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="process-section" style="padding: 4rem 0; background: var(--background);">
        <div class="container">
            <h2 style="text-align: center; font-size: 2rem; margin-bottom: 3rem;">Our Process</h2>
            <div class="grid grid-4" style="gap: 2rem;">
                <div class="process-step" style="text-align: center;">
                    <div style="width: 60px; height: 60px; background: var(--primary); color: var(--background); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-weight: bold;">1</div>
                    <h4>Discovery</h4>
                    <p>Understand your needs and goals.</p>
                </div>
                <div class="process-step" style="text-align: center;">
                    <div style="width: 60px; height: 60px; background: var(--primary); color: var(--background); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-weight: bold;">2</div>
                    <h4>Planning</h4>
                    <p>Create detailed project roadmap.</p>
                </div>
                <div class="process-step" style="text-align: center;">
                    <div style="width: 60px; height: 60px; background: var(--primary); color: var(--background); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-weight: bold;">3</div>
                    <h4>Development</h4>
                    <p>Build and test your solution.</p>
                </div>
                <div class="process-step" style="text-align: center;">
                    <div style="width: 60px; height: 60px; background: var(--primary); color: var(--background); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-weight: bold;">4</div>
                    <h4>Launch</h4>
                    <p>Deploy and monitor performance.</p>
                </div>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
?>