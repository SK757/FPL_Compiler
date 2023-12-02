<?php
    foreach($upcomingAndPastFixtures['fixtures'] as $key=>$next5) {
        foreach($data['teams'] as $key=>$teams) {
            // if the fixture gw is equal to the next 5 gw's
            if ($next5['event'] > $leagues['current_event'] && $next5['event'] <= $nextgw+4 && $next5['event'] !== null) {
                // check if home
                if ($next5['is_home'] === true) {
                    // get away team name
                    if ($teams['id'] === $next5['team_a']) {
                        echo '<span class="diff'.$next5['difficulty'].'"><b>'.$next5['event'].'</b><br>'.$teams['short_name'];
                    }
                // if not, get home team name
                } elseif ($teams['id'] === $next5['team_h']) {
                    echo '<span style="text-transform: lowercase;" class="diff'.$next5['difficulty'].'"><b>'.$next5['event'].'</b><br>'.$teams['short_name'];
                }
                echo '</span>';
            }
        }
    }
?>