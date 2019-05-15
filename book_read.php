<?php
include './includes/header2.php';

?>





<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php
            include './includes/navigation2.php';
        ?>
        <!-- endNavigation -->

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row mt-2">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            
                        </h1>
                        <div class="row">

                            <?php

                                if(isset($_GET['book_id'])){
                                    $id = $_GET['book_id'];
                                


                                $bookSql = "SELECT * from books WHERE book_id = '{$id}'";
                                $queryBook = mysqli_query($con,$bookSql);
                              

                                while($rows = mysqli_fetch_assoc($queryBook)){
                                    $book_id = $rows['book_id'];
                                    $title = $rows['book_title'];
                                    $author = $rows['book_author'];
                                    $preview = $rows['book_preview'];
                                    $image = $rows['book_image'];
                                    $date = $rows['book_doe'];
                                    $views = $rows['book_views'];
                                    $rating = $rows['book_rating'];
                                    $book_category = $rows['category'];
                                    $available = $rows['Available'];
                                    ?>

                                    <div class="col-md-4">
                                        <div class="card border-dark mb-3" style="width: auto; margin-bottom: 10px;">
                                            <img class="card-img-top img-thumbnail img-responsive" src="./img/<?php echo $image;?>" alt="book pic">
                                            <div class="card-heading h1">
                                                <?php echo $title;?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="h4">Book Information</div>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Book Id</th>
                                                <th>Book Title</th>
                                                <th>Book Author</th>
                                                <th>Book Category</th>
                                                <th>Preview</th>
                                                <th>Views</th>
                                                <th>Rating</th>
                                                <th>Available</th>
                                            </tr>
                                            <tr>
                                                <td><?php echo $id;?></td>
                                                <td><?php echo $title;?></td>
                                                <td><?php echo $author;?></td>
                                                <td><?php echo $book_category;?></td>
                                                <td><?php echo $preview ?></td>
                                                <td><?php echo $views;?></td>
                                                <td><?php echo $rating;?></td>
                                                <td><?php if($available == 1 ){
                                                    echo "Yes";
                                                }else {
                                                    echo "Soon";
                                                }


                                                ?></td>
                                            </tr>
                                        </table>
                                        <form method="post" action="pages/book_setting.php?book_id=<?php echo $id;?>">
                                            <div class="form-group inline-form">
                                                <input type="submit" name="getting" class="btn btn-success" value="Get Book">
                                                <input type="submit" name="cancelling" class="btn btn-warning" value="Cancel">
                                            </div>
                                        </form>
                                    </div>
                                    <hr>

                                    </div>
                                    

                                    <?php 
                                }

                            }

                            ?>

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
include './includes/footer.php';

?>
