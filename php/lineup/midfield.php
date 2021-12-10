<?PHP
include 'php/dates.php';
foreach($picks['picks'] as $key=>$item) {
    foreach($live['elements'] as $key=>$item1) {
	    foreach($data['elements'] as $key=>$item2) {
	        if ($item['element'] === $item1['id'] && $item['element'] === $item2['id']) {
	        	if($item['position'] < 12 && $item2['element_type'] == 3) {
	        		include 'captain.php';
		        	echo '</p></b></div>';
		        	?>

		        	<!-- <button id="123" class="player_btn"></button> -->

		        	<?PHP
		        	echo '</div>';
	        	}
	        }
	    }
	}
}