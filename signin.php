
<?php 
//session_start();
//include 'header.php';
include 'connection.php';
?>
<?php 
	if(isset($_POST['submit']))
	{
		$Name =$_POST['UserName'];
		$Mobile = $_POST['Mobile'];
		$Email = $_POST['Email'];
		$Password = $_POST['Password'];
		$sql = "INSERT INTO login VALUES (NULL,'$Name','$Mobile','$Email','$Password')";
		//$p = mysqli_query($sql,$con);
		if(mysqli_query($con,$sql))
		{
			echo "insert success";
			header('location:login.php');
		}
		else{
			echo "error";
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
			<center>
	<div style="margin:80px 80px;border: 2px solid blue" >
<form action ="signin.php" method="post">
<p>Name</p>
<p><input type="text" name="UserName"></p>
<p>mobile no</p>
<p><input type="number" name="Mobile"></p>
<p>Email</p>
<p><input type="text" name="Email"></p>
<p>Pasword</p>
<p><input type="password" name="Password"></p><br>
<p><input type="submit" name="submit" value="Sign In"></p>
</form>

<a data-scroll href="login.php" style="background-color:yellow;" class="btn btn-light btn-radius btn-brd">Login</a>

</div>

</center>
<?php //include'footer.php' ?>


