<?php
$DBName= "user";
$ServerName= "localhost";
$Username= "root";
$Password= "";
error_reporting(1); //or 0 to Hide errors
// $connection Returns (True or False)
$connection = new mysqli($ServerName,$Username,$Password,$DBName);
if($connection->connect_error){
	 die("Connection Error:" .$connection->connect_error) ;
}
/*else{
	echo "Connected Successfully!";
}*/
?>