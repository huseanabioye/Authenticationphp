<?php
$localhost = "localhost";
$username = "root";
$db_name = "virtual_class_id";
$password = "";




$connet = new mysqli($localhost, $username,$password, $db_name);
if ($connet->errno){
    die ("connet_error:" . $connect->error);
}
// else{
// echo "conneted";
// // // return $connect;
// }
// 

// $host = "localhost";
// $dbname = "virtual_class_id";
// $username = "root";
// $password = "";
// // Create connection
// $mysqli = new mysqli( $host, $username, $password, $dbname);
// // Check connection
//   if($mysqli->connect_errno){
//     die("connection error:" . $mysqli->connect_error);

//   } 
//   return $mysqli;  
