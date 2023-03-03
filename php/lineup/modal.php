<!-- OPEN MODAL -->
<button onclick="document.getElementById(<?php echo $item1['id'] ?>).style.display='flex'" class="player_btn"></button>

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
            <h1 class="player_modal__heading"><?php echo $item2['web_name'] ?></h1>
            <p style="font-size: 0.8rem;"><?PHP include 'php/team.php';?> - <?PHP include 'php/position.php';?></p>
            <span style="right: 17%;position: absolute;top: 1.3rem;"><?PHP echo "£".$item2['now_cost']/10; ?></span>
        </header>
        <section class="player_modal__content">
            <?php
            // Blank Gameweek
            if(empty($item1['explain'])) {
                echo '<p class="player_modal__blank">No match this gameweek</p>';
            }
            $game = 1;
            foreach($item1['explain'] as $key=>$explain) {
            echo "<section class='player_modal__explain'>";
                echo "<section class='player_modal__fixture'>";
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
                        	<td>
                        		<span class="capitalise player_modal__details-col1_offset"><?php 
                        		if ($stats['identifier'] === 'goals_scored') {
    								echo 'Goals Scored';
    							} elseif ($stats['identifier'] === 'clean_sheets') {
    								echo 'Clean Sheets';
    							} elseif ($stats['identifier'] === 'goals_conceded') {
    								echo 'Goals Conceded';
    							} elseif ($stats['identifier'] === 'penalties_missed') {
    								echo 'Penalties Missed';
    							} elseif ($stats['identifier'] === 'penalties_saved') {
    								echo 'Penalties Saved';
    							} elseif ($stats['identifier'] === 'own_goals') {
    								echo 'Own Goals';
    							} elseif ($stats['identifier'] === 'yellow_cards') {
    								echo 'Yellow Cards';
    							} elseif ($stats['identifier'] === 'red_cards') {
    								echo 'Red Cards';
    							} else {
    								echo $stats['identifier'];
    							}
                        		?>
                        			
                        		</span>
                        	</td>
                            <td class="align_c player_modal__col">
                                <strong class="player_modal__value">
                                    <?php echo $stats['value'] ?>
                                </strong>

                            </td>
                            <td class="align_c player_modal__col">
                            	<strong class="player_modal__highlight">
                                    <?php echo $stats['points'] ?>
                                </strong>
                            </td>
                        </tr>
                        <?php 
                        	}++$game
                        ?>
                        <!-- <tr>
                            <td><?php //include 'next5.php'; ?></td>
                        </tr> -->
                    </tbody>
                </table>
            </section>
            <?php
            }
            ?>
        </section>
    </div>
    <div onclick="getElementById(<?php echo $item1['id'] ?>).style.display='none'" class="player_modal__bg" aria-hidden="true"></div>
    
</article>