<?PHP
date_default_timezone_set('Europe/London');
$date = date("Y-m-d H:i:s");

$data = json_decode(file_get_contents("https://fantasy.premierleague.com/api/bootstrap-static/"), true);

if ($date >= '2020-05-17 12:15:00' && $date < '2020-06-17 16:45:00') {
    $jpicks = file_get_contents("https://fantasy.premierleague.com/api/entry/581004/event/38/picks/");
} elseif ($date >= '2020-06-17 16:45:00' && $date < '2020-06-23 16:45:00') {
    $jpicks = file_get_contents("https://fantasy.premierleague.com/api/entry/581004/event/39/picks/");
} elseif ($date >= '2020-06-23 16:45:00' && $date < '2020-06-27 11:15:00') {
    $jpicks = file_get_contents("https://fantasy.premierleague.com/api/entry/581004/event/40/picks/");
} elseif ($date >= '2020-06-27 11:15:00' && $date < '2020-07-04 11:15:00') {
    $jpicks = file_get_contents("https://fantasy.premierleague.com/api/entry/581004/event/41/picks/");
}


if ($date >= '2020-05-17 12:15:00' && $date < '2020-06-17 16:45:00') {
    $jlive = file_get_contents("https://fantasy.premierleague.com/api/event/38/live/");
} elseif ($date >= '2020-06-17 16:45:00' && $date < '2020-06-23 16:45:00') {
    $jlive = file_get_contents("https://fantasy.premierleague.com/api/event/39/live/");
} elseif ($date >= '2020-06-23 16:45:00' && $date < '2020-06-27 16:45:00') {
    $jlive = file_get_contents("https://fantasy.premierleague.com/api/event/40/live/");
} elseif ($date >= '2020-06-27 11:15:00' && $date < '2020-07-04 11:15:00') {
    $jlive = file_get_contents("https://fantasy.premierleague.com/api/event/41/live/");
}

$picks = json_decode($jpicks, true);
$live = json_decode($jlive, true);
?>