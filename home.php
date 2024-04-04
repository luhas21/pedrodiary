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
                        <?php
                        if (has_post_thumbnail()) { ?>
                            <div class="featured-image">
                                <?php the_post_thumbnail(); ?>
                            </div>
                        <?php } ?>
                    </div>
                </a>
            </div>
        <?php }
    } else {
        echo 'Žádné příspěvky nenalezeny';
    }?>
    <div class="paginate">
    <?php
        global $wp_query;
        $big = 999999999; // Potřebujete velké číslo, aby se správně zobrazovalo stránkování
        echo paginate_links([
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages
        ]);
    ?>
    </div>
</main>

<?php get_footer(); ?>
