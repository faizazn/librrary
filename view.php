<?php
include('database/config.php');
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `books` WHERE CONCAT(`title`, `keywords`, `file_name`) LIKE '%".$valueToSearch."%'";
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
    <?php include "include/navbar.php";?>
    <img src="img/b1.jpg" width="800">
        <form action="view.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            
            <table>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Keywords</th>
                    <th>File</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['Bid'];?></td>
                    <td><?php echo $row['title'];?></td>
                    <td><?php echo $row['keywords'];?></td>
                    <td><?php echo $row['file_name'];?></td>
                    
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
</html>
