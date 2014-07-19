<?php
include('config.php');

$command = $_POST['command'];

$action = $api->call("runConsoleCommand",array($command);
?>