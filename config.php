<?php
$server = "localhost";
$username  = "root";
$password = "Vennimuthu1992";
$name = "form_validation";
$con_DB = mysqli_connect($server, $username, $password, $name);
if(!$con_DB){
	die("ERROR: Could not connect".mysqli_connect_error());
}
?>