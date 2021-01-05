<?php
	include('database/config.php');
	session_start();
	if(!isset($_SESSION["Uid"]))
	{
		echo"<script>window.open('user_login.php?mes=Access Denied...','_self');</script>";
		
	}	
	if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `books` WHERE keywords LIKE '%".$valueToSearch."%' OR title LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `books`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "library");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
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
					<h3 class="text">Welcome <?php echo $_SESSION["nom"]; ?></h3><br><hr><br>
				<div class="content">
						<h3 >View Cours Details</h3><br>
                        <form action="test.php" method="post">
					<h3>Books Name</h3><br>
			       <input type="text" name="valueToSearch" required class="input"><br>
                   
				   <button type="submit" class="btn" name="search">Search</button><br><br>
						<?php
							if(isset($_GET["mes"]))
								{
									echo"<div class='error'>{$_GET["mes"]}</div>";	
								}
					
						?>
						<table border="1px">
							<tr>
								<th>Id</th>
								<th>Title </th>
								<th>Keywords</th>
								<th>File</th>
								<th>View</th>
							</tr>
							<?php
								$s="select * from books";
								$res=$db->query($s);
								if($res->num_rows>0)
								{
									$i=0;
									while($row = mysqli_fetch_array($search_result))
									{
										$imageURL = 'uploads/'.$row["file_name"];
										$i++;
										echo "
											<tr>
												<td>{$i}</td>
												<td>{$row["title"]}</td>
												<td>{$row["keywords"]}</td>
                                                <td><embed src=$imageURL type='application/pdf' width='50%' height='100px'/></td>
												<td><a href='comments.php?id={$row['Bid']}' class='btnr'>View</a></td>
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
                        </form>
				</div>
			</div>
	
				<?php include"include/footer.php";?>
	</body>
</html>