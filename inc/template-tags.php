<?php
/**
 * Template tags for Positively theme
 * Helper functions for display logic
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Check if page has sidebar
 *
 * @return bool
 */
function positively_has_sidebar() {
    return is_active_sidebar('sidebar');
}

/**
 * Display page header
 *
 * @return void
 */
function positively_page_header() {
    if (!is_page()) {
        return;
    }
    
    $title = get_the_title();
    $description = get_the_excerpt();
    
    echo '<nav aria-label="breadcrumb" class="breadcrumb">';
    echo '<a href="' . esc_url(home_url('/')) . '">' . esc_html(get_bloginfo('name')) . '</a>';
    echo ' » ' . esc_html($title);
    echo '</nav>';
}

/**
 * Display social sharing links
 *
 * @return void
 */
function positively_social_links() {
    if (!function_exists('get_theme_mod')) {
        return;
    }
    
    $social_links = get_theme_mod('positively_social_links', array());
    
    if (empty($social_links)) {
        return;
    }
    
    echo '<div class="social-links">';
    foreach ($social_links as $link) {
        if (!isset($link['url'])) {
            continue;
        }
        
        $name = isset($link['name']) ? $link['name'] : 'Social Link';
        echo '<a href="' . esc_url($link['url']) . '" class="social-link" aria-label="' . esc_attr($name) . '">';
        echo esc_html($name);
        echo '</a>';
    }
    echo '</div>';
}

/**
 * Display related posts
 *
 * @return void
 */
function positively_related_posts($count = 4) {
    $tags = wp_get_post_tags(get_the_ID());
    
    if (!$tags) {
        return;
    }
    
    $tag_ids = array();
    foreach ($tags as $individual_tag) {
        $tag_ids[] = $individual_tag->term_id;
    }
    
    $args = array(
        'tag__in'            => $tag_ids,
        'post__not_in'       => array(get_the_ID()),
        'posts_per_page'     => $count,
        'posts_per_page'     => $count,
        'post_status'        => 'publish',
        'orderby'            => 'date',
        'order'              => 'DESC'
    );
    
    $related = new WP_Query($args);
    
    if ($related->have_posts()) {
        echo '<div class="related-posts">';
        echo '<h3>' . esc_html__('Related Posts', 'positively') . '</h3>';
        echo '<div class="grid grid-2">';
        while ($related->have_posts()) {
            $related->the_post();
            echo '<div class="related-post">';
            if (has_post_thumbnail()) {
                echo get_the_post_thumbnail(get_the_ID(), 'medium');
            }
            echo '<h4><a href="' . esc_url(get_permalink()) . '">' . get_the_title() . '</a></h4>';
            echo '<p>' . wp_trim_words(get_the_excerpt(), 15) . '</p>';
            echo '</div>';
        }
        echo '</div>';
        echo '</div>';
        wp_reset_postdata();
    }
}

/**
 * Display breadcrumbs
 *
 * @return void
 */
function positively_breadcrumbs() {
    if (!function_exists('yoast_breadcrumb')) {
        return;
    }
    
    yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
}

/**
 * Check if page is full width
 *
 * @return bool
 */
function positively_is_full_width() {
    if (is_page_template('template-fullwidth.php')) {
        return true;
    }
    
    $full_width = get_post_meta(get_the_ID(), '_full_width', true);
    return (bool) $full_width;
}