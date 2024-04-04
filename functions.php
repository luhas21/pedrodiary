<?php

function redirect_non_logged_users() {
    if (!is_user_logged_in() && ! is_page('login')) {
        wp_redirect('https://luhas.cz');
        exit;
    }
}
add_action('template_redirect', 'redirect_non_logged_users');

function custom_login_redirect( $redirect_to, $request, $user ) {
    return home_url();
}
add_filter( 'login_redirect', 'custom_login_redirect', 10, 3 );

// Register menus
function custom_theme_menus() {
    register_nav_menus([
        'main-menu-location' => __('Main Menu'), // Main menu Location
        'footer-menu-location' => __('Footer Menu'), // Footer Menu Lucation
    ]);
}
add_action('init', 'custom_theme_menus');

// Add featured images for the eventspost type
add_theme_support('post-thumbnails', ['post', 'page']);

function update_dates_title($post_id) {
    remove_action('save_post', 'update_dates_title'); // Odstranění akčního hooku pročištění

    if(get_post_type($post_id) == 'post') {
        $date_time = get_the_time('j.n.Y G:i', $post_id); // Získání data a času publikace
        $date_time_slug = get_the_time('Y-m-d-H-i', $post_id);
        $date_title = get_the_title($post_id); // Získání původního názvu příspěvku

        // Přidání jedinečného identifikátoru k datu a času
        $unique_id = uniqid();
        $date_time_unique = $date_time_slug . '-' . $unique_id;

        // Porovnejte původní název s novým datem a časem
        if($date_title !== $date_time_unique) {
            $post_data = [
                'ID' => $post_id,
                'post_title' => $date_time,
                'post_name' => sanitize_title($date_time_unique) // Nastavení slug podle data a času publikace
            ];
            wp_update_post($post_data);
        }
    }

    add_action('save_post', 'update_dates_title'); // Přidání akčního hooku zpět
}
add_action('save_post', 'update_dates_title');
