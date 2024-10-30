<?php
add_shortcode('cal2eve', 'cal2eve_short_code');
function cal2eve_short_code($params)
{
    $events = cal2eve_get_events();
    $default = shortcode_atts([
        'year' => cal2eve_blog_time()['year'],
        'month' => cal2eve_blog_time()['month'],
        'eventsLimit' => 0
    ], $params);
    ?>
    <script>
        jQuery(function () {
            jQuery('#cal2eve_eventCalendar__year_<?php echo $default['year'] ?>__month_<?php echo $default['month'] ?>').eventCalendar({
                eventsLimit: 0,
                jsonData: <?php echo '[' . cal2eve_get_json_for_calendar($events) . ']'; ?>,
                customDateYear: <?php echo $default['year']; ?>,
                customDateMonth: <?php echo $default['month']; ?>,
            });
        });
    </script>
    <?php
    return "<div id=\"cal2eve_eventCalendar__year_{$default['year']}__month_{$default['month']}\"></div>";
} ?>