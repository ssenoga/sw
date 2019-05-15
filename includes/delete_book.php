<?php
include 'connect.php';
if(isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    $sql_delete = "DELETE FROM books WHERE books.book_id ={$delete_id}";
    $query = mysqli_query($con,$sql_delete);
    if(!$query){
        echo "failed to delete";
    }else {
        echo "<script type='text/javascript'>
        alert('You Have deleted the book');
        window.location = '../books.php';
        
        
        </script>";
    }
}

if(isset($_POST['book_update'])){
    $category = $_POST['category'];
    $title = $_POST['book_title'];
    $author = $_POST['book_author'];
    $preview = $_POST['book_preview'];
    $image = $_POST['book_image'];

    // if(empty($category) || empty($title) || empty($author) || empty($preview) || empty($image)) {
    //     echo "All fields must be filled";
    //     return false;
    // }

    $bookSql = "UPDATE books SET category = '{$category}',book_title= '{$title}',book_author='{$author}',book_preview='{$preview}',book_image='{$image}' WHERE book_id = '{$delete_id}'";
    $bookQUERY = mysqli_query($con,$bookSql);
    if(!$bookQUERY){
        echo "Failed to add new book";
    } else {
        echo "<script type='text/javascript'>
            alert('Book Has Been Updated');
            window.location = '../books.php';
        </script>";
    }
}

if(isset($_GET['preview'])){
    $id = $_GET['preview'];
    return header("Location: ../book_read.php?book_id=$id");
}

?>