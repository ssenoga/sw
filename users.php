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
                            Welcome to the users page
                            <small><?php echo $_SESSION['name'];?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-image"></i>  <a href="users.php">All Users</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-image"></i> showing all users
                            </li>
                        </ol>
                        <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Pending Order</th>
                                <th>Books Taken</th>
                            </tr>
                                <?php
                                    $sql = "SELECT * FROM users";
                                    $query = mysqli_query($con,$sql);

                                    while($row = mysqli_fetch_assoc($query)){
                                        $id = $row['u_id'];
                                        $name = $row['u_name'];
                                        $email = $row['u_email'];
                                        $role = $row['u_role'];
                                        $order = $row['pending_order'];
                                        $books = $row['books_taken'];
                                        echo "<tr>";
                                        echo "<td>".$id."</td>";
                                        echo "<td>".$name."</td>";
                                        echo "<td>".$email."</td>";
                                        echo "<td>".$role."</td>";
                                        echo "<td>".$order."</td>";
                                        echo "<td>".$books."</td>";
                                        // echo `<td> ${book} </td>`;
                                        ?>
                                        <td><a href="pages/update_user.php?update=<?php echo $id;?>" class="btn btn-success">Update</a></td>
                                        <td><a href="pages/add_users.php?remove=<?php echo $id;?>" class="btn btn-danger">Remove</a></td>
                                        <td><a href="pages/add_users.php?preview=<?php echo $id;?>" class="btn btn-info">Preview</a></td>
                                        <?php

                                        echo "</tr>";
                                    }
                                ?>
                        </table>
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
include './includes/footer.php';

?>
