
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
		);
		$_SESSION["shopping_cart"][$count]=$item_array;
		}
		else{
			echo '<script>alert("item already added")</script>';
			echo '<script>window.location="shop.php"</script>';
			
		}
	}
	else
	{
		$item_array=array(
					'Item_Id'	=> $_GET["Id"],	
				'Item_Name'	=> $_POST["hidden_name"],	
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
				echo '<script>alert ("item removed")</script>';
				echo '<script>window.location="shop.php"</script>';
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
	<style>
	.btn{
		
		background-color: white; 
  color: black; 
  border: 2px solid #f44336;
	}
	.btn:hover{
		background-color: #f44336;
  color: white;
		
	}
	
	</style>
	<br  />
	<p>
	<h2 style="font-family: Times New Roman, Times, serif; color:red">My Cart</h2>
	<div class="table-responsive">
	<table class="table table-bordered">
	<tr>
	<th width="20%">Name</th>
	<th width="10%">Quantity</th>
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
		<td><?php echo $values["Item_Price"]; ?></td>
		<td><?php echo number_format($values["Item_quantity"] * $values["Item_Price"], 2); ?></td>
		<td><a href="shop.php?action=delete&Id=<?php echo $values["Item_Id"];?>"><span class="text-danger">Remove</span></a></td>
		</tr>
	<?php 
	 $total=$total + ($values["Item_quantity"] * $values["Item_Price"]);
	   }
	?>
	<tr>
	<td>Total</td>
	<td>Rs.<?php echo number_format($total,2);?></td>
	
	</tr>
	<?php
	
	}
	
	$arrayi = $_SESSION['shopping_cart'];
	//$show=foreach($_SESSION["shopping_cart"] as $keys => $values);
	//print_r($arrayi);
	$view = implode(',',$arrayi);
	?>
	</table>
	</div>
<?php

$to = "prateekm195@gmail.com";
$subject = "My subject";
$txt = array(
					'Item_Id'	=> $_GET["Id"],	
				'Item_Name'	=> $_POST["hidden_name"],	
				'Item_Price'	=> $_POST["hidden_price"],	
				'Item_quantity'	=> $_POST["quantity"],		
		);
$headers = "From: webmaster@example.com" ;

if(mail($to,$subject,$txt,$headers))
{
	echo "mail sent";
	
}
else{
	
	echo "mail not sent";
}

?>
							<form>
							 <div>
						   <input type="submit" name="submit"  id="submit" class="btn" value="BUY NOW" />
						   </div>
						   </form>