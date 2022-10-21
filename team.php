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
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.14.0/css/all.css" crossorigin="anonymous" SameSite="none Secure">
    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="shortcut icon" href="/favicon/favicon.ico?=0.4">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg?=0.3" color="#37003c">
    <style>
        #table_cont {
            max-height: calc(100vh - 139px);
        }
        #player_info th {
            padding-top: 15px;
            padding-bottom: 15px;
        }
        #player_info tbody tr.explain:nth-child(33) td {
            border-bottom: none;
        }
        #player_info tbody tr.accordion:nth-child(34) td {
            border-top: 1px solid #c0020d;
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
        tr.explain_head td, tr.explain td {
            border-right: 0 !important;
        }
        .explain_head, .explain {
            display: none;
            overflow: hidden;
            transition: display .4s ease-out;
        }
        .fix {
            display: flex;
            align-content: center;
            justify-content: center;
            left: 0;
            top: 0;
            width: 100%;
            padding-bottom: 7px;
            margin-bottom: 7px;
            border-bottom: 1px solid #7d7d7d;
        }
        td #game_2, td #game_3 {
            padding-top: 10px;
        }
        .game_container {
            align-items: center;
            display: grid;
            grid-template-columns: 1fr 4rem 1fr;
            height: 1.5rem;
            position: relative;
        }
        .home {
            font-size: 0.8rem;
            text-align: right;
        }
        strong {
            color: #ebff00;
            font-size: 1.2rem;
            font-variant-numeric: tabular-nums;
            line-height: 1.25;
            text-align: center;
        }
        .away {
            font-size: 0.8rem;
            text-align: left;
        }
        .player_modal__blank {
            margin: 0.5rem 0;
        }


        @media screen and (min-width: 900px) {
            section#reset {
                display: none;
            }
            #table_cont {
                max-height: calc(100vh - 69.1px);
            }
        }
        tr.explain_head td {
            border-bottom: 0 !important;
            background: #1a1a1a !important;
        }
        .explain {
            background: #494e52 !important;
        }
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