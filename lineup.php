<!DOCTYPE html>
<html lang="en-GB">
<head>
    <title>FPL Lineup</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5">
    <meta name="Description" content="FPL Lineup">
    <meta name="theme-color" media="(prefers-color-scheme: light)" content="#37003c">
    <meta name="theme-color" media="(prefers-color-scheme: dark)" content="#35363A">
    <link rel="stylesheet" type="text/css" href="styles/css/lineup.css?=0.6">
    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="shortcut icon" href="/favicon/favicon.ico?=0.4">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg?=0.3" color="#37003c">
</head>
<body>
    <main class="grid-container">
        
        <?PHP include 'php/lineup/check.php'; ?>
        
        <section class="flex-container gk">
            <div class="column">
                <?PHP include 'php/lineup/goalkeeper.php';?>
                <?PHP include 'php/dates.php'; ?>
                <span>Points <br><b><?PHP echo $picks['entry_history']['points'] ?></b></span>
            </div>
        </section>

        <section class="flex-container def">
            <?PHP include 'php/lineup/defender.php';?>
        </section>

        <section class="flex-container mid">
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
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js');
            });
        }
    </script> 
</body>
</html>