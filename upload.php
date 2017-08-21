<?php
include 'connect_db.php';
?>
<?php
if((isset($_FILES["fileToUpload"]["type"])) && (isset($_POST["title"])))
{
$validextensions = array("jpeg", "jpg", "png");
$temporary = explode(".", $_FILES["fileToUpload"]["name"]);
$file_extension = end($temporary);
if ((($_FILES["fileToUpload"]["type"] == "image/png") || ($_FILES["fileToUpload"]["type"] == "image/jpg") || ($_FILES["fileToUpload"]["type"] == "image/jpeg")
) && ($_FILES["fileToUpload"]["size"] < 1000000)
&& in_array($file_extension, $validextensions)) {
if ($_FILES["fileToUpload"]["error"] > 0)
{
echo "Return Code: " . $_FILES["fileToUpload"]["error"] . "<br/><br/>";
}
else
{
if (file_exists("uploads/" . $_FILES["fileToUpload"]["name"])) {
echo $_FILES["fileToUpload"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
}
else
{
$sourcePath = $_FILES['fileToUpload']['tmp_name']; // Storing source path of the file in a variable
$targetPath = "uploads/".$_FILES['fileToUpload']['name']; // Target path where file is to be stored
move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file

//adding to gallery database table images.

$title = $_REQUEST['title'];
$imgname = "uploads/".$_FILES['fileToUpload']['name'];
$sql = "INSERT INTO images (imgDir, Title)
VALUES ('$imgname', '$title')";

if ($conn3->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}




// printing the data to be sent
echo "<br><span id='success'>Image Uploaded Successfully...!!</span><br/>";
echo "<br/><b>File Title:</b> " . $_POST["title"] . "<br>";
echo "<br/><b>File Name:</b> " . $_FILES["fileToUpload"]["name"] . "<br>";
echo "<b>Type:</b> " . $_FILES["fileToUpload"]["type"] . "<br>";
echo "<b>Size:</b> " . ($_FILES["fileToUpload"]["size"] / 1024) . " kB<br>";
echo "<b>Temp file:</b> " . $_FILES["fileToUpload"]["tmp_name"] . "<br>";

}
}
}
else
{
echo "<span id='invalid'>***Invalid file Size or Type***<span>";
}
}

$conn3->close();
?>
