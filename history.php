<!DOCTYPE html>
<html lang="en-GB">
<head>
    <title>FPL Gameweek History</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" content="FPL Gameweek History">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/css/main.css?0.36">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png?v=0.2">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png?v=0.2">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png?v=0.2">
    <link rel="manifest" href="/favicon/site.webmanifest?v=0.2">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg?v=0.2" color="#00e187">
    <link rel="shortcut icon" href="/favicon/favicon.ico?v=0.2">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="msapplication-config" content="/favicon/browserconfig.xml?v=0.2">
    <script src="js/sortable.js?=0.02"></script>
    <style type="text/css">
        tr:nth-child(odd) {
            background-color: #fff !important;
            color: #000;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2 !important;
            color: #000;
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
            $json = file_get_contents("https://fantasy.premierleague.com/api/entry/581004/history/");
            $data = json_decode($json, true);
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
    <script src="js/change.js"></script>
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
</body>
</html>