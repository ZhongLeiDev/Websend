<?php
if(isset($_POST["flag"])){
$remoteIP = $_SERVER["REMOTE_ADDR"];
//$serverIP = $_SERVER["SERVER_NAME"];
//echo 'remoteIP：',$remoteIP,";serverIP:",$serverIP;
echo $remoteIP;
}
?>