<?php 
	include ('database/config.php');
	
	$sql="SELECT * FROM books WHERE title LIKE '{$_POST["s"]}%' ";
	$res=$db->query($sql);
		echo "<table border='1px' class='table'>
				<tr>
					<th>Id</th>
					<th>Title</th>
					<th>File</th>
					<th>View</th>
					<th>Delete</th>
				</tr>
				";
	if($res->num_rows>0)
		
	{
		$i=0;
		while($row=$res->fetch_assoc())
		{
            $imageURL = 'uploads/'.$row["file_name"];
			$i++;
			echo "<tr>
				<td>{$i}</td>
				<td>{$row["title"]}</td>
                <td><embed src=$imageURL type='application/pdf' width='50%' height='100px'/></td>
				<td><a href='staff_view.php?id={$row["Bid"]}' class='btnb'>View</a></td>
				<td><a href='staff_delete.php?id={$row["Bid"]}' class='btnr'>Delete</a></td>
				</tr>
			";
		}
				echo "</table>";
	}
		
	else
	{
		echo "<p>No Record Found</p>";
	}
	
?>