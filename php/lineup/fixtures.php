<?php
    foreach($fixtures as $key=>$fixture) {
        foreach($data['teams'] as $key=>$teams) {
              //players team id         //fixture team id's
            if ($item2['team'] === $fixture['team_h'] || $fixture['team_a']) {
                    //players fixture         //fixture info
                if ($explain['fixture'] === $fixture['id']) {
                      //fixture home team       //team info
                    if ($fixture['team_h'] === $teams['id']) {
                        echo "<span class='home'>".$teams['name']."</span>";
                        echo "<strong>".$fixture['team_h_score']." - ";
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
                        echo $fixture['team_a_score']."</strong>";
                        echo "<span class='away'>".$teams['name']."</span>";
                        echo "<span> </span>";
                        if ($fixture['finished'] == 'true') {
                            echo "<span class='minute'>FT</span>";
                        } else {
                            echo "<span class='minute'>".$fixture['minutes']."'</span>";
                        }
                        echo "<span> </span>";
                    }
                }
            }
        }
    }
?>