<?php
/*
include 'connection.php'; 
if(isset($_POST['submit']))
{
	$title = $_POST['name'];
	$discription = $_POST['discription'];
	$mrp = $_POST['mrp'];
	$price = $_POST['price'];
	//echo basename($_FILES['upload']['name']);
	$target = basename($_FILES["upload"]["name"]);
	$pic = $_FILES['upload']['name'];
	$sql = "INSERT INTO clean VALUES (NULL,'$title','$discription','$mrp','$price','$pic')";
	$i = mysqli_query($con,$sql);
	move_uploaded_file($_FILES['upload']['tmp_name'],$target);
	if($i)
	{
		echo "Image Uploaded";
	}
	*/

	//include 'connection.php';
	$target_dir = "photo/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<form action="CleanUp.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>




<!--

<!DOCTYPE html>
<html>
<body>
<center>
<div>
<form action="CleanUp.php" method="post" enctype="multipart/form-data">
   
     <p> Select image to upload: &nbsp <input type="file" name="upload" id="fileToUpload"></p>
	  <p>Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="name" id="name"></p>
	  <p>Discription &nbsp <input type="text" name="discription" id="Discription"></p>
	  <p>MRP &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="number" name="mrp" id="mrp"></p>
	  <p>Our Price &nbsp <input type="number" name="price" id="price"></p>
      <p><input type="submit" value="Upload Image" name="submit"></p>
	  <p><a href="admin.php">Back</a></p>
</form>
</div>

</center>

</body>
</html>
-->