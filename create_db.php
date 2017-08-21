<?php
//connecting mysql.
include 'connect_sr.php';
 ?>



<?php

// creating database.
$db="gallery";
$sql = "CREATE DATABASE $db";

if($conn->query($sql)=== TRUE){
  echo "Database created successfully";
}
else {
  echo "ERROR: " .$conn->error;
}

//creating table.

$conn2 = new mysqli($server,$username,$password, $db);
if ($conn2->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
  echo "-Connect To database for the table-" ;
}

$table = "CREATE TABLE images(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
imgDir VARCHAR(5000) NOT NULL,
Title VARCHAR(500) NOT NULL
)";
if($conn2->query($table) === TRUE){
echo "Table created successfully";

}
else {
  echo "ERROR". $conn2->error;
}

 ?>
