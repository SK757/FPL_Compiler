<!DOCTYPE html>
<html lang="en-GB">
<head>
    <title>FPL Team</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5">
    <meta name="Description" content="FPL Team">
    <meta name="theme-color" media="(prefers-color-scheme: light)" content="#1f1f1f">
    <meta name="theme-color" media="(prefers-color-scheme: dark)" content="#1f1f1f">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/css/main.css?=1.2">
    <link rel="stylesheet" type="text/css" href="styles/css/team.css?=0.1">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.14.0/css/all.css" crossorigin="anonymous" SameSite="none Secure">
    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="shortcut icon" href="/favicon/favicon.ico?=0.4">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg?=0.3" color="#37003c">
    <style>
        
    </style>
</head>
<body>
    <!-- <script>
        $(document).ready(function () {
            totalPoints();
        });
    </script> -->
    <main style="display: block;">
        <?PHP include 'php/teamPoints.php'; ?>
        
        <section>
            <h1 id="score">Gameweek <?PHP echo $leagues['current_event']; ?> Points - 
        </h1>
        <span id="chip" style="display: none;"><b>(<?PHP echo $picks['active_chip'] ?>)</b></span>
        </section>

        <section id="reset">
            <div style="flex-grow: 8; margin-top: 19.920;"><button onclick="window.location.reload()"><b>Refresh</b></button></div>
        </section>
    </main> 
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js');
            });
        }

        if (document.getElementById('chip').innerText === '(bboost)') {
            $(function() {
                var sum = 0;
                $('tbody .accordion .p').each(function(){
                    sum += parseInt(this.innerHTML, 10);
                });

                $('#score').append(sum);
            });
        } else {
            $(function() {
                var sum = 0;
                $('tbody .accordion .p').each(function(i){
                    sum += parseInt(this.innerHTML, 10);
                    if (i == 10) {
                        return false;
                    }
                });
                $('#score').append(sum);
            });
        }
    </script>   
    <script src="js/javascript.js?=0.90"></script>
</body>
</html>