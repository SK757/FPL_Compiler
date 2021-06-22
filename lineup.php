<!DOCTYPE html>
<html lang="en-GB">
<head>
    <title>FPL Lineup</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5">
    <meta name="Description" content="FPL Lineup">
    <meta name="theme-color" content="#37003c">
    <link rel="stylesheet" type="text/css" href="styles/css/lineup.css?0.1">
    <link rel="manifest" href="/favicon/manifest.json?=0.52">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="shortcut icon" href="/favicon/favicon.ico?=0.4">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg?=0.3" color="#37003c">
</head>
<body>
    <main class="grid-container">
        <section class="flex-container">
            <div>
                <b><p id="player_1"><?PHP include 'php/lineup/goalkeeper.php';?></p></b>
            </div>
        </section>

        <section class="flex-container">
            <?PHP include 'php/lineup/defender.php';?>
        </section>

        <section class="flex-container">
            <?PHP include 'php/lineup/midfield.php';?>
        </section>

        <section class="flex-container">
            <?PHP include 'php/lineup/forward.php';?>
        </section>
    </main>
    <section class="bench-container">
        <section class="flex-container">
            <?PHP include 'php/lineup/subs.php';?>
        </section>
    </section>
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js');
            });
        }
    </script> 
</body>
</html>
