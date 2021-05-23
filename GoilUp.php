<?php
include 'connection.php'; 
if(isset($_POST['submit']))
{
	$title = $_POST['name'];
	$discription = $_POST['discription'];
	$mrp = $_POST['mrp'];
	$price = $_POST['price'];
	$target = "./images1/".basename($_FILES['upload']['name']);
	$pic = $_FILES['upload']['name'];
	$sql = "INSERT INTO goil VALUES (NULL,'$title','$discription','$mrp','$price','$pic')";
	$i = mysqli_query($con,$sql);
	move_uploaded_file($_FILES['upload']['tmp_name'],$target);
	if($i)
	{
		echo "Image Uploaded";
	}
	
}
?>
<!DOCTYPE html>
<html>
<body>
<center>
<div>
<form action="GoilUp.php" method="post" enctype="multipart/form-data">
   
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
