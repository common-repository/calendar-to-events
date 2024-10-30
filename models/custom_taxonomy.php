<?php
// Register taxonomy "Calendars" for custom type cal2eve_events
$labels_taxonomy_cal2eve_calendars = [
    'name' => 'Календари',
    'singular_name' => 'Календарь',
    'search_items' => 'Искать календарь',
    'all_items' => 'Все календари',
    'view_item ' => 'Смотреть календарь',
    'parent_item' => 'Родительский календарь',
    'parent_item_colon' => 'Родительский календарь:',
    'edit_item' => 'Редактировать календарь',
    'update_item' => 'Обновить календарь',
    'add_new_item' => 'Добавить календрь',
    'new_item_name' => 'Новое имя календаря',
    'menu_name' => 'Календари'
];
$args_taxonomy_cal2eve_calendars = [
    'labels' => $labels_taxonomy_cal2eve_calendars,
    'description' => 'args_taxonomy_cities',
    'public' => true,
    'show_in_nav_menus' => true,
    'show_admin_column' => false,
    'hierarchical' => true,
    'show_tagcloud' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => [
        'slug' => 'calendars'],
    'show_in_rest' => true,
    'rest_base' => 'cal2eve_calendars',
    'rest_controller_class' => 'WP_REST_Terms_Controller'
];

// Register taxonomy "Cities" for custom type cal2eve_events
$labels_taxonomy_cal2eve_cities = [
    'name' => 'Страны',
    'singular_name' => 'Страна',
    'search_items' => 'Искать страну',
    'all_items' => 'Все страны',
    'view_item ' => 'Смотреть страну',
    'parent_item' => 'Родительская страна',
    'parent_item_colon' => 'Родительская страна:',
    'edit_item' => 'Редактировать страну',
    'update_item' => 'Обновить страну',
    'add_new_item' => 'Добавить страну',
    'new_item_name' => 'Новое имя страны',
    'menu_name' => 'Страны'
];
$args_taxonomy_cal2eve_cities = [
    'labels' => $labels_taxonomy_cal2eve_cities,
    'description' => 'args_taxonomy_cities',
    'public' => true,
    'show_in_nav_menus' => true,
    'show_admin_column' => false,
    'hierarchical' => true,
    'show_tagcloud' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => [
        'slug' => 'cities'],
    'show_in_rest' => true,
    'rest_base' => 'cal2eve_cities',
    'rest_controller_class' => 'WP_REST_Terms_Controller'
];