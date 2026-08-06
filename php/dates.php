<?PHP
date_default_timezone_set('Europe/London');
$date = date("Y-m-d H:i:s");

$data = json_decode(file_get_contents("https://fantasy.premierleague.com/api/bootstrap-static/"), true);
$leagues = json_decode(file_get_contents("https://fantasy.premierleague.com/api/entry/3115828/"), true);
$navStandings = json_decode(file_get_contents("https://fantasy.premierleague.com/api/leagues-classic/639735/standings/"), true);
$moneyStandings = json_decode(file_get_contents("https://fantasy.premierleague.com/api/leagues-classic/191685/standings/"), true);
$tasStandings = json_decode(file_get_contents("https://fantasy.premierleague.com/api/leagues-classic/639778/standings/"), true);
$ainStandings = json_decode(file_get_contents("https://fantasy.premierleague.com/api/leagues-classic/2500/standings/"), true);

$picks = json_decode(file_get_contents("https://fantasy.premierleague.com/api/entry/3115828/event/".$leagues['current_event']."/picks/"), true);
$live = json_decode(file_get_contents("https://fantasy.premierleague.com/api/event/".$leagues['current_event']."/live/"), true);

$nextgw = $leagues['current_event']+1;
$lastgw = $leagues['current_event']-1;
$deadline = json_decode(file_get_contents("https://fantasy.premierleague.com/api/fixtures/?event=".$nextgw), true);


$fixtures = json_decode(file_get_contents("https://fantasy.premierleague.com/api/fixtures/?event=".$leagues['current_event']), true);
$upcomingFixtures = json_decode(file_get_contents("https://fantasy.premierleague.com/api/fixtures/?future=1"), true);

?>