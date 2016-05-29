<?php

class databaseConnection { // Define Hostname, Username, Password and database
	
	private $hn = "localhost";
	private $un = "root";
	private $ps = "";
	private $db = "ucsdb";
	
	public function connect() { // Connect to database
		$conn = @mysqli_connect($this->hn,$this->un,$this->ps,$this->db);
		
		if (!$conn) {
			die("<div class=\"callout callout-danger\"><h3>Aww, Snap</h3><p>Something happend in our side. COULDN'T CONNECT TO DATABASE</p></div>");// If connection fails just kill the script
		} else {
			$this->databaseConnection = $conn; // If connection succeeds define it
		}
		
		return $this->databaseConnection;
	}
	
	public function queryDB($sql) { // Get the SQL query and return it
		return @mysqli_query($this->databaseConnection,$sql);
	}
	
	public function disconnect() { // Kill the database connection
		@mysqli_close($this->databaseConnection);
	}
	
	public function errors() { // Display any errors (Only use when developing)
		return mysqli_error($this->databaseConnection);
	}
}
?>
<?php
$dbc = new databaseConnection();
$dbc->connect();

if (empty ($_GET["page"])) {
	$currentPage = 0;
	$currentPageLimit = 0;
} else {
	if (!is_numeric($_GET["page"])) {
		$currentPage = 0;
		$currentPageLimit = 0;
	} else {
		$currentPage = strip_tags($_GET["page"]);
		$currentPageLimit = $content_limit*$currentPage;
	}
}
if (empty($_GET["sortBy"])) {
	$sql = "SELECT * FROM player LIMIT $currentPageLimit,".$content_limit;
} else {
	$sortBy = htmlentities($_GET["sortBy"]);
	switch ($sortBy) {
		case "id_asc":
			$sql = "SELECT * FROM player ORDER BY `PlayerId` ASC LIMIT $currentPageLimit,".$content_limit;
			break;
		case "id_desc":
			$sql = "SELECT * FROM player ORDER BY `PlayerId` DESC LIMIT $currentPageLimit,".$content_limit;
			break;
		case "pl_asc":
			$sql = "SELECT * FROM player ORDER BY `AccountPrivileges` ASC LIMIT $currentPageLimit,".$content_limit;
			break;
		case "pl_desc":
			$sql = "SELECT * FROM player ORDER BY `AccountPrivileges` DESC LIMIT $currentPageLimit,".$content_limit;
			break;
		case "ut_asc":
			$sql = "SELECT * FROM player ORDER BY `LastUpdateTime` ASC LIMIT $currentPageLimit,".$content_limit;
			break;
		case "ut_desc":
			$sql = "SELECT * FROM player ORDER BY `LastUpdateTime` DESC LIMIT $currentPageLimit,".$content_limit;
			break;
		case "ip_asc";
		    $sql = "SELECT * FROM player ORDER BY 'IPAddress' ASC LIMIT $currentPageLimit,".$content_limit;
		    break;
		case "ip_desc";
		    $sql = "SELECT * FROM player ORDER BY 'IPAddress' DESC LIMIT $currentPageLimit,".$content_limit; 
		    break;
		default:
			$sql = "SELECT * FROM player LIMIT $currentPageLimit,".$content_limit;
			break;
	}
}
?>