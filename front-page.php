<?php
//powers the homepage

get_header(); ?>

    <header class="header"
            style="background-image: url('<?php echo esc_url(get_theme_mod('ficticious_header_bg')); ?>');">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top text-center">
            <div class="container">
                <a class="navbar-brand" href="<?php echo site_url(); ?>"><h2><?php echo get_bloginfo('name'); ?></h2>
                </a>
                <button class="navbar-toggler p-2 pl-3 pr-3 align-items-center" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <small class="mr-3">rozwiń</small><i class="fas fa-angle-down"></i>
                </button>

                <?php
                generate_nav('header_menu', true);
                ?>

            </div>
        </nav>

        <div class="header__punchline">
            <h1><?php echo get_theme_mod('ficticious_headline'); ?></h1>
            <h2><?php echo get_theme_mod('ficticious_subheadline'); ?></h2>
            <!--<div>I'm a synopsis. Lorem ipsum away.</div>-->
            <?php if( get_theme_mod('ficticious_header_buttons') ) {?>
                <div class="header__buttons">
                    <button class="btn btn-primary ">I'm a button</button>
                    <button class="btn btn-secondary ">I'm also a button</button>
                </div>
            <?php } ?>
        </div>
    </header>

    <div class="section bg-light">
        <div class="text-center">
            <div class="section__title">MIŁO CIĘ TUTAJ WIDZIEĆ</div>
            <h3 class="p-3">Nazywam się Jakub Bartusiak</h3>
            <div class="p-2">Jestem absolwentem Politechniki Wrocławskiej i programistą o szerokich zainteresowaniach.
            </div>
            <div class="pt-2 pb-5">Staram się stale rozwijać swoje umiejętności i codziennie uczyć się czegoś nowego.
            </div>
        </div>
    </div>

    <div class="section bg-dark">
        <div class="container text-center">
            <div class="section__title">DWA SŁOWA O MNIE</div>
            <div class="row align-items-center">
                <div class="col-12 col-lg-4 text-justify p-3">
                    <p>Jestem osobą ambitną i lubię wiedzieć jak najwięcej. Nie lubię też prosić się innych o pomoc,
                        dlatego dążę do posiadania dużej ilości umiejętności i technicznego know-how, tak aby być jak
                        najbardziej niezależny.</p>
                    <p>Nie zmienia to faktu, że dobrze pracuję w grupie, a koledzy i koleżanki zawsze chwalą sobie moje
                        towarzystwo, zarówno ze względów praktycznych (dobra jakość pracy), jak też towarzyskich
                        (niecodziennie - ale dobre poczucie humoru).</p>
                </div>
                <div class="col-12 col-lg-4 p-3"><img class="rounded-circle p-5 img-fluid"
                                                      src="<?php echo get_theme_file_uri('img/me.jpg') ?>"
                                                      alt="My picture"></div>
                <div class="col-12 col-lg-4 p-3">
                    <div>
                        <h4 class="font-weight-bold">JAVA / SPRING</h4>
                        <p>Java 7+, Spring, Hibernate, Thymeleaf, REST, Mockito, JUnit, Thymeleaf</p>
                    </div>
                    <div>
                        <h4 class="font-weight-bold">HTML / CSS</h4>
                        <p>HTML 5, CSS 2+, SCSS, Bootstrap</p>
                    </div>
                    <div>
                        <h4 class="font-weight-bold">JAVASCIPT</h4>
                        <p>ES 2015+, Webpack, Babel, Npm, React, Type Script</p>
                    </div>
                    <div>
                        <h4 class="font-weight-bold">INNE</h4>
                        <p>Kubernetes, MySQL, Oracle DB, Amazon Web Services, Jenkins, Maven, Gradle, Android SDK...
                            wymieniać dalej? :)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section bg-green text-center">
        <div class="container-fluid">
            <div class="section__title">Najnowsze wpisy na blogu</div>
            <div class="row justify-content-center text-center">
                <?php
                $blogPosts = new WP_Query(array(
                        'posts_per_page' => 5
                    )
                );

                while ($blogPosts->have_posts()) {
                    $blogPosts->the_post(); ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2 mt-3 mb-3 p-3">
                        <h2><a style="color:inherit; font-weight: bold"
                               href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="meta-box">
                            autor: <?php the_author_posts_link(); ?>
                        </div>
                        <div>
                            <?php echo wp_trim_words(get_the_content(), 10) ?>
                            <div>
                                <small><a href="<?php the_permalink(); ?>"> czytaj dalej ></a></small>
                            </div>
                        </div>
                    </div>
                <?php }
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
<?php
get_footer();
?>