<?php
/**
 * Search form template
 */

ob_start();
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <span class="screen-reader-text"><?php esc_html_e('Search for:', 'positively'); ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search &amp; type your search term here...', 'placeholder', 'positively'); ?>" value="<?php echo get_search_query(); ?>" name="s">
    </label>
    <input type="submit" class="search-submit" value="<?php echo esc_attr_x('Search', 'submit', 'positively'); ?>">
</form>

<?php
return ob_get_clean();