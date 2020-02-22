<?PHP
include 'dates.php';
$leagues = json_decode(file_get_contents("https://fantasy.premierleague.com/api/entry/581004/"), true);

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
        	} elseif($item['multiplier'] === 3) {
                echo '<span id="player_'.$count.'" class="player_scores">' . $item1['stats']['total_points'] * 3 . '(tc)</span>';
            } else {
        		echo '<span id="player_'.$count.'" class="player_scores">' . $item1['stats']['total_points'] . '</span>';
        	}
            ++$count; 
        }
	}
}
?>