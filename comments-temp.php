<?php
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comment-section">
    <?php if (have_comments()) : ?>
    <h4><?php echo number_format(get_comments_number()); ?> Comments</h4>

    <?php endif; // have_comments()?>
    <div class="comment-list-wrapper">
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
    </div>
</div>
