<?php
include './includes/header2.php';
include './includes/navigation2.php';

?>






<body>

<div class="container">
	<?php
		if(isset($_GET['errorbook'])){
//			print("<p class='h2 m-3 text-center'>Please first return the book you have</p>");
            echo "<script type='text/javascript'>alert(`please return the book you have`);
            
            </script>";
		}
	?>
</div>


