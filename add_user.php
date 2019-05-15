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
                            Add New User
                            <small>Registration form</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="users.php">Users</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Adding new user
                            </li>
                        </ol>
                        <div class="row">
                            <div class="col-lg-12">
                                <form method="POST" action="pages/add_users.php">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" name="user_fname" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="user_lname" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="user_email" class="form-control">
                                    </div>
                                     <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="user_address" class="form-control">
                                    </div>
                                     <div class="form-group">
                                        <label>Telephone</label>
                                        <input type="tel" name="user_telephone" class="form-control">
                                    </div>
                                     <div class="form-group">
                                        <label>Age</label>
                                        <input type="number" name="user_age" class="form-control">
                                    </div>
                                     <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="user_password" class="form-control">
                                    </div>
                                     <div class="form-group">
                                        <input type="submit" name="user_submit" class="btn btn-success" value="Add New User">
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
include './includes/footer.php';

?>
