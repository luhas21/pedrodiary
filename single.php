<?php get_header(); ?>

<main>
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post(); ?>
            <hr class="record-hr">
            <div class="main-wrapper">
            <a class="btn-edit" href="<?php echo get_edit_post_link(get_the_ID()); ?>">E</a>
                <a class="record-link" href="<?php the_permalink(); ?>">
                    <div class="record-wrapper">
                        <h2><?php echo get_field('mood'); ?> <?php the_title(); ?></h2>
                        <?php the_content(); ?>
                    </div>
                </a>
            </div>
            <?php
            if (has_post_thumbnail()) { ?>
                <hr class="record-hr">
                <div class="featured-image">
                    <?php the_post_thumbnail(); ?>
                </div>
                <hr class="record-hr">
            <?php
            }
        }
    } ?>
    <a href="/">
        <div class="btn">
            <button>Zpět</button>
        </div>
    </a>
</main>

<?php get_footer(); ?>
