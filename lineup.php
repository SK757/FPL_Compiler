<!DOCTYPE html>
<html lang="en-GB">
<head>
    <title>FPL Lineup</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5">
    <meta name="Description" content="FPL Lineup">
    <meta name="theme-color" media="(prefers-color-scheme: light)" content="#37003c">
    <meta name="theme-color" media="(prefers-color-scheme: dark)" content="#1f1f1f">
    <link rel="stylesheet" type="text/css" href="styles/css/lineup.css?=0.81">
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
            <span class="total_points">Points <br><b><?PHP echo $picks['entry_history']['points'] ?></b></span>
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

    <!-- <article class="player_modal">
        <div class="player_modal__wrapper">
            <header class="player_modal__header">
                <button class="player_modal__btn" type="button">
                    <span class="player_modal__btn-txt"></span>
                    <svg aria-hidden="true" class="player_modal__btn-icon" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M57.6571429,43.3428571 C57.2,42.8857143 56.5142857,42.8857143 56.0571429,43.3428571 L50,49.4 L43.9428571,43.3428571 C43.4857143,42.8857143 42.8,42.8857143 42.3428571,43.3428571 C41.8857143,43.8 41.8857143,44.4857143 42.3428571,44.9428571 L48.4,51 L42.3428571,57.0571429 C41.8857143,57.5142857 41.8857143,58.2 42.3428571,58.6571429 C42.5714286,58.8857143 42.8,59 43.1428571,59 C43.4857143,59 43.7142857,58.8857143 43.9428571,58.6571429 L50,52.6 L56.0571429,58.6571429 C56.2857143,58.8857143 56.6285714,59 56.8571429,59 C57.0857143,59 57.4285714,58.8857143 57.6571429,58.6571429 C58.1142857,58.2 58.1142857,57.5142857 57.6571429,57.0571429 L51.6,51 L57.6571429,44.9428571 C58.1142857,44.4857143 58.1142857,43.8 57.6571429,43.3428571 Z" transform="translate(-42 -43)" fill="#37003c"></path>
                    </svg>
                </button>
                <h1 class="player_modal__heading">Salah</h1>
            </header>
            <section class="player_modal__content">
                <table class="player_modal__details">
                    <thead>
                        <tr>
                            <th class="align_1 strong player_modal__details-col1">Statistics</th>
                            <th class="strong">Value</th>
                            <th class="strong">Points</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="player_modal__row">
                            <td><span class="capitalise player_modal__details-col1_offset">minutes</span></td>
                            <td class="align_c player_modal__col">90</td>
                            <td class="align_c player_modal__col">2</td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </div>
        <div class="player_modal__bg" aria-hidden="true"></div>
        
    </article> -->

    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js');
            });
        }

        var modal = document.getElementsByClassName("player_modal")[0];
        var btn = document.getElementById("123");
        var span = document.getElementsByClassName("player_modal__btn")[0];



        btn.onclick = function() {
            modal.style.display = "flex";
        };

        span.onclick = function() {
            modal.style.display = "none";
        };

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        };
    </script> 
</body>
</html>
