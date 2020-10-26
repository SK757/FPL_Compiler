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
					?><tr>
						<td style="display: none;"><?PHP echo $item2['chance_of_playing_next_round']; ?></td>
						<td class="deffo"><?PHP
						if ($item2['web_name'] === 'Alexander-Arnold') {
							echo 'Trent';
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
					}
				?></tbody>
			</table>
		</div>