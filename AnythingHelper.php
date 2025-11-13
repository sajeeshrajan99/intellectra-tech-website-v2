<?php

function random_strings($length_of_string)
{
    $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';
    return substr(str_shuffle($str_result), 0, $length_of_string);
}

function genToken()
{
    return 't' . sprintf(
        '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        // 32 bits for "time_low"
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),

        // 16 bits for "time_mid"
        mt_rand(0, 0xffff),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand(0, 0x0fff) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand(0, 0x3fff) | 0x8000,

        // 48 bits for "node"
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff)
    );
}


function time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    // Manually calculate weeks from days
    $weeks = floor($diff->d / 7);
    $diff->d -= $weeks * 7;

    // Build time components
    $time_components = [
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    ];

    // Add weeks manually
    $diff_array = [
        'y' => $diff->y,
        'm' => $diff->m,
        'w' => $weeks,
        'd' => $diff->d,
        'h' => $diff->h,
        'i' => $diff->i,
        's' => $diff->s,
    ];

    $string = [];
    foreach ($time_components as $key => $label) {
        if ($diff_array[$key]) {
            $string[] = $diff_array[$key] . ' ' . $label . ($diff_array[$key] > 1 ? 's' : '');
        }
    }

    if (!$full) {
        $string = array_slice($string, 0, 1);
    }

    return $string ? implode(', ', $string) . ' ago' : 'just now';
}


// date_default_timezone_set("Asia/Kolkata");
date_default_timezone_set('UTC');
$today = date("Y-m-d");
$today2 = date("d/m/Y");
$day = date("l");
$year = date("Y");
$lastyear = date("Y", strtotime("-1 year"));
$month = date("F");
$year_month = date("Y-m");
$yearMonth = date("Ym");
$inv_month = date("m");
$current_date_time = date("Y-m-d H:i:s", time());
$current_time = date("H:i:s", time());
$current_time_lcl = date("h:i A", time());
$last_month = date("Y-m", strtotime("first day of previous month"));
$days_in_last_month = date("t", mktime(0, 0, 0, date("n") - 1));

// date_default_timezone_set("Asia/Kolkata");
// $current_date_time_local = date("Y-m-d H:i:s", time());
// $today_local = date("Y-m-d");
// date_default_timezone_set('UTC');

function date_format_local($date, $format)
{
    return date_format(date_create($date), $format);
}
function cleanString($string)
{
    $string = strtolower($string);
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    $string = str_replace('--', '-', $string);
    return strtolower($string);
}

function add_sec_to_time($date, $seconds)
{
    $add_time = strtotime($date) + $seconds;
    $add_date = date('Y-m-d H:i:s', $add_time);

    return $add_date;
}
function time_diff($start_date, $end_date, $diff_in)
{
    $start_date = new DateTime($start_date);
    $since_start = $start_date->diff(new DateTime($end_date));
    $minutes = $since_start->days * 24 * 60;
    $minutes += $since_start->h * 60;
    $minutes += $since_start->i;
    if ($diff_in == 'min') {
        return $minutes;
    }
}
function clean($string)
{


    $string = strtolower($string);
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
class manipulateString
{
    public static function truncate($txt, $len)
    {
        if (strlen($txt) > $len) {
            return substr($txt, 0, $len) . '...';
        } else {
            return $txt;
        }
    }
    public static function makeNull($str)
    {
        if (trim($str == '')) {
            return null;
        } else {
            return trim($str);
        }
    }
    public static function makeNa($str)
    {
        if (trim($str == NULL)) {
            return 'N/A';
        } else {
            return $str;
        }
    }
}

function notify($message, $subject)
{
    $to = 'sajeeshrajan99@gmail.com';
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <no-reply@gmail.com>' . "\r\n";
    // $headers .= 'Cc: myboss@example.com' . "\r\n";

    mail($to, $subject, $message, $headers);
}

function forgot($message, $to)
{
    $subject = 'Forgot password request';
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <no-reply@alkhatsteel.com>' . "\r\n";
    // $headers .= 'Cc: myboss@example.com' . "\r\n";

    mail($to, $subject, $message, $headers);
}

class GenerateToken
{
    public static function UUIDV4()
    {
        return 't' . sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x', mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0x0fff) | 0x4000, mt_rand(0, 0x3fff) | 0x8000, mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff));
    }
    public static function random_string($length)
    {
        $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($str_result), 0, $length);
    }
}
class GetDateTime
{
    public static function today()
    {
        return date("Y-m-d");
    }
    public static function todayKolkata()
    {
        date_default_timezone_set("Asia/Kolkata");
        return date("Y-m-d");
    }
    public static function today2()
    {
        date_default_timezone_set("Asia/Kolkata");
        return date("d/m/Y");
    }
    public static function day()
    {
        date_default_timezone_set("Asia/Kolkata");
        return date("l");
    }
    public static function year()
    {
        date_default_timezone_set("Asia/Kolkata");
        return date("Y");
    }
    public static function month()
    {
        date_default_timezone_set("Asia/Kolkata");
        return date("F");
    }
    public static function Y_m()
    {
        date_default_timezone_set("Asia/Kolkata");
        return date("Y-m");
    }
    public static function m()
    {
        date_default_timezone_set("Asia/Kolkata");
        return date("m");
    }
    public static function udate_time()
    {
        date_default_timezone_set("Asia/Kolkata");
        return date("Y-m-d H:i:s", time());
    }
    public static function udate_time_sec($sec)
    {
        date_default_timezone_set("Asia/Kolkata");
        $current_time = new DateTime();

        // Add 2 seconds to the current time
        $current_time->modify('+' . $sec . ' seconds');

        // Format the new time as desired
        return $current_time->format('Y-m-d H:i:s');
    }
    public static function addSecondsToTime($timeString, $sec)
    {
        $dateTime = new DateTime($timeString); // Create a DateTime object from the time string
        $dateTime->modify("+" . $sec . "seconds"); // Add seconds
        return $dateTime->format('Y-m-d H:i:s'); // Format and return the updated time
    }
    public static function utime()
    {
        date_default_timezone_set("Asia/Kolkata");
        return date("H:i:s", time());
    }
    public static function utime_local_format()
    {
        date_default_timezone_set("Asia/Kolkata");
        return date("h:i A", time());
    }
    public static function last_month()
    {
        date_default_timezone_set("Asia/Kolkata");
        return date("Y-m", strtotime("first day of previous month"));
    }
    public static function days_last_month()
    {
        date_default_timezone_set("Asia/Kolkata");
        return date("t", mktime(0, 0, 0, date("n") - 1));
    }
    public static function stoday()
    {
        date_default_timezone_set("Asia/Kolkata");
        return date("Y-m-d");
    }
    public static function invYr()
    {
        date_default_timezone_set("Asia/Kolkata");
        $inv_month = date("m");
        // return date("Y-m-d");
        if ($inv_month >= "04") {
            $y1 = date("Y");
            $y2 = date("y") + 1;
            $current_invoice_year = $y1 . "-" . $y2;
        } else {
            $y1 = date("Y") - 1;
            $y2 = date("y");
            $current_invoice_year = $y1 . "-" . $y2;
        }
        return $current_invoice_year;
    }
    public static function sdate_time()
    {
        date_default_timezone_set("Asia/Kolkata");
        return date("Y-m-d H:i:s", time());
    }
}
