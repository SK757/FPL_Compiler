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
                                echo '</p></b></div>';
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
                                echo '</p></b></div>';
                                include 'php/lineup/modal.php';
                            }
                        }
                    }
                }
            }
            ?>
        </section>
        <section class="flex-container mid" style="grid-template-columns: repeat(4, minmax(3.875rem, 5.5rem));">
            <?PHP
            foreach($picks['picks'] as $key=>$item) {
                foreach($live['elements'] as $key=>$item1) {
                    foreach($data['elements'] as $key=>$item2) {
                        if ($item['element'] === $item1['id'] && $item['element'] === $item2['id']) {
                            if($item['position'] < 12 && $item2['element_type'] == 3) {
                                include 'php/lineup/captain.php';
                                echo '</p></b></div>';
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
                                echo '</p></b></div>';
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
                                echo '<div class="column bench"><div class="image bench-image" style="background-image: url(https://resources.premierleague.com/premierleague/photos/players/110x140/p' . $item2['code'] . '.png);"></div><div class="player"><p>' . $item2['web_name'] . '</p></div><div class="points"><b><p class="p">' . $item1['stats']['total_points'] . '</p></b></div>';
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
                $('.total_points b').text(sum);
            });
        } else {
            $(function() {
                var sum = 0;
                $('.grid-container .p').each(function(){
                    sum += parseInt(this.innerHTML, 10);
                });
                $('.total_points b').text(sum);
            });
        }
    </script> 
</body>
</html>
