<?PHP
include 'php/dates.php';
$count = 10;
foreach($picks['picks'] as $key=>$item) {
    foreach($live['elements'] as $key=>$item1) {
	    foreach($data['elements'] as $key=>$item2) {
	        if ($item['element'] === $item1['id'] && $item['element'] === $item2['id']) {
	        	if($item['position'] === 9 && $item2['element_type'] == 4 || $item['position'] === 10 && $item2['element_type'] == 4 || $item['position'] === 11) {
	        		echo '<div style="flex-grow: 2.5"><b><p id="player_'.$count.'">' . $item2['web_name'] . '</p></b></div>';
	        	}
	        	++$count;
	        }
	    }
	}
}