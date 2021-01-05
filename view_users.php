<?php
	include ('database/config.php');
	session_start();
	if(!isset($_SESSION["Aid"]))
	{
		echo"<script>window.open('home.php?mes=Access Denied...','_self');</script>";
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
					<?php include "include/sidebar.php";?><br><br><br>
					<h3 class="text">Welcome <?php echo $_SESSION["name"]; ?></h3><br><hr><br>
				<div class="content">
						<h3 >View Users Details</h3><br>
						<?php
							if(isset($_GET["mes"]))
								{
									echo"<div class='error'>{$_GET["mes"]}</div>";	
								}
					
						?>
						<table border="1px">
							<tr>
                            <th>Id</th>
							<th>Nom</th>
							<th>Prénom</th>
							<th>Email</th>
							<th>Password</th>
							<th>Delete</th>
							</tr>
							<?php
								$s="select * from users";
								$res=$db->query($s);
								if($res->num_rows>0)
								{
									$i=0;
									while($r=$res->fetch_assoc())
									{
										$i++;
										echo "
										<tr>
										<td>{$i}</td>
										<td>{$r["nom"]}</td>
										<td>{$r["prenom"]}</td>
										<td>{$r["email"]}</td>
										<td>{$r["password"]}</td>
										<td><a href='user_delete.php?id={$r["Uid"]}' class='btnr'>Delete</a></td>
										</tr>
									
										";	
									}
								}
								else
								{
									echo "No Record Found";
								}
							?>
						</table>
				</div>
			</div>
	
				<?php include"include/footer.php";?>
	</body>
</html>