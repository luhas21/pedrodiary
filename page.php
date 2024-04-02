<?php get_header(); ?>

<main>
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post(); ?>
            <h2><?php the_title(); ?></h2>
            <hr class="event-hr">
            <?php the_content();
        }
    } ?>
</main>

<?php get_footer(); ?>
