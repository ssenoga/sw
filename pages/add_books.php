<?php

include '../includes/connect.php';

if(isset($_POST['book_submit'])) {
	$category = $_POST['category'];
	$title = $_POST['book_title'];
	$author = $_POST['book_author'];
	$preview = $_POST['book_preview'];
	$image = $_POST['book_image'];

	if(empty($category) || empty($title) || empty($author) || empty($preview) || empty($image)) {
		echo "All fields must be filled";
		return false;
	}

	$bookSql = "INSERT INTO books(category,book_title, book_author,book_preview,book_image) VALUES('{$category}','{$title}','{$author}','{$preview}','{$image}')";
	$bookQUERY = mysqli_query($con,$bookSql);
	if(!$bookQUERY){
		echo "Failed to add new book";
	} else {
		return header('Location: ../books.php');
	}
}