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
                                <i class="fa fa-file"></i> Add New book
                            </li>
                        </ol>

                        <div class="row">
                            <div class="col-lg-12">
                                <form method="POST" action="pages/add_books.php">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" name="category">
                                            <option>Choose category ..</option>
                                            <option value="IT">IT</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="book_title" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Author</label>
                                        <input type="text" name="book_author" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Book Preview</label>
                                        <input type="text" name="book_preview" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Book Image</label>
                                        <input type="file" name="book_image" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="book_submit" class="btn btn-success" value="Add Book">
                                    </div>
                                </form>
                            </div>  
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
