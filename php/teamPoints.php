		<?PHP include 'dates.php'; ?>

		<div id="table_cont">
			<table id="player_info" class="sortable">
		    	<thead>
		        	<tr>
		                <th style="display: none;">chance of playing </th>
		            	<th id="nameHead" class="nocursor sorttable_nosort">Name</th>
		                <th class="gwp">Gameweek Points</th>
		                <th class="gwga nocursor sorttable_nosort">Gameweek Goals/Assists</th>
		                <th class="xpn">EXPoints Next GW</th>
		                <th class="goals2 nocursor sorttable_nosort">Goals/Assists/Clean Sheets</th>
		                <th class="yc">Yellow Cards</th>
		            </tr>
		        </thead>
		        <tbody>
		        	<?PHP
		        	$count = 0;
		        	if(is_array($picks)){ 
			        	foreach($picks['picks'] as $key=>$item) {
							foreach($live['elements'] as $key=>$item1) {
								foreach($data['elements'] as $key=>$item2) {
									if ($item['element'] === $item1['id'] && $item['element'] === $item2['id']) {
					?><tr class="accordion">
						<td style="display: none;"><?PHP echo $item2['chance_of_playing_next_round']; ?></td>
						<td class="deffo"><?PHP
						if ($item2['web_name'] === 'Alexander-Arnold') {
							echo 'Trent';
						} elseif ($item2['web_name'] === 'Neco Williams') {
							echo 'N Williams';
						} elseif ($item2['web_name'] === 'Walker-Peters') {
							echo 'KWP';
						} elseif ($item2['web_name'] === 'Calvert-Lewin') {
							echo 'DCL';
						} else {
							echo $item2['web_name'];
						} ?></td>
		                <?PHP echo '<td id="player_'.$count.'">';
		                if($item['multiplier'] === 2) {
		                	echo $item1['stats']['total_points'] * 2 . ' (c)';
		                } elseif($item['multiplier'] === 3) {
		                	echo $item1['stats']['total_points'] * 3 . ' (tc)';
		                } else {
			        		echo $item1['stats']['total_points'];
			        	}?></td>
			        	<td><?PHP echo $item1['stats']['goals_scored']; ?>/<?PHP echo $item1['stats']['assists']; ?></td>
						<td><?PHP echo $item2['ep_next']; ?></td>
						<td><?PHP echo $item2['goals_scored']; ?>/<?PHP echo $item2['assists']; ?>/<?PHP echo $item2['clean_sheets']; ?></td>
						<?PHP
						// Yellow Card Ban #1
						if ($leagues['current_event'] < 18) {
							if ($item2['yellow_cards'] === 4) {
								echo '<td style="background: #ffab1b;">' . $item2['yellow_cards'] . '</td>';
							} else {
								echo '<td>' . $item2['yellow_cards'] . '</td>';
							}
						} // Yellow Card Ban #2
						elseif ($leagues['current_event'] < 31) {
							if ($item2['yellow_cards'] === 9) {
								echo '<td style="background: #ffab1b;">' . $item2['yellow_cards'] . '</td>';
							} else {
								echo '<td>' . $item2['yellow_cards'] . '</td>';
							}
						} // Yellow Card Ban #3
						elseif ($leagues['current_event'] < 37) {
							if ($item2['yellow_cards'] === 15) {
								echo '<td style="background: #ffab1b;">' . $item2['yellow_cards'] . '</td>';
							} else {
								echo '<td>' . $item2['yellow_cards'] . '</td>';
							}
						} ?>
						
					</tr>
					<tr class="explain_head">
						<td colspan="6">
							<div style="float: left;width: 40%;">
								Statistic
							</div>
							<div style="float: left;width: 30%;">
								Value
							</div>
							<div style="float: left;width: 30%;">
								Points
							</div>
						</td>
					</tr>
					<tr class="explain">
						<td colspan="6"><?PHP 
							$game = 0;
							foreach($item1['explain'] as $key=>$explain) {
								foreach($explain['stats'] as $key=>$stats) {
							?>

							<div style="float: left;width: 40%;"><?PHP
								if ($stats['identifier'] === 'minutes') {
									echo 'Minutes';
									'<div id="game_'.$game.'"></div>'
								} elseif ($stats['identifier'] === 'goals_scored') {
									echo 'Goals Scored';
								} elseif ($stats['identifier'] === 'assists') {
									echo 'Assists';
								} elseif ($stats['identifier'] === 'clean_sheets') {
									echo 'Clean Sheets';
								} elseif ($stats['identifier'] === 'goals_conceded') {
									echo 'Goals Conceded';
								} elseif ($stats['identifier'] === 'saves') {
									echo 'Saves';
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
								} elseif ($stats['identifier'] === 'bonus') {
									echo 'Bonus';
								}  else {
									echo $stats['identifier'];
								}
							?></div>
							<div style="float: left;width: 30%;"><?PHP echo $stats['value'];?></div>
							<div style="float: left;width: 30%;"><?PHP echo $stats['points'];?></div>
						<?PHP 
								}++$game;
							} ?></td>
					</tr>
					<?PHP
									}
					        	}
					        }
							++$count;
					    }
					} else {
					    echo "<h2 style='text-align:center'>Gameweek Is Being Updated</h2>";
					?>
    					<style type="text/css">main section{
        					display:none;
	    				}</style>
					<?php
					} ?></tbody>
			</table>
		</div>
		<script>
			var acc = document.getElementsByClassName("accordion");
			var i;
				for (i = 0; i < acc.length; i++) {
					acc[i].addEventListener("click", function() {
						/* Toggle between hiding and showing the active panel */
						var explain_head = this.nextElementSibling;
						var explain = explain_head.nextElementSibling;
						if (explain_head.style.display === "table-row" && explain.style.display === "table-row") {
							explain_head.style.display = "none";
							explain.style.display = "none";
						} else {
							explain_head.style.display = "table-row";
							explain.style.display = "table-row";
						}
					});
				}
		</script>