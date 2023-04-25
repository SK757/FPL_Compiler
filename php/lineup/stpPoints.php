<?php
foreach($item1['explain'] as $key=>$explain) {	
    foreach($fixtures as $key=>$fixture) {
          //players team id         //fixture team id's
        if ($item2['team'] === $fixture['team_h'] || $fixture['team_a']) {
                //players fixture         //fixture info
            if ($explain['fixture'] === $fixture['id']) {
            	if ($fixture['started'] === false) {
            		echo '<p class="stp">Still to play</p></div>';
            	} else {
            		echo '<b><p class="p">'.$item1['stats']['total_points'] * $item['multiplier'].'</p></b></div>';
            	}
            }
        }
    }
}
?>