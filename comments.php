<?php
// Disallow direct access to this script
$filename = $_SERVER['SCRIPT_FILENAME'];
if (!empty($filename) && 'comments.php' == basename($filename)) {
    die("You cannot access this page directly!");
}

// Disallow access to protected posts
if (post_password_required()) {
    return;
}
?>


<div id="comments" class="comment-section">
    <h4><?php echo comments_number("No Comment yet", '1'); ?></h4>
    <?php if (!have_comments()) : ?>
        <p class="article">Be the first to say something.</p>
    <?php endif; ?>
    <ol class="comment-list">
        <?php
        wp_list_comments(array(
            'style' => 'ol',
            'short_ping' => true,
            'callback' => 'ankara_comments'
        ));
        ?>
    </ol>


    <?php
    // if comments have been closed display a notification
    if (!comments_open() && '0' != get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
        ?>
        <p class="no-comments"><?php _e('Comments are closed.', 'ankara'); ?></p>
    <?php endif; ?>

    <?php
    $req = get_option('require_name_email');
    $aria_req = ($req ? " aria-required='true'" : '');

    $comments_args = array(
        // change the title of send button
        'label_submit' => 'Submit',
        'submit_button' => '<button name="%1$s" type="submit" id="%2$s" class="%3$s btn waves-effect waves-light right">Submit <i class="mdi mdi-send"></i></button>',
        // change the title of the reply section
        'title_reply' => 'Leave a Comment',
        // remove "Text or HTML to be displayed after the set of comment fields"
        'comment_notes_after' => '',
        // redefine your own textarea (the comment body)
        'comment_field' => '
        <div class="row">
        <div class="input-field col s12">
        <i class="mdi mdi-pencil prefix"></i>
        <textarea class="validate materialize-textarea" id="comment" name="comment" aria-required="true"></textarea>
        <label for="comment">Comments</label>
        </div>
        </div>',
        'fields' => apply_filters('comment_form_default_fields', array(
                'author' =>
                    '<div class="row">
                     <div class="input-field col s12">' .
                    '<input class="validate" id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) .
                    '" size="30"' . $aria_req . ' />
                    <label for="author">Name</label>
                    </div></div>',
                'email' =>
                    '<div class="row">
                    <div class="input-field col s12">' .
                    '<input class="validate" id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) .
                    '" size="30"' . $aria_req . ' />
                    <label for="email">Email</label>
                    </div></div>',
                'url' =>
                    '<div class="row">
                    <div class="input-field col s12">' .
                    '<input class="validate" id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) .
                    '" size="30" />
                    <label for="url">Website</label>
                    </div></div>'
            )
        ),
    );

    comment_form($comments_args); ?>
</div>
