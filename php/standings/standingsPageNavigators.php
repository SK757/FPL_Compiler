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
                foreach($navStandings['standings']['results'] as $key=>$navS)
                {
                    $transfers = json_decode(file_get_contents("https://fantasy.premierleague.com/api/entry/".$navS['entry']."/event/".$leagues['current_event']."/picks/"), true);
            ?>
                <tr style="text-align:center;">
                    <td>
                        <?PHP echo $navS['rank'];
                        if($navS['rank'] < $navS['last_rank']) {
                            echo " <span><i class='fa-solid fa-circle-chevron-up' style='color:#00ff87;background-image:radial-gradient(at center, #37003c 40%, transparent 40%);'></i></span>";
                        } elseif($navS['rank'] > $navS['last_rank']) {
                            echo " <i class='fa-solid fa-circle-chevron-down' style='color:#e90052;background-image:radial-gradient(at center, #fff 40%, transparent 40%);'></i>";
                        } else {
                            echo " <i class='fa-solid fa-circle' style='color:rgba(255,255,255,.5);'></i>";
                        } ?>
                    </td>
                    <td style="text-transform:capitalize;"><b><?PHP echo $navS['player_name']; ?></b></td>
                    <td><?PHP echo $navS['total']; ?></td>
                    <td>
                        <?PHP 
                        $difference = $navStandings['standings']['results'][0]['total'] - $navS['total'];
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
            url: "php/standings/standingsPageNavigators.php"
        }).done(function(data) { // data what is sent back by the php page
            $('.update_area').html(data); // display data
        });
    });
</script>