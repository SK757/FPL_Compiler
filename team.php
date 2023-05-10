<!DOCTYPE html>
<html lang="en-GB">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3SWCCHKEVF"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-3SWCCHKEVF');
    </script>
    <title>FPL Team</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5">
    <meta name="Description" content="FPL Team">
    <meta name="theme-color" media="(prefers-color-scheme: light)" content="#1f1f1f">
    <meta name="theme-color" media="(prefers-color-scheme: dark)" content="#1f1f1f">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/css/main.css?=1.2">
    <link rel="stylesheet" type="text/css" href="styles/css/team.css?=0.24">
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
        <section>
            <section id="return-to-home2" style="margin-right: 8px;">
                <div>
                    <a href="/" aria-label="Return to home page" id="return-to-home2">
                        <button><i class="fas fa-home"></i></button>
                    </a>
                </div>
            </section>
            <section id="reset" style="flex-grow: 1;">
                <div style="flex-grow: 1;"><button onclick="window.location.reload()"><b>Refresh</b></button></div>
            </section>
        </section>
        <!-- BACK TO HOME BUTTON -->
        <!-- <a href="/" aria-label="Return to home page" id="return-to-home">
            <i class="fas fa-home"></i>
        </a> -->
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
        // We listen to the resize event
        window.addEventListener('resize', () => {    
            // First we get the viewport height and we multiple it by 1% to get a value for a vh unit
            let vh = window.innerHeight * 0.01;
            // Then we set the value in the --vh custom property to the root of the document
            document.documentElement.style.setProperty('--vh', `${vh}px`);
        });
    </script>   
    <script src="js/javascript.js?=0.90"></script>
</body>
</html>