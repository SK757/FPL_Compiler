<!DOCTYPE html>
<html lang="en-GB">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3SWCCHKEVF"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-3SWCCHKEVF');
    </script>
    <title>Fantasy Premier League Compiler</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5">
    <meta name="Description" content="FPL Compiler">
    <meta name="theme-color" media="(prefers-color-scheme: light)" content="#ffffff">
    <meta name="theme-color" media="(prefers-color-scheme: dark)" content="#35363A">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/css/main.css?=1.0">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.14.0/css/all.css" crossorigin="anonymous" SameSite="none Secure">
    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="shortcut icon" href="/favicon/favicon.ico?=0.4">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg?=0.3" color="#37003c">
    <script src="js/sortable.js?=0.02"></script>
</head>
<body>
    <div class="loadWrapper">
        <div class="loading">
            <span class="loading__anim"></span>
        </div>
    </div>
    <main style="display: none;">
        <div class="flex-container">
            <div id="basic-btn" style="flex-grow: 1.5; margin-left: 0">
                <button class="basic" style="margin-right: 5px"><b>Basic View</b></button>
            </div>
            <div id="advanced-btn" style="flex-grow: 1.5; margin-left: 0">
                <button class="adv" style="margin-right: 5px"><b>Advanced View</b></button>
            </div>
            <?php
                $data = json_decode(file_get_contents("https://fantasy.premierleague.com/api/bootstrap-static/"), true);
            ?><div id="in" style="flex-grow: 8.5; margin-right: 0"><input type="text" id="myInput" onkeyup="search()" placeholder="Search for player" title="Type in a name" autofocus></div>
        </div>
        <div class="flex-container">
            <div style="flex-grow: 1;margin-left: 0px"><button id="filterGK" onclick="keeper()"><b>GK</b></button></div>
            <div style="flex-grow: 1"><button id="filterDEF" onclick="defender()"><b>DEF</b></button></div>
            <div style="flex-grow: 1"><button id="filterMID" onclick="midfielder()"><b>MID</b></button></div>
            <div style="flex-grow: 1"><button id="filterFWD" onclick="forward()"><b>FWD</b></button></div>
            <div style="flex-grow: 1;margin-right: 0px"><button id="refresh" onclick="window.location.reload()"><b>Reset</b></button></div>
        </div>
        <div id="table_cont" class="table_cont_main">
            <table id="player_info" class="sortable">
                <thead>
                    <tr>
                        <th style="display: none;">chance of playing </th>
                        <th id="nameHead">Name </th>
                        <th class="points">Total Points </th>
                        <th >Price </th>
                        <th class="ppg">Points Per Game </th>
                        <th class="gwp">Gameweek Points </th>
                        <th class="advanced xpt">EXPoints This GW </th>
                        <th class="xpn">EXPoints Next GW </th>
                        <th class="goals">Goals </th>
                        <th class="assists">Assists </th>
                        <th class="clean_sheets">Clean Sheets </th>
                        <th class="advanced">Price Change </th>
                        <th class="advanced">Selected </th>
                        <th class="advanced">Minutes </th>
                        <th class="advanced nocursor sorttable_nosort">News </th>
                        <th class="advanced in">Transfers In </th>
                        <th class="advanced out">Transfers Out </th>
                        <th class="advanced gc">Goals Conceded </th>
                        <th class="advanced og">Own Goals </th>
                        <th class="advanced">Pens Saved </th>
                        <th class="advanced">Pens Missed </th>
                        <th class="advanced yc">Yellow Cards </th>
                        <th class="advanced rc">Red Cards </th>
                        <th class="advanced">Saves </th>
                        <th class="advanced">Bonus Points </th>
                        <th class="advanced">BPS Score </th>
                        <th class="advanced">Influence </th>
                        <th class="advanced">Creativity </th>
                        <th class="advanced">Threat </th>    
                        <th class="advanced">ICT Index </th>
                    </tr>
                </thead>
                <tbody>
                <?PHP
                    // $i = 0;
                    foreach($data['elements'] as $key=>$item)
                    {
                ?>
    <tr>
                        <td style="display: none;"><?PHP echo $item['chance_of_playing_next_round']; ?></td>
                        <td id="name"><b><?PHP echo $item['web_name']; ?></b><br><p style="font-size: 11px;margin: 0;margin-block-start: 0;margin-block-end: 0;"><?PHP include 'php/team.php';?> - <?PHP include 'php/position.php';?></p></td>
                        <td><?PHP echo $item['total_points']; ?></td>
                        <td><?PHP echo "£".$item['now_cost']/10; ?></td>
                        <td><?PHP echo $item['points_per_game']; ?></td>
                        <td><?PHP echo $item['event_points']; ?></td>
                        <td class="advanced"><?PHP echo $item['ep_this']; ?></td>
                        <td><?PHP echo $item['ep_next']; ?></td>
                        <td><?PHP echo $item['goals_scored']; ?></td>
                        <td><?PHP echo $item['assists']; ?></td>
                        <td class="clean_sheets_stat"><?PHP echo $item['clean_sheets']; ?></td>
                        <td class="advanced"><?PHP echo "£".$item['cost_change_start']/10; ?></td>
                        <td class="advanced"><?PHP echo $item['selected_by_percent']."%"; ?></td>
                        <td class="advanced"><?PHP echo $item['minutes']; ?></td>
                        <td class="advanced"><?PHP echo $item['news']; ?></td>
                        <td class="advanced"><?PHP echo $item['transfers_in_event']; ?></td>
                        <td class="advanced"><?PHP echo $item['transfers_out_event']; ?></td>
                        <td class="advanced"><?PHP echo $item['goals_conceded']; ?></td>
                        <td class="advanced"><?PHP echo $item['own_goals']; ?></td>
                        <td class="advanced"><?PHP echo $item['penalties_saved']; ?></td>
                        <td class="advanced"><?PHP echo $item['penalties_missed']; ?></td>
                        <td class="advanced"><?PHP echo $item['yellow_cards']; ?></td>
                        <td class="advanced"><?PHP echo $item['red_cards']; ?></td>
                        <td class="advanced"><?PHP echo $item['saves']; ?></td>
                        <td class="advanced"><?PHP echo $item['bonus']; ?></td>
                        <td class="advanced"><?PHP echo $item['bps']; ?></td>
                        <td class="advanced"><?PHP echo $item['influence']; ?></td>
                        <td class="advanced"><?PHP echo $item['creativity']; ?></td>
                        <td class="advanced"><?PHP echo $item['threat']; ?></td>
                        <td class="advanced"><?PHP echo $item['ict_index']; ?></td>
                    </tr>
                <?PHP
                    }   //if (++$i == 14) {break;}  
                ?></tbody>
            </table>
        </div>
        <!-- BACK TO TOP BUTTON -->
        <a href="javascript:" aria-label="Return to the top of the table" id="return-to-top">
            <i class="fas fa-chevron-up"></i>
        </a>
    </main>
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js');
            });
        }
    </script>
    <script src="js/javascript.js?=0.89"></script>
</body>
</html>
