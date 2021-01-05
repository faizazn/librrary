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
				<?php include "include/sidebar.php";?><br>
				<h3 class="text">Welcome <?php echo $_SESSION["name"]; ?></h3><br><hr><br>
				<div class="content1">
					
						<h3 > Add Book Details</h3><br>
					<?php
                    $targetDir="uploads/";
                    $fileName = basename($_FILES['file']['name']);
                    $targetFilePath = $targetDir . $fileName;
                    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
						if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"]))
						{
                            $title=mysqli_escape_string($db,$_POST['name']);
                            $keywords=mysqli_escape_string($db,$_POST['key']);
                           // Allow certain file formats
							$allowTypes = array('jpg','png','jpeg','gif','pdf');
							if(in_array($fileType, $allowTypes)){
								// Upload file to server
								if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
									// Insert image file name into database
									$insert = $db->query("INSERT into books (title,keywords,file_name) VALUES ('".$title."','".$keywords."','".$fileName."')");
									if($insert){
										echo "<div class='success'>Insert Success..</div>";
									}else{
										echo "<div class='error'>Insert failed, please try again</div>";
										
									} 
								}else{
									echo "<div class='error'>Sorry, there was an error uploading your file.</div>";
								}
							}else{
								echo "<div class='error'>Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.</div>";
							}
							
						}
					
					?>
						
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" enctype="multipart/form-data">
                <label>Book Name</label><br>
				    <input type="text" name="name" required class="input"><br>
                    <label>Book Keyword</label><br>
						   <input type="text" name="key" required class="input"><br>
                           <label>Select File</label><br><br>
					<input type="file" name="file"><br>
					<button type="submit" class="btn" name="submit">Add Book Details</button>
				</form>
				
				
				</div>
				
				
				
			</div>
	
				<?php include "include/footer.php";?>
	</body>
</html>