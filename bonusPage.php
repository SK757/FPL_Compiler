<!DOCTYPE html>
<html lang="en-GB" class="notranslate" translate="no">
<head>
	<title>FPL Bonus</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5">
    <meta name="Description" content="FPL Bonus">
    <meta name="google" content="notranslate"/>
    <meta name="theme-color" media="(prefers-color-scheme: light)" content="#37003c">
    <meta name="theme-color" media="(prefers-color-scheme: dark)" content="#1f1f1f">
	<title></title>
	<style type="text/css">
		html {
			background-color: #37003c;
			color: white;
			font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
			font-size: 20px;
		}
		.sub-heading {
			text-align: center;
		}
		.fixture {
			align-items: center;
		    border-top: 1px solid #5f3363;
		    display: grid;
		    font-size: .95rem;
		    grid-template-columns: 1fr 5rem 1fr;
		    padding: .75rem 0;
		    position: relative;
		}
		.align_r {
			text-align: right;
		}
		.align_l {
			text-align: left;
		}
		.align_c {
			text-align: center;
		}
		.fixture__team {
		    font-size: .9rem;
		    line-height: 1rem;
		}
		.fixture__score {
		    color: #00ff87;
		    font-size: 1.125rem;
		    font-variant-numeric: tabular-nums;
		    line-height: 1.1rem;
		    margin: 0 .75rem;
		}
		.fixture__date {
		    font-size: .7rem;
		    margin: 0 .3rem;
		}
		.fixture__details {
			max-height: 0;
			overflow: hidden;
			transition: max-height 0.2s ease-out;
		}
		.capitalise {
			text-transform: capitalize;
		}
		.fixtures__sub-heading {
		    font-size: .75rem;
		    font-weight: 500;
		    text-align: center;
		}
		.fixture__info {
		    background: linear-gradient(90deg, #37003c 49.9%, #d0bcd3 50%, #37003c 50.1%, #37003c);
		    display: grid;
		    gap: 1.75rem;
		    grid-template-columns: repeat(2, 1fr);
		    grid-template-rows: auto;
		    margin: .25rem 0 1rem;
		}
		.fixture__info-item {
		    font-size: .75rem;
		    font-weight: 300;
		}
		.align_r .fixture__info-value {
		    padding-left: .33rem;
		}

		.align_l .fixture__info-value {
		    padding-right: .33rem;
		}
		.fixture__info-value {
		    color: #ebff00;
		    display: inline-block;
		    font-size: .8rem;
		    font-variant-numeric: tabular-nums;
		}
		.fixture__toggle-btn {
		    appearance: none;
		    background: 0 0;
		    border: 0;
		    color: #fff;
		    cursor: pointer;
		    height: calc(100% + 1px);
		    left: 0;
		    outline: none;
		    position: absolute;
		    text-indent: -999rem;
		    top: -1px;
		    width: 100%;
		}
		@media (prefers-color-scheme: dark) {
		    html {
		        background: #1f1f1f;
		    }
		    .fixture {
			    border-top: 1px solid #343434;;
			}
			.fixture__info {
			    background: linear-gradient(90deg, #1f1f1f 49.8%, #343434 50%, #1f1f1f 50.2%, #1f1f1f);
			}
		}

	</style>
</head>
<body>
<?php 

$data = json_decode(file_get_contents("https://fantasy.premierleague.com/api/bootstrap-static/"), true);

$leagues = json_decode(file_get_contents("https://fantasy.premierleague.com/api/entry/56467/"), true);

$fixtures = json_decode(file_get_contents("https://fantasy.premierleague.com/api/fixtures/?event=".$leagues['current_event']), true);

?>


<article>
	<h1 class="sub-heading">Fixtures</h1>

	<?php
		foreach($fixtures as $key=>$fixture) {
			echo '<div>';// Whole Fixture
			echo '<div class="fixture">';
			echo '<div class="fixture__team align_r">';
			foreach($data['teams'] as $key=>$teams) {
		        if ($fixture['team_h'] === $teams['id']) {
		            echo $teams['name'];
		        }
		    }
		    echo '</div>'; // Home team

			if ($fixture['started'] == false) {
                echo '<strong class="fixture__score align_c fixture__date"><time class="fixture__ko" datetime="fixture.kickoff_time">';
                $kickoff = $fixture['kickoff_time'];
                $datetime = new DateTime($kickoff);
                $timezone = new DateTimeZone('Europe/London');
                $datetime->setTimezone($timezone);
                echo $datetime->format('D j M ');
                echo $datetime->format('G:i');
                echo '</time></strong>';
            } elseif ($fixture['started'] == true && $fixture['finished_provisional'] == false) {
                echo '<span class="live">Live</span>';
            } else {
				echo '<strong class="fixture__score align_c">'.$fixture['team_h_score'].' - '.$fixture['team_a_score'].'</strong>';
            }

			echo '<div class="fixture__team">';
			foreach($data['teams'] as $key=>$teams) {
				if ($fixture['team_a'] === $teams['id']) {
		            echo $teams['name'];
		        }
		    }
		    echo '</div>'; // Away team
		    echo '<button class="fixture__toggle-btn" type="button">View fixture details</button>';
		    echo '</div>'; // Fixture teams & score

		    echo '<div class="fixture__details">';

		    // 		 //
		    // Bonus //
		    // 		 //
		    if ($fixture['finished'] === true) {
			    echo '<h2 class="captialise fixtures__sub-heading">Bonus</h2>';
			    echo '<div class="fixture__info">';
			    echo '<div class="align_r fixture__info-item">';
			    foreach($fixture['stats'][8]['h'] as $key=>$bonusH) {
			    	echo '<div>';
			    	foreach($data['elements'] as $key=>$player) {
				        if ($bonusH['element'] === $player['id']) {
				            echo $player['web_name'];
				        }
				    }
			    	echo '<strong class="fixture__info-value">'.$bonusH['value'].'</strong></div>';
			    } 
			    echo '</div>'; // Fixture item left

			    echo '<div class="align_l fixture__info-item">';
			    $z = 0;
			    foreach($fixture['stats'][8]['a'] as $key=>$bonusA) {
			    	echo '<div><strong class="fixture__info-value">'.$bonusA['value'].'</strong>';
			    	foreach($data['elements'] as $key=>$player) {
				        if ($bonusA['element'] === $player['id']) {
				            echo $player['web_name'].'</div>';
				        }
				    }
			    	if (++$z == 5) {
			    		break;
			    	}
			    }
			    echo '</div>'; // Fixture item right
			    echo '</div>'; // Fixture BPS
			}

		    //					   //
		    // Bonus Points System //
		    // 		 			   //
		    echo '<h2 class="captialise fixtures__sub-heading">Bonus Points System</h2>';
		    echo '<div class="fixture__info">';
		    echo '<div class="align_r fixture__info-item">';
		    $i = 0;
		    foreach($fixture['stats'][9]['h'] as $key=>$bpsH) {
		    	echo '<div>';
		    	foreach($data['elements'] as $key=>$player) {
			        if ($bpsH['element'] === $player['id']) {
			            echo $player['web_name'];
			        }
			    }
		    	echo '<strong class="fixture__info-value">'.$bpsH['value'].'</strong></div>';

		    	if (++$i == 5) {
		    		break;
		    	}
		    } 
		    echo '</div>'; // Fixture item left

		    echo '<div class="align_l fixture__info-item">';
		    $z = 0;
		    foreach($fixture['stats'][9]['a'] as $key=>$bpsA) {
		    	echo '<div><strong class="fixture__info-value">'.$bpsA['value'].'</strong>';
		    	foreach($data['elements'] as $key=>$player) {
			        if ($bpsA['element'] === $player['id']) {
			            echo $player['web_name'].'</div>';
			        }
			    }
		    	if (++$z == 5) {
		    		break;
		    	}
		    }
		    echo '</div>'; // Fixture item right
		    echo '</div>'; // Fixture BPS

		    echo '</div>'; // Fixture Details

		    echo '</div>'; // Whole Fixture
		}
	?>
	
	
</article>

<script type="text/javascript">
	var acc = document.getElementsByClassName("fixture__toggle-btn");
	var i;

	for (i = 0; i < acc.length; i++) {
	  acc[i].addEventListener("click", function() {
	    /* Toggle between hiding and showing the active fixture__details */
	    var fixture__details = this.parentElement.nextElementSibling;
	    if (fixture__details.style.maxHeight) {
	      fixture__details.style.maxHeight = null;
	    } else {
	      fixture__details.style.maxHeight = fixture__details.scrollHeight + "px";
	    }
	  });
	}
</script>

</body>
</html>



