
<?php
// session_start();
//  require 'db.php';
// $user_id = $_SESSION['user_id'];
// $query = "SELECT * FROM users WHERE `user_id` = '$user_id' ";
// $querydb  = $connet->query($query);
// $user = $querydb->fetch_assoc();
// TO CHECK USERS DETAILS ID
// print_r($user_id);
// TO CHECK USERS DETAILS
// print_r($user);

// echo $_SESSION['user_id'];


session_start();
require 'db.php';
$user_id = $_SESSION['user_id']; 
// print_r('$user');

if (isset($user_id)) {
    $query = "SELECT * FROM users WHERE `user_id` = '$user_id' ";
    $querydb = $connet->query($query);
    // print_r($querydb);
    
    $user = $querydb->fetch_assoc();
// TO CHECK USERS DETAILS ID
// print_r($user_id);

// TO CHECK USERS DETAILS
    // print_r($user);

    ////////


    // echo "<h1 class='display-6 text-center'>WELCOME " . $user["username"] . "</h1>";
} else {
    echo "User not found";
}

 ?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Dasboard Page</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto shadow p-5">
                <div>
       <h1 class="display-6 text-muted-center">
        
       <!-- echo "<h1 class='display-6 text-center'>WELCOME " . $user["name"] . "</h1>"; -->
        <?php echo "<h1 class='display-6 text-center'> WELCOME ".$user["name"]."</h1>"; ?> 
      
       </h1>
        <img src="<?php echo "uploads/".$user['profile_picture']?>" alt="">
    <?php    if (file_exists('uploads/'.$user['profile_picture'])) {
    echo 'Image exists';
} else {
    echo 'Image does not exist';
}?>
         <img src="<?php echo "uploads/".$user['profile_picture']?>" alt="">
       
                <form action="process_prfpic.php" enctype="multipart/form-data" method="post">
                    <label >Upload Profile Picture</label>
                    <input type="file" name="picture">
                    <input type="submit" name="submit" value="submit" class="btn btn-dark">

                </form>    

                </div>
            </div>

        </div>
    </div>
</body>

</html>