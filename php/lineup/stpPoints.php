<?php
$gamePlayed = false;
$gameNotPlayed = false;
$fix = 0;
$stp = 0;
$didPlay = false;
$didNotPlay = false;
$startingXI = true;
foreach($item1['explain'] as $key=>$explain) {	
    foreach($fixtures as $key=>$fixture) {
          //players team id         //fixture team id's
        if ($item2['team'] === $fixture['team_h'] || $fixture['team_a']) {
                //players fixture         //fixture info
            if ($explain['fixture'] === $fixture['id']) {
            	if ($fixture['started'] === true) {
                    $gamePlayed = true;
                } else {
                    $gameNotPlayed = true;
                    ++$stp;
                }
                if ($item1['stats']['minutes'] === 0 && $fixture['finished_provisional'] === false) {
                    $startingXI = false;
                }
                if ($fixture['finished_provisional'] === true && $item1['stats']['minutes'] > 0) {
                    $didPlay = true;
                }
                if ($fixture['finished_provisional'] === true && $item1['stats']['minutes'] === 0) {
                    $didNotPlay = true;
                }
            }
        }
    }++$fix;
}
if ($fix > 0 && $gamePlayed === true) {
    if ($item['multiplier'] === 2 || $item['multiplier'] === 3) {
        echo '<b><p class="p" style="display:inline;">'.$item1['stats']['total_points'] * $item['multiplier'].'</p></b>';
    } else {
        echo '<b><p class="p" style="display:inline;">'.$item1['stats']['total_points'].'</p></b>';
    }
    include 'php/lineup/bps2.php';
}

if(empty($item1['explain'])) {
    echo '<b><p class="p">-</p></b>';
}

echo '</div>';

if ($fix === 1 && $gameNotPlayed === true) {
    if ($stp === 1) {
        echo '<div class="stp">Still to play</div>';
    } elseif ($stp > 1) {
        echo '<div class="stp">'. $stp .' Still to play</div>';
    }
} elseif ($fix === 1 && $gamePlayed === true && $startingXI === false) {
    echo '<div class="stp">Not in 1st XI</div>';
} elseif ($fix === 1 && $didNotPlay === true && $didPlay === false) {
    echo '<div class="stp">Did not play</div>';
}
if ($fix === 2 && $gameNotPlayed === true) {
    echo '<div class="stp">'. $stp .' Still to play</div>';
} elseif ($fix === 2 && $didNotPlay === true && $didPlay === false) {
    echo '<div class="stp">Did not play</div>';
}

if(empty($item1['explain'])) {
    echo '<div class="stp">No match</div>';
}

?>