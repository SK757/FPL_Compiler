    <main class="grid-container">
        <?PHP include 'php/lineup/check.php'; ?>

        <section class="flex-container gk">
            <?PHP
            foreach($picks['picks'] as $key=>$item) {
                foreach($live['elements'] as $key=>$item1) {
                    foreach($data['elements'] as $key=>$item2) {
                        if ($item['element'] === $item1['id'] && $item['element'] === $item2['id']) {
                            if($item['position'] === 1) {
                                include 'php/lineup/captain.php';
                                include 'php/lineup/modal.php';
                            }
                        }
                    }
                }
            }
            ?>
            <span class="total_points">Points <br><b></b></span>
        </section>
        <section class="flex-container def">
            <?PHP
            foreach($picks['picks'] as $key=>$item) {
                foreach($live['elements'] as $key=>$item1) {
                    foreach($data['elements'] as $key=>$item2) {
                        if ($item['element'] === $item1['id'] && $item['element'] === $item2['id']) {
                            if($item['position'] < 12 && $item2['element_type'] == 2) {
                                include 'php/lineup/captain.php';
                                include 'php/lineup/modal.php';
                            }
                        }
                    }
                }
            }
            ?>
        </section>
        <section class="flex-container mid">
            <?PHP
            foreach($picks['picks'] as $key=>$item) {
                foreach($live['elements'] as $key=>$item1) {
                    foreach($data['elements'] as $key=>$item2) {
                        if ($item['element'] === $item1['id'] && $item['element'] === $item2['id']) {
                            if($item['position'] < 12 && $item2['element_type'] == 3) {
                                include 'php/lineup/captain.php';
                                include 'php/lineup/modal.php';
                            }
                        }
                    }
                }
            }
            ?>
        </section>
        <section class="flex-container fwd">
            <?PHP
            foreach($picks['picks'] as $key=>$item) {
                foreach($live['elements'] as $key=>$item1) {
                    foreach($data['elements'] as $key=>$item2) {
                        if ($item['element'] === $item1['id'] && $item['element'] === $item2['id']) {
                            if($item['position'] < 12 && $item2['element_type'] == 4) {
                                include 'php/lineup/captain.php';
                                include 'php/lineup/modal.php';
                            }
                        }
                    }
                }
            }
            ?>
        </section>
    </main>
    <section class="bench-container">
        <section class="flex-container">
            <?PHP
            foreach($picks['picks'] as $key=>$item) {
                foreach($live['elements'] as $key=>$item1) {
                    foreach($data['elements'] as $key=>$item2) {
                        if ($item['element'] === $item1['id'] && $item['element'] === $item2['id']) {
                            if($item['position'] >= 12) {
                                echo '<div class="column bench"><div class="image bench-image" style="background-image: url(https://resources.premierleague.com/premierleague/photos/players/110x140/p' . $item2['code'] . '.png);">';
                                if($item2['chance_of_playing_next_round'] === 75) {
                                    echo '<span class="chance seventyFive"><b>!</b></span>';
                                }elseif($item2['chance_of_playing_next_round'] === 50) {
                                    echo '<span class="chance fifty"><b>!</b></span>';
                                }elseif($item2['chance_of_playing_next_round'] === 25) {
                                    echo '<span class="chance twentyFive"><b>!</b></span>';
                                }elseif($item2['chance_of_playing_next_round'] === 0) {
                                    echo '<span class="chance zero"><b>!</b></span>';
                                }
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
                                echo '</div><div class="player"><p>' . $item2['web_name'] . '</p></div><div class="points">';
                                include 'php/lineup/stpPoints.php';
                                include 'php/lineup/modal.php';
                            }
                        }
                    }
                }
            }
            ?>
        </section>
    </section>
    <span id="chip" style="display: none;"><b>(<?PHP echo $picks['active_chip'] ?>)</b></span>
    <script>
        if (document.getElementById("chip").innerText === '(bboost)') {
            $(".bench .image").removeClass("bench-image"); 
            $(function() {
                var sum = 0;
                $('.grid-container .p').each(function(){
                    sum += parseInt(this.innerHTML, 10);
                });
                $('.bench-container .p').each(function(){
                    sum += parseInt(this.innerHTML, 10);
                });
                $('.player_modal__details .asItStands').each(function(){
                    sum += parseInt(this.innerHTML, 10);
                });
                $('.total_points b').text(sum);
            });
        } else {
            $(function() {
                var sum = 0;
                $('.grid-container .p').each(function(){
                    sum += parseInt(this.innerHTML, 10);
                });
                $('.player_modal__details .asItStands').each(function(){
                    sum += parseInt(this.innerHTML, 10);
                });
                $('.total_points b').text(sum);

            });
        }
        const elements = document.querySelectorAll('.stp');
        elements.forEach((element) => {
            if (element.innerText === "Did not play" || element.innerText === "No match") {
                element.previousElementSibling.previousElementSibling.previousElementSibling.classList.add('bench-image');
            }
        });
    </script> 
</body>
</html>
