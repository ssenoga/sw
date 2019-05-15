<?php
include '../includes/connect.php';


if(isset($_POST['user_submit'])) {
	$firstName = $_POST['user_fname'];
	$lastName = $_POST['user_lname'];
	$username = $_POST['username'];
	$email = $_POST['user_email'];
	$address = $_POST['user_address'];
	$telephone = $_POST['user_telephone'];
	$age = $_POST['user_age'];
	$password = $_POST['user_password'];


	if(empty($firstName) || empty($lastName) || empty($username) || empty($email) || empty($address) || empty($telephone) || empty($age) || empty($password)) {
		echo "all fields must be filled";
		return false;
	}
	$userSQL = "INSERT INTO users(first_name,last_name,u_name,u_email,adress,telephone,age,u_pass) VALUES('{$firstName}','{$lastName}','{$username}','{$email}','{$address}','{$telephone}','{$age}','{$password}')";
	$useryQUERY = mysqli_query($con,$userSQL);
	if(!$useryQUERY){
		echo "Failed to regester new user".mysqli_error($con);
	} else {
		return header('Location: ../users.php');
	}
}

// deleting user

if(isset($_GET['remove'])) {
	$deleteId = $_GET['remove'];

	$removeSQL = "DELETE FROM users WHERE users.u_id = {$deleteId}";
	$removeQUERY = mysqli_query($con,$removeSQL);
	if(!$removeQUERY){
		echo "Failed To Delete The User".mysqli_error($con);
		return false;
	} else {
		return header('Location: ../users.php');
	}
}

// updating users

if(isset($_GET['id'])){
	$id = $_GET['id'];
}


if(isset($_POST['user_update'])) {
	
	$firstName = $_POST['user_fname'];
	$lastName = $_POST['user_lname'];
	$username = $_POST['username'];
	$email = $_POST['user_email'];
	$address = $_POST['user_address'];
	$telephone = $_POST['user_telephone'];
	$age = $_POST['user_age'];
	$password = $_POST['user_password'];


	$updateSQL = "UPDATE users SET first_name = '{$firstName}',last_name='{$lastName}',u_name='{$username}',u_email = '{$email}',adress = '{$address}', telephone = '{$telephone}',age = '{$age}'   WHERE u_id = {$id}";

	$updateQUERY = mysqli_query($con,$updateSQL);
	if(!$updateQUERY){
		echo "Failed to update user".mysqli_error($con);
		return false;
	} else {
		header('Location: ../users.php');
	}
}






















