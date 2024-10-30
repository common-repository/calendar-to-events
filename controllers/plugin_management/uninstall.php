<?php
require_once (CAL_TO_EVE_PATH . '/models/events.php');

cal2eve_remove_post_type_events(); // Delete posts created by an arbitrary post type based on post_type='events'.

cal2eve_drop_custom_table(); // Removal of taxonomies, their terms, as well as orphaned database elements

add_action('init', 'cal2eve_reset_permalink'); // Rules update url CNC