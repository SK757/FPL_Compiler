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
                //if player HASN'T STARTED the fixture
                if ($item1['stats']['starts'] === 0 && $fixture['finished_provisional'] === false) {
                    $startingXI = false;
                }
                //if player HAS played
                if ($fixture['finished_provisional'] === true && $item1['stats']['minutes'] > 0) {
                    $didPlay = true;
                }
                //if player HASN'T played
                if ($fixture['finished_provisional'] === true && $item1['stats']['minutes'] === 0) {
                    $didNotPlay = true;
                }
            }
        }
    }++$fix;
}
//If player has a fixture and fixture has stared
if ($fix > 0 && $gamePlayed === true) {
    if ($item['multiplier'] === 2 || $item['multiplier'] === 3) {
        echo '<b><p class="p" style="display:inline;">'.$item1['stats']['total_points'] * $item['multiplier'].'</p></b>';
    } else {
        echo '<b><p class="p" style="display:inline;">'.$item1['stats']['total_points'].'</p></b>';
    }
    include 'php/lineup/bps2.php';
}

//If player doesn't have a fixture
if(empty($item1['explain'])) {
    echo '<b><p class="p">-</p></b>';
}

echo '</div>';

//If player has at least 1 fixture and fixture hasn't started
if ($fix > 0 && $gameNotPlayed === true) {
    //If player has 1 fixture still to play
    if ($stp === 1) {
        echo '<div class="stp">Still to play</div>';
    //If player more than 1 fixture still to play
    } elseif ($stp > 1) {
        echo '<div class="stp"><span class="stpNumber">'. $stp .'</span> Still to play</div>';
    }
} elseif ($fix > 0 && $gamePlayed === true && $startingXI === false) {
    echo '<div class="dnp">Not in 1st XI</div>';
} elseif ($fix > 0 && $didNotPlay === true && $didPlay === false) {
    echo '<div class="dnp">Did not play</div>';
}

// if ($fix === 2 && $gameNotPlayed === true && $stp > 1) {
//     echo '<div class="stp"><span class="stpNumber">'. $stp .'</span> Still to play</div>';
// } if ($fix === 2 && $gameNotPlayed === true && $stp === 1) {
//     echo '<div class="stp"> Still to play</div>';
// } elseif ($fix === 2 && $didNotPlay === true && $didPlay === false) {
//     echo '<div class="dnp">Did not play</div>';
// }

if(empty($item1['explain'])) {
    echo '<div class="dnp">No match</div>';
}

?>