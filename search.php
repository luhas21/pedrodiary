<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <header class="page-header">
            <h1 class="page-title"><?php printf( __( 'Výsledky vyhledávání pro: %s', 'theme-text-domain' ), get_search_query() ); ?></h1>
        </header>

        <?php
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                ?>
                <hr class="record-hr">
                <div class="main-wrapper">
                <a class="btn-edit" href="<?php echo get_edit_post_link(get_the_ID()); ?>">E</a>
                    <?php if (get_post_type() === 'post') { ?>
                    <a class="record-link" href="<?php the_permalink(); ?>">
                        <div class="record-wrapper">
                            <h2><?php echo get_field('mood'); ?> <?php the_title(); ?></h2>
                            <?php the_content(); ?>
                        </div>
                    </a>
                    <?php } ?>
                </div>
                <?php
            }

            // Zde můžete zahrnout navigaci mezi stránkami, pokud je vyhledávání rozděleno na více stránek
            the_posts_navigation();

        } else {
            // Pokud nejsou nalezeny žádné výsledky
            echo 'Nic nebylo nalezeno.';
        } ?>
        <a href="/">
            <div class="btn">
                <button>Zpět</button>
            </div>
        </a>
    </main>
</div>

<?php get_footer(); ?>

