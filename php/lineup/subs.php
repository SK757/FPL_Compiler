<?PHP
include 'php/dates.php';
foreach($picks['picks'] as $key=>$item) {
    foreach($live['elements'] as $key=>$item1) {
	    foreach($data['elements'] as $key=>$item2) {
	        if ($item['element'] === $item1['id'] && $item['element'] === $item2['id']) {
	        	if($item['position'] >= 12) {
	        		echo '<div class="column bench"><div class="image bench-image" style="background-image: url(https://resources.premierleague.com/premierleague/photos/players/110x140/p' . $item2['code'] . '.png);"></div><div class="player"><p>' . $item2['web_name'] . '</p></div><div class="points"><b><p class="p">' . $item1['stats']['total_points'] . '</p></b></div></div>';
	        	}
	        }
	    }
	}
}