<?php
include('database/config.php');
$errors=[];
$message="";

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
        
        $query="INSERT INTO comments (name,email,comment,created,book) VALUES('$name','$email','$comment','$created','$book')";
        if(mysqli_query($db,$query)){
          echo  "<script>alert('Commentaire ajouté')</script>";
        }
        else{
           echo  $message= '<div class="alert alert-danger">Une erreur'.mysqli_error($db).'</div>';
        }
   // }
?>


