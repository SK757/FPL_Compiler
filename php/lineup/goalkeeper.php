<?PHP
include 'php/dates.php';
foreach($picks['picks'] as $key=>$item) {
    foreach($live['elements'] as $key=>$item1) {
	    foreach($data['elements'] as $key=>$item2) {
	        if ($item['element'] === $item1['id'] && $item['element'] === $item2['id']) {
	        	if($item['position'] === 1) {
	        		echo '<div class="image" style="background-image: url(https://resources.premierleague.com/premierleague/photos/players/110x140/p' . $item2['code'] . '.png);"></div><div class="player"><p>' . $item2['web_name'] . '</p></div><div class="points"><b><p>';
	        		if($item['multiplier'] === 2) {
	                	echo $item1['stats']['total_points'] * 2 . ' (c)</p></b></div>';
	                } elseif($item['multiplier'] === 3) {
	                	echo $item1['stats']['total_points'] * 3 . ' (tc)</p></b></div>';
	                } else {
		        		echo $item1['stats']['total_points'] . '</p></b></div>';
		        	}
	        	}
	        }
	    }
	}
}
// function defender() {
// 	$jdata = file_get_contents("https://fantasy.premierleague.com/api/bootstrap-static/");
// 	$data = json_decode($jdata, true);

// 	$jpicks = file_get_contents("https://fantasy.premierleague.com/api/entry/581004/event/6/picks/");
// 	$jlive = file_get_contents("https://fantasy.premierleague.com/api/event/6/live/");

// 	$picks = json_decode($jpicks, true);
// 	$live = json_decode($jlive, true);

// 	foreach($picks['picks'] as $key=>$item) {
// 	    foreach($live['elements'] as $key=>$item1) {
// 		    foreach($data['elements'] as $key=>$item2) {
// 		        if ($item['element'] === $item1['id'] && $item['element'] === $item2['id']) {
// 		        	if($item['position'] === 2 && $item['position'] === 3 && $item['position'] === 4 && $item['position'] === 5) {
// 		        		echo $item2['second_name'];
// 		        	}
// 		        }
// 		    }
// 		}
// 	}
// }
// function midfield() {
// 	$jdata = file_get_contents("https://fantasy.premierleague.com/api/bootstrap-static/");
// 	$data = json_decode($jdata, true);

// 	$jpicks = file_get_contents("https://fantasy.premierleague.com/api/entry/581004/event/6/picks/");
// 	$jlive = file_get_contents("https://fantasy.premierleague.com/api/event/6/live/");

// 	$picks = json_decode($jpicks, true);
// 	$live = json_decode($jlive, true);

// 	foreach($picks['picks'] as $key=>$item) {
// 	    foreach($live['elements'] as $key=>$item1) {
// 		    foreach($data['elements'] as $key=>$item2) {
// 		        if ($item['element'] === $item1['id'] && $item['element'] === $item2['id']) {
// 		        	if($item['position'] === 5 && $item['position'] === 6 && $item['position'] === 7 && $item['position'] === 8) {
// 		        		echo $item2['second_name'];
// 		        	}
// 		        }
// 		    }
// 		}
// 	}
// }

	// $count = 1;
	// foreach($picks['picks'] as $key=>$item) {
	//     foreach($live['elements'] as $key=>$item1) {
	// 	    foreach($data['elements'] as $key=>$item2) {
	// 	        if ($item['element'] === $item1['id'] && $item['element'] === $item2['id']) {
	// 	        	if($item['position'] === 1) {
	// 	        		echo '<section class="flex-container"><div style="flex-grow: 10"><b><p id="player_'.$count.'">' . $item2['second_name'] . '</p></b></div></section>';
	// 	        	} elseif($item['position'] === 2 && $item['position'] === 3 && $item['position'] === 4) {
	// 	        		echo '<section class="flex-container"><div style="flex-grow: 10"><b><p id="player_'.$count.'">' . $item2['second_name'] . '</p></b></div></section>';
	// 	        	} else {
	// 		            echo '<section class="flex-container"><div style="flex-grow: 1"><b><p id="player_'.$count.'">' . $item2['second_name'] . '</p></b></div></section>';
	// 		        }
	// 	            ++$count;
	// 	        }
	// 	    }
	// 	}
	// }
?>