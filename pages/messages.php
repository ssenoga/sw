<?php
include './includes/header2.php';

?>

<?php

if(isset($_POST['submit'])){
	$name = $_POST['username'];
	$password = $_POST['password'];

	if(empty($name) || empty($password)){
		return false;
	}
	$login_sql = "SELECT * FROM users WHERE u_name ='{$name}' AND u_pass = '$password'";
	$login_query = mysqli_query($con,$login_sql);

	if(mysqli_num_rows($login_query)>0){
		while($rows = mysqli_fetch_assoc($login_query)){
			$_SESSION['name'] = $rows['u_name'];
			$_SESSION['role'] = $rows['u_role'];
			// echo $_SESSION['role'];
			return header('Location: home.php');
		}
	}
}

?>


<body>
	<div class="container text-white">
		<h1 class="text-center h1 text-capitalize text-white">welcome to eddie online libary system</h1>

		
		
		
	
	</div>




<?php
include './includes/footer.php';

?>


