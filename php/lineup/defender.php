<?PHP
include 'php/dates.php';
foreach($picks['picks'] as $key=>$item) {
    foreach($live['elements'] as $key=>$item1) {
	    foreach($data['elements'] as $key=>$item2) {
	        if ($item['element'] === $item1['id'] && $item['element'] === $item2['id']) {
	        	if($item['position'] === 2 || $item['position'] === 3 || $item['position'] === 4 || $item['position'] === 5 && $item2['element_type'] == 2 || $item['position'] === 6 && $item2['element_type'] == 2) {
	        		if ($item2['web_name'] === 'Alexander-Arnold') {
	        			echo '<div class="column"><div class="image" style="background-image: url(https://resources.premierleague.com/premierleague/photos/players/110x140/p' . $item2['code'] . '.png);"></div><div class="player"><p>Trent';
					} else {
						echo '<div class="column"><div class="image" style="background-image: url(https://resources.premierleague.com/premierleague/photos/players/110x140/p' . $item2['code'] . '.png);"></div><div class="player"><p>' . $item2['web_name'];
					}
	        		if($item['multiplier'] === 2) {
	        			echo ' (c)';
	        		} elseif($item['multiplier'] === 3) {
	                	echo ' (tc)';
	                } else {
	                	if($item['is_vice_captain'] === true) {
		        			echo ' (vc)';
			        	}
		        	}
					echo '</p></div><div class="points"><b><p>';
					if($item['multiplier'] === 2) {
	                	echo $item1['stats']['total_points'] * 2;
	                } elseif($item['multiplier'] === 3) {
	                	echo $item1['stats']['total_points'] * 3;
	                } else {
	                	echo $item1['stats']['total_points'];
		        	}
		        	echo '</p></b></div></div>';
					
	        	}
	        }
	    }
	}
}