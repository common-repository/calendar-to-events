<?php
require_once (CAL_TO_EVE_PATH . '/models/events.php');

cal2eve_add_events_page(); // Create a page named 'cal2eve-events' to display the calendar

add_action('init', 'cal2eve_reset_permalink'); // Rules update url CNC