<?php

$username= "root";
$password= "";
$server= "localhost";



//connecting database

$conn = new mysqli($server,$username,$password);

//check connection

if($conn->connect_error){
 die("connection faild: ".connect_error);

}
 echo "We Are Connected, Baby!";



 ?>
