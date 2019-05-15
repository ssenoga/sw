<?php
include './includes/header2.php';

?>

<?php

if(isset($_POST['register'])){
	$first_name = mysqli_real_escape_string($con,$_POST['fname']);
	$last_name = mysqli_real_escape_string($con,$_POST['lname']);
	$username = mysqli_real_escape_string($con,$_POST['username']);
	$password = mysqli_real_escape_string($con,$_POST['password']);
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$adress = mysqli_real_escape_string($con,$_POST['adress']);
	$age = mysqli_real_escape_string($con,$_POST['age']);
	$telephone = mysqli_real_escape_string($_POST['telephone']);

	if(empty($username) || empty($password) || empty($first_name) || empty($last_name) || empty($email) || empty($adress) || empty($age) || empty($telephone)){
		echo "All fields must be filled ";
		return false;
	}
	$block = "SELECT * FROM users";
	$qu = mysqli_query($con,$block);
	while($row = mysqli_fetch_assoc($qu)){
		$userName = $row['u_name'];
		if($userName == '{$username}'){
			echo "Username Already Taken";
			return false;
		}
	}
	$registerSql = "INSERT INTO users(first_name,last_name,u_name,u_pass,u_email,adress,age,telephone) VALUES('{$first_name}','{$last_name}','{$username}','$password','{$email}','{$adress}',{$age},'{$telephone}')";
	$registerQuery = mysqli_query($con,$registerSql);

	if(!$registerQuery){
		echo "failed to register ".mysqli_error($con);
		return false;
	}

	$login_sql = "SELECT * FROM users WHERE u_name ='{$username}' AND u_pass = '{$password}'";
	$login_query = mysqli_query($con,$login_sql);

	if(mysqli_num_rows($login_query)>0){
		while($rows = mysqli_fetch_assoc($login_query)){
			$_SESSION['name'] = $rows['u_name'];
			$_SESSION['role'] = $rows['u_role'];
			$_SESSION['id'] = $rows['u_id'];
			return header('Location: home.php');
		}
	}
}

?>

<div class="container">
	<h1 class="text-center text-capitalize">Welcome to our registration form</h1>
	<div class="row">
		<div id="register">
			<form method="post">
		 <table style="width: 100%;" >
			<tr style="margin-bottom: 10px;">
				<div class="form-group form-inline">
				<td>
					<label>First Name</label>	
				</td>
				<td>
					<input type="text" name="fname" class="form-control ">
				</td>
				</div>
			</tr>
			<tr>
				<div class="form-group form-inline">
					<td>
						<label>Last Name</label>
					</td>
					<td>
						<input type="text" name="lname" class="form-control">
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group form-inline">
					<td>
					<label for="username">Username</label>	
					</td>
					<td>
						<input type="text" name="username" id="username" class="form-control">
					</td>
				</div>
			</tr>
			<tr>
				<div class="form-group form-inline">
					<td>
						<label>Email</label>
					</td>
					<td>
						<input type="email" name="email" class="form-control">
					</td>
				</div>
			</tr>
			<tr>
				<div class="form-group form-inline">
					<td><label>Address</label></td>
					<td><input type="text" name="adress" class="form-control"></td>
				</div>	
			</tr>
			<tr>
				<div class="form-group form-inline">
					<td><label>Age</label></td>
					<td><input type="number" name="age" class="form-control"></td>
				</div>
			</tr>
			<tr>
				<div class="form-group form-inline">
					<td><label>Telephone</label></td>
					<td><input type="tel" name="telephone" class="form-control"></td>
				</div>
			</tr>
			<tr>
				<div class="form-group form-inline">
					<td><label for="password">Password</label></td>
					<td><input type="Password" name="password" id="password" class="form-control"></td>
				</div>
			</tr>

		</table>
		<div class="form-group text-center">
			<input type="submit" name="register" id="submit" class="btn btn-primary" value="Register">
		</div>
	</form>
	
	</div>
	<div class="lead text-center p-3">
		Already Have an account? <a href="index.php" class="btn btn-warning">Log In</a>
	</div>
</div>




<?php
include './includes/footer.php';

?>


