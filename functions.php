<?php

/**
 * Functions for Ankara
 *
 * @package Ankara
 */
function ankara_scripts()
{
//    Loading local jquery to avoid no-conflict $ issue when working with Materialize css
    wp_enqueue_script('jquery-custom', get_stylesheet_directory_uri() . '/js/jquery.min.js', [], false, true);
    wp_enqueue_script('jquery-smooth-scroll', get_stylesheet_directory_uri() . '/js/jquery.smooth-scroll.js', array(),
        false, true);
    wp_enqueue_script('materialize', get_template_directory_uri() . '/js/materialize.min.js', array(), false, true);
    wp_enqueue_script('masonry', get_template_directory_uri() . '/js/masonry.min.js', array(), false, true);
    wp_enqueue_script('ankara', get_template_directory_uri() . '/js/ankara.js', array(), false, true);
    wp_enqueue_script('nicescroll', get_template_directory_uri() . '/js/jquery.nicescroll.min.js', array(), false,
        true);
}

add_action('wp_enqueue_scripts', 'ankara_scripts');

function ankara_theme_customizer($wp_customize)
{
    //Logo
    $wp_customize->add_section('ankara_logo_section', array(
        'title' => __('Logo', 'ankara'),
        'priority' => 30,
        'description' => 'Upload a logo to replace the default site name in navigation bar',
    ));
    $wp_customize->add_setting('ankara_logo');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'ankara_logo', array(
        'label' => __('Logo', 'ankara'),
        'section' => 'ankara_logo_section',
        'settings' => 'ankara_logo',
    )));
    // End logo

}

add_action('customize_register', 'ankara_theme_customizer');

add_theme_support('post-thumbnails');
add_image_size('featured-image', 672, 372, true);


/**
 * Register footer widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function ankara_widgets()
{
    register_sidebar(array(
        'name' => __('Footer Area 1', 'ankara'),
        'id' => 'footer-widget-1',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="panel panel-warning footer-widget">',
        'after_widget' => '</div></aside>',
        'before_title' => ' <div class="panel-heading"><h4 class="panel-title white-text">',
        'after_title' => '</h4></div>',
    ));

    register_sidebar(array(
        'name' => __('Footer Area 2', 'ankara'),
        'id' => 'footer-widget-2',
        'class' => 'grey-text text-lighten-4',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="panel panel-warning footer-widget">',
        'after_widget' => '</div></aside>',
        'before_title' => ' <div class="panel-heading"><h4 class="panel-title">',
        'after_title' => '</h4></div>',
    ));
}

add_action('widgets_init', 'ankara_widgets');


//customize comments
function ankara_comments($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    switch ($comment->comment_type) :
        case 'pingback' :
        case 'trackback' : ?>
            <li <?php comment_class(); ?> id="comment<?php comment_ID(); ?>">
            <div class="back-link">< ?php comment_author_link(); ?></div>
            <?php break;
        default : ?>
            <div class="collection card">
                <li <?php comment_class("collection-item avatar"); ?> id="comment-<?php comment_ID(); ?>">
                    <div class="card-content">
                        <?php echo get_avatar($comment, 96, '', '', ['class' => 'circle left']); ?>
                        <div class="text">
                            <span class="title author-name"><?php comment_author(); ?></span>
                            <small>
                                <time <?php comment_time('c'); ?> class="comment-time">
                                    <span class="date">
                                        <?php comment_date(); ?>
                                    </span>
                                    <span class="time">
                                        <?php comment_time(); ?>
                                    </span>
                                </time>
                            </small>
                            <p>
                                <?php comment_text(); ?>
                            </p>
                            <a href="#!" class="secondary-content"></a>
                        </div>
                    </div>
                    <div class="card-action right">
<!--                        <a href="#!" class="btn-flat waves-effect waves-indigo"><i class="mdi mdi-reply"></i> Reply</a>-->
                        <?php
                        comment_reply_link( array_merge( $args, array(
                            'reply_text' => '<i class="mdi mdi-reply"></i> ' . __('Reply'),
                            'after' => '',
                            'depth' => $depth,
                            'max_depth' => $args['max_depth']
                        ) ) ); ?>
                    </div>
                </li>
            </div>
            <!-- #comment-<?php comment_ID(); ?> -->
            <?php // End the default styling of comment
            break;
    endswitch;
}
