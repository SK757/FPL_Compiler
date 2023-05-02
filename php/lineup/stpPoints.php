<?php
$played = false;
$notPlayed = false;
$fix = 0;
$stp = 0;
foreach($item1['explain'] as $key=>$explain) {	
    foreach($fixtures as $key=>$fixture) {
          //players team id         //fixture team id's
        if ($item2['team'] === $fixture['team_h'] || $fixture['team_a']) {
                //players fixture         //fixture info
            if ($explain['fixture'] === $fixture['id']) {
            	if ($fixture['started'] === true) {
                    $played = true;
                }
                if ($fixture['started'] === false) {
                    $notPlayed = true;
                    ++$stp;
                }
            }
        }
    }++$fix;
}
if ($fix === 1 && $played === true || $fix === 2 && $played === true) {
    if ($item['multiplier'] === 2 || $item['multiplier'] === 3) {
        echo '<b><p class="p">'.$item1['stats']['total_points'] * $item['multiplier'].'</p></b>';
    } else {
        echo '<b><p class="p">'.$item1['stats']['total_points'].'</p></b>';
    }
}
echo '</div>';
if ($fix === 1 && $notPlayed === true) {
    if ($stp === 1) {
        echo '<span class="stp">Still to play</span>';
    } elseif ($stp > 1) {
        echo '<span class="stp">'. $stp .' Still to play</span>';
    }
}
if ($fix === 2 && $notPlayed === true) {
    echo '<span class="stp">'. $stp .' Still to play</span>';
}
?>