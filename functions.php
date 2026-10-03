<?php
/**
 * Theme Name: Positively Landing Page
 * Theme URI: https://positively.com
 * Description: Perfected landing page - Pixel-perfect conversion from Figma design. Built for Laragon localhost.
 * Version: 1.0.0
 * Author: Tech Lead
 * Text Domain: positively
 * Domain Path: /languages
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Enqueue theme stylesheets
function positively_enqueue_styles() {
    wp_enqueue_style('positively-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_style('positively-main', get_template_directory_uri() . '/css/main.min.css', array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'positively_enqueue_styles');

// Enqueue theme scripts
function positively_enqueue_scripts() {
    wp_enqueue_script('positively-main', get_template_directory_uri() . '/js/main.min.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'positively_enqueue_scripts');

// Theme setup
function positively_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('custom-logo', array(
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // RTL support
    add_theme_support('responsive-embed-inline');
}
add_action('after_setup_theme', 'positively_setup');

// Register navigation menus
function positively_register_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'positively'),
        'footer'  => __('Footer Menu', 'positively'),
    ));
}
add_action('init', 'positively_register_menus');

// ACF Options Page (if ACF is active)
if( function_exists('acf_add_options_page') ):
    acf_add_options_page(array(
        'page_title'  => 'Theme Settings',
        'menu_title'  => 'Theme Settings',
        'menu_slug'   => 'positively-settings',
        'capabilities'  => 'manage_options',
        'icon_url'  => 'dashicons-admin-generic',
        'position'  => 100
    ));
endif;

// ACF Block registration
function positively_acf_blocks() {
    if( function_exists('acf_register_block_type') ):
        acf_register_block_type(array(
            'name'            => 'hero-section',
            'title'           => 'Hero Section',
            'description'     => 'Hero section with background image',
            'render_callback' => 'positively_render_hero_block',
            'category'        => 'formatting',
            'icon'            => 'cover-image',
            'keywords'        => array('hero', 'heading', 'title'),
        ));
        
        acf_register_block_type(array(
            'name'            => 'features-grid',
            'title'           => 'Features Grid',
            'description'     => 'Features section with icon grid',
            'render_callback' => 'positively_render_features_block',
            'category'        => 'formatting',
            'icon'            => 'grid-view',
            'keywords'        => array('features', 'grid', 'layout'),
        ));
    endif;
}
add_action('acf/init', 'positively_acf_blocks');

// Render callbacks for blocks
function positively_render_hero_block($block, $content = '', $is_preview = false) {
    $title = get_field('hero_title');
    $subtitle = get_field('hero_subtitle');
    $cta_text = get_field('cta_text');
    $cta_link = get_field('cta_link');
    
    ob_start();
    ?>
    <section class="hero-section">
        <div class="container">
            <h1><?php echo esc_html($title); ?></h1>
            <p class="subtitle"><?php echo esc_html($subtitle); ?></p>
            <?php if($cta_text && $cta_link): ?>
                <a href="<?php echo esc_url($cta_link['url']); ?>" class="btn btn-primary"><?php echo esc_html($cta_text); ?></a>
            <?php endif; ?>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

function positively_render_features_block($block, $content = '', $is_preview = false) {
    $features = get_field('features');
    if(!$features) return '';
    
    ob_start();
    ?>
    <section class="features-section">
        <div class="container grid grid-3">
            <?php foreach($features as $feature): ?>
                <div class="feature-item">
                    <span class="icon"><?php echo esc_html($feature['icon'] ?? '✓'); ?></span>
                    <h3><?php echo esc_html($feature['title'] ?? ''); ?></h3>
                    <p><?php echo esc_html($feature['description'] ?? ''); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

// Load theme textdomain
function positively_load_textdomain() {
    load_theme_textdomain('positively', get_template_directory() . '/languages');
}
add_action('init', 'positively_load_textdomain');

// Customizer settings live in inc/customizer.php (positively_customize_register)
// to avoid "Cannot redeclare" fatal. It is loaded via require below.
add_action('customize_register', 'positively_customize_register');

// NOTE: This theme requires the Advanced Custom Fields (ACF) plugin.
// Templates call get_field() directly. If ACF is inactive the site will
// show an admin notice (see below) instead of silently using fallbacks.
add_action('admin_notices', function () {
    if (!function_exists('get_field')) {
        echo '<div class="notice notice-warning"><p>'
            . esc_html__('Positively theme requires the Advanced Custom Fields plugin. Please install and activate it.', 'positively')
            . '</p></div>';
    }
});

// ACF Fields integration
if( function_exists('acf_init') ):
    add_action('acf/init', 'positively_register_acf_fields');
    
    function positively_register_acf_fields() {
        // Include ACF fields file if exists
        $acf_file = get_template_directory() . '/inc/acf-fields.php';
        if( file_exists($acf_file) ):
            include $acf_file;
        endif;
    }
endif;

// Required files
require_once get_template_directory() . '/inc/template-tags.php';
require_once get_template_directory() . '/inc/template-functions.php';
require_once get_template_directory() . '/inc/customizer.php';