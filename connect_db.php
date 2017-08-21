<?php

$username= "root";
$password= "";
$server= "localhost";
$db="gallery";


//connecting database

$conn3 = new mysqli($server, $username, $password, $db);

//check connection

if($conn3->connect_error){
 die("connection faild: ".connect_error);

}
 //echo "We Are Connected, Baby!";



 ?>
