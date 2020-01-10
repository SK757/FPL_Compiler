<!DOCTYPE html>
<html lang="en-GB">
<head>
    <title>FPL Team</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
    <meta name="Description" content="FPL Team">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/css/main.css?0.6">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png?v=0.2">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png?v=0.2">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png?v=0.2">
    <link rel="manifest" href="/favicon/site.webmanifest?v=0.2">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg?v=0.2" color="#00e187">
    <link rel="shortcut icon" href="/favicon/favicon.ico?v=0.2">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="msapplication-config" content="/favicon/browserconfig.xml?v=0.2">
    <script src="js/sortable.js?=0.02"></script>
</head>
<body>
    <script>
        $(document).ready(function () {
            totalPoints();
        });
    </script>
    <main style="display: block;">
        <?PHP
        $jleagues = file_get_contents("https://fantasy.premierleague.com/api/entry/581004/");
        $leagues = json_decode($jleagues, true); 
        ?>
        <?PHP include 'php/teamPoints.php'; ?>

        <section>
            <h1 id="score">Gameweek <?PHP echo $leagues['current_event']; ?> Points - </h1>
        </section>

        <section id="reset">
            <div style="flex-grow: 8; margin-top: 19.920;"><button onclick="window.location.reload()"><b>Refresh</b></button></div>
        </section>
    </main>

    <style>
        #table_cont {
            max-height: 100%;
        }
        #player_info th {
            padding-top: 15px;
            padding-bottom: 15px;
        }
        #player_info tbody tr:nth-child(11) {
            border-bottom: 1px solid #c0020d;
        }
        section {
            display: flex;
            display: -webkit-flex;
            justify-content: center;
            align-items: center;
            -webkit-align-items: center;
            flex-direction: row;
        } 
        section > div {
            width: 100px;
            margin: 19.920px 0 0 0;
        }
        section h1 {
            margin-bottom: 0;
        }
        .hello {
            color:red;
        }
        @media screen and (min-width: 900px) {
            section#reset {
                display: none;
            }
        }
        @media (prefers-color-scheme: dark) {
            h1#score {
                color: #fff;
            }
        }
    </style>
    
    <script src="js/javascript.js?=0.9"></script>
</body>
</html>