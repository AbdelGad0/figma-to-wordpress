<?php
/**
 * Page Template
 * Generic page template fallback
 */

get_header();

if (have_posts()) :

    while (have_posts()) : the_post();

        // Route to the matching template part by page slug
        // (template-parts/page-about.php, page-services.php, page-contact.php).
        // Falls back to generic content when no dedicated part exists.
        $slug = get_post_field('post_name', get_the_ID());
        if (in_array($slug, array('about', 'services', 'contact'), true)) {
            get_template_part('template-parts/page', $slug);
        } else {
            get_template_part('template-parts/content', 'page');
        }

    endwhile;

else :

    get_template_part('template-parts/content', 'none');

endif;

get_footer();