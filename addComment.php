<?php
include('database/config.php');
    $name=mysqli_escape_string($db,$_POST['name']);
    $email=mysqli_escape_string($db,$_POST['email']);
    $comment=mysqli_escape_string($db,$_POST['comment']);
    $book_id=mysqli_escape_string($db,$_POST['book']);
    $created=date('Y-m-d H:s:m');
        $query="INSERT INTO comments (name,email,comment,created,book) VALUES('$name','$email','$comment','$created','$book_id')";
        if(mysqli_query($db,$query)){
          echo  $message="<div class='alert alert-success'>Commentaire ajouté avec succés</div>";
        }
        else{
           echo  $message= '<div class="alert alert-danger">Une erreur'.mysqli_error($db).'</div>';
       
    }



