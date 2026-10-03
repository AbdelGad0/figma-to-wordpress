<?php
/**
 * Additional template functions for Positively theme
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme accessor functions
 */

/**
 * Get the theme base URL
 *
 * @return string
 */
function positively_get_url() {
    return get_template_directory_uri();
}

/**
 * Get the theme path
 *
 * @return string
 */
function positively_get_path() {
    return get_template_directory();
}

/**
 * Enqueue extra theme scripts and styles
 * NOTE: renamed from positively_enqueue_scripts to avoid
 * "Cannot redeclare" fatal with the same function in functions.php.
 */
function positively_enqueue_extra_scripts() {
    // Main JavaScript file (fixed path: /js/main.min.js exists in theme)
    wp_enqueue_script(
        'positively-extra',
        positively_get_url() . '/js/main.min.js',
        array('jquery'),
        '1.0.0',
        true
    );

    // Localize script for AJAX
    wp_localize_script('positively-extra', 'positively_ajax_extra', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('positively_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'positively_enqueue_extra_scripts');

/**
 * Handle 404 page
 */
function positively_404() {
    get_header();
    ?>
    <main id="content" class="site-main">
        <section class="error-404">
            <div class="container">
                <h1 class="screen-reader-text"><?php esc_html_e('Error 404 - Page Not Found', 'positively'); ?></h1>
                <p style="text-align: center; font-size: 2rem; margin-bottom: 1rem;">404</p>
                <p style="text-align: center; opacity: 0.7;">
                    <?php esc_html_e('The page you are looking for does not exist.', 'positively'); ?>
                </p>
                <p style="text-align: center; margin-top: 2rem;">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                        <?php esc_html_e('Go Home', 'positively'); ?>
                    </a>
                </p>
            </div>
        </section>
    </main>
    <?php
    get_footer();
}

/**
 * Comments template
 */
function positively_comments() {
    if (!have_comments()) {
        return;
    }
    
    wp_list_comments(array(
        'style' => 'div',
        'short_ping' => true,
        'avatar_size' => 42,
    ));
    
    if (get_comment_pages_count() > 1 && get_option('page_comments')) {
        echo '<nav class="navigation comment-navigation">';
        paginate_comments_links();
        echo '</nav>';
    }
}