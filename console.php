<?php
include('inc/config.php');
error_reporting(0);
?>
<meta http-equiv="refresh" content="10; URL=console.php">
<head>
<title>Minedmin - <?php print $version; ?> </title>
<link href="//pastebin.com/cache/css/text.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<!-- Header !-->
    <center>
	<img src='logov1.png'>
	<hr>
    <h1>Console.[WIP]</h1>
	<div id="code_frame">
    <div id="selectable"><div class="text"><ol><div class="de1">
	<hr><br><?php
	$msg = 100; // on définit le nombre de message
    $console = $api->call("getLatestConsoleLogsWithLimit", array($msg)); // on récupère les messages (de la console)
    $console = $console["0"]["success"];
    #$console = array_reverse($console); // on inverse l'ordre
	$date = date("Y-m-d"); // on récupère la date du jour dans la variable $date
	foreach ($console as $value) { // on affiche les messages de la console
	$console = $value["line"];
	$console = str_replace($date, '', $console); //on replace la date dans chaque message de la console par.. rien. On les supprime en fait 
	$msg_prefix = array("[INFO]", "[WARNING]", "[SEVERE]");
	$color_prefix = array('<span style="color: blue;">[INFO]</span>', '<span style="color: orange;">[WARNING]</span>', '<span style="color: red;">[SEVERE]</span>');
	$console = str_replace($msg_prefix, $color_prefix, $console); // ces 3 lignes permettent d'afficher [INFO], [WARNING] et [SEVERE] en bleu, orange et rouge.
	echo '<br>';
	echo $console; // on affiche le message
	echo '';
	}
	
	if (!$console){
	@print('<br>ERROR: Unable to fetch the console... Server is unreachable..');
	}
	?><br><br><br><hr>
	</div></div></div>
	<br><br><input type="text" value="command" name="command"></input>
    <button href="#" name="command" onclick="console();">Send Command.</button><br><br><a href="/">Back to dashboard.</a><br><br><hr>
	<p>*Console refreshes every 10 seconds</p>
	</h1>
	
    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript">
    function console() {
        $.get("inc/sendCommand.php");
		alert("Command Sent!");
        return false;
    }
    </script>
    
	<!-- Footer !-->
	<p>(C) 2014 JeanMich02 Software - Version: <?php print $version; ?> </p>

 </center>
 </body>
</html>