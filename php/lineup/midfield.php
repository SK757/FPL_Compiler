<?PHP
include 'php/dates.php';
$count = 6;
foreach($picks['picks'] as $key=>$item) {
    foreach($live['elements'] as $key=>$item1) {
	    foreach($data['elements'] as $key=>$item2) {
	        if ($item['element'] === $item1['id'] && $item['element'] === $item2['id']) {
	        	if($item['position'] === 5 && $item2['element_type'] == 3 || $item['position'] === 6 && $item2['element_type'] == 3 || $item['position'] === 7 || $item['position'] === 8 || $item['position'] === 9 && $item2['element_type'] == 3 || $item['position'] === 10 && $item2['element_type'] == 3) {
	        		echo '<div class="column"><div class="player"><p>' . $item2['web_name'] . '</p></div><div class="points"><b><p>' . $item1['stats']['total_points'] . '</p></b></div></div>';
	        	}
	        	++$count;
	        }
	    }
	}
}