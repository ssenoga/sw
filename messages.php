<?php
include './includes/header2.php';

?>

<?php

if($_SESSION['role'] !== 'subscriber'){
    return header('Location: index.php');
}

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
                    <div class="col-lg-12" style="margin-top: 20px;">
                        <h1 class="page-header text-center">
                            Messages
                            <small class="text-right">
                              
                            </small>
                        </h1>
                        <div class="row">
                        	<div class="col-lg-12 text-center">
                        		<div class="chatboard" style="background: white;width: 50%;margin: auto; border-radius: 6px; height: auto;">
                        			<table class="table table-condensed table-hover">
                        				<tr>
                        					<td><img src="img/book1.jpg" style="width: 20px;height: 20px;border-radius: 100%;"><p class="h6">This is my message <span class="small">2019/01/01 12:00:00</span></p></td>
                        				</tr>
                        				<tr>
                        					<td><p>this is my reply</p></td>
                        					<td><img src="img/book2.jpg" style="width: 20px;height: 20px;border-radius: 100%;"></td>

                        				</tr>
                        			</table>

                        			<form >
                        			<div class="form-group form-inline" style="margin-bottom: 10px;">
                        				<input type="text" name="message" placeholder="Enter your message here ..." class="form-control">
                        				<a href="" class="btn btn-success">Send</a>
                        			</div>
                        		</form>
                        			

                        			
                        		</div>
                        		
                        		
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



