<?PHP
date_default_timezone_set('Europe/London');
$date = date("Y-m-d H:i:s");

$data = json_decode(file_get_contents("https://fantasy.premierleague.com/api/bootstrap-static/"), true);

if ($date >= '2020-01-21 19:15:00' && $date < '2020-02-01 12:15:00') {
    $jpicks = file_get_contents("https://fantasy.premierleague.com/api/entry/581004/event/24/picks/");
} elseif ($date >= '2020-02-01 12:15:00' && $date < '2020-02-08 12:15:00') {
    $jpicks = file_get_contents("https://fantasy.premierleague.com/api/entry/581004/event/25/picks/");
} elseif ($date >= '2020-02-08 12:15:00' && $date < '2020-02-22 12:15:00') {
    $jpicks = file_get_contents("https://fantasy.premierleague.com/api/entry/581004/event/26/picks/");
} elseif ($date >= '2020-02-22 12:15:00' && $date < '2020-02-28 19:45:00') {
    $jpicks = file_get_contents("https://fantasy.premierleague.com/api/entry/581004/event/27/picks/");
} elseif ($date >= '2020-02-28 19:45:00' && $date < '2020-03-07 12:15:00') {
    $jpicks = file_get_contents("https://fantasy.premierleague.com/api/entry/581004/event/28/picks/");
} elseif ($date >= '2020-03-07 12:15:00' && $date < '2020-03-14 12:15:00') {
    $jpicks = file_get_contents("https://fantasy.premierleague.com/api/entry/581004/event/29/picks/");
} elseif ($date >= '2020-03-14 12:15:00' && $date < '2020-03-20 19:45:00') {
    $jpicks = file_get_contents("https://fantasy.premierleague.com/api/entry/581004/event/30/picks/");
} elseif ($date >= '2020-03-20 19:45:00' && $date < '2020-04-04 12:15:00') {
    $jpicks = file_get_contents("https://fantasy.premierleague.com/api/entry/581004/event/31/picks/");
} elseif ($date >= '2020-04-04 12:15:00' && $date < '2020-04-11 12:15:00') {
    $jpicks = file_get_contents("https://fantasy.premierleague.com/api/entry/581004/event/32/picks/");
} elseif ($date >= '2020-04-11 12:15:00' && $date < '2020-04-18 12:15:00') {
    $jpicks = file_get_contents("https://fantasy.premierleague.com/api/entry/581004/event/33/picks/");
} elseif ($date >= '2020-04-18 12:15:00' && $date < '2020-04-25 12:15:00') {
    $jpicks = file_get_contents("https://fantasy.premierleague.com/api/entry/581004/event/34/picks/");
} elseif ($date >= '2020-04-25 12:15:00' && $date < '2020-05-02 12:15:00') {
    $jpicks = file_get_contents("https://fantasy.premierleague.com/api/entry/581004/event/35/picks/");
}


if ($date >= '2020-01-21 19:15:00' && $date < '2020-02-01 12:15:00') {
    $jlive = file_get_contents("https://fantasy.premierleague.com/api/event/24/live/");
} elseif ($date >= '2020-02-01 12:15:00' && $date < '2020-02-08 12:15:00') {
    $jlive = file_get_contents("https://fantasy.premierleague.com/api/event/25/live/");
} elseif ($date >= '2020-02-08 12:15:00' && $date < '2020-02-22 12:15:00') {
    $jlive = file_get_contents("https://fantasy.premierleague.com/api/event/26/live/");
} elseif ($date >= '2020-02-22 12:15:00' && $date < '2020-02-28 19:45:00') {
    $jlive = file_get_contents("https://fantasy.premierleague.com/api/event/27/live/");
} elseif ($date >= '2020-02-28 19:45:00' && $date < '2020-03-07 12:15:00') {
    $jlive = file_get_contents("https://fantasy.premierleague.com/api/event/28/live/");
} elseif ($date >= '2020-03-07 12:15:00' && $date < '2020-03-14 12:15:00') {
    $jlive = file_get_contents("https://fantasy.premierleague.com/api/event/29/live/");
} elseif ($date >= '2020-03-14 12:15:00' && $date < '2020-03-20 19:45:00') {
    $jlive = file_get_contents("https://fantasy.premierleague.com/api/event/30/live/");
} elseif ($date >= '2020-03-20 19:45:00' && $date < '2020-04-04 12:15:00') {
    $jlive = file_get_contents("https://fantasy.premierleague.com/api/event/31/live/");
} elseif ($date >= '2020-04-04 12:15:00' && $date < '2020-04-11 12:15:00') {
    $jlive = file_get_contents("https://fantasy.premierleague.com/api/event/32/live/");
} elseif ($date >= '2020-04-11 12:15:00' && $date < '2020-04-18 12:15:00') {
    $jlive = file_get_contents("https://fantasy.premierleague.com/api/event/33/live/");
} elseif ($date >= '2020-04-18 12:15:00' && $date < '2020-04-25 12:15:00') {
    $jlive = file_get_contents("https://fantasy.premierleague.com/api/event/34/live/");
} elseif ($date >= '2020-04-25 12:15:00' && $date < '2020-05-02 12:15:00') {
    $jlive = file_get_contents("https://fantasy.premierleague.com/api/event/35/live/");
}

$picks = json_decode($jpicks, true);
$live = json_decode($jlive, true);
?>