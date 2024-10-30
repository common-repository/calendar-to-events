<?php
require_once(CAL_TO_EVE_PATH . '/models/events.php');

add_action('init', 'cal2eve_init_events'); // Initialization of creation of custom data type and its taxonomies
function cal2eve_init_events()
{
    require_once(CAL_TO_EVE_PATH . '/controllers/register_taxonomy.php');
    require_once(CAL_TO_EVE_PATH . '/controllers/register_post_type.php');
}

add_action('wp_enqueue_scripts', 'cal2eve_calendar_to_events_css_js'); // Include the necessary styles and js
function cal2eve_calendar_to_events_css_js()
{
    // CSS
    wp_enqueue_style('calendar_to_events_style', (CAL_TO_EVE_URL . '/resources/css/eventCalendar.css'), [], CAL_TO_EVE_VERSION);
    wp_enqueue_style('calendar_to_events_style_responsive', (CAL_TO_EVE_URL . '/resources/css/eventCalendar_theme_responsive.css'), ['calendar_to_events_style'], CAL_TO_EVE_VERSION);
    // JS
    wp_enqueue_script('moment');
    wp_enqueue_script('calendar_to_events_script', (CAL_TO_EVE_URL . '/resources/js/jquery.eventCalendar.js'), ['jquery'], CAL_TO_EVE_VERSION, true);
}

add_filter('template_include', 'my_template'); // Connecting the template
function my_template($template)
{

    // The template for the page output of calendar
    if (is_page('cal2eve-events')) {
        return (CAL_TO_EVE_PATH . '/views/cal2eve-events.php');
    }

    // The template for the page output of a single event
    if (is_singular('cal2eve_events')) {
        return (CAL_TO_EVE_PATH . '/views/cal2eve-single-events.php');
    }

    // Template for page output the taxonomies "Cities"
    if (is_tax('cal2eve_cities')) {
        return (CAL_TO_EVE_PATH . '/views/taxonomy/cal2eve-cities.php');
    }

    // Template for the output page of taxonomies "Calendars"
    if (is_tax('cal2eve_calendars')) {
        return (CAL_TO_EVE_PATH . '/views/taxonomy/cal2eve-calendars.php');
    }
    return $template;
}

$events = cal2eve_get_events(); // Get the necessary fields from the DB for further encoding in JSON and transfer to the calendar