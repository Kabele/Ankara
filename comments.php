<?php
    // Disallow direct access to this script
    $filename = $_SERVER['SCRIPT_FILENAME'];
    if(! empty($filename) && 'comments.php' == basename($filename)) {
        die("You cannot access this page directly!");
    }

    // Disallow access to protected posts
    if ( post_password_required() ) {
        return;
    }
?>




<div id="comments" class="comment-section">
    <h4><?php echo comments_number("No", '1'); ?></h4>
    <?php if (!have_comments()) : ?>
        <p class="article">Be the first to say something.</p>
    <?php endif; ?>
    <!--<div class="comment-list-wrapper">
        <ul class="comment-list">
            <li>
                <div class="clearfix card">
                    <div class="left comment-img">
                        <a href="#">
                            <img src="images/cmt1.jpg" alt="">
                        </a>
                    </div>
                    <div class="card-content comment-content">
                        <div class="comment-meta">
                            <p class="author"><a href="#">BDInfoSys</a> <span>says:</span>
                            </p>

                            <p class="date"><?php the_date("m d, Y"); ?> at 07.50 am</p>
                            <a href="#" class="tooltips tooltipped reply-btn" data-position="top"
                               data-delay="50" data-tooltip="Reply"><i
                                    class="mdi-content-reply"></i></a>
                        </div>
                        <div class="comment-text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean non enim
                                ut enim fringilla adipiscing id in lorem. Quisque aliquet neque vitae
                                lectus tempus consectetur.</p>
                        </div>
                    </div>
                </div>

                <ul class="comment-list">
                    <li>
                        <div class="clearfix card">
                            <div class="left comment-img">
                                <a href="#"><img src="images/unknown.jpg" alt="">
                                </a>
                            </div>
                            <div class="card-content comment-content">
                                <div class="comment-meta">
                                    <p class="author"><a href="#">BDInfoSys</a> <span>says:</span>
                                    </p>

                                    <p class="date">March 25, 2015 at 07.50 am</p>
                                    <a href="#" class="tooltips tooltipped reply-btn"
                                       data-position="top" data-delay="50" data-tooltip="Reply"><i
                                            class="mdi-content-reply"></i></a>
                                </div>
                                <div class="comment-text">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean
                                        non enim ut enim fringilla adipiscing id in lorem. Quisque
                                        aliquet neque vitae lectus tempus consectetur.</p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>-->
    <ol class="comment-list">
        <?php
        wp_list_comments( array(
            'style'      => 'ol',
            'short_ping' => true,
        ) );
        ?>
    </ol>

    <?php
    // if comments have been closed display a notification
    if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
        ?>
        <p class="no-comments"><?php _e( 'Comments are closed.', 'ankara'); ?></p>
    <?php endif; ?>
</div>
