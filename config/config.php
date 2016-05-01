<?php
$conf = (object) array(
	"meta" => (object) array(
		"server_ip" => "52.37.128.5", // Game Server' IP
		"server_port" => "9339",// Port to check for the server on
		"debug_port" => "9332", //Debug port to fetch data from API (Will be used Afterwards)
		"Api_Key" => "ucs", //key for the API (Will be used afterwards)
		"server_name" => "Smart Clash - Status",
		"discription" => "Smart Clash is a best in class private server for clash of clans ever made. Now ranks worlds top 7 as of coc servers.com. Please vote us at coc-servers.com",
	)
	);
?>
	
<?php if ($isOnline = @fsockopen($conf->meta->server_ip,$conf->meta->server_port,$errno,$errstr)) {
	  fclose($isOnline);//Establish connection to api if server online
				
		$serverStatus = '<div class="callout callout-success"><h4>Server Online!</h4><p>Server is online, you can start playing with us!</div>';
        $memClans = file_get_contents('http://52.37.128.5:9332/ucs/inmemclans');
        $onPlayers = file_get_contents('http://52.37.128.5:9332/ucs/onlineplayers');
        $players = file_get_contents('http://52.37.128.5:9332/ucs/totalclients');
        $usedram = file_get_contents('http://52.37.128.5:9332/ucs/ram');
        
  } else {//Else display N/A instead if throwing 404 and reuining the page!
			
		$serverStatus = '<div class="callout callout-danger"><h4>Server Offline!</h4><p>Server is Offline, we are working on to fix it! Will start to work soon.</p></div>';
		$memClans = "N/A";
	    $onPlayers = "N/A";
	    $players = "N/A";
	    $usedram = "N/A";
	    
	}
?>
<?php
        $Update =  file_get_contents('https://static.smartclashcoc.com/smartstats/update.txt'); //Don't change this. It checks for update.
?>
