<?PHP
date_default_timezone_set('Europe/London');
$date = date("Y-m-d H:i:s");

$data = json_decode(file_get_contents("https://fantasy.premierleague.com/api/bootstrap-static/"), true);
$leagues = json_decode(file_get_contents("https://fantasy.premierleague.com/api/entry/56467/"), true);
$navStandings = json_decode(file_get_contents("https://fantasy.premierleague.com/api/leagues-classic/61937/standings/?page_new_entries=1&page_standings=1&phase=1"), true);
$tasStandings = json_decode(file_get_contents("https://fantasy.premierleague.com/api/leagues-classic/381282/standings/?page_new_entries=1&page_standings=1&phase=1"), true);

$picks = json_decode(file_get_contents("https://fantasy.premierleague.com/api/entry/56467/event/".$leagues['current_event']."/picks/"), true);
$live = json_decode(file_get_contents("https://fantasy.premierleague.com/api/event/".$leagues['current_event']."/live/"), true);

$nextgw = $leagues['current_event']+1;
$deadline = json_decode(file_get_contents("https://fantasy.premierleague.com/api/fixtures/?event=".$nextgw), true);


$fixtures = json_decode(file_get_contents("https://fantasy.premierleague.com/api/fixtures/?event=".$leagues['current_event']), true);
$upcomingFixtures = json_decode(file_get_contents("https://fantasy.premierleague.com/api/fixtures/?future=1"), true);
?>