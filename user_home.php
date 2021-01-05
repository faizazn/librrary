<?php
	include('database/config.php');
	session_start();
	if(!isset($_SESSION["Uid"]))
	{
		echo"<script>window.open('user_login.php?mes=Access Denied...','_self');</script>";
		
	}	
	
	
	$sql="SELECT * FROM users WHERE Uid={$_SESSION["Uid"]}";
		$res=$db->query($sql);

		if($res->num_rows>0)
		{
			$row=$res->fetch_assoc();
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
		<img src="img/1.jpg" style="margin-left:90px;" class="sha">
			<div id="section">
				<?php include "include/sidebar.php";?><br>
					<h3 class="text">Welcome <?php echo $_SESSION["nom"]; ?></h3><br><hr><br>
				<div class="content">
					<div class="rbox1">
					<h3> Profile</h3><br>
						<table border="1px">
							<tr><th>Name </th> <td><?php echo $row["nom"] ?> </td></tr>
							<tr><th>Father Name </th> <td><?php echo $row["prenom"] ?>  </td></tr>
							<tr><th>Password </th> <td> <?php echo $row["password"] ?>  </td></tr>
							<tr><th>Email </th> <td> <?php echo $row["email"] ?> </td></tr>
						</table>
					</div>
				</div>
			</div>
	
				<?php include"include/footer.php";?>
	</body>
</html>