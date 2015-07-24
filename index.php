<?php get_header(); ?>

    <!-- Main Content -->
    <section>
        <div class="container">
            <div class="row">
                <div id="blog-posts">
                    <?php while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class([
                            'col',
                            's12',
                            'm6',
                            'article',
                        ]); ?>>
                            <div class="card  <?php if (! has_post_thumbnail()) { ?> indigo white-text <?php } ?>">
                                <?php if (has_post_thumbnail()) { ?>
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <a href="#">
                                            <?php the_post_thumbnail('featured-image',
                                                ['class' => 'responsive-img']); ?>
                                        </a>
                                    </div>
                                <?php } ?>
                                <ul class="card-action-buttons">
                                    <li><a title="Share" class="btn-floating waves-effect waves-light pink accent-3"><i
                                                class="mdi-social-share"></i></a>
                                    </li>
                                </ul>
                                <div class="card-content">
                                    <span class="card-title flow-text"><?php the_title(); ?></span>
                                    <p><?php the_excerpt(); ?></p>
                                </div>
                                <div class="card-action left">
                                    <a href="<?php the_permalink(); ?>#comments" class="js-favorite"
                                       title="Comments"><i class="mdi-communication-comment"></i><span> <?php comments_number("", "1", "%"); ?></span></a>
                                </div>
                                <div class="card-action right">
                                    <a href="<?php the_permalink(); ?>" class="waves-effect">read more</a>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        <!--./container end-->
    </section>

    <!-- /Main Content -->


<?php get_footer(); ?>