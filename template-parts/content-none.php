<?php
/**
 * Template part for displaying nothing found
 */

get_header();

?>

<main id="content" class="site-main">

    <section class="no-results not-found">
        <div class="container">
            <div class="not-found-content" style="text-align: center; padding: 4rem 0;">
                <h1 class="screen-reader-text"><?php esc_html_e('Nothing found', 'positively'); ?></h1>
                
                <?php if (is_search()) : ?>
                    <p><?php esc_html_e('Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'positively'); ?></p>
                    <?php get_search_form(); ?>
                <?php else : ?>
                    <p><?php esc_html_e('It seems we can\'t find what you\'re looking for. Perhaps you can try a search?', 'positively'); ?></p>
                    <?php get_search_form(); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
?>