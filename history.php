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
    <title>FPL Gameweek History</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5">
    <meta name="Description" content="FPL Gameweek History">
    <meta name="theme-color" media="(prefers-color-scheme: light)" content="#1f1f1f">
    <meta name="theme-color" media="(prefers-color-scheme: dark)" content="#1f1f1f">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/css/main.css?=1.32">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.14.0/css/all.css" crossorigin="anonymous" SameSite="none Secure">
    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="shortcut icon" href="/favicon/favicon.ico?=0.4">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg?=0.3" color="#37003c">
    <script src="js/sortable.js?=0.02"></script>
    <style type="text/css">
        .twentyfive {
            background-color: #1f1f1f !important;
            color: #fff !important;
        }
        tbody tr:last-child td {
            border-bottom: none !important;
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
        .change {
            padding: 5px !important;
        }
        #player_info td, #player_info th {
            padding: 8px 6px;
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
            $data = json_decode(file_get_contents("https://fantasy.premierleague.com/api/entry/64519/history/"), true);
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
                        <th style="display: none;">Transfers </th>
                        <th class="change nocursor sorttable_nosort"><i class='fas fa-caret-up'></i><i class='fas fa-caret-down'></i></th>
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
                        <td class="transfers" style="display: none;"><?PHP echo $item['event_transfers'] ?></td>
                        <?PHP echo '<td class="change" id="change_'.$count.'">'; ?></td>
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
        <!-- BACK TO HOME BUTTON -->
        <a href="/" aria-label="Return to home page" id="return-to-home">
            <i class="fas fa-home"></i>
        </a>
        <!-- BACK TO TOP BUTTON -->
        <a href="javascript:" aria-label="Return to the top of the table" id="return-to-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </main>
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js');
            });
        }
    </script>
    <script src="js/javascript.js?=0.90"></script>
    <script src="js/change.js?=1.21"></script>
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