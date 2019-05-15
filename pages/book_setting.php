<?php

include '../includes/connect.php';
include './navigation3.php';

$userId = $_SESSION['id'];
// return the book

if(isset($_GET['user_returning'])){
	$userName = $_GET['user_returning'];
	$checkbookstaken = "SELECT * FROM users WHERE u_name ='{$userName}'";
	$checkQuery = mysqli_query($con,$checkbookstaken);
	$results = mysqli_fetch_assoc($checkQuery);
	$results = $results['books_taken'];
	if($results > 0 ){
		// update the book store
		$bookSQL = "SELECT * FROM books WHERE user_id = {$userId}";
		$bookQuery = mysqli_query($con,$bookSQL);
		?>
		<table class="table table-bordered">
			<tr>
				<th>Book Title</th>
				<th>Book Taken On</th>
			</tr>
			<?php
		while($res = mysqli_fetch_assoc($bookQuery)){
			$title = $res['book_title'];
			$date = $res['return_date'];
			$bookId = $res['book_id'];
			?>
			
				<tr>
					<td><?php echo $title;?></td>
					<td><?php echo $date;?></td>
					<td><a href="book_setting.php?return=<?php echo $bookId;?>" class='btn btn-warning'>Return Book</a></td>
				</tr>
			<?php
		}
		?>
		</table>
		<?php
	} else {
		// screem that the user has no book taken
		$ub0 = "UPDATE books SET books.user_id = 0 WHERE books.user_id = '{$userId}'";
		$ru = mysqli_query($con,$ub0);
		if(!$ru){
			echo "failed";
		} else{
			echo "<h1 class='h1'>You have no book to return</h1>";
		}
	}
}


if(isset($_POST['getting'])){
	$bookId = $_GET['book_id'];
	$userId = $_SESSION['id'];
	$checkbookstaken = "SELECT * FROM users WHERE u_id ='{$userId}'";
	$checkQuery = mysqli_query($con,$checkbookstaken);
	$results = mysqli_fetch_assoc($checkQuery);
	$results = $results['books_taken'];
	if($results > 0 ){
		echo "<script type='text/javascript'>alert(`Please Return The Book You Have`);
		window.location = '../libray.php';</script>";
	} else {
		$updateBooks = "UPDATE books SET books.Available = '0' WHERE book_id = $bookId";
		$updateQuery = mysqli_query($con,$updateBooks);
		if(!$updateQuery){
			$error = "Please first return the book you have";
			return header('Location: ../error.php?error =$error');
		} else {
			$updateuser = "UPDATE users SET users.books_taken = '1' WHERE u_id = $userId";
			$u_Query = mysqli_query($con,$updateuser);
			if(!$u_Query){
				echo "Failed";
			} else {
				// set the user id into the books table
				$ub = "UPDATE books SET books.user_id = '{$userId}' WHERE book_id = '{$bookId}'";
				$r = mysqli_query($con,$ub);
				if(!$r){
					echo "Failed to update boo user";
				} else {
					echo "<script type='text/javascript'>alert(`Please ensure that you return the book soon THANK YOU!!!`);
					window.location = '../libray.php';</script>";
				}
			}
			// return header('Location: ../libray.php');
		}
	}

	
	
}


// cancelling
if(isset($_POST['cancelling'])){
	return header('Location: ../libray.php');
}


// finally book return

if(isset($_GET['return'])){
	$bID = $_GET['return'];
	$retu = "UPDATE users SET books_taken = 0 WHERE u_id = '$userId'";
	$q = mysqli_query($con,$retu);
	if(!$q){
		echo "failed to update user".mysqli_error($con);
	} else {
		echo "<script type='text/javascript'>alert(`Thank You For Returning The book`);
		window.location = '../libray.php';

		</script>";
	}
}