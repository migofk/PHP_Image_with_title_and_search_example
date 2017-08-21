<?php
include 'connect_db.php';
?>
<?php
if($_REQUEST['search']){
 //$offset = $_REQUEST['offset2'];
 $search = $_REQUEST['search'];

  $sql ="SELECT imgDir, Title FROM images WHERE Title LIKE '%$search%' LIMIT 3 ";

  $result = $conn3->query($sql);
  $rowcount=mysqli_num_rows($result);
  //echo"<br> ".$rowcount."<br>";

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
