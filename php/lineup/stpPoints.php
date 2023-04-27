<?php
$i = 0;
$stp = false;
foreach($item1['explain'] as $key=>$explain) {	
    foreach($fixtures as $key=>$fixture) {
          //players team id         //fixture team id's
        if ($item2['team'] === $fixture['team_h'] || $fixture['team_a']) {
                //players fixture         //fixture info
            if ($explain['fixture'] === $fixture['id']) {
            	if ($fixture['started'] === false) {
                    $stp = true;
                }
            }
        }
    }++$i;
}

if ($stp === true) {
    echo '<p class="stp">'.$i.' Still to play</p></div>';
} elseif ($item['multiplier'] === 2 || $item['multiplier'] === 3) {
    echo '<b><p class="p">'.$item1['stats']['total_points'] * $item['multiplier'].'</p></b></div>';
} else {
    echo '<b><p class="p">'.$item1['stats']['total_points'].'</p></b></div>';
}
?>