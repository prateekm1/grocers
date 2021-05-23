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
	<center>
	<h2 style="font-family: Times New Roman, Times, serif; color:red;border:dotted 1px red">My Cart</h2>
	</center>
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
		<p>Your bill will be according to the item(size & quantity) you buy.</p>
		<p>Our executive will confirm your order after placing.</p>
	<?php
	
	}
	
	$arrayi = $_SESSION['shopping_cart'];
	//$string .= $value.',';
	foreach($_SESSION["shopping_cart"] as $keys => $values)
	{
		$buy .= "name=" .$values["Item_Name"].",size=".$values["Item_quant"].",quantity=".$values["Item_quantity"];
			
		
	}
	//echo $buy;
	//print_r($arrayi);
	//$view = implode(',',$arrayi);
	?>
	</table>
	</div>
	 <form id="contactform" class="row" action="checkout.php" name="contactform" method="post" required>
                        <fieldset class="row-fluid">
                           <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12" style="margin:2px ">
                              <input type="text" name="name"  class="form-control" placeholder="Name" required>
                           </div>
                           <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12" style="margin:2px ">
                              <input type="email" name="email"  class="form-control" placeholder="Your Email" required>
                           </div>
                           <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12" style="margin:2px ">
                              <input type="number" name="mobile"  class="form-control" placeholder="Mobile" required>
                           </div>
							<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12" style="margin:2px " size="250">
                              <input type="text" name="other"  class="form-control" placeholder="Others" >
                           </div>
							<p>Any item not present in the list, please provide the name & quantity of the product. Any special instructions, on above provided space(Others) </p>
						   <div>
						   <input type="submit" name="submit"  id="submit" class="btn" value="BUY NOW" />
						   </div>
						      </fieldset>
                     </form>
	
	</body>
	</html>
	<div class="clearfix"></div>
	<?php
if (isset($_POST['submit'])){
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
	$other = $_POST['other'];
$to = 'grocers.ind@gmail.com';
$subject = "My order";
$htmlContent = '
    <html>
    <head>
        <title>Welcome to Grocers </title>
    </head>
    <body>
        <table cellspacing="0" style="border: 2px dashed #FB4314; width: 300px;">
            <tr style="background-color: #e0e0e0;">
                <th>Name:</th><td>'.$name.'</td>
            </tr>
            <tr style="background-color: #e0e0e0;">
                <th>Email:</th><td>'.$email.'</td>
            </tr>
            <tr style="background-color: #e0e0e0;">
                <th>Mobile No:</th><td>'.$mobile.'</td>
            </tr>
           <tr style="background-color: #e0e0e0;">
                <th>Others:</th><td>'.$other.'</td>
            </tr>
            <tr style="background-color: #e0e0e0;">
                <th>Message:</th><td>'. $buy.'</td>
				
            </tr>
        </table>
    </body>
    </html>';

// Set content-type header for sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers
$headers .= 'From: Grocers<'.$email.'>' . "\r\n";
//$headers .= 'Cc: welcome@example.com' . "\r\n";
//$headers .= 'Bcc: welcome2@example.com' . "\r\n";

// Send email
if (mail($to, $subject, $htmlContent, $headers)):
    //$successMsg = 'Email has sent successfully.';
    echo '<script>alert("Our executive will contact you soon to confirm your order! Have a good day.")</script>';
else:
    //$errorMsg = 'Email sending fail.';
     echo '<script>alert("Unable to send mail.Please try again.or call us now!!")</script>';
endif;
}
?>
	<?php include'footer.php'?>