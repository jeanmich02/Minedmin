<?php
if (!file_exists('inc/config.php')) {
   print '<center><img src="logov1.png"><hr>';
   header("Location: install.php");
   @die('<h1>Redirecting to install...</h1>');
} else {
   include('inc/config.php');
}

//////////////////////
//Functions
//////////////////////

//Slots
$PlayerLimit = $api->call("getPlayerLimit");

//Count
$PlayerCount = $api->call("getPlayerCount");

//Server Ver
$ServVer = $api->call("getBukkitVersion");

?>
<!--
MINEDMIN <?php print $version; ?>
By JeanMich02
~2014-07-19
!-->
<head>
<title>Minedmin - <?php print $version; ?> </title>
</head>
<body>
	<!-- Header !-->
    <center>
	<img src='logov1.png'>
	<hr>
	
	<!-- Content !-->
	<?php
	if($fp = @fsockopen($ip,$port,$errCode,$errStr,0)){   
    ?>
	<br><h1>Server Information:</h1>
	<h3>Server Name:<br>Dummy</h3>
    <h3>Server Version:<br><?php print($ServVer["0"]["success"]); ?></h3>
    <h3>Slots:<br><?php print($PlayerLimit["0"]["success"]); ?></h3>
    <h3>Players Online:<br><?php print($PlayerCount["0"]["success"]); ?></h3><br>
	<?php
	} else {
	 print '<br><h1>Server Information:</h1>';
     print '<h3>Cant fetch: unable to reach server... <br><h3><br>';
    }
	?>
	<hr>
	<?php
	if($fp = @fsockopen($ip,$port,$errCode,$errStr,0)){   
    ?>
    <button href="#" onclick="reload();">Reload Server</button><br><br><a href="console.php">Live Console</a><br><br><br><hr>
	<?php
	} else {
	print '<p>Server may be off or unavailable..<hr><br><br>';
	}
	?>
	</h1>
	
    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript">
    function reload() {
        $.get("inc/reload.php");
		alert("Server has been reloaded.");
        return false;
    }
    </script>
    
	<!-- Footer !-->
	<p>(C) 2014 JeanMich02 Software - Version: <?php print $version; ?> </p>

 </center>
 </body>
</html>