<body>
    <div style="overflow: visible;">
        <table>
            <thead>
                <tr>
                    <th id="nameHead">Rank</th>
                    <th id="nameHead" class="nameCol">Manager</th>
                    <th id="nameHead">Total</th>
                    <th id="nameHead">PN</th>
                    <th id="nameHead">GW</th>
                    <th id="nameHead" class="tm">TM (Hit)</th>
                </tr>
            </thead>
            <tbody>
            <?PHP
                include '../dates.php';
                foreach($freeStandings['standings']['results'] as $key=>$freeS)
                {
                    $transfers = json_decode(file_get_contents("https://fantasy.premierleague.com/api/entry/".$freeS['entry']."/event/".$leagues['current_event']."/picks/"), true);
            ?>
                <tr style="text-align:center;">
                    <td>
                        <?PHP echo $freeS['rank'];
                        if($freeS['rank'] < $freeS['last_rank']) {
                            echo " <span><i class='fa-solid fa-circle-chevron-up' style='color:#00ff87;background-image:radial-gradient(at center, #37003c 40%, transparent 40%);'></i></span>";
                        } elseif($freeS['rank'] > $freeS['last_rank']) {
                            echo " <i class='fa-solid fa-circle-chevron-down' style='color:#e90052;background-image:radial-gradient(at center, #fff 40%, transparent 40%);'></i>";
                        } else {
                            echo " <i class='fa-solid fa-circle' style='color:rgba(255,255,255,.5);'></i>";
                        } ?>
                    </td>
                    <td class="nameCol" style="text-transform:capitalize;">
                        <?PHP
                        if (str_contains($freeS['player_name'], '-')) {
                            echo '<span class="name" style="font-weight:bold;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;display:inline-block;vertical-align:bottom;">J-R Richardson</span>';
                        } else {
                            echo '<span class="name" style="font-weight:bold;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;display:inline-block;vertical-align:bottom;">'.$freeS['player_name'].'</span>';
                        }
                        if ($transfers['active_chip'] === "wildcard") {
                            echo ' <span class="chip" style="background:rgba(255,255,255,.6);font-weight:bold;border-radius:3px;padding:0 0.2rem;">WC</span>';
                        } elseif ($transfers['active_chip'] === "bboost") {
                            echo ' <span class="chip" style="background:rgba(255,255,255,.6);font-weight:bold;border-radius:3px;padding:0 0.2rem;">BB</span>';
                        } elseif ($transfers['active_chip'] === "freehit") {
                            echo ' <span class="chip" style="background:rgba(255,255,255,.6);font-weight:bold;border-radius:3px;padding:0 0.2rem;">FH</span>';
                        } elseif ($transfers['active_chip'] === "3xc") {
                            echo ' <span class="chip" style="background:rgba(255,255,255,.6);font-weight:bold;border-radius:3px;padding:0 0.2rem;">TC</span>';
                        }
                        ?>
                    </td>
                    <td><?PHP echo $freeS['total']; ?></td>
                    <td>
                        <?PHP 
                        $difference = $freeStandings['standings']['results'][0]['total'] - $freeS['total'];
                        if($difference === 0) {
                            echo "-";
                        } else {
                            echo $difference;
                        }
                        ?>
                    </td>
                    <td><?PHP echo $transfers['entry_history']['points']; ?></td>
                    <td class="tm"><?PHP
                        if($transfers['entry_history']['event_transfers_cost'] === 0) {
                            echo $transfers['entry_history']['event_transfers'];
                        } else {
                            echo $transfers['entry_history']['event_transfers']." (-".$transfers['entry_history']['event_transfers_cost'].")";
                        }
                     ?></td>


                </tr>
            <?PHP
                } 
            ?></tbody>
        </table>
        <div class="league_select">
            <button id="home">Select League</button>
        </div>
    </div>
    <!-- BACK TO HOME BUTTON -->
    <a href="/" aria-label="Return to home page" id="return-to-home">
        <i class="fas fa-home"></i>
    </a>
    <!-- REFRESH BUTTON -->
    <a aria-label="Refresh Table" id="refresh" style="cursor: pointer;">
        <i class="fa-solid fa-arrows-rotate" style="color: #000000;"></i>
    </a>
</body>
<script>    
    $("#home").click(function() {
        $(".loadWrapper").show();
        $(".update_area").hide();
    });
    $("#refresh").click(function() {
        $.ajax({
            url: "php/standings/standingsPageFree.php"
        }).done(function(data) { // data what is sent back by the php page
            $('.update_area').html(data); // display data
        });
    });
</script>