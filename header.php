<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#content">
            <?php esc_html_e('Skip to content', 'positively'); ?>
        </a>

        <header class="site-header" role="banner">
            <div class="container header-container">
                <div class="site-branding">
                    <?php the_custom_logo(); ?>
                    <?php if (has_custom_logo()) : ?>
                        <h1 class="site-title">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                <?php bloginfo('name'); ?>
                            </a>
                        </h1>
                    <?php else : ?>
                        <p class="site-title">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                <?php bloginfo('name'); ?>
                            </a>
                        </p>
                    <?php endif; ?>
                    <?php if (is_front_page() && is_home()) : ?>
                        <p class="site-description">
                            <?php bloginfo('description'); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <nav class="main-navigation" role="navigation">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                        <span class="screen-reader-text">
                            <?php esc_html_e('Toggle menu', 'positively'); ?>
                        </span>
                        <span class="menu-icon"></span>
                    </button>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'container'      => false,
                        'menu_class'     => 'menu',
                    ));
                    ?>
                </nav>
            </div>
        </header>

        </header>
    <!-- NOTE: page templates (index.php / page.php / template-parts/*)
         render their own <main id="content">. Keep header markup only
         here to avoid double-rendering content. -->