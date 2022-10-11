<?php
    foreach($fixtures as $key=>$fixture) {
        foreach($data['teams'] as $key=>$teams) {
              //players team id         //fixture team id's
            if ($item2['team'] === $fixture['team_a'] || $fixture['team_h']) {
                    //players fixture         //fixture info
                if ($explain['fixture'] === $fixture['id']) {
                      //players team        //team info
                    if ($item2['team'] === $teams['id']) {
                        if ($fixture['team_a'] === $teams['id']) {
                            echo $teams['name'];
                        }
                        if ($fixture['team_h'] === $teams['id']) {
                            echo $teams['name'];
                        }
                    }
                }
            }
        }
    }
?>