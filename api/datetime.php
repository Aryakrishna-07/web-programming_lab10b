<?php
// datetime.php - returns the current server date, time and day as JSON
header('Content-Type: application/json');
header('Cache-Control: no-store');

// Change this to your timezone (list: https://www.php.net/manual/en/timezones.php)
date_default_timezone_set('Asia/Kolkata');

$now = new DateTime();

echo json_encode([
    'day'      => $now->format('l'),          // e.g. Tuesday
    'date'     => $now->format('d F Y'),      // e.g. 17 November 2026
    'time'     => $now->format('h:i:s'),      // e.g. 04:25:09
    'meridiem' => $now->format('A'),          // AM / PM
    'timezone' => date_default_timezone_get()
]);
