<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/styles.css">
    <title>Perdro Diary</title>

    <?php wp_head(); ?>
</head>
<body>
<?php /*
    <nav id="main-menu">
        <?php wp_nav_menu(['theme_location' => 'main-menu-location']); ?>
    </nav>
*/ ?>
<div class="header-wrapper">
    <div class="search-form">
        <?php get_search_form(); ?>
    </div>
    <a href="<?php echo wp_logout_url(); ?>" class="logout">X</a>
</div>

<a href="<?php echo admin_url( 'post-new.php' ); ?>">
    <div class="btn">
        <button>Nový záznam</button>
    </div>
</a>
