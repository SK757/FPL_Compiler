<?PHP
date_default_timezone_set('Europe/London');
$date = date("Y-m-d H:i:s");

$data = json_decode(file_get_contents("https://fantasy.premierleague.com/api/bootstrap-static/"), true);
$jleagues = json_decode(file_get_contents("https://fantasy.premierleague.com/api/entry/581004/"), true);

$jpicks = file_get_contents("https://fantasy.premierleague.com/api/entry/581004/event/".$leagues['current_event']."/picks/");
$jlive = file_get_contents("https://fantasy.premierleague.com/api/event/".$leagues['current_event']."/live/");

$picks = json_decode($jpicks, true);
$live = json_decode($jlive, true);
?>