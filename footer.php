</section>
<!-- /Main Content -->

<!--Footer-->
<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <?php if (is_active_sidebar('footer-widget-1')) : ?>
                    <?php dynamic_sidebar('footer-widget-1'); ?>
                <?php endif; ?>
            </div>
            <div class="col l6 s12">
                <?php if (is_active_sidebar('footer-widget-2')) : ?>
                    <?php dynamic_sidebar('footer-widget-2'); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
                <span class="">&copy;<?php echo date('Y'); ?>
                    Copyright <?php echo get_bloginfo(name); ?></span>
            Made using <a class="footer-link"
                          href="http://materializecss.com">Materialize CSS</a>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
<!-- / Footer-->
</body>
</html>