<?PHP
date_default_timezone_set('Europe/London');
$date = date("Y-m-d H:i:s");

$data = json_decode(file_get_contents("https://fantasy.premierleague.com/api/bootstrap-static/"), true);

if ($date >= '2020-06-27 12:15:00' && $date < '2020-07-04 12:15:00') {
    $jpicks = file_get_contents("https://fantasy.premierleague.com/api/entry/581004/event/41/picks/");
} elseif ($date >= '2020-07-04 12:15:00' && $date < '2020-07-07 17:45:00') {
    $jpicks = file_get_contents("https://fantasy.premierleague.com/api/entry/581004/event/42/picks/");
} elseif ($date >= '2020-07-07 17:45:00' && $date < '2020-07-11 12:15:00') {
    $jpicks = file_get_contents("https://fantasy.premierleague.com/api/entry/581004/event/43/picks/");
} elseif ($date >= '2020-07-11 12:15:00' && $date < '2020-07-15 17:45:00') {
    $jpicks = file_get_contents("https://fantasy.premierleague.com/api/entry/581004/event/44/picks/");
} 
// elseif ($date >= '2020-07-15 12:15:00' && $date < '2020-07-16 12:15:00') {
//     $jpicks = file_get_contents("https://fantasy.premierleague.com/api/entry/581004/event/45/picks/");
// } elseif ($date >= '2020-07-16 12:15:00' && $date < '2020-07-17 12:15:00') {
//     $jpicks = file_get_contents("https://fantasy.premierleague.com/api/entry/581004/event/46/picks/");
// } elseif ($date >= '2020-07-17 12:15:00' && $date < '2020-07-18 12:15:00') {
//     $jpicks = file_get_contents("https://fantasy.premierleague.com/api/entry/581004/event/47/picks/");
// }


if ($date >= '2020-06-27 12:15:00' && $date < '2020-07-04 12:15:00') {
    $jlive = file_get_contents("https://fantasy.premierleague.com/api/event/41/live/");
} elseif ($date >= '2020-07-04 12:15:00' && $date < '2020-07-07 17:45:00') {
    $jlive = file_get_contents("https://fantasy.premierleague.com/api/event/42/live/");
} elseif ($date >= '2020-07-07 17:45:00' && $date < '2020-07-11 12:15:00') {
    $jlive = file_get_contents("https://fantasy.premierleague.com/api/event/43/live/");
} elseif ($date >= '2020-07-11 12:15:00' && $date < '2020-07-15 17:45:00') {
    $jlive = file_get_contents("https://fantasy.premierleague.com/api/event/44/live/");
} 
// elseif ($date >= '2020-07-15 12:15:00' && $date < '2020-07-16 12:15:00') {
//     $jlive = file_get_contents("https://fantasy.premierleague.com/api/event/45/live/");
// } elseif ($date >= '2020-07-16 12:15:00' && $date < '2020-07-17 12:15:00') {
//     $jlive = file_get_contents("https://fantasy.premierleague.com/api/event/46/live/");
// } elseif ($date >= '2020-07-17 12:15:00' && $date < '2020-07-18 12:15:00') {
//     $jlive = file_get_contents("https://fantasy.premierleague.com/api/event/47/live/");
// }

$picks = json_decode($jpicks, true);
$live = json_decode($jlive, true);
?>