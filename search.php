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
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header mt-2">
                            All Books
                            
                        </h1>
                        <div class="row">

                            <?php
                                $page_count = 12;

                                if(isset($_POST['search1'])){
                                    $search = mysqli_real_escape_string($con,$_POST['search']);
                            



                                
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

                                // doing the pagination thing
                                $bookSqlcount = "SELECT * from books WHERE book_title = '{$search}'";
                                $query = mysqli_query($con,$bookSqlcount);
                                $count = mysqli_num_rows($query);

                                $count1 = ceil($count/$page_count);
                                


                                $bookSql = "SELECT * from books WHERE book_title = '{$search}' LIMIT $page_1,$page_count";
                                $queryBook = mysqli_query($con,$bookSql);
                                $count = mysqli_num_rows($queryBook);
                              

                                while($rows = mysqli_fetch_assoc($queryBook)){
                                    $book_id = $rows['book_id'];
                                    $title = $rows['book_title'];
                                    $author = $rows['book_author'];
                                    $preview = substr($rows['book_preview'],0,50);
                                    $image = $rows['book_image'];
                                    $date = $rows['book_doe'];
                                    $views = $rows['book_views'];
                                    $rating = $rows['book_rating'];
                                    ?>

                                    <div class="col-md-3">
                                        <div class="card border-dark mb-3" style="width: auto; margin-bottom: 10px;background: #bcb418;border-radius: 5px;">
                                            <img width="100%" height="150px" class="card-img-top" src="./img/<?php echo $image;?>" alt="book pic">
                                            <div class="card-body" style="padding: 5px 5px 5px 12px;">
                                                <h5 class="card-title h3"><?php echo $title;?></h5>
                                                <p class="card-text">
                                                    <div class="h5">BY <strong><?php echo $author;?></strong></div>
                                                    <div class="h6"><i class="glyphicon glyphicon-time"></i> <strong><?php echo $date;?></strong></div>
                                                 <div class="lead">
                                                        <?php echo $preview;?>
                                                 </div>
                                                </p>
                                                <a href="book_read.php?book_id=<?php echo $book_id;?>" class="btn btn-info">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 

                                }
                            }

                            ?>

                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <ul class="pager">
           <?php
           $i=1;
            while($i <= $count1){
                if($i == $page){
                    echo "<li><a  class='active_link' href='libray.php?page={$i}'>{$i}</a></li>";
                } else {
                    echo "<li><a href='libray.php?page={$i}'>{$i}</a></li>";
                }
                $i++;
            }
           ?>
        </ul>


    </div>
    <!-- /#wrapper -->
<?php
include './includes/footer.php';

?>
