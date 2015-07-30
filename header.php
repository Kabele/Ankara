<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
    <title><?php
        global $page, $paged;
        wp_title('|', true, 'right');
        // Add the blog name.
        bloginfo('name');
        // Add the blog description for the home/front page.
        $site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page())) {
            echo " | $site_description";
        }
        ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>"/>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" type="text/css"
          media="screen,projection"/>
    <?php wp_head(); ?>
</head>

<body <?php body_class(['grey lighten-5']); ?>>

<!-- Toolbar -->
<!--<div class="navbar-fixed">-->
<nav role="navigation">
    <div class="nav-wrapper">
        <div class="col s12">
            <div class="container-large">
                <a href="<?php echo site_url(); ?>" class="brand-logo center">
                    <!--                <img src="images/logo.png" alt="Devdome">-->
                    <?php if (get_theme_mod('ankara_logo')) : ?>
                        <img src='<?php echo esc_url(get_theme_mod('ankara_logo')); ?>'
                             alt='<?php echo esc_attr(bloginfo('name')); ?>'>
                    <?php else : ?>
                        <?php echo bloginfo('name'); ?>
                    <?php endif; ?>
                </a>
<!--                <a href="#" data-activates="mobile-nav" class="button-collapse "><i class="mdi-navigation-menu"></i></a>-->

<!--                <ul class="left hide-on-med-and-down">-->
<!--                    <li class="waves-effect waves-light waves-block"><a href="#!"><i class="mdi mdi-facebook"></i> </a>-->
<!--                    </li>-->
<!--                    <li class="waves-effect waves-light waves-block"><a href="#!"><i class="mdi mdi-google-plus"></i>-->
<!--                        </a></li>-->
<!--                    <li class="waves-effect waves-light waves-block"><a href="#!"><i class="mdi mdi-twitter"></i> </a>-->
<!--                    </li>-->
<!--                </ul>-->

                <?php $menu_args = array(
                    'theme_location' => 'primary',
                    'container' => 'ul white-text',
                    'container_class' => '',
                    'container_id' => '',
                    'menu_class' => 'right hide-on-med-and-down',
                    'menu_id' => '',
                    'echo' => true,
                    'depth' => 0,
                );

                wp_nav_menu($menu_args); ?>
                <?php $menu_args = array(
                    'theme_location' => 'primary',
                    'container' => 'ul',
                    'container_class' => '',
                    'container_id' => '',
                    'menu_class' => 'side-nav hide-on-large-only',
                    'menu_id' => 'mobile-nav',
                    'echo' => true,
                    'depth' => 0,
                );
                wp_nav_menu($menu_args); ?>

<!--                            <ul class="right hide-on-med-and-down">-->
<!--                                <li class="active"><a href="/">Home</a></li>-->
<!--                                <li><a href="#">News</a></li>-->
<!--                                <li><a href="#">Reviews</a></li>-->
<!--                                <li><a href="#"><i class="mdi-action-search"></i></a></li>-->
<!--                            </ul>-->
<!--                            <ul class="side-nav" id="mobile-nav">-->
<!--                                <li class="active"><a href="/">Home</a></li>-->
<!--                                <li><a href="#">News</a></li>-->
<!--                                <li><a href="#">Reviews</a></li>-->
<!--                            </ul>-->
            </div>
        </div>
    </div>
</nav>
<!-- Main Content -->
<section class="main">