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
    <meta name="theme-color" content="#02efff">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/css/managers.css?=0.001">
    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="shortcut icon" href="/favicon/favicon.ico?=0.4">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg?=0.3" color="#37003c">
</head>
<body>
	<main class="container">
		<div class="auto-grid">
			<?php include 'php/dates.php';
			foreach($live['elements'] as $key=>$item1) {
                foreach($data['elements'] as $key=>$item2) {
                	if ($item1['id'] === $item2['id'] && $item2['element_type'] === 5) {
						echo '<div class="item-container">';
							echo '<div class="image" style="background-image: url(https://resources.premierleague.com/premierleague/photos/players/110x140/'. $item2['opta_code'] .'.png);"></div>';
							echo '<div class="info"><b>'. $item2['web_name'] .'</b><br>';
							foreach($data['teams'] as $key=>$teams) {
		        				if ($item2['team'] === $teams['id']) {
		            				echo $teams['name'];
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
	<script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js');
            });
        }
	</script>
</body>
</html>