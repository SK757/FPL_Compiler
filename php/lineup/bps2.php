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
					// $rank = 0;
					// $result = [];
					// foreach ($bpsHandA as $key=>$bonus) {
					// // foreach ($bpsHandA as ['value' => $value]) {
					//     $ranks[$bonus['value']] ??= ++$rank;
					//     $result[] = ['value' => $bonus['value'], 'element' => $bonus['element'], 'rank' => $ranks[$bonus['value']]];
					// }
					// foreach($result as $key=>$bonus) {
					// 	if ($matchInfo['element'] === $bonus['element'] && $bonus['rank'] === 1) {
					// 		echo '<span class="bonus">&nbsp+<span class="bonusTotal">';
					// 		if ($item['position'] > 11) {
					// 			echo 3;
					// 		} else {
					// 			echo 3*$item['multiplier'];
					// 		}
					// 	}
					// }
					// foreach($result as $key=>$bonus) {
					// 	if ($matchInfo['element'] === $bonus['element'] && $bonus['rank'] === 2) {
					// 		echo '<span class="bonus">&nbsp+<span class="bonusTotal">';
					// 		if ($item['position'] > 11) {
					// 			echo 2;
					// 		} else {
					// 			echo 2*$item['multiplier'];
					// 		}
					// 	}
					// }
					// foreach($result as $key=>$bonus) {
					// 	if ($matchInfo['element'] === $bonus['element'] && $bonus['rank'] === 3) {
					// 		echo '<span class="bonus">&nbsp+<span class="bonusTotal">';
					// 		if ($item['position'] > 11) {
					// 			echo 1;
					// 		} else {
					// 			echo 1*$item['multiplier'];
					// 		}
					// 	}
					// }

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
					if ($player1bp > $player2bp && $player2bp === $player3bp && $player3bp > $player4bp) {
						$player1bp = 3;
						$player2bp = 2;
						$player3bp = 2;
						$player4bp = null;
						$player5bp = null;
					} elseif ($player1bp > $player2bp && $player2bp === $player3bp && $player3bp === $player4bp &&  $player4bp > $player5bp) {
						$player1bp = 3;
						$player2bp = 2;
						$player3bp = 2;
						$player4bp = 2;
						$player5bp = null;
					}
					// Tie for 3rd
					if ($player2bp > $player3bp && $player3bp === $player4bp && $player4bp > $player5bp) {
						$player1bp = 3;
						$player2bp = 2;
						$player3bp = 1;
						$player4bp = 1;
						$player5bp = null;
					} elseif ($player2bp > $player3bp && $player3bp === $player4bp && $player4bp === $player5bp) {
						$player1bp = 3;
						$player2bp = 2;
						$player3bp = 1;
						$player4bp = 1;
						$player5bp = 1;
					}
					if ($matchInfo['element'] === $bonus[0]['element']) {
						echo '<span class="bonus">&nbsp+<span class="bonusTotal">';
						if ($item['position'] > 11) {
							echo $player1bp;
						} else {
							echo $player1bp*$item['multiplier'];
						}
						echo '</span></span>';
					} elseif ($matchInfo['element'] === $bonus[1]['element']) {
						echo '<span class="bonus">&nbsp+<span class="bonusTotal">';
						if ($item['position'] > 11) {
							echo $player2bp;
						} else {
							echo $player2bp*$item['multiplier'];
						}
						echo '</span></span>';
					} elseif ($matchInfo['element'] === $bonus[2]['element']) {
						echo '<span class="bonus">&nbsp+<span class="bonusTotal">';
						if ($item['position'] > 11) {
							echo $player3bp;
						} else {
							echo $player3bp*$item['multiplier'];
						}
						echo '</span></span>';
					} elseif ($player4bp != null && $matchInfo['element'] === $bonus[3]['element']) {
						echo '<span class="bonus">&nbsp+<span class="bonusTotal">';
						if ($item['position'] > 11) {
							echo $player4bp;
						} else {
							echo $player4bp*$item['multiplier'];
						}
						echo '</span></span>';
					} elseif ($player5bp != null && $matchInfo['element'] === $bonus[4]['element']) {
						echo '<span class="bonus">&nbsp+<span class="bonusTotal">';
						if ($item['position'] > 11) {
							echo $player5bp;
						} else {
							echo $player5bp*$item['multiplier'];
						}
						echo '</span></span>';
					}
				}
			}
		}
	}
}
?>