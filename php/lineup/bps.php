<?php 
foreach($upcomingAndPastFixtures['history'] as $key=>$matchInfo) {
	foreach($fixtures as $key=>$fixture) {
		if ($fixture['started'] === true) {
			if ($fixture['finished_provisional'] === true && $fixture['finished'] === false) {
				if ($matchInfo['fixture'] === $fixture['id']) {
					$bpsA = $fixture['stats'][9]['a'];
					$bpsH = $fixture['stats'][9]['h'];
					$bpsHandA = array_merge_recursive( $bpsA, $bpsH );
					array_multisort(array_column($bpsHandA, 'value'), SORT_DESC, $bpsHandA);
					$bonus = array_slice($bpsHandA, 0, 5);

					$player1bp = $bonus[0]['value'];
					$player2bp = $bonus[1]['value'];
					$player3bp = $bonus[2]['value'];
					$player4bp = $bonus[3]['value'];
					$player5bp = $bonus[4]['value'];

					if ($player1bp > $player2bp && $player2bp > $player3bp && $player3bp > $player4bp) {
						$player1bp = 3;
						$player2bp = 2;
						$player3bp = 1;
						$player4bp = null;
						$player5bp = null;
					}
					// Tie for 1st
					if ($player1bp === $player2bp && $player2bp > $player3bp) {
						$player1bp = 3;
						$player2bp = 3;
						$player3bp = 1;
						$player4bp = null;
						$player5bp = null;
					} elseif ($player1bp === $player2bp && $player2bp === $player3bp &&  $player3bp > $player4bp) {
						$player1bp = 3;
						$player2bp = 3;
						$player3bp = 3;
						$player4bp = 1;
						$player5bp = null;
					}
					// Tie for 2nd
					if ($player2bp === $player3bp && $player3bp > $player4bp) {
						$player1bp = 3;
						$player2bp = 2;
						$player3bp = 2;
						$player4bp = null;
						$player5bp = null;
					} elseif ($player2bp === $player3bp && $player3bp === $player4bp &&  $player4bp > $player5bp) {
						$player1bp = 3;
						$player2bp = 2;
						$player3bp = 2;
						$player4bp = 2;
						$player5bp = null;
					}
					// Tie for 3rd
					if ($player3bp === $player4bp && $player4bp > $player5bp) {
						$player1bp = 3;
						$player2bp = 2;
						$player3bp = 1;
						$player4bp = 1;
						$player5bp = null;
					} elseif ($player3bp === $player4bp && $player4bp === $player5bp) {
						$player1bp = 3;
						$player2bp = 2;
						$player3bp = 1;
						$player4bp = 1;
						$player5bp = 1;
					}
					
					if ($matchInfo['element'] === $bonus[0]['element']) {
						echo '<tr class="player_modal__row"><td class="player_modal__details-col1_offset">Bonus AIS*</td><td class="player_modal__col">'.$player1bp.'</td>'.'<td class="player_modal__col player_modal__highlight asItStands">'.$player1bp.'</td>';
					} elseif ($matchInfo['element'] === $bonus[1]['element']) {
						echo '<tr class="player_modal__row"><td class="player_modal__details-col1_offset">Bonus AIS*</td><td class="player_modal__col">'.$player2bp.'</td>'.'<td class="player_modal__col player_modal__highlight asItStands">'.$player2bp.'</td>';
					} elseif ($matchInfo['element'] === $bonus[2]['element']) {
						echo '<tr class="player_modal__row"><td class="player_modal__details-col1_offset">Bonus AIS*</td><td class="player_modal__col">'.$player3bp.'</td>'.'<td class="player_modal__col player_modal__highlight asItStands">'.$player3bp.'</td>';
					} elseif ($player4bp != null && $matchInfo['element'] === $bonus[3]['element']) {
						echo '<tr class="player_modal__row"><td class="player_modal__details-col1_offset">Bonus AIS*</td><td class="player_modal__col">'.$player4bp.'</td>'.'<td class="player_modal__col player_modal__highlight asItStands">'.$player4bp.'</td>';
					} elseif ($player5bp != null && $matchInfo['element'] === $bonus[4]['element']) {
						echo '<tr class="player_modal__row"><td class="player_modal__details-col1_offset">Bonus AIS*</td><td class="player_modal__col">'.$player5bp.'</td>'.'<td class="player_modal__col player_modal__highlight asItStands">'.$player5bp.'</td>';
					}
					echo '</tr>';
				}
			}
		}
	}
}
?>