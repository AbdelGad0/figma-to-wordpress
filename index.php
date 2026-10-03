<?php
/**
 * Main template file
 *
 * The main template file for front-end rendering
 * Used as fallback for homepage if no front-page template
 */

get_header();

if (have_posts()) :

    while (have_posts()) : the_post();
        
        if (is_front_page()) :
            get_template_part('template-parts/front-page');
        else :
            get_template_part('template-parts/content', get_post_type());
        endif;
        
    endwhile;

else :

    get_template_part('template-parts/content', 'none');

endif;

get_footer();