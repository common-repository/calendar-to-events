<?php
require_once (CAL_TO_EVE_PATH . '/models/events.php');

cal2eve_remove_plugin_page(); // Delete the page created when the plugin is activated with the name 'cal2eve-events'

add_action('init', 'cal2eve_reset_permalink'); // Rules update url CNC