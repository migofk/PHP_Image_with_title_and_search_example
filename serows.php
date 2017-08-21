<?php
include 'connect_db.php';
?>

<?php
if(isset($_POST['textse'])){

$search = $_POST['textse'];


$mysql = "SELECT imgDir, Title FROM images WHERE Title LIKE '%$search%'";
$result = $conn3->query($mysql);
$rowsall = mysqli_num_rows($result);
echo $rowsall;


}
$conn3->close();
?>
