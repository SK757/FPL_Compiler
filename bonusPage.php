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
    <link rel="stylesheet" type="text/css" href="styles/css/bonus.css?=0.101">
    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="shortcut icon" href="/favicon/favicon.ico?=0.4">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg?=0.3" color="#37003c">
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
                echo '<strong class="fixture__score align_c fixture__date"><time datetime="fixture.kickoff_time">';
                $kickoff = $fixture['kickoff_time'];
                $datetime = new DateTime($kickoff);
                $timezone = new DateTimeZone('Europe/London');
                $datetime->setTimezone($timezone);
                echo $datetime->format('D j M ');
                echo $datetime->format('G:i');
                echo '</time></strong>';
            } elseif ($fixture['started'] == true && $fixture['finished_provisional'] == true) {
                echo '<span class="fixture__live">Live</span>';
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

		    echo '<div class="fixtureDetails">';

		    // 		 //
		    // Bonus //
		    // 		 //
		    if ($fixture['finished'] === true) {
			    echo '<h2 class="captialise fixtureDetails__sub-heading">Bonus</h2>';
			    echo '<div class="fixtureDetails__info">';
			    echo '<div class="align_r fixtureDetails__info-item">';
			    foreach($fixture['stats'][8]['h'] as $key=>$bonusH) {
			    	echo '<div>';
			    	foreach($data['elements'] as $key=>$player) {
				        if ($bonusH['element'] === $player['id']) {
				            echo $player['web_name'];
				        }
				    }
			    	echo '<strong class="fixtureDetails__info-item__value">'.$bonusH['value'].'</strong></div>';
			    } 
			    echo '</div>'; // Fixture item left

			    echo '<div class="align_l fixtureDetails__info-item">';
			    $z = 0;
			    foreach($fixture['stats'][8]['a'] as $key=>$bonusA) {
			    	echo '<div><strong class="fixtureDetails__info-item__value">'.$bonusA['value'].'</strong>';
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
		    echo '<h2 class="captialise fixtureDetails__sub-heading">Bonus Points System</h2>';
		    echo '<div class="fixtureDetails__info">';
		    echo '<div class="align_r fixtureDetails__info-item">';
		    $i = 0;
		    foreach($fixture['stats'][9]['h'] as $key=>$bpsH) {
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
		    echo '</div>'; // Fixture item left

		    echo '<div class="align_l fixtureDetails__info-item">';
		    $z = 0;
		    foreach($fixture['stats'][9]['a'] as $key=>$bpsA) {
		    	echo '<div><strong class="fixtureDetails__info-item__value">'.$bpsA['value'].'</strong>';
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



