<?php

$dbserver = 'localhost';
$dbuser = 'root';
$dbpass = '2002';
$dbname = 'sw';


$con = mysqli_connect($dbserver,$dbuser,$dbpass,$dbname);
if(!$con){
	die("Failed to connect to the database ".mysqli_error());
}

?>