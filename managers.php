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
	<title>FPL Managers</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5">
    <meta name="Description" content="FPL Managers">
    <meta name="theme-color" media="(prefers-color-scheme: light)" content="#37003c">
    <meta name="theme-color" media="(prefers-color-scheme: dark)" content="#1f1f1f">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/css/managers.css?=0.007">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v6.4.2/css/all.css" crossorigin="anonymous" SameSite="none Secure">
    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="shortcut icon" href="/favicon/favicon.ico?=0.4">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg?=0.3" color="#37003c">
</head>
<body>
    <div class="loadWrapper">
        <div class="loading">
            <span class="loading__anim"></span>
        </div>
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
    $.ajax({
        url: "managersPage.php"
    }).done(function(data) { // data what is sent back by the php page
        $('.update_area').html(data); // display data
        $(".loadWrapper").hide();
        $(".update_area").show();
    });
</script>
</html>