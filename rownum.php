<?php
include 'connect_db.php';
?>
<?php
$sql ="SELECT id FROM images ";

$result = $conn3->query($sql);
$rowcount=mysqli_num_rows($result);
echo $rowcount;

?>
