<?php
	
	/* Server Information
	__________________________________________________ */
	
	$server_Debug = "9332";
	$server_Port = "9339";
	$server_key = "UCSGL"; 
	
	/* Get's IP
	__________________________________________________ */
	
	$server_Ip = file_get_contents('http://bot.whatismyipaddress.com/');
	
	/* API installation
	__________________________________________________ */
	
	$isOnline = @fsockopen($server_Ip,$server_Port,$errno,$errstr,0.25);

	$serverStatus = ($isOnline ? '<div class="callout callout-success"><h4>Server Online!</h4><p>Server is online, you can start playing with us!</div>' : '<div class="callout callout-danger"><h4>Server Offline!</h4><p>Server is Offline, we are working on to fix it! Will start to work soon.</p></div>');
	$memClans = ($isOnline ? file_get_contents("http://$server_Ip:$server_Debug/$server_key/inmemclans") : "N/A");
	$onPlayers = ($isOnline ? file_get_contents("http://$server_Ip:$server_Debug/$server_key/onlineplayers") : "N/A");
	$players = ($isOnline ? file_get_contents("http://$server_Ip:$server_Debug/$server_key/totalclients") : "N/A");
	$usedram = ($isOnline ? file_get_contents("http://$server_Ip:$server_Debug/$server_key/ram") : "N/A");
	$info = ($isOnline ? '<i class="fa fa-circle text-success"></i> Online' : '<i class="fa fa-circle text-danger"></i> Offline');
	$skin = ($isOnline ? 'skin-green' : 'skin-red');
	
	/* Version Checker
	__________________________________________________ */

    function CheckSmartStatsVersion(){
		include("scriptinfo.php");
		if($script_version > $version) {
			$update_Avail = "<div class=\"callout callout-warning\"><h4>Update Available!</h4><p>Smart Stats has an update. Download it from <a href=\"$script_download\" target=\"_blank\">Here</a></div>";
			echo $update_Avail;
		}
	}
?>
