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
	<title>FPL Managers</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5">
    <meta name="Description" content="FPL Managers">
    <meta name="theme-color" media="(prefers-color-scheme: light)" content="#37003c">
    <meta name="theme-color" media="(prefers-color-scheme: dark)" content="#1f1f1f">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/css/managers.css?=0.003">
    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="shortcut icon" href="/favicon/favicon.ico?=0.4">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg?=0.3" color="#37003c">
</head>
<body>
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
					foreach($data['elements'] as $key=>$player) {
			foreach($data['teams'] as $key=>$teams) {
				if ($count === $teams['position']) {
						if ($player['team'] === $teams['id']) {
		                	if ($player['element_type'] === 5) {
								echo '<div class="container__item">';
									echo '<div class="image" style="background-image: url(https://resources.premierleague.com/premierleague/photos/players/110x140/'. $player['opta_code'] .'.png);"></div>';
								echo '</div>';
							}
						}
					}
				}
			}		
			
			?>
		</div>
	</main>
	<script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js');
            });
        }
	</script>
</body>
</html>