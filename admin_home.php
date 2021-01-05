<?php
	include ('database/config.php');
	session_start();
	if(!isset($_SESSION["Aid"]))
	{
		echo"<script>window.open('home.php?mes=Access Denied..','_self');</script>";
		
    }	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Tutor Joe's</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
	
		<?php include "include/navbar.php";?><br>
		
		
		<img src="img/bibl.jpg" style="margin-left:90px;" style="height:800px;" class="sha">
			
			<div id="section">
			
				<?php include "include/sidebar.php";?><br>
				
				<div class="content">
					<h3 class="text">Welcome <?php echo $_SESSION["name"]; ?></h3><br><hr><br>
						<h3 > School Information</h3><br>
					<img src="img/home.jpg" class="imgs">
					<p class="para">
						School Management System is a is a complete school management software designed to automate a school's diverse operations from classes, exams to school events calendar. 
					</p>
					
					<p class="para">
						This school software has a powerful online community to bring parents, teachers and students on a common interactive platform. It is a paperless office automation solution for today's modern schools. The School Management System provides the facility to carry out all day to day activities of the school.
					</p>
				</div>
			</div>
	
		<?php include "include/footer.php";?>
	</body>
</html>