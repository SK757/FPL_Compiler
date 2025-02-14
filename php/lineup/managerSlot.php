<?PHP
foreach($picks['picks'] as $key=>$item) {
    foreach($live['elements'] as $key=>$item1) {
        foreach($data['elements'] as $key=>$item2) {
            if ($item['element'] === $item1['id'] && $item['element'] === $item2['id']) {
                if($item['position'] === 16) {
                    echo '<div class="column managerColumn"><div class="image" style="background-image: url(https://resources.premierleague.com/premierleague/photos/players/110x140/'. $item2['opta_code'] .'.png), url(https://resources.premierleague.com/premierleague/photos/players/110x140/Photo-Missing.png);">';
                    $upcomingAndPastFixtures = json_decode(file_get_contents("https://fantasy.premierleague.com/api/element-summary/".$item1['id']."/"), true);

                    foreach($upcomingAndPastFixtures['history'] as $key=>$matchInfo) {
                        foreach($fixtures as $key=>$fixture) {
                            if ($matchInfo['fixture'] === $fixture['id']) {
                                if ($fixture['started'] === true && $fixture['finished_provisional'] === false) {
                                    echo '<span class="gameLive"><b>LIVE</b></span>';
                                }
                            }
                        }
                    }
                    echo '</div>';
                    echo '<div class="player"><p>' . $item2['web_name'] . '</p></div><div class="points">';

                    $gamePlayed = false;
                    $gameNotPlayed = false;
                    $fix = 0;
                    $stp = 0;
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
                                }
                            }
                        }++$fix;
                    }

                    if ($fix > 0 && $gamePlayed === true) {
                        echo '<b><p class="managerP" style="display:inline;">'.$item1['stats']['total_points'].'</p></b>';
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
                    }
                    if ($fix === 2 && $gameNotPlayed === true) {
                        echo '<div class="stp">'. $stp .' Still to play</div>';
                    }
                    if(empty($item1['explain'])) {
                        echo '<div class="dnp">No match</div>';
                    }

                    include 'php/lineup/modal_manager.php';
                }
            }
        }
    }
}
?>