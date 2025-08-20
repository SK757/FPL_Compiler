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
            <span class="games_left"><br><b></b></span>
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
            if ($picks['active_chip'] === 'manager') {
                include 'php/lineup/managerSlot.php';
            }
            foreach($picks['picks'] as $key=>$item) {
                foreach($live['elements'] as $key=>$item1) {
                    foreach($data['elements'] as $key=>$item2) {
                        if ($item['element'] === $item1['id'] && $item['element'] === $item2['id']) {
                            if($item['position'] >= 12 && $item['position'] < 16) {
                                echo '<div class="column bench"><div class="image bench-image" style="background-image: url(https://resources.premierleague.com/premierleague25/photos/players/110x140/' . $item2['code'] . '.png);">';
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
                                $chance = $item2['chance_of_playing_next_round'];
                                if($chance === 75) {
                                    echo '<span class="chance seventyFive"><b>!</b></span>';
                                }elseif($chance === 50) {
                                    echo '<span class="chance fifty"><b>!</b></span>';
                                }elseif($chance === 25) {
                                    echo '<span class="chance twentyFive"><b>!</b></span>';
                                }elseif($chance === 0) {
                                    echo '<span class="chance zero"><b>!</b></span>';
                                }
                                echo '<div class="player"><p>' . $item2['web_name'] . '</p></div><div class="points">';
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
                $('.grid-container .points .bonusTotal').each(function(){
                    sum += parseInt(this.innerHTML, 10);
                });
                $('.bench-container .points .bonusTotal').each(function(){
                    sum += parseInt(this.innerHTML, 10);
                });
                $('.total_points b').text(sum);
            });
            let stpSquad = $('.grid-container .column .stp').length;
            let stpBench = $('.bench-container .column .stp').length;
            stpBB = stpSquad + stpBench;
            if (stpBB > 0) {
                $('.games_left').prepend("Still to Play");
                $('.games_left b').append(stpBB);
            }
        } else if (document.getElementById("chip").innerText === '(manager)') {
            $(function() {
                var sum = 0;
                $('.grid-container .p').each(function(){
                    sum += parseInt(this.innerHTML, 10);
                });
                $('.bench-container .managerP').text(function(){
                    sum += parseInt(this.innerHTML, 10);
                });
                $('.grid-container .points .bonusTotal').each(function(){
                    sum += parseInt(this.innerHTML, 10);
                });
                $('.total_points b').text(sum);
            });
            let stpSquad = $('.grid-container .column .stp').length;
            let stpMgr = $('.bench-container .managerColumn .stp').length;
            stpManager = stpSquad + stpMgr;
            if (stpManager > 0) {
                $('.games_left').prepend("Still to Play");
                $('.games_left b').append(stpManager);
            }
        } else {
            $(function() {
                var sum = 0;
                $('.grid-container .p').each(function(){
                    sum += parseInt(this.innerHTML, 10);
                });
                $('.grid-container .points .bonusTotal').each(function(){
                    sum += parseInt(this.innerHTML, 10);
                });
                $('.total_points b').text(sum);
            });
            let stpSquad = $('.grid-container .column .stp').length;
            let stpNumber = $('.grid-container .column .stp .stpNumber').length;
            stpFinal = stpSquad + stpNumber;
            if (stpFinal > 0) {
                $('.games_left').prepend("Still to Play");
                $('.games_left b').append(stpFinal);
            }
        }
        const elements = document.querySelectorAll('.stp');
        elements.forEach((element) => {
            if (element.innerText === "Did not play" || element.innerText === "No match") {
                element.previousElementSibling.previousElementSibling.previousElementSibling.classList.add('bench-image');
            }
        });
        document.querySelectorAll('#main-div .specific-class').length;
    </script> 
</body>
</html>
