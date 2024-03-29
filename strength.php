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
    <title>Team Strength</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5">
    <meta name="Description" content="FPL Team Strength">
    <meta name="theme-color" media="(prefers-color-scheme: light)" content="#1f1f1f">
    <meta name="theme-color" media="(prefers-color-scheme: dark)" content="#1f1f1f">
    <link rel="stylesheet" type="text/css" href="styles/css/main.css?=1.2">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.14.0/css/all.css" crossorigin="anonymous" SameSite="none Secure">
    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="shortcut icon" href="/favicon/favicon.ico?=0.4">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg?=0.3" color="#37003c">
    <script src="js/sortable.js?=0.02"></script>
</head>
<body>
	<main style="display: flex;">
		<?php
            $json=file_get_contents("https://fantasy.premierleague.com/api/bootstrap-static/");

            $data =  json_decode($json, true);
        ?>
        <div id="table_strength">
            <table id="player_info" class="sortable">
            	<thead>
            		<tr>
            			<th>Team </th>
            			<th>Home </th>
            			<th>Away </th>
            			<th>Home Attack </th>
            			<th>Away Attack </th>
            			<th>Overall </th>
            		</tr>
            	</thead>
    			<tbody class="strength">
                <?php
                    foreach($data['teams'] as $key=>$teams)
                    {
                        $overallHome = $teams['strength_overall_home'];
                        $overallAway = $teams['strength_overall_away'];
                        $attackHome = $teams['strength_attack_home'];
                        $attackAway = $teams['strength_attack_away'];
                    ?>
            		<tr>
            			<td><?php echo $teams['name']; ?></td>
            			<td><?php echo $overallHome; ?></td>
            			<td><?php echo $overallAway; ?></td>
            			<td><?php echo $attackHome; ?></td>
            			<td><?php echo $attackAway; ?></td>
            			<td><?php echo $overallHome + $overallAway + $attackHome + $attackAway; ?></td>
            		</tr>
                <?php 
                    }
                ?>
            	</tbody>
    		</table>
        </div>
	</main>
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js');
            });
        }
    </script>

    <script src="js/strength.js?=0.90"></script>
</body>
</html>