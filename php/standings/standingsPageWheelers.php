<body>
    <div style="overflow: visible;">
        <table>
            <thead>
                <tr>
                    <th id="nameHead">Rank </th>
                    <th id="nameHead">Manager</th>
                    <th id="nameHead">Total </th>
                    <th id="nameHead">PN </th>
                    <th id="nameHead">GW </th>
                    <th id="nameHead">TM (Hits) </th>
                </tr>
            </thead>
            <tbody>
            <?PHP
                include '../dates.php';
                foreach($wheelerStandings['standings']['results'] as $key=>$wheelerS)
                {
                    $transfers = json_decode(file_get_contents("https://fantasy.premierleague.com/api/entry/".$wheelerS['entry']."/event/".$leagues['current_event']."/picks/"), true);
            ?>
                <tr style="text-align:center;">
                    <td>
                        <?PHP echo $wheelerS['rank'];
                        if($wheelerS['rank'] < $wheelerS['last_rank']) {
                            echo " <span><i class='fa-solid fa-circle-chevron-up' style='color:#00ff87;background-image:radial-gradient(at center, #37003c 40%, transparent 40%);'></i></span>";
                        } elseif($wheelerS['rank'] > $wheelerS['last_rank']) {
                            echo " <i class='fa-solid fa-circle-chevron-down' style='color:#e90052;background-image:radial-gradient(at center, #fff 40%, transparent 40%);'></i>";
                        } elseif($wheelerS['last_rank'] === "0") {
                            echo " <i class='fa-solid fa-circle' style='color:rgba(255,255,255,.5);'></i>";
                        } else {
                            echo " <i class='fa-solid fa-circle' style='color:rgba(255,255,255,.5);'></i>";
                        } ?>
                    </td>
                    <td style="text-transform:capitalize;">
                        <b><?PHP echo $wheelerS['player_name']; ?></b>
                    </td>
                    <td><?PHP echo $wheelerS['total']; ?></td>
                    <td>
                        <?PHP 
                        $difference = $tasStandings['standings']['results'][0]['total'] - $wheelerS['total'];
                        if($difference === 0) {
                            echo "-";
                        } else {
                            echo $difference;
                        }
                        ?>
                    </td>
                    <td><?PHP echo $transfers['entry_history']['points']; ?></td>
                    <td><?PHP
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
            url: "php/standings/standingsPageWheelers.php"
        }).done(function(data) { // data what is sent back by the php page
            $('.update_area').html(data); // display data
        });
    });
</script>