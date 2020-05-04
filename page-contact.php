<?php
//powers single page post
while ( have_posts() ) {
    the_post();
    get_header();
    generatePageBanner();
    ?>

    <div class="container">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb-container">
                <li class="breadcrumb-container__item">
                    <div class="breadcrumb-content"><a href="<?php echo site_url(); ?>"><i
                                    class="fas fa-home"></i><span>strona główna</span></a></div>
                </li>
                <li class="breadcrumb-container__item active" aria-current="page">
                    <div class="breadcrumb-content">
                        <?php the_title() ?>
                    </div>
                </li>
            </ul>
        </nav>
    </div>

    <div class="container flex-grow-1">
    <div class="section section--small-padding-top text-justify section--generic">

    <div class="container">
        <div class="row">
            <div class="singular-post-content">
                <?php the_content(); ?>
                <?php get_template_part('template-parts/contact-form/contact-form'); ?>
            </div>
        </div>
    </div>
    <?php
    if (comments_open() || get_comments_number()) :
        comments_template();
    endif;
} ?>
    </div>
    </div>
<?php
get_footer();
?>