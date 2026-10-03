<?php
/**
 * Template part for the footer
 */

$current_year = date('Y');

if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="footer-bottom">
    <div class="container footer-bottom-container">
        <div class="copyright">
            &copy; <?php echo $current_year; ?> <?php bloginfo('name'); ?>. 
            <?php esc_html_e('All rights reserved.', 'positively'); ?>
        </div>
        
        <?php if (get_theme_mod('positively_social_links')): ?>
            <div class="social-links">
                <?php 
                $social_links = get_theme_mod('positively_social_links');
                foreach ($social_links as $link): 
                ?>
                    <a href="<?php echo esc_url($link['url']); ?>" 
                       class="social-link" 
                       aria-label="<?php echo esc_attr($link['name'] ?? ''); ?>">
                        <span aria-hidden="true"><?php echo esc_html($link['name'] ?? ''); ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

        <footer class="site-footer">
            <div class="container footer-container">
                <div class="footer-content">
                    <div class="footer-branding">
                        <?php if (has_custom_logo()) : ?>
                            <?php the_custom_logo(); ?>
                        <?php endif; ?>
                        <p class="footer-copyright">
                            &copy; <?php echo $current_year; ?> <?php bloginfo('name'); ?>. 
                            <?php esc_html_e('All rights reserved.', 'positively'); ?>
                        </p>
                    </div>

                    <?php if (has_nav_menu('footer')) : ?>
                        <nav class="footer-navigation">
                            <?php wp_nav_menu(array(
                                'theme_location' => 'footer',
                                'container'      => false,
                                'menu_class'     => 'footer-menu',
                            )); ?>
                        </nav>
                    <?php endif; ?>

                    <div class="footer-social">
                        <?php
                        $social_links = get_theme_mod('positively_social_links', array());
                        foreach ($social_links as $social):
                        ?>
                            <a href="<?php echo esc_url($social['url']); ?>" class="social-link" aria-label="<?php echo esc_attr($social['name'] ?? ''); ?>">
                                <span aria-hidden="true"><?php echo esc_html($social['name'] ?? ''); ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </footer>

    </div>

    <?php wp_footer(); ?>
</body>
</html>