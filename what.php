<!-- Add icon library -->

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
	<td>Rs<?php echo number_format($total,2);?></td>
	<td></td>
	</tr>
	<?php
	
	}
	
	$arrayi = $_SESSION['shopping_cart'];
	//$show=foreach($_SESSION["shopping_cart"] as $keys => $values);
	print_r($arrayi);
	$view = implode(',',$arrayi);
	?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

			<?php
			if(isset($_POST["submit"]))
			{
$INSTANCE_ID = 'YOUR_INSTANCE_ID_HERE';  // TODO: Replace it with your gateway instance ID here
$CLIENT_ID = "YOUR_CLIENT_ID_HERE";  // TODO: Replace it with your Forever Green client ID here
$CLIENT_SECRET = "YOUR_CLIENT_SECRET_HERE";   // TODO: Replace it with your Forever Green client secret here
$postData = array(
  'number' => '+917461970960',  // TODO: Specify the recipient's number here. NOT the gateway number
  'message' => '$view',
);
$headers = array(
  'Content-Type: application/json',
  'X-WM-CLIENT-ID: '.$CLIENT_ID,
  'X-WM-CLIENT-SECRET: '.$CLIENT_SECRET
);
$url = 'http://api.whatsmate.net/v3/whatsapp/single/text/message/' . $INSTANCE_ID;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
$response = curl_exec($ch);
echo "Response: ".$response;
curl_close($ch);
			}
?>
<form method="post">
<input type="submit" name="submit">submit</input>
</form>
</body>

</html>