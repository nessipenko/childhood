<?php
add_action('wp_enqueue_scripts', 'childhood_assets');

function childhood_assets() {
    // Стили
    wp_enqueue_style('childhood-style', get_stylesheet_uri());
    wp_enqueue_style('header-style', get_template_directory_uri() . '/assets/styles/main.min.css');
    wp_enqueue_style('animate-style', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css');

    // Скрипты
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js', array(), null, true);
    wp_enqueue_script('jquery');
    wp_enqueue_script('childhood-scripts', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery'), null, true);
}

// Поддержка пользовательского логотипа
add_theme_support('custom-logo');

// Поддержка миниатюр записей
add_theme_support('post-thumbnails');
add_theme_support('menus');

add_filter('nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 3);
function filter_nav_menu_link_attributes($atts, $item, $args){
        if($args->menu === 'Main'){
            $atts['class'] = 'header__nav-item';

            if($item->current){
                $atts['class'] .= ' header__nav-item-active';
            }
        };
        return $atts;
}
?>
