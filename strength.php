<!DOCTYPE html>
<html lang="en-GB">
<head>
    <title>Team Strength</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" content="FPL Team Strength">
    <meta name="theme-color" content="#ffffff">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/css/main.css?0.97">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.14.0/css/all.css" crossorigin="anonymous" SameSite="none Secure">
    <link rel="manifest" href="/favicon/manifest.json?v=0.51">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="shortcut icon" href="/favicon/favicon.ico?v=0.4">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg?v=0.3" color="#37003c">
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
                    foreach($data['teams'] as $key=>$item)
                    {
                        $overallHome = $item['strength_overall_home'];
                        $overallAway = $item['strength_overall_away'];
                        $attackHome = $item['strength_attack_home'];
                        $attackAway = $item['strength_attack_away'];
                    ?>
            		<tr>
            			<td><?php echo $item['name']; ?></td>
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
            navigator.serviceWorker.register('/sw.js');
        }
    </script>

    <script src="js/strength.js?=0.3"></script>
</body>
</html>