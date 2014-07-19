<?PHP 
if (file_exists('inc/config.php')) {
 header("Location: /");
} else {

if(isset($_POST['submit'])){
$filename = "inc/config.php"; #Must CHMOD to 666 
$ipp = $_POST['ip']; # Form must use POST. if it uses GET, use the line below: 
$usrr = $_POST['user']; # Form must use POST. if it uses GET, use the line below: 
$pwdd = $_POST['pass']; # Form must use POST. if it uses GET, use the line below: 
$portt = $_POST['port']; # Form must use POST. if it uses GET, use the line below: 
$text = '<?php ////////////////////////////Config File for Minedmin include("meth.php"); $version = "0.0.3 - Alpha";  $ip  = '. $ipp .' ; $port        = '.  $portt .'; $user        = '. $usrr  .'; $pwd        = '. $pwdd .'; $salt        = "salt"; $api        = new JSONAPI($ip, $port, $user, $pwd, $salt);';

$fp = fopen ($filename, "w"); # w = write to the file only, create file if it does not exist, discard existing contents 
if ($fp) { 
    fwrite ($fp, $text); 
    fclose ($fp); 
    echo ("GENERATED.");
    header("Location: /");
} 
else { 
    echo ("Config: ERROR!"); 
} 
}
}

?>
<head>
<title>Minedmin - Install </title>
</head>
<body>
	<!-- Header !-->
    <center>
	<img src='logov1.png'>
	<hr>
    <h1>Install</h1>
	<p>IP</p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<input name="ip" size="20"></input>
	<p>Username</p>
	<input name="user" size="20"></input>
	<p>Password</p>
	<input name="pass" size="20"></input>
	<p>Port</p>
	<input name="port" size="20"></input>
	<br><br><br><input type="submit" name="submit" value="Install">
	</form>
	<hr>
    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    
	<!-- Footer !-->
	<p>(C) 2014 JeanMich02 Software </p>

 </center>
 </body>
</html>