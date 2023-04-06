<!DOCTYPE html>
<html lang="en-GB">
<head>
	<title>FPL Hub</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5">
    <meta name="Description" content="FPL Hub">
    <meta name="theme-color" content="#02efff">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/css/hub.css?=0.121">
    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="shortcut icon" href="/favicon/favicon.ico?=0.4">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg?=0.3" color="#37003c">
</head>
<body>
	<main class="container">
		<?php include 'php/dates.php';
		if (is_array($live)) { ?>
		<div class="title"><h1>FPL</h1></div>
		<div class="name">
			<h1><?php echo $leagues['name']; ?></h1>
		</div>
		<div class="points">
			<?php 
		    foreach($picks['picks'] as $key=>$item) {
		        foreach($live['elements'] as $key=>$item1) {
		            if ($item['element'] === $item1['id']) {
		            	echo '<span style="display:none" class="player_scores">' . $item1['stats']['total_points'] * $item['multiplier'] . '</span>';
		            }
		    	}
		    } ?>
		    <span class="gwb">
		    	<span>Gameweek <?php echo $leagues['current_event']; ?></span>
		    	<?php 
		    	$numItems = count($fixtures);
		    	$i = 0;
		    	foreach($fixtures as $key=>$fixture) {
		    		if(++$i === $numItems && $fixture['finished_provisional'] == false) {
                        echo '&nbsp;<p class="live">Live</p>';
		    		}
		    	}
		    	?>
		    </span>
			<a href="team" target="_self"><h2 class="score"></h2><p>Points &rarr;</p></a>
			<span class="gwdb">
				<span style="text-align: center;">
		            <?php
		             if (count($deadline) === 0) {              
		                echo " ";
		            } else {
		            ?>
		            Gameweek <?php echo $leagues['current_event']+1; ?> Deadline<br>
		            <?php
		                $kickoff = $deadline[0]['kickoff_time'];
		                $datetime = new DateTime($kickoff);
		                $timezone = new DateTimeZone('Europe/London');
		                $datetime->setTimezone($timezone);
		                $datetime->sub(new DateInterval('PT1H30M'));
		                echo $datetime->format('D j M G:i');
		            }
		            ?>
		        </span>
            </span>
		</div>
		<div class="nav">
			<div class="comp">
				<a href="compiler" target="_self"><h3>Compiler</h3></a>
			</div>
			<div class="lineup">
				<a href="lineup" target="_self"><h3>Lineup</h3></a>
			</div>
			<div class="history">
				<a href="history" target="_self"><h3>History</h3></a>
			</div>
			<div class="strength">
				<a href="strength" target="_self"><h3>Strength</h3></a>
			</div>
		</div>
		<div class="table1">
			<h4><?PHP echo $leagues['leagues']['classic'][4]['name']; ?></h4>
			<ol>
				<?php 
				foreach($navStandings['standings']['results'] as $key=>$navS) {
				?>
					<li><span class="player"><?PHP echo $navS['player_name']; ?></span><span class="player_score"><?php echo $navS['total']; ?></span></li> 
				<?php
				}
				?>
			</ol>
		</div>
		<div class="table2">
			<h4><?PHP echo $leagues['leagues']['classic'][5]['name']; ?></h4>
			<ol>
				<?php
				$i = 0;
				foreach($tasStandings['standings']['results'] as $key=>$tasS) {
				?>
					<li><span class="player"><?PHP echo $tasS['player_name']; ?></span><span class="player_score"><?php echo $tasS['total']; ?></span></li> 
				<?php 
					// if (++$i == 5) {
					// 	break;
					// }
				}  
				?>
			</ol>
		</div>
	<?php } else {
		echo '<div class="offline"><h1>Gameweek is Being Updated</h1></div>';
	} ?>
	</main>

	<script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js');
            });
        }
	    $(document).ready(function(){
	        var sum = 0;
	        $('.player_scores').each(function(){
	            sum += parseFloat($(this).text());
	        });
	        $('.score').text(sum);
	    });
		// We listen to the resize event
		window.addEventListener('resize', () => {    
		    // First we get the viewport height and we multiple it by 1% to get a value for a vh unit
			let vh = window.innerHeight * 0.01;
			// Then we set the value in the --vh custom property to the root of the document
			document.documentElement.style.setProperty('--vh', `${vh}px`);
		});
	</script>
</body>
</html>