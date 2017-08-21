<?php
include 'connect_db.php';
?>

<?php
if(isset($_POST['textse'])){

$search = $_POST['textse'];


$mysql = "SELECT imgDir, Title FROM images WHERE Title LIKE '%$search%' LIMIT 3";
$result = $conn3->query($mysql);
$rowsall = mysqli_num_rows($result);
//echo $rowsall;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '
 <div class="col-sm-12" style="border-bottom: 1px solid #dedede; padding-bottom:20px; margin-bottom:20px;">

     <a href="'. $row["imgDir"].'" target="_blank" >
     <div class="caption" >
     <h2> '. $row["Title"].'</h2>
      </div>
     <div class="thumbnail" >

     <img src="'. $row["imgDir"].'" alt="Lights" style="width:100%">
     </a>
 </div>
     </div>';
    }
} else {
    echo "0 results";
}

}
$conn3->close();
 ?>
