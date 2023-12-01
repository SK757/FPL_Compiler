<?php
    $previousFixtures = json_decode(file_get_contents("https://fantasy.premierleague.com/api/element-summary/".$item1['id']."/"), true);

    foreach($previousFixtures['history'] as $key=>$past5) {
        if ($past5['round'] >= $lastgw-4 && $past5['round'] < $lastgw+1) {
            echo '<span class="last5item"><b>'.$past5['round'].'</b><br>'.$past5['total_points'].' Points</span>';
        }
    }
?>