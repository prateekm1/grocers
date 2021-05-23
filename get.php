<?php 
session_start();
include 'connection.php';
function cart(){
	global $con;
	$ip = getIp();
if(isset($_POST["submit"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"],"Item_Id");
		if(!in_array($_GET["Id"],$item_array_id))
		{
			
			$count=count($_SESSION["shopping_cart"]);
			
			$item_array = array
			(
				'Item_Id'		=> $_GET["Id"],	
				'Item_Name'		=> $_POST["hidden_name"],	
				'Item_Price'	=> $_POST["hidden_price"],	
				'Item_quantity'	=> $_POST["quantity"],		
		         );
		$_SESSION["shopping_cart"][$count]=$item_array;
		}
		else{
			echo '<script>alert("item already added")</script>';
			echo '<script>window.location="get.php"</script>';
		}
	}
	else
	{

		$item_array=array(
				'Item_Id'	    => $_GET["Id"],	
				'Item_Name'		=> $_POST["hidden_name"],	
				'Item_Price'	=> $_POST["hidden_price"],	
				'Item_quantity'	=> $_POST["quantity"],		
		);
		$_SESSION["shopping_cart"][0]=$item_array;
	}
	
}
if(isset($_GET["action"]))
{
	
	if($_GET["action"]=="delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys =>$values)
		{
			if($values["Item_Id"]==$_GET["Id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				//echo '<script>alert ("item removed")</script>';
				echo '<script>window.location="get.php"</script>';
			}
		}
	}
}
echo $up = cart();
}
?>
<html>
<head>
<title> cart</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet" />
	</head>
	<body>
	<br />
	
	<div class="container" >
	<?php
	$query="SELECT * FROM moil";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_array($result))
		{
			
			?>
			<div class="col-md-4">
			<form method="post" action="get.php?action=add&Id=<?php echo $row["Id"];?>">
			<img src="images1/<?php echo $row["Path"];?>" style="height:200px;width:200px;">
					<h3 class="text-info">  <?php echo $row["Name"];?></h3>
				    <p>  <?php echo $row["Discription"];?></p>
				    <p> MRP :&nbsp <del> <?php echo $row["MRP"];?></del></p>
					<p> Our Price :&nbsp <?php echo $row["Price"];?> </p>
					<input type="text" name="quantity" class="form-control" value="1" />
					<input type="hidden" name="hidden_name" value="<?php echo $row["Name"];?>"/>
					<input type="hidden" name="hidden_price" value="<?php echo $row["Price"];?>"/>	
					<br />
					<input type="submit" name="submit" class="btn" value="Add To Cart" />
			
			</form>
			</div>
			<?php
		}
		
	}
	
	?>
	<br />
	<h2>order details</h2>
	<div class="table-responsive">
	<table class="table table-bordered">
	<tr>
	<th width="40%">Name</th>
	<th width="10%">Quantity</th>
	<th width="20%">Price</th>
	<th width="15%">Total</th>
	<th width="5%">action</th>
	</tr>
	<?php
	if(!empty($_SESSION["shopping_cart"]))
	{   
		$total = 0;
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
		
	 ?>
	    <tr>
		<td><?php echo $values["Item_Name"]; ?></td>
		<td><?php echo $values["Item_quantity"]; ?></td>	
		<td>rs<?php echo $values["Item_Price"]; ?></td>
		<td><?php echo number_format($values["Item_quantity"] * $values["Item_Price"], 2); ?></td>
		<td><a href="get.php?action=delete&Id=<?php echo $values["Item_Id"];?>"><span class="text-danger">Remove</span></a></td>
		</tr>
	<?php 
	 $total=$total + ($values["Item_quantity"] * $values["Item_Price"]);
	   }
	?>
	<tr>
	<td>total</td>
	<td>rs<?php echo number_format($total,2);?></td>
	
	</tr>
	<?php
	
	}
	?>
	</table>
	</div>
	
	
	</body>
	</html>