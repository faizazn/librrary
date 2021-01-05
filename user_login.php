<?php
	include ('database/config.php');
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Library Management System - Tutor Joe's</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body class="back">
	
		<?php include "include/navbar.php";?>
		
		<img src="img/b1.jpg" width="800">
		
		<div class="login">
			<h1 class="heading">User's Login</h1>
			<div class="log">
				<?php
					if(isset($_POST["login"]))
					{
						$sql="select * from users where nom='{$_POST["name"]}'and password='{$_POST["pass"]}'";
						$res=$db->query($sql);
						if($res->num_rows>0)
						{
							$ro=$res->fetch_assoc();
							$_SESSION["Uid"]=$ro["Uid"];
							$_SESSION["nom"]=$ro["nom"];
							echo "<script>window.open('user_home.php','_self');</script>";
						}
						else
						{
							echo "<div class='error'>Invalid Name Or Name</div>";
						}
					}
				
				
				
				?>
			
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<label>Name</label><br>
					<input type="text" name="name" required class="input"><br><br>
					<label>Password </label><br>
					<input type="password" name="pass" required class="input"><br>
					<button type="submit" class="btn" name="login">Login Here</button>
				</form>
			</div>
		</div>
		
		
		
		<div class="footer">
			<footer><p>Copyright &copy; Tutor Joe's </p></footer>
		</div>
		
			<script src="js/jquery.js"></script>
		         <script>
		        $(document).ready(function(){
		        	$(".error").fadeTo(1000, 100).slideUp(1000, function(){
		        			$(".error").slideUp(1000);
		        	});
		        	
		        	$(".success").fadeTo(1000, 100).slideUp(1000, function(){
		        			$(".success").slideUp(1000);
		        	});
		        });
			</script>
		
	</body>
</html>