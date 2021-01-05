<?php
	include('database/config.php');
	session_start();
	if(!isset($_SESSION["Aid"]))
	{
		echo"<script>window.open('home.php?mes=Access Denied...','_self');</script>";
		
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
		<?php include"include/navbar.php";?><br>
        <img src="img/1.jpg" style="margin-left:90px;" class="sha">
			<div id="section">
				<?php include"include/sidebar.php";?><br>
					<h3 class="text">Welcome <?php echo $_SESSION["name"]; ?></h3><br><hr><br>
				<div class="content">
				
					<br><br>
					<div class="Output">
					<form action="view_books.php" method="post">
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
                    <th>Title</th>
                    <th>Keywords</th>
                    <th>File</th>
					
					<th>Delete</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['Bid'];?></td>
                    <td><?php echo $row['title'];?></td>
                    <td><?php echo $row['keywords'];?></td>
					<?php $imageURL = 'uploads/'.$row["file_name"]; ?>
					<td><embed src=$imageURL type='application/pdf' width='50%' height='100px'/></td>
					
					<td><a href="book_delete.php?id=$row['Bid']" class='btnr'>Delete</a></td>
                    
                </tr>
                <?php endwhile;?>
            </table>
        </form>
					</div>
				</div>
			</div>
	
				<?php include"include/footer.php";?>
	</body>
</html>