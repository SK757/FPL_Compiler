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
		        	foreach($picks['picks'] as $key=>$item2) {
						foreach($live['elements'] as $key=>$item1) {
							foreach($data['elements'] as $key=>$item) {
								if ($item2['element'] === $item1['id'] && $item2['element'] === $item['id']) {
					?><tr>
						<td style="display: none;"><?PHP echo $item['chance_of_playing_next_round']; ?></td>
						<td class="deffo"><?PHP
						if ($item['web_name'] === 'Alexander-Arnold') {
							echo 'Trent';
						} else {
							echo $item['web_name'];
						} ?></td>
		                <?PHP echo '<td id="player_'.$count.'">';
		                if($item2['multiplier'] === 2) {
		                	echo $item['event_points'] * 2 . ' (c)';
		                } elseif($item2['multiplier'] === 3) {
		                	echo $item['event_points'] * 3 . ' (tc)';
		                } else {
			        		echo $item['event_points'];
			        	}?></td>
			        	<td><?PHP echo $item1['stats']['goals_scored']; ?>/<?PHP echo $item1['stats']['assists']; ?></td>
						<td><?PHP echo $item['ep_next']; ?></td>
						<td><?PHP echo $item['goals_scored']; ?>/<?PHP echo $item['assists']; ?>/<?PHP echo $item['clean_sheets']; ?></td>
						<?PHP
						// Yellow Card Ban #1
						if ($date < '2019-12-28') {
							if ($item['yellow_cards'] === 4) {
								echo '<td style="background: #ffab1b;">' . $item['yellow_cards'] . '</td>';
							} elseif ($item['yellow_cards'] > 4) {
								echo '<td style="background: #c0020d; color: #fff;">' . $item['yellow_cards'] . '</td>';
							} else {
								echo '<td>' . $item['yellow_cards'] . '</td>';
							}
						// Yellow Card Ban #2
						} elseif ($date >= '2019-12-28' && $date < '2020-04-10') {
							if ($item['yellow_cards'] === 8) {
								echo '<td style="background: #ffe65b;">' . $item['yellow_cards'] . '</td>';
							} elseif ($item['yellow_cards'] === 9) {
								echo '<td style="background: #ffab1b;">' . $item['yellow_cards'] . '</td>';
							} elseif ($item['yellow_cards'] > 9) {
								echo '<td style="background: #c0020d; color: #fff;">' . $item['yellow_cards'] . '</td>';
							} else {
								echo '<td>' . $item['yellow_cards'] . '</td>';
							}
						// Yellow Card Ban #3
						} elseif ($date >= '2020-04-10') {
							if ($item['yellow_cards'] === 13) {
								echo '<td style="background: #ffe65b;">' . $item['yellow_cards'] . '</td>';
							} elseif ($item['yellow_cards'] === 14) {
								echo '<td style="background: #ffab1b;">' . $item['yellow_cards'] . '</td>';
							} elseif ($item['yellow_cards'] > 14) {
								echo '<td style="background: #c0020d; color: #fff;">' . $item['yellow_cards'] . '</td>';
							} else {
								echo '<td>' . $item['yellow_cards'] . '</td>';
							}
						} ?>
						 
					</tr>
					<?PHP
								}
				        	}
				        }
						++$count;
				    }
				?></tbody>
			</table>
		</div>