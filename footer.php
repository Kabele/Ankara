<!--Footer-->

<footer class="page-footer blue-grey darken-4">
    <div class="container">
        <div class="row">
            <div class="col l4 s12">
                <?php if (is_active_sidebar('footer-widgetize-1')) : ?>
                    <?php dynamic_sidebar('footer-widgetize-1'); ?>
                <?php endif; ?>
            </div>
            <div class="col l4 s12">
                <?php if (is_active_sidebar('footer-widgetize-2')) : ?>
                    <?php dynamic_sidebar('footer-widgetize-2'); ?>
                <?php endif; ?>
            </div>
            <div class="col l4 s12">
                <?php if (is_active_sidebar('footer-widgetize-3')) : ?>
                    <?php dynamic_sidebar('footer-widgetize-3'); ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">

                <span class="white-text">&copy;<?php echo date('Y'); ?>
                    Copyright <?php echo get_bloginfo(name); ?></span>
                Made using <a class="indigo-text text-lighten-3"
                              href="http://materializecss.com">Materialize CSS</a>
            </div>
        </div>
</footer>
<?php wp_footer(); ?>
<!-- / Footer-->
</body>
</html>