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
                        comment_reply_link(array_merge($args, array(
                            'reply_text' => '<i class="mdi mdi-reply"></i> ' . __('Reply'),
                            'after' => '',
                            'depth' => $depth,
                            'max_depth' => $args['max_depth']
                        ))); ?>
                    </div>
                </li>
            </div>
            <!-- #comment-<?php comment_ID(); ?> -->
            <?php // End the default styling of comment
            break;
    endswitch;
}


function ankara_numeric_posts_nav()
{
    if (is_singular()) {
        return;
    }

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if ($wp_query->max_num_pages <= 1) {
        return;
    }


    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;

    $max = intval($wp_query->max_num_pages);


    /** Add current page to the array */

    if ($paged >= 1) {
        $links[] = $paged;
    }

    /** Add the pages around the current page to the array */
    if ($paged >= 3) {

        $links[] = $paged - 1;

        $links[] = $paged - 2;

    }
    if (($paged + 2) <= $max) {
        $links[] = $paged + 2;

        $links[] = $paged + 1;

    }
    echo '<div class="navigation right"><ul class="pagination">' . "\n";

    /** Previous Post Link */

    $prev_link_classes = '';
    if (! get_previous_posts_link()) {
        $prev_link = '<a href="#!" aria-disabled="true" disabled><i class="mdi mdi-chevron-left"></i></a>';
        $prev_link_classes .= 'disabled';
    } else  {
        $prev_link = get_previous_posts_link('<i class="mdi mdi-chevron-left"></i>');
        $prev_link_classes .= 'waves-effect';
    }
    printf('<li class="' . $prev_link_classes . '">%s</li>' . "\n", $prev_link);


    /** Link to first page, plus ellipses if necessary */

    if (!in_array(1, $links)) {
        $class = 1 == $paged ? ' class="active"' : ' class="waves-effect"';


        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');


        if (!in_array(2, $links)) {
            echo '<li>…</li>';
        }

    }


    /** Link to current page, plus 2 pages in either direction if necessary */

    sort($links);

    foreach ((array)$links as $link) {
        $class = $paged == $link ? ' class="active"' : ' class="waves-effect"';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);

    }


    /** Link to last page, plus ellipses if necessary */

    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links)) {
            echo '<li>…</li>' . "\n";
        }
        $class = $paged == $max ? ' class="active"' : ' class="waves-effect"';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
    }

    /** Next Post Link */
    $next_link_classes = '';
    if (! get_next_posts_link()) {
        $next_link = '<a href="#!" aria-disabled="true" disabled><i class="mdi mdi-chevron-right"></i></a>';
        $next_link_classes .= ' class="disabled"';
    } else  {
        $next_link = get_previous_posts_link('<i class="mdi mdi-chevron-right"></i>');
        $next_link_classes .= ' class="waves-effect"';
    }
    printf('<li%s>%s</li>' . "\n", $next_link_classes, $next_link);

    echo '</ul></div>' . "\n";
}
