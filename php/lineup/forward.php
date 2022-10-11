<?PHP
include 'php/dates.php';
foreach($picks['picks'] as $key=>$item) {
    foreach($live['elements'] as $key=>$item1) {
	    foreach($data['elements'] as $key=>$item2) {
	        if ($item['element'] === $item1['id'] && $item['element'] === $item2['id']) {
	        	if($item['position'] < 12 && $item2['element_type'] == 4) {
	        		include 'captain.php';
		        	echo '</p></b></div>';
		        	include 'modal.php';

	        	}
	        }
	    }
	}
}
?>