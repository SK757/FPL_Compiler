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
    <title>FPL Standings</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5">
    <meta name="Description" content="FPL Standings">
    <meta name="theme-color" content="#02efff">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/css/lineup.css?=0.934"><link rel="stylesheet" href="//use.fontawesome.com/releases/v6.4.2/css/all.css" crossorigin="anonymous" SameSite="none Secure">
    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="shortcut icon" href="/favicon/favicon.ico?=0.4">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg?=0.3" color="#37003c">
    <style type="text/css">
        html {
            background-color: #02efff;
            background-image: linear-gradient(0deg, #00beff 0%, #02efff 100%);
            height: 100%;
        }
        .loadWrapper {
            flex-direction: column;
            background: none;
            font-family: "Trebuchet MS",Arial,Helvetica,sans-serif;
        }
        button {
            font-size: 1.8rem;
            margin: .7rem;
            padding: .5rem 0;
            cursor: pointer;
            border-radius: 6px;
            width: calc(65% - 10px);
            font-family: "Trebuchet MS",Arial,Helvetica,sans-serif;
            background: rgba(255,255,255,.9);
            transition: all 0.3s ease;
            border: 1px solid #000;
            color: #37003c;
        }
        button:hover {
            background: #fff;
        }
        table {
            color: #37003c;
        }
        thead tr th {
            background: rgba(255,255,255,1);
            border-bottom: 1px solid black;
        }
        td {
            vertical-align: middle;
            border-bottom: 1px solid #000;
        }
        tr:last-child td {
            border-bottom: 0;
        }
        .league_select {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #home {
            margin: .5rem 0 0;
        }
        /* Back to home button */
        #return-to-home {
            left: 20px;
        }
        #refresh {
            right: 20px;
        }
        #return-to-home, #refresh {
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            bottom: 20px;
            background: rgba(255,255,255,.5);
            width: 50px;
            height: 50px;
            text-decoration: none;
            transition: all 0.3s ease;
            border-radius: 35px;
        }
        #return-to-home i, #refresh i {
            display: block;
            color: #37003c;
            margin: 0;
            position: relative;
            font-size: 19px;
            transition: all 0.3s ease;
        }
        @media(hover: hover) and (pointer: fine) {
            #return-to-home:hover, #refresh:hover {
                background: rgb(255,255,255);
            }
        }
        #return-to-home:hover i, #refresh:hover i {
            color: #000;
            font-size: 24px;
        }
    </style>
</head>
<body>
    <div class="loadWrapper">
        <button id="navigators">The Navigators</button>
        <button id="taskers">Taskers</button>
        <button id="ffa">Free For All</button>
        <button id="wheelers">Wheelers Dealers</button>
        <!-- BACK TO HOME BUTTON -->
        <a href="/" aria-label="Return to home page" id="return-to-home">
            <i class="fas fa-home"></i>
        </a>
    </div>
    <div class="update_area" style="display: none;"></div>
</body>

<script>
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
            navigator.serviceWorker.register('/sw.js');
        });
    }
    // Do an ajax request
    $("#navigators").click(function() {
        $.ajax({
            url: "php/standings/standingsPageNavigators.php"
        }).done(function(data) { // data what is sent back by the php page
            $('.update_area').html(data); // display data
            $(".loadWrapper").hide();
            $(".update_area").show();
        });
    });
    // Do an ajax request
    $("#taskers").click(function() {
        $.ajax({
            url: "php/standings/standingsPageTaskers.php"
        }).done(function(data) { // data what is sent back by the php page
            $('.update_area').html(data); // display data
            $(".loadWrapper").hide();
            $(".update_area").show();
        });
    });
    // Do an ajax request
    $("#ffa").click(function() {
        $.ajax({
            url: "php/standings/standingsPageFree.php"
        }).done(function(data) { // data what is sent back by the php page
            $('.update_area').html(data); // display data
            $(".loadWrapper").hide();
            $(".update_area").show();
        });
    });
    // Do an ajax request
    $("#wheelers").click(function() {
        $.ajax({
            url: "php/standings/standingsPageWheelers.php"
        }).done(function(data) { // data what is sent back by the php page
            $('.update_area').html(data); // display data
            $(".loadWrapper").hide();
            $(".update_area").show();
        });
    });
    
    // We listen to the resize event
    window.addEventListener('resize', () => {    
        // First we get the viewport height and we multiple it by 1% to get a value for a vh unit
        let vh = window.innerHeight * 0.01;
        // Then we set the value in the --vh custom property to the root of the document
        document.documentElement.style.setProperty('--vh', `${vh}px`);
    });
</script>
</html>