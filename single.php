<?php
/**
 * Single Post Template
 */

get_header();

if (have_posts()) :

    while (have_posts()) : the_post();

        get_template_part('template-parts/content', 'single');

        if (comments_open() || get_comments_number()) {
            comments_template();
        }

    endwhile;

else :

    get_template_part('template-parts/content', 'none');

endif;

get_footer();