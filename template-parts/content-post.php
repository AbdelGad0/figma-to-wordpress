<?php
/**
 * Template part: post excerpt card (blog index / archives fallback)
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container">
        <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <div class="entry-content">
            <?php the_excerpt(); ?>
        </div>
    </div>
</article>
