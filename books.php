<?php
include './includes/header.php';



?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php
            include './includes/navigation.php';
        ?>
        <!-- endNavigation -->

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to book section
                            <small><?php echo $_SESSION['name'];?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-book"></i>  <a href="home.php">Books</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Book Store
                            </li>
                        </ol>
                        <div class="table-responsive">
                        <table class="table table-hover">
                                <tr>
                                    <th>Book Id.</th>
                                    <th>Book Author.</th>
                                    <th>Book Title</th>
                                    <th>Book Preview</th>
                                    <th>Book Image</th>
                                    <th>Book Views</th>
                                    <th>Book Rating</th>
                                    <th>Date of Entry</th>
                                    <th>Available</th> 
                                    <th>Return Date</th>
                                </tr>
                        <?php
                            $page_count = 5;
                            if(isset($_GET['page'])){
                                $page = $_GET['page'];
                            } else {
                                $page = "";
                            }
                            if($page == "" || $page == 1){
                                $page_1 = 0;
                            } else{
                                $page_1 = ($page * $page_count) - $page_count;
                            }

                            $select = "SELECT * FROM books";
                            $query_select = mysqli_query($con,$select);
                            $count = mysqli_num_rows($query_select);
                            $count1 = ceil($count/$page_count);


                            $all_books = "SELECT * FROM books ORDER BY book_id DESC LIMIT $page_1,$page_count";
                            $query_all = mysqli_query($con,$all_books);
                            

                            while($rows = mysqli_fetch_assoc($query_all)){
                                $book_id = $rows['book_id'];
                                $book_author = $rows['book_author'];
                                $book_title = $rows['book_title'];
                                $book_preview = substr($rows['book_preview'],0,50);
                                $book_image = $rows['book_image'];
                                $book_views = $rows['book_views'];
                                $book_rating = $rows['book_rating'];
                                $book_doe = $rows['book_doe'];
                                $book_available = $rows['Available'];
                                $book_return = $rows['return_date']

                                ?>
                                <tr>
                                    <td><?php echo $book_id;?></td>
                                    <td><?php echo $book_author;?></td>
                                    <td><?php echo $book_title;?></td>
                                    <td><?php echo $book_preview;?></td>
                                    <td><img width="100" src="./img/<?php echo $book_image;?>"></td>
                                    <td><?php echo $book_views;?></td>
                                    <td><?php echo $book_rating;?></td>
                                    <td><?php echo $book_doe;?></td>
                                    <td><?php 
                                        if($book_available == 1){
                                            echo "Yes";
                                        } else {
                                            echo "No";
                                        }



                                    ?></td>
                                    <td><?php echo $book_return;?></td>
                                    <td><a href="update-book.php?update=<?php echo $book_id;?>" class="btn btn-success">Update</a></td>
                                    <td><a href="includes/delete_book.php?delete=<?php echo $book_id;?>" class="btn btn-danger">Remove</a></td>
                                    <td><a href="includes/delete_book.php?preview=<?php echo $book_id;?>" class="btn btn-info">Preview</a></td>


                                </tr>

                                <?php

                            }

                        ?>

                    </table>
                    <ul class="pager">
                        <?php
                            $i =1;
                            while($i <= $count1){
                                if($i == $page){
                                    echo "<li><a style='background: #333;' href='books.php?page={$i}'>{$i}</a></li>";
                                } else {
                                    echo "<li><a href='books.php?page={$i}'>{$i}</a></li>";
                                }
                                
                                $i++;
                            }
                            

                        ?>
                        
                    </ul>
                 </div>



                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php



    ?>



<?php
include './includes/footer.php';

?>
