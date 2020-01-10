<?PHP
include 'dates.php';
$jleagues = file_get_contents("https://fantasy.premierleague.com/api/entry/581004/");

$leagues = json_decode($jleagues, true);

function ordinal($number) {
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
    if ((($number % 100) >= 11) && (($number%100) <= 13)) {
        return $number. 'th';
    } else {
        return $number. $ends[$number % 10];
    }
}
$count = 0;
foreach($picks['picks'] as $key=>$item) {
    foreach($live['elements'] as $key=>$item1) {
        if ($item['element'] === $item1['id']) {
        	if($item['multiplier'] === 2) {
        		echo '<span id="player_'.$count.'" class="player_scores">' . $item1['stats']['total_points'] * 2 . '(c)</span>';
        	} else {
        		echo '<span id="player_'.$count.'" class="player_scores">' . $item1['stats']['total_points'] . '</span>';
        	}
            ++$count; 
        }
	}
}
?>

