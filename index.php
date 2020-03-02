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
                    <small>show </small><i class="fa fa-caret-down"></i>
                </button>

                <?php
                generate_nav('header_menu', true);
                ?>

            </div>
        </nav>

        <div class="header__punchline header__punchline--small header__punchline--right container">
            <h1><?php the_title(); ?></h1>
        </div>
    </header>

    <div class="container">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb-container">
                <li class="breadcrumb-container__item"><div class="breadcrumb-content"> <a href="/"><i class="fas fa-home"></i><span>strona główna</span></a></div></li>
                <li class="breadcrumb-container__item"><div class="breadcrumb-content"> <a href="#">Home</a></div></li>
                <li class="breadcrumb-container__item active" aria-current="page"><div class="breadcrumb-content">Library</div></li>
            </ul>
        </nav>
    </div>

    <div class="container flex-grow-1">
        <div class="section section--small-padding-top text-justify" >

            <div class="container">
            <div class="row">
                <div class="col-12 col-md-6"><small class="text-muted">opublikowano 2 marca 2020 r.</small></div>
                <div class="col-12 col-md-6"><p class="blockquote-footer text-right">
                        <span>Jakub Bartusiak</span>
                        <i class="fas fa-user-circle"></i>
                    </p>
                </div>
            </div>
            </div>

            <?php
            while (have_posts()) {
                the_post(); ?>
                <div class="container" style="order:1">
                    <h2>
                    </h2>
                    <?php the_content(); ?>
                </div>
            <?php } ?>

            <div class="section__box">
                <a data-toggle="collapse" href="#box-collapse" aria-expanded="false" class="section__title">zobacz więcej <i class="fas fa-caret-down"></i></a>
                <ul class="collapse list-group" id="box-collapse">
                    <li class="list-group-item"><a href="#">Cras justo odio</a></li>
                    <li class="list-group-item"><a href="#">Dapibus ac facilisis in</a></li>
                    <li class="list-group-item"><a href="#">Morbi leo risus</a></li>
                    <li class="list-group-item"><a href="#">Porta ac consectetur ac</a></li>
                    <li class="list-group-item"><a href="#">Vestibulum at eros</a></li>
                </ul>
            </div>
        </div>
    </div>
<?php
get_footer();
?>