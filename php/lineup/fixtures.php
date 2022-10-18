<?php
    foreach($fixtures as $key=>$fixture) {
        foreach($data['teams'] as $key=>$teams) {
              //players team id         //fixture team id's
            if ($item2['team'] === $fixture['team_h'] || $fixture['team_a']) {
                    //players fixture         //fixture info
                if ($explain['fixture'] === $fixture['id']) {
                      //fixture home team       //team info
                    if ($fixture['team_h'] === $teams['id']) {
                        echo '<span class="home">';
                        if ($teams['name'] === 'Crystal Palace') {
                            echo 'Palace';
                        } else {
                            echo $teams['name'];
                        }
                        echo '</span>';
                        if ($fixture['started'] == false) {
                            echo '<strong><time class="fixture__ko" datetime="fixture.kickoff_time"><span class="fixture__ko-item_modal">';
                            $kickoff = $fixture['kickoff_time'];
                            $datetime = new DateTime($kickoff);
                            $timezone = new DateTimeZone('Europe/London');
                            $datetime->setTimezone($timezone);
                            echo $datetime->format('D j M').'<br>';
                            echo $datetime->format('G:i');
                            echo '</span></time></strong>';
                        }
                        if ($fixture['started'] == true && $fixture['finished_provisional'] == false) {
                            echo '<span class="live">Live</span>';
                        }
                        if ($fixture['started'] == true) {
                            echo '<strong>'.$fixture['team_h_score'].' - ';
                        }
                    }
                }
            }
        }
    }
    foreach($fixtures as $key=>$fixture) {
        foreach($data['teams'] as $key=>$teams) {
              //players team id         //fixture team id's
            if ($item2['team'] === $fixture['team_h'] || $fixture['team_a']) {
                    //players fixture         //fixture info
                if ($explain['fixture'] === $fixture['id']) {
                      //fixture away team      //team info
                    if ($fixture['team_a'] === $teams['id']) {
                        echo $fixture['team_a_score'].'</strong>';
                        echo '<span class="away">'.$teams['name'];
                        if ($fixture['started'] == true && $fixture['finished_provisional'] == false) {
                            echo '<span class="minutes">'.$fixture['minutes']."'".'</span></span>';
                        }
                    }
                }
            }
        }
    }
?>