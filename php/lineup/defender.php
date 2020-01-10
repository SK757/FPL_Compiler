<?PHP
include 'php/dates.php';
$count = 1;
foreach($picks['picks'] as $key=>$item) {
    foreach($live['elements'] as $key=>$item1) {
	    foreach($data['elements'] as $key=>$item2) {
	        if ($item['element'] === $item1['id'] && $item['element'] === $item2['id']) {
	        	if($item['position'] === 2 || $item['position'] === 3 || $item['position'] === 4 || $item['position'] === 5 && $item2['element_type'] == 2 || $item['position'] === 6 && $item2['element_type'] == 2) {
	        		if ($item2['second_name'] === "Alexander-Arnold") {
	        			echo '<div style="flex-grow: 2.5"><b><p id="player_'.$count.'">Trent</p></b></div>';
	        		}
	        		else {
	        			echo '<div style="flex-grow: 2.5"><b><p id="player_'.$count.'">' . $item2['second_name'] . '</p></b></div>';
	        		}
	        	}
	            ++$count;
	        }
	    }
	}
}