<!DOCTYPE html>
<html lang="en-GB">
<head>
    <title>Fantasy Premier League Compiler</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" content="FPL Compiler">
    <meta name="theme-color" content="#00e187">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/css/main.css?0.25">
    <link rel="stylesheet" type="text/css" href="styles/css/pvp.css?0.25">
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
</head>
<body>
    <main>
        <h1>Player Comparison</h1>
        <?php
                
            $json=file_get_contents("https://fantasy.premierleague.com/api/bootstrap-static/");

            $data = json_decode($json, true);

        ?>
        <div class="flex-container2">
            <section style="flex-grow: 5">
                <h2>Player 1</h2>
                <?PHP foreach($data['elements'] as $key=>$item) {
                    if($item['second_name'] === "Agüero") { ?>
                        <h3><?PHP echo $item['first_name']; ?> <?PHP echo $item['second_name'];?></h3>
                        <div class="flex-container3">
                            <h3>Price</h3>
                            <h4><?PHP echo "£".$item['now_cost']/10; ?></h4>
                        </div>
                        <div class="flex-container3">
                            <h3>Points</h3>
                            <h4 id="points"><?PHP echo $item['total_points']; ?></h4>
                        </div>
                        <div class="flex-container3">
                            <h3>Points Per Game</h3>
                            <h4 id="ppg"><?PHP echo $item['points_per_game']; ?></h4>
                        </div>
                        <div class="flex-container3">
                            <h3>Expected Points</h3>
                            <h4 id="expected"><?PHP echo $item['ep_next']; ?></h4>
                        </div>
                        <div class="flex-container3">
                            <h3>Goals/Assists</h3>
                            <h4 id="goals/assists"><?PHP echo $item['goals_scored']; ?>/<?PHP echo $item['assists']; ?></h4>
                        </div>
                        <div class="flex-container3">
                            <table>
                                <thead>
                                    <tr>
                                        <th>BPS</th>
                                        <th>Influence</th>
                                        <th>Creativity</th>
                                        <th>Threat</th>
                                        <th>ict_index</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="bps"><?PHP echo $item['bps']; ?></td>
                                        <td id="influence"><?PHP echo $item['influence']; ?></td>
                                        <td id="creativity"><?PHP echo $item['creativity']; ?></td>
                                        <td id="threat"><?PHP echo $item['threat']; ?></td>
                                        <td id="ict"><?PHP echo $item['ict_index']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <?PHP } 
                } ?>
            </section>
            <section style="flex-grow: 5">
                <h2>Player 2</h2>
                <?PHP foreach($data['elements'] as $key=>$item) {
                    if($item['second_name'] === "Salah") { ?>
                        <h3><?PHP echo $item['first_name']; ?> <?PHP echo $item['second_name'];?></h3>
                        <div class="flex-container3">
                            <h3>Price</h3>
                            <h4><?PHP echo "£".$item['now_cost']/10; ?></h4>
                        </div>
                        <div class="flex-container3">
                            <h3>Points</h3>
                            <h4 id="points2"><?PHP echo $item['total_points']; ?></h4>
                        </div>
                        <div class="flex-container3">
                            <h3>Points Per Game</h3>
                            <h4 id="ppg2"><?PHP echo $item['points_per_game']; ?></h4>
                        </div>
                        <div class="flex-container3">
                            <h3>Expected Points</h3>
                            <h4 id="expected2"><?PHP echo $item['ep_next']; ?></h4>
                        </div>
                        <div class="flex-container3">
                            <h3>Goals/Assists</h3>
                            <h4 id="goals/assists2"><?PHP echo $item['goals_scored']; ?>/<?PHP echo $item['assists']; ?></h4>
                        </div>
                        <div class="flex-container3">
                            <table>
                                <thead>
                                    <tr>
                                        <th>BPS</th>
                                        <th>Influence</th>
                                        <th>Creativity</th>
                                        <th>Threat</th>
                                        <th>ict_index</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="bps2"><?PHP echo $item['bps']; ?></td>
                                        <td id="influence2"><?PHP echo $item['influence']; ?></td>
                                        <td id="creativity2"><?PHP echo $item['creativity']; ?></td>
                                        <td id="threat2"><?PHP echo $item['threat']; ?></td>
                                        <td id="ict2"><?PHP echo $item['ict_index']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <?PHP } 
                } ?>
            </section>
        </div>
    </main>
    
    <script src="js/pvp.js"></script>
</body>
</html>