    function reload() {
        $.get("../reload.php");
		alert("Server has been reloaded.");
        return false;
    }
	
    function sendMsg() {
        $.get("../sendMsg.php");
		alert("Sent Message.");
        return false;
    }