<!DOCTYPE html>
<html lang="en-GB">
<head>
    <title>FPL Points</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
    <meta name="Description" content="FPL Points">
    <meta name="theme-color" content="#37063c">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/css/p.css?0.9">
    <link rel="manifest" href="/favicon/manifest.json?v=0.51">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="shortcut icon" href="/favicon/favicon.ico?v=0.4">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg?v=0.3" color="#37003c">
    
</head>
<body>
    <main class="grid-container">
        <?PHP include 'php/points.php'; ?>
        <section class="info">
            <span id="chip"><b>(<?PHP echo $picks['active_chip'] ?>)</b></span>
            <h1>Gameweek <?php echo $leagues['current_event']; ?></h1>
            <h2>Overall - <?php echo $leagues['summary_overall_points']; ?></h1>
        </section>
        <section class="points">
            <a href="team" target="_top"><h1 id="score" class="score"></h1></a>
        </section>
        <section class="leagues">
            <p><?PHP echo $leagues['leagues']['classic'][4]['name']; ?> rank - <?PHP echo ordinal($leagues['leagues']['classic'][4]['entry_rank']); ?></p>
            <p><?PHP echo $leagues['leagues']['classic'][5]['name']; ?> rank - <?PHP echo ordinal($leagues['leagues']['classic'][5]['entry_rank']); ?></p>
        </section>
    </main>
    <script>
        causeRepaintsOn = $("h1, h2, h3, p");
        $(window).resize(function() {
            causeRepaintsOn.css("z-index", 1);
        });

        var a = document.getElementById("player_0").innerText;
        var b = document.getElementById("player_1").innerText;
        var c = document.getElementById("player_2").innerText;
        var d = document.getElementById("player_3").innerText;
        var e = document.getElementById("player_4").innerText;
        var f = document.getElementById("player_5").innerText;
        var g = document.getElementById("player_6").innerText;
        var h = document.getElementById("player_7").innerText;
        var i = document.getElementById("player_8").innerText;
        var j = document.getElementById("player_9").innerText;
        var k = document.getElementById("player_10").innerText;
        // BENCH
        var l = document.getElementById("player_11").innerText;
        var m = document.getElementById("player_12").innerText;
        var n = document.getElementById("player_13").innerText;
        var o = document.getElementById("player_14").innerText;

        if (document.getElementById("chip").innerText === '(bboost)') {
            var z = parseInt(a) + parseInt(b) + parseInt(c) + parseInt(d) + parseInt(e) + parseInt(f) + parseInt(g) + parseInt(h) + parseInt(i) + parseInt(j) + parseInt(k) + parseInt(l) + parseInt(m) + parseInt(n) + parseInt(o);
        } else {
            var z = parseInt(a) + parseInt(b) + parseInt(c) + parseInt(d) + parseInt(e) + parseInt(f) + parseInt(g) + parseInt(h) + parseInt(i) + parseInt(j) + parseInt(k);
        }
        var score = document.getElementById("score");

        var double = '65vmin';
        var triple = '56vmin';
        if (z > 99) {
            score.style.fontSize = triple;
        } else {
            score.style.fontSize = double;
        }
        score.innerHTML = z;

        if ('serviceWorker' in navigator) {
            navigator.serviceWorker
                     .register('/sw.js')
                     .then(function() {console.log("Service Worker Registered"); });
        }
    </script>
</body>
</html>