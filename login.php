<?php 
session_start();
//include 'header.php';
include 'connection.php';
?>

<?php
	
	if(isset($_POST['submit']))
	{
		$UserName=mysqli_real_escape_string($con,$_POST['UserName']);
		$Password=mysqli_real_escape_string($con,$_POST['Password']);
		$sql="SELECT * FROM login WHERE Name='$UserName' AND Password='$Password'";
		$result=mysqli_query($con,$sql)or die(mysqli_error($con));
		$count=mysqli_num_rows($result);
		if($count==1)
		{
			$_SESSION['UserName']=$UserName;
			header('location:admin.php');
		}
		else
		{
			echo"invalid";
		}
	}

?>
<!--//tags -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<!--pop-up-box-->
	<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!--//pop-up-box-->
	<!-- price range -->
	<link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
	<!-- fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">

<div class="agileinfo_bottom_section">

<div class="snow-container two">
			  <div class="snow foreground"></div>
			  <div class="snow foreground layered"></div>
			  <div class="snow middleground"></div>
			  <div class="snow middleground layered"></div>
			  <div class="snow background"></div>
			  <div class="snow background layered"></div>
			</div>
  <center style="margin:80px 80px;border: 2px solid blue">
  <div>
  <h2>&nbsp&nbsp ADMIN PANNEL</h2><hr>
  <form action ="login.php" method="post">
<p>Name</p>
<p><input type="text" name="UserName" style="width:200px;height:25px; color:red;" required=""></p>
<p>Password</p>
<p><input type="password" name="Password" style="width:200px;height:25px; color:red;" required=""></p><br>
<p><input type="submit" name="submit" value="log in"></p>
</form>

<a data-scroll href="signin.php" style="background-color:#FFD46F;" class="btn btn-light btn-radius btn-brd">Sign in</a>

<!--<a data-scroll href="password.php" style="background-color:#FFD46F;" class="btn btn-light btn-radius btn-brd">change password</a>-->
<br>
  	</div>
</center>
</div>