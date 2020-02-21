<footer class="footer">
    <div class="container">
        <hr class="footer__divider">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3 mb-3">
                <h4 class="footer__title"><?php echo get_bloginfo('name'); ?></h4>
                <div class="credits">
                    <p><strong>ficticious</strong> theme<br>crafted by Bartusiak</p>
                </div>
            </div>
            <div class="col-12 col-sm-6 offset-md-6 col-md-3 mb-3 text-right">
                <h4 class="footer__title">znajdz mnie</h4>
                <div class="footer__content ">
                    <a href="https://www.facebook.com/bartusiak.k">
                        <i class="fab fa-facebook-square"></i>
                    </a>
                    <a href="https://github.com/ambiguous1991">
                        <i class="fab fa-github-square"></i>
                    </a>
                    <a href="https://www.linkedin.com/in/jakub-bartusiak-jba/">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="mailto:jakub@bartusiak.com.pl">
                        <i class="fas fa-envelope-square"></i>
                    </a>
                    <?php
                    //                    generate_nav('footer_media_location', 1, 'ul', 'footer__content');
                    ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer() ?>

</body>
</html>