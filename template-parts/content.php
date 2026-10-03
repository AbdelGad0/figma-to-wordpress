<?php
/**
 * Template part for displaying posts
 */

get_header();

while (have_posts()) : the_post();

    if (is_search()) :
        get_template_part('template-parts/content', 'search');
    else :
        get_template_part('template-parts/content', get_post_type());
    endif;

endwhile;

get_footer();