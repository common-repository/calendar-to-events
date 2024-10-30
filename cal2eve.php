<?php
/**
 * Plugin Name:             Calendar-To-Events
 * Plugin URI:              https://wordpress.org/plugins/calendar-to-events/
 * Description:             Calendar-To-Events – this is a convenient plugin calendar events with the ability to display a certain month and year.
 * Tags: 					calendar, calendars, events, event, organizer, venue, cal2eve, calendar-to-events, calendar-events
 * Author:                  Aleksandr Yurchenko
 * Author URI:              https://alexanderyurchenko.ru/
 * Contributors				yaleksandr89
 * Version:                 1.0.0
 * WP requires at least:    5.0
 * WP tested up to:         5.3.1
 *
 * Copyright Aleksandr Yurchenko
 *
 *     This file is part of Calendar-To-Events,
 *     a plugin for WordPress.
 *
 *     Calendar-To-Events is free software:
 *     You can redistribute it and/or modify it under the terms of the
 *     GNU General Public License as published by the Free Software
 *     Foundation, either version 3 of the License, or (at your option)
 *     any later version.
 *
 *     Calendar-To-Events is distributed in the hope that
 *     it will be useful, but WITHOUT ANY WARRANTY; without even the
 *     implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR
 *     PURPOSE. See the GNU General Public License for more details.
 *
 *     You should have received a copy of the GNU General Public License
 *     along with WordPress. If not, see <http://www.gnu.org/licenses/>.
 *
 * License:                 GPLv2 or later
 * License URI:             http://www.gnu.org/licenses/gpl-2.0.txt
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    die('Invalid request :(');
}

// Plugin version
if (!defined('CAL_TO_EVE_VERSION')) {
    define('CAL_TO_EVE_VERSION', '1.0.0');
}

// Path to the plugin dir
if (!defined('CAL_TO_EVE_PATH')) {
    define('CAL_TO_EVE_PATH', dirname(__FILE__));
}

// Main plugin file
if (!defined('CAL_TO_EVE_FILE')) {
    define('CAL_TO_EVE_FILE', __FILE__);
}

// Plugin dir url
if (!defined('CAL_TO_EVE_URL')) {
    define('CAL_TO_EVE_URL', untrailingslashit(plugin_dir_url(__FILE__)));
}

// Plugin prefix
if (!defined('CAL_TO_EVE_PREFIX')) {
    define('CAL_TO_EVE_PREFIX', 'cal_to_eve');
}

// ACTIVATION PLUGIN
function activate_cal_to_eve()
{
    require_once(CAL_TO_EVE_PATH . '/controllers/plugin_management/activate.php');
}
register_activation_hook(CAL_TO_EVE_FILE, 'activate_cal_to_eve');

// DEACTIVATION PLUGIN
function deactivate_cal_to_eve()
{
    require_once(CAL_TO_EVE_PATH . '/controllers/plugin_management/deactivate.php');
}
register_deactivation_hook(CAL_TO_EVE_FILE, 'deactivate_cal_to_eve');

// UNINSTALL PLUGIN
function uninstall_cal_to_eve()
{
    require_once(CAL_TO_EVE_PATH . '/controllers/plugin_management/uninstall.php');
}
register_uninstall_hook(CAL_TO_EVE_FILE, 'uninstall_cal_to_eve');

// CHECKING AVAILABILITY ACF
function cal2eve_exists_plugin_acf()
{
    if (!class_exists('acf')) {
        echo '<div class="notice notice-error is-dismissible">
                <p>
                Для корректной работы плагина <strong>Calendar-To-Events</strong> необходимо 
                <a  target="_blank" href="' . home_url() . '/wp-admin/plugin-install.php?s=Advanced+Custom+Fields&tab=search&type=term">установить плагин Advanced Custom Fields</a>.
                </p>
              </div>';
    }
}
add_action('admin_notices', 'cal2eve_exists_plugin_acf');

// WORKSPACE PLUGIN
if (file_exists(CAL_TO_EVE_PATH . '/controllers/register_post_type.php')) {
    require_once (CAL_TO_EVE_PATH . '/controllers/create_events.php');
    require_once(CAL_TO_EVE_PATH . '/controllers/shortcode.php');
    add_action('init', 'cal2eve_init_events');
} else {
    die('Ошибка при создание произвольного типа записи');
}