<!DOCTYPE html>
<html lang="en-GB">
<head>
    <title>FPL Gameweek History</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" content="FPL Gameweek History">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/css/main.css?0.51">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.14.0/css/all.css" crossorigin="anonymous" SameSite="none Secure">
    <link rel="manifest" href="/favicon/manifest.json">
    <link rel="apple-touch-icon" href="/favicon/maskable_icon.png">
    <link rel="shortcut icon" href="/favicon/favicon.ico?v=0.2">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg?v=0.2" color="#00e187">
    <script src="js/sortable.js?=0.02"></script>
    <style type="text/css">
        @media (prefers-color-scheme: light) {
            tr:nth-child(odd) {
                background-color: #fff !important;
                color: #000;
            }
            tr:nth-child(even) {
                background-color: #f2f2f2 !important;
                color: #000;
            }
        }
        .twentyfive {
            background-color: #fff !important;
            color: #000;
        }
        @media (prefers-color-scheme: dark) {
            .twentyfive {
                background-color: #323639 !important;
                color: #fff !important;
            }
        }
        section {
            display: flex;
            display: -webkit-flex;
            justify-content: center;
            align-items: center;
            -webkit-align-items: center;
            flex-direction: row;
        }
        section h1 {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <div class="loadWrapper">
        <div class="loading">
            <span class="loading__anim"></span>
        </div>
    </div>
    <main style="display: none;">
        <?php
            $data = json_decode(file_get_contents("https://fantasy.premierleague.com/api/entry/32061/history/"), true);
        ?>

        <div id="table_cont" class="table_cont_history">
            <table id="player_info" class="sortable table">
                <thead>
                    <tr>
                        <th style="display: none;">Gameweek </th>
                        <th class="gameweek">Gameweek </th>
                        <th class="p">Points </th>
                        <th class="gwrank">GW Rank </th>
                        <th class="points">Total Points </th>
                        <th class="value">Team Value/Bank</th>
                        <th class="overall">Overall </th>
                        <th class="change nocursor sorttable_nosort"><i class='fas fa-caret-up'></i><i class='fas fa-caret-down'></i></th>
                        <th style="display: none;">Transfers </th>
                    </tr>
                </thead>
                <tbody>
                <?PHP
                    $count = 1;
                    if(is_array($data)){
                        foreach($data['current'] as $key=>$item) {
                ?>
    <tr>
                        <td style="display: none;"><?PHP echo $item['event']; ?></td>
                        <td id="gameweek"><b><?PHP echo $item['event']; ?></b></td>
                        <td><?PHP echo $item['points']; ?></td>
                        <td><?PHP echo number_format($item['rank']); ?></td>
                        <td><?PHP echo number_format($item['total_points']); ?></td>
                        <td><?PHP echo $item['value']/10; ?></td>
                        <?PHP echo '<td id="week_'.$count.'">' . number_format($item['overall_rank']); ?></td>
                        <?PHP echo '<td id="change_'.$count.'">'; ?></td>
                        <td class="transfers" style="display: none;"><?PHP echo $item['event_transfers'] ?></td>
                    </tr>
                <?PHP
                        ++$count; }
                    }  else {
                        echo "<h2 style='text-align:center'>Gameweek Is Being Updated</h2>";
                    }
                ?></tbody>
            </table>
        </div>
        <section>
            <h1 id="total_transfers">Total Transfers - </h1>
        </section>
        <!-- BACK TO TOP BUTTON -->
        <a href="javascript:" aria-label="Return to the top of the table" id="return-to-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </main>

    <script src="js/javascript.js?=0.6"></script>
    <script src="js/change.js?=1"></script>
    <script>

        var cls = document.getElementById("player_info").getElementsByTagName("td");
        var sum = 0;
        for (var i = 0; i < cls.length; i++){
            if(cls[i].className == "transfers"){
                sum += isNaN(cls[i].innerHTML) ? 0 : parseInt(cls[i].innerHTML);
            }
        }
        // alert('sum is ' + sum);
        document.getElementById("total_transfers").insertAdjacentHTML('beforeend', sum);

        // ===== Shorten Headers if Small Viewport ==== 
        function headers(x) {
            if (x.matches) { // If media query matches
                $(".gameweek").html("GW ");
                $(".p").html("P ");
                $(".gwrank").html("GWR ");
                $(".value").html("£ ");
                $(".overall").html("Ovr ");
            } else {
            // ===== Extend Headers if Large Viewport ==== 
                $(".gameweek").html("Gameweek ");
                $(".p").html("Points ");
                $(".gwrank").html("GW Rank  ");
                $(".value").html("Value ");
                $(".overall").html("Overall ");
            }
        }
        var x = window.matchMedia("(max-width: 899px)");
        headers(x); // Call listener function at run time
        x.addListener(headers); // Attach listener function on state changes
    </script>
    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/sw.js');
        }
    </script>
</body>
</html>