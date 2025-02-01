	<main class="container">
		<div class="auto-grid">
			<?php include 'php/dates.php';
			function ordinal($number) {
			    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
			    if ((($number % 100) >= 11) && (($number%100) <= 13)) {
			        return $number. 'th';
			    } else {
			        return $number. $ends[$number % 10];
			    }
			}
			$count = 1;
			foreach($live['elements'] as $key=>$item1) {
                foreach($data['elements'] as $key=>$item2) {
                	if ($item1['id'] === $item2['id'] && $item2['element_type'] === 5) {
						echo '<div class="container__item">';
							echo '<div class="image" style="background-image: url(https://resources.premierleague.com/premierleague/photos/players/110x140/'. $item2['opta_code'] .'.png), url(https://resources.premierleague.com/premierleague/photos/players/110x140/Photo-Missing.png);">';
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
							echo '<div class="info"><b>'. $item2['web_name'] .'</b><br>';
							foreach($data['teams'] as $key=>$teams) {
		        				if ($item2['team'] === $teams['id']) {
		        					echo '<span class="team_name">'. $teams['short_name'] . ' - '. ordinal($teams['position']) .'</span>';
		        				}
		   					}
		   					echo '</div>';
						include 'php/lineup/modal_manager.php';
					}
				}
			}
			?>
		</div>
	</main>