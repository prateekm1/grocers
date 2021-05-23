<?php 

include'connection.php';
$edit = $_GET['edit'];
$re = mysqli_query($con,"SELECT * FROM spice WHERE Id ='$edit'");
$row = mysqli_fetch_array($re);
?>
<?php 
if(isset($_POST['submit']))
{
  $Id =$_POST['Id'];
  $Name =$_POST['Name'];
  $Discription =$_POST['Discription'];
  $MRP = $_POST['MRP'];
  $Price = $_POST['Price'];
  $up = mysqli_query($con,"UPDATE spice SET Name='".$Name."', Discription ='".$Discription."', MRP='".$MRP."' , Price='".$Price."' WHERE Id='".$Id."'");
  header("Location:Pulseedit.php");
}
?>
<form action ="Spiceedit1.php" method="post">
<input type="hidden" value="<?php echo $row['Id']; ?>" name="Id">
<p>Name</p>
<p><input type="text" value="<?php echo $row['Name']; ?>" name="Name"></p>
<p>discription</p>
<p><input type="text" value="<?php echo $row['Discription']; ?>" name="Discription"></p>
<p>MRP</p>
<p><input type="number" value="<?php echo $row['MRP']; ?>" name="MRP"></p>
<p>Price</p>
<p><input type="number" value="<?php echo $row['Price']; ?>" name="Price"></p>
<p><input type="submit" name="submit" value="Update"></p>
</form>