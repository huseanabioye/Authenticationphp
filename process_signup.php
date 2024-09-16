<?php

//      session_start();
//      require "db.php";  

//  if(isset($_POST['submit'])){
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $address = $_POST['address'];
//     $phone_no = $_POST['phone_no'];
//     $password = $_POST['password'];

//     $checkExist = "SELECT * FROM user WHERE email = '$email' ";
//     $queryExist = $connet->query($checkExist);
//     // print_r($queryExist);
//     if($queryExist->num_rows > 0){
//       $_SESSION['message'] = "This email has been used";
//       header("Loction: signup.php");

//     }else{

//         $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

//         $query = "INSERT INTO users (`username`, `email`, `phone_no`, `address`, `password`) VALUES
//          ('$username', '$email', '$phone_no', '$address', '$password')";
//         $querydb = $connet->query($query);
//         print_r($querydb);
//     }




// }else {
//     header("location: signup.php");
// }



session_start();
require "db.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone_no = $_POST['phone_no'];
    $password = $_POST['password'];

    // Check if email already exists
    $checkExist = "SELECT * FROM users WHERE email = ?";
    $queryExist = $connet->prepare($checkExist);
    $queryExist->bind_param("s", $email);
    $queryExist->execute();
    $result = $queryExist->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['message'] = "This email has been used";
        header("Location: signup.php");
        exit;
    } else {
        // Insert new user data
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (name, email, phone_no, address, password) VALUES (?, ?, ?, ?, ?)";
        $querydb = $connet->prepare($query);
        $querydb->bind_param("sssss", $name, $email, $phone_no, $address, $hashedPassword);
        $querydb->execute();
       if($querydb){
        $_SESSION['message'] = "Unsucceseefull Registration.";
        header("Location: signin.php");
       }
    // else{
    //     $_SESSION['message'] = "Unsucessfull Registration";
    //    }
        // print_r($querydb);
    }
} else {
    header("Location: signup.php");
}







