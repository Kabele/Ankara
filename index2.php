<?php get_header(); ?>


    <!-- Recent posts sections -->
    <section class="grey lighten-5">
        <div class="col s12 header-row" id="recent">
            <div class="container-large">
                <h5 class="indigo-text">Recent Posts</h5>
            </div>
        </div>
        <div class="container-large">
            <div class="row">
                <div class="col s12 m12 l8 card-layout">
                    <?php while (have_posts()) :
                        the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class([
                            'col',
                            's12',
                            'm6',
                            'article',
                        ]); ?>>
                            <div class="card">
                                <div class="card-image">
                                    <img src="http://lorempixel.com/400/200/">
                                    <span class="card-title"><?php the_title(); ?></span>
                                </div>
                                <div class="card-content">
                                    <p class="article"><?php the_excerpt(); ?></p>
                                </div>
                                <div class="card-action">
                                <!--<span class="black-text left"><i class="mdi mdi-comment"></i> 4</span>-->
                                    <a href="<?php the_permalink(); ?>" class="waves-effect waves-light btn-flat">Read More</a>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>

                </div>
                <?php get_sidebar(); ?>
            </div>
            <div class="col s12">
                <ul class="pagination">
                    <li class="disabled"><a href="#!"><i class="mdi mdi-chevron-left"></i></a></li>
                    <li class="active"><a href="#!">1</a></li>
                    <li class="waves-effect"><a href="#!">2</a></li>
                    <li class="waves-effect"><a href="#!">3</a></li>
                    <li class="waves-effect"><a href="#!">4</a></li>
                    <li class="waves-effect"><a href="#!">5</a></li>
                    <li class="waves-effect"><a href="#!"><i class="mdi mdi-chevron-right"></i></a></li>
                </ul>
            </div>

        </div>

    </section>
    <!-- /Main Content -->


<?php get_footer(); ?>