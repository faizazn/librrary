<?php
	include ('database/config.php');
	session_start();
	if(!isset($_SESSION["Uid"]))
	{
		echo"<script>window.open('user_login.php?mes=Access Denied...','_self');</script>";
		
    }	
    $id=mysqli_escape_string($db,$_GET['id']);
    $query="SELECT * FROM books WHERE Bid='$id'";
    $result=mysqli_query($db,$query);
    $row=$result->fetch_assoc();
?>
<?php
$var=mysqli_escape_string($db,$_SESSION['Uid']);
$quer="SELECT * FROM users WHERE Uid = '$var'";
$res=mysqli_query($db,$quer);
$r=$res->fetch_assoc();
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
				<div class="content1">
					
						<h3 > View Book Details</h3><br>
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" enctype="multipart/form-data">
                <label>Book Name</label><br>
				    <input type="text" name="name" value="<?php echo $row['title']?>" required class="input"><br>
                    <label>Book Keyword</label><br>
						   <input type="text" name="key" value="<?php echo $row['keywords']?>" required class="input"><br>
                           <label>Select File</label><br><br>
						   <?php $imageURL = 'uploads/'.$row["file_name"]; ?>
						   <embed <?php echo $row['file_name']?> />
						   <embed src=$imageURL type='application/pdf' width='50%' height='100px'/>	
				</form>
				<hr>
				<?php
$id=$row['Bid'];
$query="SELECT * FROM comments WHERE book='$id' order by created DESC";
if($result=mysqli_query($db,$query)):
  while($comment=$result->fetch_assoc()):
?>
<div class="media">
<div class="media-left">
<img src="http://lorempixel.com/60/60" alt="" class="media-object mr-2">
</div>
<div class="media-body">
<h5 class="media-heading text-info">
<span><?php echo $comment['name']; ?></span>
<span><?php echo $comment['created']; ?></span>
</h5>
<p class="text-muted">
<?php echo $comment['comment'];?></p>
</div>
</div>
<?php
endwhile;
endif;
if(isset($_SESSION['Uid']) && $_SESSION['Uid']==true):
?>
				<div id="results"></div>
				<form method="post" id="addComment">
               
				    <input type="text" name="name" id="name" read only value="<?php  
                  if(isset($r['nom'])){
                  echo $r['nom'];
                           }
                           ?>"  class="input" read only/><br>
					  <input type="text" name="email" value="<?php  
                  if(isset($r['email'])){
                  echo $r['email'];
                           }
                           ?>"  class="input" read only/><br>
						   <input type="hidden" id="book" placeholder="Email" 
                           value="<?php  
                             echo $id;
                           ?>">
						   <textarea cols="30" rows="5" placeholder="Commentaire" id="comment" name="comment"></textarea><br>
						   <button class="btn btn-raised btn-primary" name="submit" id="submit" type="submit">Valider</button>
				</form>
				<?php
else:
?>
<a href="user_login.php" class="alert alert-info">Connectez vous pour ajouter des commentaires</a>
<?php
endif;
?>
				</div>
				
				
				
			</div>
	
				<?php include "include/footer.php";?>
	</body>
	<?php
    $name=mysqli_escape_string($db,$_POST['name']);
    $email=mysqli_escape_string($db,$_POST['email']);
    $comment=mysqli_escape_string($db,$_POST['comment']);
    $book=mysqli_escape_string($db,$_POST['book']);
    $created=date('Y-m-d H:s:m');
    //if(empty($name)){
       // $errors="<script>alert('Veuillez remplir le champ nom & prénom')</script>"; 
    //}else if(empty($email)){
        //$errors="<script>alert('Veuillez remplir le champ email')</script>";
   // }else if(empty($comment)){
        //$errors="<script>alert('Veuillez remplir le commentaire')</script>";
  //  }
   // if(!empty($errors)){
    
      //  $message= '<div class="alert alert-danger">Une erreur'.$errors.'</div>';
   // }
   // else{
        if(isset($_POST['submit'])){
        $query="INSERT INTO comments (name,email,comment,created,book) VALUES('$name','$email','$comment','$created','$book')";
        if(mysqli_query($db,$query)){
          echo  "<script>alert('Commentaire ajouté')</script>";
        }
        else{
           echo  $message= '<div class="alert alert-danger">Une erreur'.mysqli_error($db).'</div>';
		}
	}
   // }

	?>
</html>