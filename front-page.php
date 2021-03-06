<?php
//powers the homepage
include 'themeFeatures/variables.php';
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
            <?php if (get_theme_mod('ficticious_header_buttons')) { ?>
                <div class="header__buttons">
                    <?php
                    $BUTTON_1_LABEL = get_theme_mod($FICTICIOUS_HEADER_BUTTON_1_LABEL);
                    $BUTTON_2_LABEL = get_theme_mod($FICTICIOUS_HEADER_BUTTON_2_LABEL);
                    $BUTTON_1_HREF = get_theme_mod($FICTICIOUS_HEADER_BUTTON_1_HREF);
                    $BUTTON_2_HREF = get_theme_mod($FICTICIOUS_HEADER_BUTTON_2_HREF);
                    if ($BUTTON_1_LABEL) { ?>
                        <a class="btn btn-primary"
                           href="<?php echo $BUTTON_1_HREF; ?>"><?php echo $BUTTON_1_LABEL; ?></a>
                    <?php }
                    if ($BUTTON_2_LABEL) { ?>
                        <a class="btn btn-secondary"
                           href="<?php echo $BUTTON_2_HREF; ?>"><?php echo $BUTTON_2_LABEL; ?></a>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </header>

<?php
$IS_INTRO_ENABLED = get_theme_mod($FICTICIOUS_INTRO_ENABLED);
$INTRO_TITLE = get_theme_mod($FICTICIOUS_INTRO_TITLE);
$INTRO_INTRODUCTION = get_theme_mod($FICTICIOUS_INTRO_INTRODUCTION);
$INTRO_CONTENT = get_theme_mod($FICTICIOUS_INTRO_CONTENT);
$CONTENT_ARRAY = explode("\n", $INTRO_CONTENT);

if ($IS_INTRO_ENABLED) { ?>
    <div class="section bg-light">
        <div class="text-center">
            <?php if ($INTRO_TITLE) { ?>
                <div class="section__title"><?php echo $INTRO_TITLE; ?></div>
            <?php }
            if ($INTRO_INTRODUCTION) { ?>
                <h3 class="p-3"><?php echo $INTRO_INTRODUCTION; ?></h3>
            <?php }
            if ($INTRO_CONTENT) { ?>
                <?php foreach ($CONTENT_ARRAY as $val) { ?>
                    <div class="p-3"><?php echo $val; ?></div>
                <?php }
            } ?>
        </div>
    </div>
<?php } ?>

<?php

$IS_SKILLS_ENABLED = get_theme_mod($FICTICIOUS_SKILLS_ENABLED);
$SKILLS_TITLE = get_theme_mod($FICTICIOUS_SKILLS_TITLE);
$SKILLS_DESCRIPTION_ARRAY = explode("\n", get_theme_mod($FICTICIOUS_SKILLS_DESCRIPTION));
$SKILLS_IMAGE = get_theme_mod('ficticious_skills_image');
$SKILLS_ARRAY = explode("\n", get_theme_mod($FICTICIOUS_SKILLS_LIST));

if ($IS_SKILLS_ENABLED) { ?>
    <div class="section bg-dark">
        <div class="container text-center">
            <?php if ($SKILLS_TITLE) { ?>
                <div class="section__title"><?php echo $SKILLS_TITLE ?></div><?php } ?>
            <div class="row align-items-center">
                <?php if ($SKILLS_DESCRIPTION_ARRAY) { ?>
                    <div class="col-12 col-lg-4 text-justify p-3">
                        <?php foreach ($SKILLS_DESCRIPTION_ARRAY as $value) { ?>
                            <p><?php echo $value ?></p>
                        <?php } ?>
                    </div>
                <?php } ?>
                <div class="col-12 col-lg-4 p-3">
                    <?php if ($SKILLS_IMAGE) { ?>
                        <img class="rounded-circle p-5 img-fluid"
                             src="<?php echo esc_url($SKILLS_IMAGE); ?>"
                             alt="My picture">
                    <?php } ?>
                </div>
                <?php if ($SKILLS_ARRAY) { ?>
                    <div class="col-12 col-lg-4 p-3">
                        <?php for ($i = 0; $i < count($SKILLS_ARRAY); $i++) {
                            $currentItem = $SKILLS_ARRAY[$i];
                            if ($i % 2 == 0) { ?>
                                <div>
                                <h4 class="font-weight-bold"><?php echo $currentItem ?></h4>
                            <?php } else { ?>
                                <p><?php echo $currentItem ?></p>
                                </div>
                            <?php }
                        } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>

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
                    $blogPosts->the_post();
                    get_template_part('template-parts/front-page/blog');
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
    <div class="section section--no-padding text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6 bg-dark text-white xl-padding-top-bottom">
                    <div class="section__title">Ostatnie eksperymenty</div>
                    <?php
                    $blogPosts = new WP_Query(array(
                            'posts_per_page' => 3,
                            'post_type' => 'experiment',
                        )
                    );

                    while ($blogPosts->have_posts()) {
                        $blogPosts->the_post();
                        get_template_part('template-parts/front-page/experiment');
                    } ?>
                    <a class="text-white" href="<?php echo get_post_type_archive_link('experiment') ?>">Zobacz
                        wszystkie</a>
                </div>
                <div class="col-12 col-md-6 bg-light text-black xl-padding-top-bottom d-flex flex-column">
                    <div class="section__title">Inne wiadomości</div>
                    <div class="section__post section__post--inline l-padding-top-bottom flex-grow-1">
                        <div class="post-thumbnail">
                            <div class="rounded-circle thumbnail-icon">
                                <i class="fas fa-check"></i>
                            </div>
                        </div>
                        <h2>Jak na razie - cisza</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();
?>