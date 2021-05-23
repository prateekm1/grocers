<?php include 'connection.php'; ?>
<div class="container">
<div class="col-md-6">
<?php
$sql=mysqli_query($con,"select * from upload order by Id desc");
?>

<div class="col-md-4">
<?php
while($row=mysqli_fetch_array($sql))
{
?>
</div>
<div class="col-md-4" style="border: 2px solid grey;width:230px">
<img src="images1/<?php echo $row['Path'];?>" style="height:200px;width:200px;">
<br>
<h3>
<?php echo $row['Name'];?>
</h3>
<p>
<?php echo $row['Discription'];?>
</p>
<p>MRP:<del>
<?php echo $row['MRP'];?></del>
</p>
<p>Our Price:
<?php echo $row['Price'];?>
</p>
<p>
<a href="view.php?id=<?php echo base64_encode($row['Id']); ?>">Delete</a>&nbsp
<!--<a href="edit2.php?edit=<?php// echo $row['Id']; ?>">Edit</a>-->
</p>
<?php } ?>
</div>
</div>
</div>

