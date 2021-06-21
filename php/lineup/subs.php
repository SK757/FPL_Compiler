<?PHP
include 'php/dates.php';
$count = 10;
foreach($picks['picks'] as $key=>$item) {
    foreach($live['elements'] as $key=>$item1) {
	    foreach($data['elements'] as $key=>$item2) {
	        if ($item['element'] === $item1['id'] && $item['element'] === $item2['id']) {
	        	if($item['position'] === 12 || $item['position'] === 13 || $item['position'] === 14 || $item['position'] === 15) {
	        		echo '<div class="column bench"><div class="player"><b><p id="player_'.$count.'">' . $item2['web_name'] . '</p></b></div><div class="points"><p>' . $item1['stats']['total_points'] . '</p></div></div>';
	        	}
	        	++$count;
	        }
	    }
	}
}