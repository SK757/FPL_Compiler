<?php
    foreach($upcomingAndPastFixtures['history'] as $key=>$past5) {
        foreach($data['teams'] as $key=>$teams) {
            // if the fixture gw is equal to the last 5 gw's
            if($past5['round'] >= $lastgw-4 && $past5['round'] < $lastgw+1) {
                // check opponent team
                if($teams['id'] === $past5['opponent_team']) {
                    echo '<span class="last5item"><b>'.$past5['round']." ";
                    // check if away
                    if($past5['was_home'] === false) {
                        echo strtolower($teams['short_name']);
                    // or home    
                    } else echo $teams['short_name'];
                    echo '</b><br>'.$past5['total_points'].' Points</span>';
                }
            }
        }
    }
?>