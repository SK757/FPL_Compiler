<!DOCTYPE html>
<html lang="en-GB" class="notranslate" translate="no">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3SWCCHKEVF"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-3SWCCHKEVF');
    </script>
	<title>FPL Bonus</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5">
    <meta name="Description" content="FPL Bonus">
    <meta name="google" content="notranslate"/>
    <meta name="theme-color" media="(prefers-color-scheme: light)" content="#37003c">
    <meta name="theme-color" media="(prefers-color-scheme: dark)" content="#1f1f1f">
    <link rel="stylesheet" type="text/css" href="styles/css/bonus.css?=0.105">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v6.4.2/css/all.css" crossorigin="anonymous" SameSite="none Secure">
    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="shortcut icon" href="/favicon/favicon.ico?=0.4">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg?=0.3" color="#37003c">
</head>
<body>
<?php include 'php/dates.php'; ?>
<article>
	<h1 class="sub-heading">Fixtures</h1>

	<?php
		foreach($fixtures as $key=>$fixture) {
			$kickoff = $fixture['kickoff_time'];
            $datetime = new DateTime($kickoff);
            $timezone = new DateTimeZone('Europe/London');
            $datetime->setTimezone($timezone);
            $dateDate = $datetime->format('D j M ');
            // if previous date exists
			if (isset($fixtures[$key-1]['kickoff_time'])) {
                $prevKickoff = $fixtures[$key-1]['kickoff_time'];
                $prevDatetime = new DateTime($prevKickoff);
                $prevDatetime->setTimezone($timezone);
                $prevDateDate = $prevDatetime->format('D j M ');
                // if its the next date, show the date
                if ($dateDate > $prevDateDate) {
                	echo '<h2 class="fixture_date">'.$datetime->format('D j M').'</h2>';
                }
            // if previous date doesn't exist (first game), just show date 
            } else {
                	echo '<h2 class="fixture_date">'.$datetime->format('D j M').'</h2>';
            }
			echo '<div>';// Whole Fixture
			echo '<div class="fixture">';
			echo '<div class="fixture__team align_r">';
			foreach($data['teams'] as $key=>$teams) {
		        if ($fixture['team_h'] === $teams['id']) {
		            echo $teams['name'];
		        }
		    }
		    echo '</div>'; // Home team

			if ($fixture['started'] === false) {
                echo '<strong class="fixture__score align_c fixture__date"><time datetime="fixture.kickoff_time">';
                echo $datetime->format('D j M ');
                echo $datetime->format('G:i');
                echo '</time></strong>';
            } elseif ($fixture['started'] === true && $fixture['finished_provisional'] === false) {
                echo '<span class="fixture__live">Live</span>';
                echo '<span class="fixture__minutes">'.$fixture['minutes']."'".'</span>';
                echo '<strong class="fixture__score align_c">'.$fixture['team_h_score'].' - '.$fixture['team_a_score'].'</strong>';
            } elseif ($fixture['finished_provisional'] === true) {
            	echo '<strong class="fixture__score align_c">'.$fixture['team_h_score'].' - '.$fixture['team_a_score'].'</strong>';
            }

			echo '<div class="fixture__team">';
			foreach($data['teams'] as $key=>$teams) {
				if ($fixture['team_a'] === $teams['id']) {
		            echo $teams['name'];
		        }
		    }
		    echo '</div>'; // Away team
		    if ($fixture['started'] === true) {
			    echo '<button class="fixture__toggle-btn" type="button">View fixture details</button>';
			}
		    echo '</div>'; // Fixture teams & score

		    echo '<div class="fixtureDetails">';
			if ($fixture['started'] === true) {
				foreach($fixture['stats'] as $key=>$bpsHA) {
					if (count($bpsHA['a']) === 0 && count($bpsHA['h']) === 0) {
						continue;
					} else {
						$identifier = $bpsHA['identifier'];
						$identifier = str_replace('_', ' ', $identifier);
						$identifier = ucwords($identifier);
						if ($identifier === "Bps") {
							echo '<h2 class="captialise fixtureDetails__sub-heading">BPS</h2>';
						} else {
							echo '<h2 class="captialise fixtureDetails__sub-heading">'.$identifier.'</h2>';
						}
						echo '<div class="fixtureDetails__info">';
						echo '<div class="align_r fixtureDetails__info-item">';
						if ($bpsHA['identifier'] === "bps") {
							$i = 0;
							foreach($bpsHA['h'] as $key=>$bpsH) {
								echo '<div>';
								foreach($data['elements'] as $key=>$player) {
							        if ($bpsH['element'] === $player['id']) {
							            echo $player['web_name'];
							        }
							    }
							    echo '<strong class="fixtureDetails__info-item__value">'.$bpsH['value'].'</strong></div>';

							    if (++$i == 5) {
						    		break;
						    	}
							}
						} else {
							foreach($bpsHA['h'] as $key=>$bpsH) {
								echo '<div>';
								foreach($data['elements'] as $key=>$player) {
							        if ($bpsH['element'] === $player['id']) {
							            echo $player['web_name'];
							        }
							    }
							    if ($bpsHA['identifier'] === "goals_scored" || $bpsHA['identifier'] === "assists" || $bpsHA['identifier'] === "own_goals" || $bpsHA['identifier'] === "penalties_saved" || $bpsHA['identifier'] === "penalties_missed" || $bpsHA['identifier'] === "yellow_cards" || $bpsHA['identifier'] === "red_cards") {
							    	if ($bpsH['value'] > 1) {
								    	echo '<strong class="fixtureDetails__info-item__value">'.$bpsH['value'].'</strong>';
								    } else {
								    	echo '</div>';
								    }
								} else {
									echo '<strong class="fixtureDetails__info-item__value">'.$bpsH['value'].'</strong></div>';
								}
							}
						} 
						echo '</div>'; // align_r fixtureDetails__info-item
						

						echo '<div class="align_l fixtureDetails__info-item">';
						if ($bpsHA['identifier'] === "bps") {
							$i = 0;
							foreach($bpsHA['a'] as $key=>$bpsA) {
								echo '<div>';
							    echo '<strong class="fixtureDetails__info-item__value">'.$bpsA['value'].'</strong>';
								foreach($data['elements'] as $key=>$player) {
							        if ($bpsA['element'] === $player['id']) {
							            echo $player['web_name'].'</div>';
							        }
							    }
							    if (++$i == 5) {
						    		break;
						    	}
							}
						} else {
							foreach($bpsHA['a'] as $key=>$bpsA) {
								echo '<div>';
								if ($bpsHA['identifier'] === "goals_scored" || $bpsHA['identifier'] === "assists" || $bpsHA['identifier'] === "own_goals" || $bpsHA['identifier'] === "penalties_saved" || $bpsHA['identifier'] === "penalties_missed" || $bpsHA['identifier'] === "yellow_cards" || $bpsHA['identifier'] === "red_cards") {
							    	if ($bpsA['value'] > 1) {
								    	echo '<strong class="fixtureDetails__info-item__value">'.$bpsA['value'].'</strong>';
								    }
								} else {
									echo '<strong class="fixtureDetails__info-item__value">'.$bpsA['value'].'</strong>';
								}
								foreach($data['elements'] as $key=>$player) {
							        if ($bpsA['element'] === $player['id']) {
							            echo $player['web_name'].'</div>';
							        }
							    }
							}
						}
						echo '</div>'; // align_r fixtureDetails__info-item
						echo '</div>'; // fixtureDetails__info
					}


				}
				echo '</div>'; // Fixture item left
			    echo '</div>'; // Fixture BPS

			    echo '</div>'; // Fixture Details
			}
		    echo '</div>'; // Whole Fixture
		}
	?>
	
	
</article>
<!-- BACK TO HOME BUTTON -->
<a href="/" aria-label="Return to home page" id="return-to-home">
    <i class="fas fa-home"></i>
</a>
<!-- REFRESH BUTTON -->
<a href="javascript:location.reload(true)" aria-label="Refresh Table" id="refresh" style="cursor: pointer;">
    <i class="fa-solid fa-arrows-rotate" style="color: #000000;"></i>
</a>

<script type="text/javascript">
	if ('serviceWorker' in navigator) {
	    window.addEventListener('load', () => {
	        navigator.serviceWorker.register('/sw.js');
	    });
	}

	var acc = document.getElementsByClassName("fixture__toggle-btn");
	var i;

	for (i = 0; i < acc.length; i++) {
	  acc[i].addEventListener("click", function() {
	    /* Toggle between hiding and showing the active fixtureDetails */
	    var fixtureDetails = this.parentElement.nextElementSibling;
	    if (fixtureDetails.style.maxHeight) {
	      fixtureDetails.style.maxHeight = null;
	    } else {
	      fixtureDetails.style.maxHeight = fixtureDetails.scrollHeight + "px";
	    }
	  });
	}
</script>

</body>
</html>



