<?php 
include 'header.php';
session_start();
include 'connection.php';
if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"],"Item_Id");
		if(!in_array($_GET["Id"],$item_array_id))
		{
			$count=count($_SESSION["shopping_cart"]);
			$item_array=array(
					'Item_Id'	=> $_GET["Id"],	
				'Item_Name'	=> $_POST["hidden_name"],	
				'Item_Price'	=> $_POST["hidden_price"],	
				'Item_quantity'	=> $_POST["quantity"],	
					'Item_quant'	=> $_POST["quant"],
		);
		$_SESSION["shopping_cart"][$count]=$item_array;
		}
		
	}
	else
	{
		$item_array=array(
					'Item_Id'	=> $_GET["Id"],	
				'Item_Name'	=> $_POST["hidden_name"],	
				'Item_Price'	=> $_POST["hidden_price"],	
				'Item_quantity'	=> $_POST["quantity"],
				'Item_quant'	=> $_POST["quant"],				
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
				echo '<script>alert ("item removed")</script>';
				echo '<script>window.location="Soap.php"</script>';
			}
		}
	}
}
?>
<html>
<head>
<title> Grocer's</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet" />
	</head>
	<body>
	<br />
	<div class="table-responsive">
	<table class="table table-bordered" style="border:1px solid black">
	<div class="container" >
	<?php
	$query="SELECT * FROM soap";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_array($result))
		{
			
			?><center>
			<div class="col-md-4">
			<form method="post" action="Soap.php?action=add&Id=<?php echo $row["Id"];?>">
			<img src="images1/<?php echo $row["Path"];?>" style="height:200px;width:200px;">
			<h3 class="text-info">  <?php echo $row["Name"];?></h3>
				   <p>  <?php echo $row["Discription"];?></p>
				    <p> MRP :&nbsp<del> <?php echo $row["MRP"];?></del></p>
					<p> Our Price :&nbsp<?php echo $row["Price"];?> </p>
					Size<input type="text" name="quant" class="form-control"  style="width:200px" placeholder="eg. 1L, 2kg, 3pc" />
					<input type="text" name="quantity" class="form-control" value="1" style="width:200px"/>
					<br />
					<input type="hidden" name="hidden_name" value="<?php echo $row["Name"];?>"/>
					<input type="hidden" name="hidden_price" value="<?php echo $row["Price"];?>"/>	
					
					<input type="submit" name="add_to_cart" class="btn" value="Add To Cart" />
					<hr>
			
			</form>
			</div>
			</center>
			<?php
		}
		
	}
	
	?>
	</div>
	</table>
	</div>
	<br  />
	<p>
	<h2 style="font-family: Times New Roman, Times, serif; color:red">My Cart</h2>
	<div class="table-responsive">
	<table class="table table-bordered">
	<tr>
	<th width="20%">Name</th>
	
	<th width="10%">Quantity</th>
	<th width="10%">Size</th>
	<th width="15%">Price</th>
	<th width="10%">Total</th>
	<th width="8%">Remove</th>
	</tr>
	</p>
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
		<td><?php echo $values["Item_quant"]; ?></td>	
		<td><?php echo $values["Item_Price"]; ?></td>
		<td><?php echo number_format($values["Item_quantity"] * $values["Item_Price"], 2); ?></td>
		<td><a href="Soap.php?action=delete&Id=<?php echo $values["Item_Id"];?>"><span class="text-danger">Remove</span></a></td>
		</tr>
	<?php 
	 $total=$total + ($values["Item_quantity"] * $values["Item_Price"]);
	   }
	?>
	<tr>
	<td>total</td>
	<td>rs<?php echo number_format($total,2);?></td>
	<td><input type="button" value="checkout" onclick="window.location.href='checkout.php'" /></td>
	</tr>
	<?php
	
	}
	?>
	</table>
	</div>
	
	
	</body>
	</html>
	<div class="clearfix"><script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="fluid"
     data-ad-layout-key="-c8+i-1n-4h+ee"
     data-ad-client="ca-pub-1912821651959615"
     data-ad-slot="5424645867"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script></div>
	<?php include'footer.php'?>