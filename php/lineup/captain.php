<?PHP
echo '<div class="column"><div class="image" style="background-image: url(https://resources.premierleague.com/premierleague/photos/players/110x140/p' . $item2['code'] . '.png);">';
if($item['multiplier'] === 2) {
	echo '<span class="capt">C</span>';
} elseif($item['multiplier'] === 3) {
	echo '<span class="tripcapt">TC</span>';
} elseif($item['is_vice_captain'] === true) {
	echo '<span class="capt">V</span>';
}
$chance = $item2['chance_of_playing_next_round'];
if($chance === 75) {
	echo '<span class="chance seventyFive"><b>!</b></span>';
}elseif($chance === 50) {
	echo '<span class="chance fifty"><b>!</b></span>';
}elseif($chance === 25) {
	echo '<span class="chance twentyFive"><b>!</b></span>';
}elseif($chance === 0) {
	echo '<span class="chance zero"><b>!</b></span>';
}
$upcomingAndPastFixtures = json_decode(file_get_contents("https://fantasy.premierleague.com/api/element-summary/".$item1['id']."/"), true);

foreach($upcomingAndPastFixtures['history'] as $key=>$matchInfo) {
	foreach($fixtures as $key=>$fixture) {
	    if ($matchInfo['fixture'] === $fixture['id']) {
	        if ($fixture['started'] === true && $fixture['finished_provisional'] === false) {
	            echo '<span class="gameLive"><b>LIVE</b></span>';
	        }
	    }
	}
}



echo '</div><div class="player"><b><p>' . $item2['web_name']. '</p></b></div><div class="points">';
include 'stpPoints.php';
?>