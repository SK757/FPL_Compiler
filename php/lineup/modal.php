<!-- OPEN MODAL -->
<button onclick="document.getElementById(<?php echo $item1['id'] ?>).style.display='flex'" aria-label="<?php echo $item2['web_name']; ?>" class="player_btn"></button>

</div>
<article class="player_modal" id=<?php echo $item1['id'] ?>>
    <div class="player_modal__wrapper">
        <header class="player_modal__header">
        	<!-- CLOSE MODAL -->
            <button onclick="getElementById(<?php echo $item1['id'] ?>).style.display='none'" class="player_modal__btn" type="button">
                <span class="player_modal__btn-txt"></span>
                <svg aria-hidden="true" class="player_modal__btn-icon" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M57.6571429,43.3428571 C57.2,42.8857143 56.5142857,42.8857143 56.0571429,43.3428571 L50,49.4 L43.9428571,43.3428571 C43.4857143,42.8857143 42.8,42.8857143 42.3428571,43.3428571 C41.8857143,43.8 41.8857143,44.4857143 42.3428571,44.9428571 L48.4,51 L42.3428571,57.0571429 C41.8857143,57.5142857 41.8857143,58.2 42.3428571,58.6571429 C42.5714286,58.8857143 42.8,59 43.1428571,59 C43.4857143,59 43.7142857,58.8857143 43.9428571,58.6571429 L50,52.6 L56.0571429,58.6571429 C56.2857143,58.8857143 56.6285714,59 56.8571429,59 C57.0857143,59 57.4285714,58.8857143 57.6571429,58.6571429 C58.1142857,58.2 58.1142857,57.5142857 57.6571429,57.0571429 L51.6,51 L57.6571429,44.9428571 C58.1142857,44.4857143 58.1142857,43.8 57.6571429,43.3428571 Z" transform="translate(-42 -43)" fill="#37003c"></path>
                </svg>
            </button>
            <h1 class="player_modal__heading">
                <?php echo $item2['web_name'];
                $chance = $item2['chance_of_playing_next_round'];
                if($chance === 75) {
                    echo ' - <span class="seventyFive2">' . $item2['chance_of_playing_next_round'] . '%</span>';
                } elseif($chance === 50) {
                    echo ' - <span class="fifty2">' . $item2['chance_of_playing_next_round'] . '%</span>';
                } elseif($chance === 25) {
                    echo ' - <span class="twentyFive2">' . $item2['chance_of_playing_next_round'] . '%</span>';
                } elseif($chance === 0) {
                    echo ' - <span class="zero2">' . $item2['chance_of_playing_next_round'] . '%</span>';
                }
                ?>     
            </h1>
            <p style="font-size: 0.8rem;"><?PHP include 'php/team.php';?> - <?PHP include 'php/position.php';?></p>
            <span style="right: 17%;position: absolute;top: 1.3rem;"><?PHP echo "£".$item2['now_cost']/10; ?></span>
        </header>
        <section class="player_modal__content">
            <?php
            // Blank Gameweek
            if(empty($item1['explain'])) {
                echo '<p class="player_modal__blank">No match this gameweek</p>';
            } else {
            foreach($item1['explain'] as $key=>$explain) {
            echo "<section class='player_modal__explain'>";
                echo "<section class='player_modal__fixture'>";
                $upcomingAndPastFixtures = json_decode(file_get_contents("https://fantasy.premierleague.com/api/element-summary/".$item1['id']."/"), true);
                include 'fixtures.php';
                echo "</section>";
            ?>
                <table class="player_modal__details">
                    <thead>
                        <tr>
                            <th class="align_1 strong player_modal__details-col1">Statistics</th>
                            <th class="strong">Value</th>
                            <th class="strong">Points</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php
    	                	foreach($explain['stats'] as $key=>$stats) {
    					?>
                        <tr class="player_modal__row">
                        	<td class="player_modal__details-col1_offset">
                            <?php 
                                $identifier = $stats['identifier'];
                                $identifier = str_replace('_', ' ', $identifier);
                                $identifier = ucwords($identifier);
                                echo $identifier;
                            ?>
                        	</td>
                            <td class="player_modal__col">
                                <?php echo $stats['value'] ?>
                            </td>
                            <td class="player_modal__col player_modal__highlight">
                                <?php echo $stats['points'] ?>
                            </td>
                        </tr>
                        <?php 
                            }
                            include 'bps.php';
                        ?>
                    </tbody>
                </table>
            </section>
            <?php
            }
            ?>
            <section class="player_modal__expected">
                <span class="ex_head">xG</span>
                <span class="ex_head">xA</span>
                <span class="ex_head">xGI</span>
                <span><?php echo $item1['stats']['expected_goals'] ?></span>
                <span><?php echo $item1['stats']['expected_assists'] ?></span>
                <span><?php echo $item1['stats']['expected_goal_involvements'] ?></span>
            </section>
        </section>
        <?php } 
        if (count($upcomingFixtures) > 0) { 
        ?>
        <section class="player_modal__last5">
            <?php include 'last5.php'; ?>
        </section>
        <section class="player_modal__next5">
            <?php include 'next5.php'; ?>
        </section>
        <?php } ?>
    </div>
    <div onclick="getElementById(<?php echo $item1['id'] ?>).style.display='none'" class="player_modal__bg" aria-hidden="true"></div>
    
</article>