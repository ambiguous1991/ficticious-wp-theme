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
<!--        <div class="col-6 col-md-3 mb-3">-->
<!--            <h4 class="footer__title">zwiedzaj</h4>-->
<!--            <ul class="footer__content footer__list ">-->
<!--                <li>Item1</li>-->
<!--                <li>Item1</li>-->
<!--                <li>Item1</li>-->
<!--            </ul>-->
<!--        </div>-->
<!--        <div class="col-6 col-md-3 mb-3">-->
<!--            <h4 class="footer__title">#cloud</h4>-->
<!--            <ul class="footer__content footer__list footer__hashtag-cloud">-->
<!--                <li>#item</li>-->
<!--                <li>#item</li>-->
<!--                <li>#item</li>-->
<!--                <li>#item</li>-->
<!--                <li>#item</li>-->
<!--                <li>#item</li>-->
<!--                <li>#item</li>-->
<!--                <li>#item</li>-->
<!--                <li>#item</li>-->
<!--                <li>#item</li>-->
<!--                <li>#item</li>-->
<!--                <li>#item</li>-->
<!--                <li>#item</li>-->
<!--                <li>#item</li>-->
<!--                <li>#item</li>-->
<!--                <li>#item</li>-->
<!--            </ul>-->
<!--        </div>-->
        <div class="col-12 col-sm-6 offset-md-6 col-md-3 mb-3 text-right">
            <h4 class="footer__title">znajdz mnie</h4>
            <div class="footer__content ">
                <i class="fab fa-facebook-square"></i>
                <i class="fab fa-github-square"></i>
                <i class="fab fa-linkedin"></i>
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