<?php
session_start();
require "db.php";
$user_id = $_SESSION['user_id'];
// TO CHECK FILE UPLOAD DETAILS
// print_r($_POST);

// print_r($_FILES);
/////////////////////

if(isset($_POST['submit'])){

    $filename = $_FILES['picture']['name'];
     // echo $filename;
    $newName = time().$filename;
    //   echo $newName;
 
   ////// TO FOR WHERE FILE IS 
    //   echo $_FILES['picture']['tmp_name'];
     //////////////////////////////////

        /// TO MOVE FILE FROM WHERE IS COME FROM TO NEW FOLDER 
        //   move_uploaded_file($_FILES['picture']['tmp_name'], "uploads/".$newName);
  $moveFile = move_uploaded_file($_FILES['picture']['tmp_name'], 'uploads/'.$newName);
  if($moveFile){
    //  $query = "UPDATE users SET 'profile_picture' = '$newName' WHERE 'user_id' = '$user_id'";
    //  $querydb = $connet->query($query);

     $query = $connet->prepare("UPDATE users SET profile_picture = ? WHERE user_id = ?");
     $query->bind_param("si", $_FILES['picture']['name'], $_SESSION['user_id']);
     $query->execute();

     if ($query) {
         # code...
         
         header("Location:dashboard.php");
     }else{
         $_SESSION["upload_error"] = "Unable to upload. please try again!";
         header("Location:dashboard.php");
     }
   } else{
     $_SESSION["upload_error"] = "Unable to upload. please try again";
     header("Location:dashboard.php");
 }




}

 else{
     header("Location:dashboard.php");
}
