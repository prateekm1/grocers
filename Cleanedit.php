<table>
<?php include'connection.php';
if(isset($_GET['id']))
{
	$del =($_GET['id']);
	$query ="DELETE FROM clean WHERE Id ='$del'";
	$sql = mysqli_query($con, $query);
	if($sql)
	{
		echo 'Delete Success';
	}else
	{
		echo 'Error';
	}
}
?>
<?php 
        include_once("connection.php");
        $result=mysqli_query($con,"SELECT * FROM clean");
        $count = 0;
        while($res=mysqli_fetch_array($result))
        {
            if($count==5) //three images per row
            {
               print "</tr>";
               $count = 0;
            }
            if($count==0)
               print "<tr>";
            print "<td>";
            ?>
			<div class="col-md-4" style="border: 1px solid grey;width:230px">
                  
				  <img src="images1/<?php echo $res['Path'];?>" style="height:200px;width:200px;">
				  <hr>
				  <center>
				  <h3>  <?php echo $res['Name'];?></h3>
				   <p>  <?php echo $res['Discription'];?></p>
				    <p> MRP :&nbsp<del> <?php echo $res['MRP'];?></del></p>
					<p> Our Price :&nbsp<?php echo $res['Price'];?> </p>
					<p>
						<a href="Cleanedit.php?id=<?php echo ($res['Id']); ?>">Delete</a>	</p>
						<a href="Cleanedit1.php?edit=<?php echo ($res['Id']); ?>">Edit</a>			
                   </center>

			</div>

                <?php
            $count++;
            print "</td>";
        }
        if($count>0)
           print "</tr>";
        ?>

</table>
<hr>
<center>
<h2><a href="admin.php" style="color:red" class="button">Back</a></h2>
</center>