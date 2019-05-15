<?php
include './includes/header2.php';

?>

<?php

if(isset($_POST['submit'])){
	$name = mysqli_real_escape_string($con,$_POST['username']);
	$password = mysqli_real_escape_string($con,$_POST['password']);

	if(empty($name) || empty($password)){
		return false;
	}
	$login_sql = "SELECT * FROM users WHERE u_name ='{$name}' AND u_pass = '$password'";
	$login_query = mysqli_query($con,$login_sql);

	if(mysqli_num_rows($login_query)>0){
		while($rows = mysqli_fetch_assoc($login_query)){
			$_SESSION['name'] = $rows['u_name'];
			$_SESSION['role'] = $rows['u_role'];
			$_SESSION['id'] = $rows['u_id'];
			// echo $_SESSION['role'];
			return header('Location: home.php');
		}
	}
}

?>


<body>
	<div class="container text-white">
		<h1 class="text-center h1 text-capitalize text-white">welcome to eddie online libary system</h1>

		<div id="login">
			<h2 class="h2 text-center">Sign In Here</h2>
	
			<form method="post"  class="my-5">
				<div class="form-group text-white">
					<label for="username" class="form-label">Username</label>
					<input type="text" name="username" id="username" class="form-control form-inline">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="Password" name="password" id="password" class="form-control form-inline">
				</div>
				<div class="form-group">
					<input type="submit" name="submit" id="submit" class="btn btn-primary " value="Log In">
				</div>
			</form>

		</div>
		
		<p class="text-center h3">OR</p>
		<hr class="divider">
		<p class="text-center">
			<a href="register.php" class="btn btn-success text-center">Sign Up Here</a>
		</p>

	
	</div>




<?php
include './includes/footer.php';

?>


