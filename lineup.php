<!DOCTYPE html>
<html lang="en-GB">
<head>
    <title>FPL Lineup</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
    <meta name="Description" content="FPL Lineup">
    <meta name="theme-color" content="#37063c">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/css/lineup.css?0.1">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png?v=0.2">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png?v=0.2">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png?v=0.2">
    <link rel="manifest" href="/favicon/site.webmanifest?v=0.2">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg?v=0.2" color="#00e187">
    <link rel="shortcut icon" href="/favicon/favicon.ico?v=0.2">
    <meta name="msapplication-TileColor" content="#37063c">
    <meta name="msapplication-config" content="/favicon/browserconfig.xml?v=0.2">
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
</body>
</html>
