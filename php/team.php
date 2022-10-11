<?php
    foreach($data['teams'] as $key=>$teams) {
        if ($item2['team'] === $teams['id']) {
            echo $teams['short_name'];
        }
    }
?>