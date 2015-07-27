<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>

    <div class="indigo white-text banner"
         style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>');">

        <div class="section no-pad-bot">
            <div class="container">
                <h3 class="header"><?php the_title(); ?></h3>

                <div class="meta-data-container">
                    <ul class="blog-post-meta">
                        <li>
                            By <a href="#">
                                <?php echo the_author_meta('display_name'); ?>
                            </a>
                        </li>
                        <li><a href="<?php the_permalink(); ?>#comments" title="Comments"><i
                                    class="mdi-communication-comment"></i><span> <?php comments_number("No Comments", "1", "%"); ?></span></a></li>
                        <?php if (has_tag()) { ?>
                            <li><i class="mdi mdi-tag"></i><span>
                                <?php $tag = get_the_tags();
                                if (!$tag) {
                                } else {
                                    the_tags("");
                                } ?> </span>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section>
        <div class="container">
            <div class="row">
                <article id="post-<?php the_ID(); ?>" <?php post_class(['s12', 'l12', 'card', 'post-single']); ?>>
                    <?php if (has_post_thumbnail()) { ?>
                        <div class="card-image waves-effect waves-block waves-light">
                            <a href="#content">
                                <?php the_post_thumbnail('featured-image', ['class' => 'responsive-img']); ?>
                            </a>
                        </div>
                    <?php } ?>
                    <div class="card-content" id="content">
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
                </article>

                <?php comments_template(); ?>


            </div>
        </div>
    </section>
<?php endwhile; // End the loop ?>
    <!-- /Main Content -->
<?php get_footer(); ?>