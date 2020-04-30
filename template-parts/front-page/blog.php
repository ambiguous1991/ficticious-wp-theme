<div class="col-12 col-sm-6 col-md-4 col-lg-2 mt-3 mb-3 p-3 section__post">
    <a href="<?php the_permalink(); ?>">
        <?php
        if (has_post_thumbnail()) { ?>
            <div class="post-thumbnail post-thumbnail--frontpage">
                <img alt="<?php echo get_the_post_thumbnail_caption() ?>"
                     class="thumbnail-icon-image thumbnail-icon--frontpage"
                     src="<?php echo get_the_post_thumbnail_url(); ?>">
            </div>
            <?php
        } else {
            ?>
            <div class="post-thumbnail post-thumbnail--frontpage">
                <div class="thumbnail-icon--frontpage">
                    <i class="far fa-newspaper"></i>
                </div>
            </div>
            <?php
        }
        ?>
    </a>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
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