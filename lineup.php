<!DOCTYPE html>
<html lang="en-GB">
<head>
    <title>FPL Lineup</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5">
    <meta name="Description" content="FPL Lineup">
    <meta name="theme-color" media="(prefers-color-scheme: light)" content="#37003c">
    <meta name="theme-color" media="(prefers-color-scheme: dark)" content="#1f1f1f">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/css/lineup.css?=0.86">
    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="shortcut icon" href="/favicon/favicon.ico?=0.4">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg?=0.3" color="#37003c">
</head>
<body>
    <main class="grid-container">
        
        <?PHP include 'php/lineup/check.php'; ?>
        
        <section class="flex-container gk">
            <?PHP include 'php/lineup/goalkeeper.php';?>
            <span class="total_points">Points <br><b></b></span>
        </section>

        <section class="flex-container def">
            <?PHP include 'php/lineup/defender.php';?>
        </section>

        <section class="flex-container mid" style="grid-template-columns: repeat(4, minmax(3.875rem, 5.5rem));">
            <?PHP include 'php/lineup/midfield.php';?>
        </section>

        <section class="flex-container fwd">
            <?PHP include 'php/lineup/forward.php';?>
        </section>
    </main>
    <section class="bench-container">
        <section class="flex-container">
            <?PHP include 'php/lineup/subs.php';?>
        </section>
    </section>
    <span id="chip" style="display: none;"><b>(<?PHP echo $picks['active_chip'] ?>)</b></span>
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js');
            });
        }

        if (document.getElementById("chip").innerText === '(bboost)') {
            $(".bench .image").removeClass("bench-image"); 
            $(function() {
                var sum = 0;
                $('.p').each(function(){
                    sum += parseInt(this.innerHTML, 10);
                });

                $('.total_points b').text(sum);
            });
        } else {
            $(function() {
                var sum = 0;
                $('.grid-container .p').each(function(){
                    sum += parseInt(this.innerHTML, 10);
                });

                $('.total_points b').text(sum);
            });
        }
    </script> 
</body>
</html>
