<?php
    foreach($upcomingFixtures as $key=>$next5) {
        foreach($data['teams'] as $key=>$teams) {
            // if the fixture gw is equal to the next 5 gw's
            if ($next5['event'] <= $nextgw+4) {
                    //players team id         //fixture team id's
                if ($item2['team'] === $next5['team_h'] || $next5['team_a']) {
                    // if players team id equals fixtures home team
                    if ($item2['team'] === $next5['team_h']) {
                        // get away team name
                        if ($next5['team_a'] === $teams['id']) {
                            echo '<span class="diff'.$next5['team_h_difficulty'].'"><b>'.$next5['event'].'</b><br>'.$teams['short_name'].'</span>';
                        }
                    // if players team id equals fixtures away team
                    } elseif ($item2['team'] === $next5['team_a']) {
                        // get home team name
                        if ($next5['team_h'] === $teams['id']) {
                            echo '<span style="text-transform: lowercase;" class="diff'.$next5['team_a_difficulty'].'"><b>'.$next5['event'].'</b><br>'.$teams['short_name'].'</span>';
                        }
                    }
                }
            }
        } 
    }
?>