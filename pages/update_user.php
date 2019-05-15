<?php
include './header3.php';


if(isset($_GET['update'])) {
    $id = $_GET['update'];
}

?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php
            include '../includes/navigation.php';
        ?>
        <!-- endNavigation -->

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To The User Panel
                            <small><?php echo $_SESSION['name'];?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="users.php">Users</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Updating user
                            </li>
                        </ol>
                        <div class="row">
                            <div class="col-lg-12">

                                    <?php

                                        $sql = "SELECT * FROM users WHERE u_id = {$id}";
                                        $query = mysqli_query($con,$sql);
                                        while($rows = mysqli_fetch_assoc($query)){
                                            $fname = $rows['first_name'];
                                            $lname = $rows['last_name'];
                                            $username = $rows['u_name'];
                                            $email = $rows['u_email'];
                                            $address = $rows['adress'];
                                            $telepone = $rows['telephone'];
                                            $age = $rows['age'];

                                            ?>

                                             <form method="POST" action="./add_users.php?id=<?php echo $id;?>">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" name="user_fname" class="form-control" value="<?php echo $fname;?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="user_lname" class="form-control" value="<?php echo $lname;?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control" value="<?php echo $username;?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="user_email" class="form-control" value="<?php echo $email;?>">
                                    </div>
                                     <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="user_address" class="form-control" value="<?php echo $address;?>">
                                    </div>
                                     <div class="form-group">
                                        <label>Telephone</label>
                                        <input type="tel" name="user_telephone" class="form-control" value="<?php echo $telepone;?>">
                                    </div>
                                     <div class="form-group">
                                        <label>Age</label>
                                        <input type="number" name="user_age" class="form-control" value="<?php echo $age;?>">
                                    </div>
                                     <div class="form-group">
                                        <input type="submit" name="user_update" class="btn btn-success" value="Update">
                                    </div>
                                </form>


                                        <?php
                                        }

                                    ?>

                               
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
include '../includes/footer.php';

?>
