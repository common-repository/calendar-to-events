<?php
require_once(CAL_TO_EVE_PATH . '/models/custom_taxonomy.php');
register_taxonomy('cal2eve_cities', 'cal2eve_events', $args_taxonomy_cal2eve_cities);
register_taxonomy('cal2eve_calendars', 'cal2eve_events', $args_taxonomy_cal2eve_calendars);