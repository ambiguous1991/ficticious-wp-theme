<?php
get_header(); ?>

<header class="header header--small"
        style="background-image: url('<?php echo esc_url(get_theme_mod('ficticious_header_bg')); ?>');">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?php echo site_url(); ?>"><h2><?php echo get_bloginfo('name'); ?></h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <small>rozwiń </small><i class="fa fa-caret-down"></i>
            </button>

            <?php
            generate_nav('header_menu', true);
            ?>

        </div>
    </nav>

<?php
while (have_posts()) {
    the_post(); ?>

    <div class="header__punchline header__punchline--small header__punchline--right container">
        <h1><?php the_title() ?></h1>
    </div>
    </header>

    <div class="container">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb-container">
                <li class="breadcrumb-container__item">
                    <div class="breadcrumb-content"><a href="<?php echo site_url(); ?>"><i
                                    class="fas fa-home"></i><span>strona główna</span></a></div>
                </li>
                <li class="breadcrumb-container__item" aria-current="page">
                    <div class="breadcrumb-content">
                        <a href="<?php echo get_post_type_archive_link('experiment') ?>"><span>eksperymenty</span></a>
                    </div>
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
        <div class="section section--small-padding-top text-justify section--generic experiment-section">
            <div class="container">
                <div class="row mb-3">
                    <small class="text-muted">
                        opublikowano <?php the_time('j F Y'); ?> r.
                    </small>
                </div>
            </div>
            <div class="singular-post-content">
                <div class="github-panel">
                    <i class="fab fa-github"></i>
                    <label for="experiment_github_url">zobacz źródło na github</label>
                    <input id="experiment_github_url" disabled type="text" value="<?php the_field('github_address') ?>">
                    <a href="<?php the_field('github_address') ?>"
                       class="btn btn-success text-white btn-sm">Przejdź</a>
                </div>
                <?php the_content(); ?>
            </div>
        </div>
        <div class="alert alert-warning d-block d-md-none">
            <h3>Uwaga!</h3>
            <p>Ten projekt możesz zobaczyć na większym ekranie.</p>
            <p>Możesz też zobaczyć projekt
                <a class="text-info" href="<?php the_field('experiment_address') ?>">w nowym oknie</a>.
            </p>
        </div>
    </div>

    <div class="iframe-container">
        <iframe id="experiment" class="d-none d-md-block experiment"
                src="<?php the_field('experiment_address') ?>"></iframe>
    </div>
    <div class="container flex-grow-1">
    <div class="section section--small-padding-top text-justify section--generic">
    <div class="container">
        <div class="row justify-content-end">
            <div class="blockquote-footer section__author">
                <span><?php the_author_posts_link(); ?></span>
                <i class="fas fa-user-circle"></i>
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