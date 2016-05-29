<?php 
    require("config/config.php");
    require("process/funcs.php");
    require("process/dbsorting.php");
?>
<?php
if($_SERVER["HTTP_HOST"] == "$domain"){
  return True;
}
else{
  echo "<h2>Website is set to be accessed from {$domain} but is accessed through $_SERVER['HTTP_HOST']</h2>";
  echo "<h4>Go to the config file and change the domian to $_SERVER['HTTP_HOST']</p>";
  die();
}
?>
      