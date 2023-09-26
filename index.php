<!DOCTYPE html>
<html lang="en-GB">
<head>
	<!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3SWCCHKEVF"></script>
    <script>
    	window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-3SWCCHKEVF');
    </script>
	<title>FPL Hub</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5">
    <meta name="Description" content="FPL Hub">
    <meta name="theme-color" content="#02efff">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/css/hub.css?=0.126">
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
			<?php
			if (count($deadline) > 0) {  ?>
			<span class="gwdb">
				<span style="text-align: center;">
		            Gameweek <?php echo $nextgw; ?> Deadline<br>
	            <?php
	                $kickoff = $deadline[0]['kickoff_time'];
	                $datetime = new DateTime($kickoff);
	                $timezone = new DateTimeZone('Europe/London');
	                $datetime->setTimezone($timezone);
	                $datetime->sub(new DateInterval('PT1H30M'));
	                echo $datetime->format('D j M G:i');
	            ?>
		        </span>
            </span>
	        <?php } ?>
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
				<a href="standings" target="_self"><h3>Standings</h3></a>
			</div>
		</div>
		<div class="table1">
			<h4><?PHP echo $leagues['leagues']['classic'][5]['name']; ?></h4>
			<ol>
				<?php 
				foreach($navStandings['standings']['results'] as $key=>$navS) {
				?>
					<li><span class="player"><?PHP echo $navS['player_name']; ?></span><span class="player_score"><?php echo $navS['total']; ?></span></li> 
				<?php
				}
				foreach($navStandings['new_entries']['results'] as $key=>$navSnew) {
				?>
					<li><span class="player"><?PHP echo $navSnew['player_first_name'] . " " . $navSnew['player_last_name']; ?></span><span class="player_score">New</span></li> 
				<?php
				}
				?>
			</ol>
		</div>
		<div class="table2">
			<h4><?PHP echo $leagues['leagues']['classic'][6]['name']; ?></h4>
			<ol>
				<?php
				// $i = 0;
				foreach($tasStandings['standings']['results'] as $key=>$tasS) {
				?>
					<li><span class="player"><?PHP echo $tasS['player_name']; ?></span><span class="player_score"><?php echo $tasS['total']; ?></span></li> 
				<?php 
					// if (++$i == 5) {
					// 	break;
					// }
				}  
				foreach($tasStandings['new_entries']['results'] as $key=>$tasSnew) {
				?>
					<li><span class="player"><?PHP echo $tasSnew['player_first_name'] . " " . $tasSnew['player_last_name']; ?></span><span class="player_score">New</span></li> 
				<?php
				}
				?>
			</ol>
		</div>
		<div class="table3">
			<h4><?PHP echo $leagues['leagues']['classic'][7]['name']; ?></h4>
			<ol>
				<?php
				// $i = 0;
				foreach($freeStandings['standings']['results'] as $key=>$freeS) {
				?>
					<li><span class="player"><?PHP echo $freeS['player_name']; ?></span><span class="player_score"><?php echo $freeS['total']; ?></span></li> 
				<?php 
					// if (++$i == 5) {
					// 	break;
					// }
				}  
				foreach($freeStandings['new_entries']['results'] as $key=>$freeSnew) {
				?>
					<li><span class="player"><?PHP echo $freeSnew['player_first_name'] . " " . $freeSnew['player_last_name']; ?></span><span class="player_score">New</span></li> 
				<?php
				}
				?>
			</ol>
		</div>
		<div class="table4">
			<h4><?PHP echo $leagues['leagues']['classic'][8]['name']; ?></h4>
			<ol>
				<?php
				// $i = 0;
				foreach($wheelerStandings['standings']['results'] as $key=>$wheelerS) {
				?>
					<li><span class="player"><?PHP echo $wheelerS['player_name']; ?></span><span class="player_score"><?php echo $wheelerS['total']; ?></span></li> 
				<?php 
					// if (++$i == 5) {
					// 	break;
					// }
				}  
				foreach($wheelerStandings['new_entries']['results'] as $key=>$wheelerSnew) {
				?>
					<li><span class="player"><?PHP echo $wheelerSnew['player_first_name'] . " " . $wheelerSnew['player_last_name']; ?></span><span class="player_score">New</span></li> 
				<?php
				}
				?>
			</ol>
		</div>
		<div class="table_select">
			<span class="table_select_1 active">.</span>
			<span class="table_select_2">.</span>
			<span class="table_select_3">.</span>
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

	        $('.table3, .table4').hide();

			$(".table2").click(function (e) {
	        	$('.table2').hide();
	        	$('.table3').show();
			    $(".table_select_1").removeClass("active");
			    $(".table_select_2").addClass("active");
			    $(".table_select_3").removeClass("active");
			    e.stopPropagation();
			});
			$(".table3").click(function (e) {
	        	$('.table3').hide();
	        	$('.table4').show();
			    $(".table_select_2").removeClass("active");
			    $(".table_select_3").addClass("active");
			    e.stopPropagation();
			});
			$(".table4").click(function (e) {
	        	$('.table4').hide();
	        	$('.table2').show();
			    $(".table_select_1").addClass("active");
			    $(".table_select_3").removeClass("active");
			    e.stopPropagation();
			});

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