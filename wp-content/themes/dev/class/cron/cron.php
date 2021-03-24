<?php 

add_action('espot_import_content', function () {
    touch(__DIR__, '/demo-' . time());
});

add_filter('cron_schedules', function ($schedules) {
    $schedules['secondly'] = [
        'interval' => 5,
        'display' => 'tout les 10seconds'
    ];
    return $schedules;
});

// if($timestamp = wp_next_scheduled('espot_import_content')) {
//     wp_unschedule_event($timestamp, 'espot_import_content');
// }

if(!wp_next_scheduled('espot_import_content')) {
    wp_schedule_event(time(), 'secondly', 'espot_import_content');
}
