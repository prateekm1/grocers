<?php
 include 'connection.php'
//include 'header.php';

 ?>
<?php 
session_start();
$Name=$_SESSION['UserName'];

if(isset($_POST['submit']))
	{
		$OldPassword =($_POST['OldPassword']);
		$NewPassword =($_POST['NewPassword']);
		$CPassword =($_POST['Password']);
		$chg_pwd = mysqli_query($con,"SELECT * FROM login WHERE Name='$Name'");
		$chg_pwd1 = mysqli_fetch_array($chg_pwd);
		$data  = $chg_pwd1['Password'];
		if($data==$OldPassword)
		{
			if($NewPassword==$CPassword)
			{
				$update=mysqli_query($con,"UPDATE login SET Password='$NewPassword' WHERE Name='$Name'");
				echo "password changed";
			}
			else
			{
				echo "password not matched";
			}
			
		}
		else
			{
				echo "Invalid password";
			}

	}

?>


<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /><!-- fontawesome css -->     
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" /><!-- Bootstrap stylesheet -->
<link href="css/snow.css" rel="stylesheet" type="text/css" media="all" /><!-- stylesheet -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" /><!-- stylesheet -->


<div class="agileinfo_bottom_section">

<div class="snow-container two">
			  <div class="snow foreground"></div>
			  <div class="snow foreground layered"></div>
			  <div class="snow middleground"></div>
			  <div class="snow middleground layered"></div>
			  <div class="snow background"></div>
			  <div class="snow background layered"></div>
			</div>
	<center>
	<div>
<form action ="password.php" method="post">
<p>old password</p>
<p><input type="text" name="OldPassword"></p>
<p>new password</p>
<p><input type="text" name="NewPassword"></p>

<p>confirm Pasword</p>
<p><input type="text" name="Password"></p>
<p><input type="submit" name="submit" value="change"></p>
</form>

<a href="admin.php">Back</a>
</div>
</center>