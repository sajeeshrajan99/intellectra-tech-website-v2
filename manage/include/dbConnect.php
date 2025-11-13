<?php
set_time_limit(0);
// Define base URLs
$baseURLSet = [
    'https://intellectratech.ewolwe.in/',
    'https://www.intellectratech.com/',
];

// Get current base URL
$baseURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . '/';

// Check if the current base URL is in the defined base URLs
$server = in_array($baseURL, $baseURLSet) ? 1 : 0;

$db_host        = 'localhost';
$db_user        = 'root';
$db_pass        = '';
$db_database    = 'intellectra';
if ($server == 1) {
    $db_host        = 'localhost';
    $db_user        = 'inteldud_intellectra';
    $db_pass        = '[@g8)NNMriF!';
    $db_database    = 'inteldud_intellectra';
}
$db = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . '/';
