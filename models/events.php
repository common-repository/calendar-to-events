<?php
function cal2eve_add_events_page()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'posts';
    $page_name = 'cal2eve-events';
    $check_exists_page = $wpdb->get_row("SELECT post_name FROM $table_name WHERE post_name='" . $page_name . "'");
    if ($check_exists_page) {
        $page_name = null;
        die('<a href="' . get_home_url() . '\cal2eve-events" target="_blank">Страница созданная плагином Calendar-To-Events</a> уже существует. Что бы активировать плагин удалить существующую.');
    }
    $page_name = [
        'post_type' => 'page',
        'post_title' => 'Страница для Calendar-To-Events',
        'post_name' => $page_name,
        'post_content' => 'Something...',
        'post_status' => 'publish',
        'post_author' => 1
    ];
    wp_insert_post($page_name);
}

function cal2eve_remove_plugin_page()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'posts';
    $page_name = 'cal2eve-events';
    $check_exists_page = $wpdb->get_row("SELECT ID FROM $table_name WHERE post_name='" . $page_name . "'");
    wp_delete_post($check_exists_page->ID);
}

function cal2eve_remove_post_type_events()
{
    $params = [
        'posts_per_page' => -1,
        'post_type' => 'cal2eve_events',
        'post_status' => [
            'publish',
            'future',
            'draft',
            'pending',
            'private',
            'trash',
            'auto - draft',
            'inherit',
        ]
    ];
    $query = new WP_Query($params);
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            wp_delete_post($query->post->ID, true);
        endwhile;
    endif;
}

function cal2eve_drop_custom_table()
{
    global $wpdb;
    $terms = $wpdb->terms;
    $term_taxonomy = $wpdb->term_taxonomy;
    $term_relationships = $wpdb->term_relationships;
    $wpdb->query("DELETE FROM $term_taxonomy WHERE taxonomy='cal2eve_calendars'");
    $wpdb->query("DELETE FROM $term_taxonomy WHERE taxonomy='cal2eve_cities'");
    $wpdb->query("DELETE FROM $terms WHERE term_id NOT IN (SELECT term_id FROM $term_taxonomy)");
    $wpdb->query("DELETE FROM $term_taxonomy WHERE term_id NOT IN (SELECT term_id FROM $terms)");
    $wpdb->query("DELETE FROM $term_relationships WHERE term_taxonomy_id NOT IN (SELECT term_taxonomy_id FROM $term_taxonomy)");
}

function cal2eve_get_events()
{
    global $wpdb;
    $events = $wpdb->get_results(
        "
            SELECT post_id, post_status, meta_value
            FROM $wpdb->postmeta
            JOIN $wpdb->posts
            ON $wpdb->postmeta.post_id=$wpdb->posts.id
            WHERE meta_key = 'date_of_event' AND post_status = 'publish'
          "
    );
    return $events;
}

function cal2eve_reset_permalink()
{
    flush_rewrite_rules();
}

function cal2eve_get_json_for_calendar($arr)
{
    $data = '';
    foreach ($arr as $item) {

        $terms = get_the_terms($item->post_id, 'cal2eve_calendars');
        $terms_array = [];
        if ($terms && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $terms_array[] = '<a href="' . get_term_link($term) . '" target="_blank">' . $term->name . '</a>';
            }
        }
        $termini_a_hrefs = implode(" • ", $terms_array);
        $jsonData = json_encode('<div>Календарь событий «<span>' . $termini_a_hrefs . '</span>»</div>');
        $timeElement = $item->meta_value;
        $date = DateTime::createFromFormat('Ymd', $timeElement);
        $data .= '{ 
                    "date": "' . $date->format('Y-m-d') . '", 
                    "title": "' . get_the_title($item->post_id) . '", 
                    "description": ' . $jsonData . ', 
                    "url": "' . get_permalink($item->post_id) . '" 
                  },';
    }
    $json = substr($data, 0, -1);
    return $json;
}

function cal2eve_blog_time()
{
    $blog_time = current_time('mysql');
    list($year, $month, $day, $hour, $minute, $second) = preg_split('([^0-9])', $blog_time);
    $month -= 1; // in the script, months are in the range 0...11.
    return [
        'year' => (int)$year,
        'month' => (int)$month,
        'day' => (int)$day,
        'hour' => (int)$hour,
        'minute' => (int)$minute,
        'second' => (int)$second
    ];
}