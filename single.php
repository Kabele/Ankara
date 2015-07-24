<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>

    <div class="indigo lighten-1 white-text banner" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>');">

        <div class="section no-pad-bot">
            <div class="container">
                <h3 class="header"><?php the_title(); ?></h3>
                <div class="meta-data-container">
                    <ul class="blog-post-meta">
                        <li>
                            By <a href="#"><?php if (the_author_meta('first_name') != "") {
                                    echo the_author_meta('first_name');
                                } else {
                                    echo the_author_meta('display_name');
                                } ?> <?php if(the_author_meta('last_name') != ""){echo the_author_meta('last_name');} ?></a>
                        </li>
                        <li><a href="<?php the_permalink(); ?>#comments" title="Comments"><i
                                    class="mdi-communication-comment"></i><span> 23</span></a></li>
                        <li><i class="mdi mdi-tag"></i><span>
                                <?php $tag = get_the_tags();
                                if (!$tag) {
                                } else {
                                    the_tags("");
                                } ?> </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section>
        <div class="container">
            <div class="row">
                <article id="post-<?php the_ID(); ?>" <?php post_class(['s12', 'l12', 'card', 'post-single']); ?>>
                    <?php if(has_post_thumbnail()) { ?>
                    <div class="card-image waves-effect waves-block waves-light">
                        <a href="#">
                            <?php the_post_thumbnail('featured-image', ['class' => 'responsive-img']); ?>
                        </a>
                    </div>
                    <?php } ?>
                    <div class="card-content">
                        <p class="article-single entry-content">
                            <?php the_content(); ?>
                        </p>
                    </div>
                    <div class="card-action right">
                        <a href="" class="btn-floating blue darken-3"><i class="mdi mdi-facebook"></i></a>
                        <a href="" class="btn-floating light-blue"><i class="mdi mdi-twitter"></i></a>
                        <a href="" class="btn-floating materialize-red darken-1"><i class="mdi mdi-google-plus"></i></a>
                        <a href="" class="btn-floating pink"><i class="mdi-communication-comment"></i></a>
                    </div>
                    <footer>


                    </footer>
                </article>


                <div id="comments" class="comment-reply-section">
                    <h4 class="com-title">8 Comments</h4>

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

            </div>
        </div>
    </section>
<?php endwhile; // End the loop ?>
    <!-- /Main Content -->
<?php get_footer(); ?>