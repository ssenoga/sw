<?php
include '../includes/connect.php';
session_start();
if(isset($_GET['log'])){
	$logout = $_GET['log'];
	session_destroy();
 	return header('Location: ../index.php');
	 

}