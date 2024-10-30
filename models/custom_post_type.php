<?php
// Registration of custom type cal2eve_events
$labels_post_type_cal2eve_events = [
    'name' => 'События',
    'singular_name' => 'Событие',
    'add_new' => 'Добавить событие',
    'add_new_item' => 'Добавление события',
    'edit_item' => 'Редактировать событие',
    'new_item' => 'Новое событие',
    'view_item' => 'Смотреть событие',
    'search_items' => 'Искать события',
    'not_found' => 'Не найдено',
    'not_found_in_trash' => 'Не найдено в корзине',
    'parent_item_colon' => '',
    'menu_name' => 'События',
];

$args_post_type_cal2eve_events = [
    'labels' => $labels_post_type_cal2eve_events,
    'description' => 'args_post_type_events',
    'has_archive' => false,
    'public' => true,
    'menu_icon' => 'dashicons-calendar-alt',
    'menu_position' => 5,
    'supports' => ['title', 'custom-fields'],
    'taxonomies' => ['cal2eve_calendars', 'cal2eve_cities'],
    'show_in_rest' => true,
    'rest_base' => 'cal2eve_events',
    'rewrite' => [
        'slug' => 'events'],
    'rest_controller_class' => 'WP_REST_Posts_Controller'
];
