<?php
$gamePlayed = false;
$gameNotPlayed = false;
$fix = 0;
$stp = 0;
$didPlay = false;
$didNotPlay = false;
foreach($item1['explain'] as $key=>$explain) {	
    foreach($fixtures as $key=>$fixture) {
          //players team id         //fixture team id's
        if ($item2['team'] === $fixture['team_h'] || $fixture['team_a']) {
                //players fixture         //fixture info
            if ($explain['fixture'] === $fixture['id']) {
            	if ($fixture['started'] === true) {
                    $gamePlayed = true;
                }
                if ($fixture['finished_provisional'] === true && $item1['stats']['minutes'] > 0) {
                    $didPlay = true;
                }
                if ($fixture['finished_provisional'] === true && $item1['stats']['minutes'] === 0) {
                    $didNotPlay = true;
                }
                if ($fixture['started'] === false) {
                    $gameNotPlayed = true;
                    ++$stp;
                }
            }
        }
    }++$fix;
}
if ($fix > 0 && $gamePlayed === true && $didNotPlay === false) {
    if ($item['multiplier'] === 2 || $item['multiplier'] === 3) {
        echo '<b><p class="p">'.$item1['stats']['total_points'] * $item['multiplier'].'</p></b>';
    } else {
        echo '<b><p class="p">'.$item1['stats']['total_points'].'</p></b>';
    }
}
echo '</div>';
if ($fix === 1 && $gameNotPlayed === true) {
    if ($stp === 1) {
        echo '<span class="stp">Still to play</span>';
    } elseif ($stp > 1) {
        echo '<span class="stp">'. $stp .' Still to play</span>';
    }
} elseif ($fix === 1 && $didNotPlay === true && $didPlay === false) {
    echo '<span class="stp">Did not play</span>';
}
if ($fix === 2 && $gameNotPlayed === true) {
    echo '<span class="stp">'. $stp .' Still to play</span>';
} elseif ($fix === 2 && $didNotPlay === true && $didPlay === false) {
    echo '<span class="stp">Did not play</span>';
}
?>