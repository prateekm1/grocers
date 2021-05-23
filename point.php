<?php include 'header.php' ?>
<!DOCTYPE html>
<html>
<head>
<style>
* {
  box-sizing: border-box;
}

.column {
  float: left;
  width: 33.33%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width: 500px) {
  .column {
    width: 100%;
  }
}
</style>
</head>
<body>

<h2>REWARDS</h2>
<p><strong>Exchange these exciting gifts by claiming your reward points.</strong>Customers will be awarded with reward points on every successful purchase (For eg an order of Rs.1000 will make 10 points to the customer through which they can claim exciting gifts) and 5 points will be awarded when a customer claims his/her rewrd.</p>
<hr>
<center>
<div class="row">
  <div class="column">
   <img src="images/cup.jpeg" alt="Snow" width=250px height=200px> 
	  <p><b>Cup Set</b></p><br>
	<p>100 points</p><br>
  </div>
  <div class="column">
    <img src="images/cas.jpg" alt="Snow" width=250px height=200px>
	<p><b>Casserole</b></p><br>
	<p>200 points</p><br>
  </div><div class="column">
   <img src="images/tawa.jpg" alt="Snow" width=250px height=200px>
	<p><b>Peigon Tawa Set</b></p><br>
	<p>300 points</p><br>
  </div><div class="column">
    <img src="images/iron.jpeg" alt="Snow" width=250px height=200px>
	<p><b>Iron</b></p><br>
	<p>400 points</p><br>
  </div><div class="column">
   <img src="images/kettle.jpg" alt="Snow" width=250px height=200px>
	<p><b>Electric Kettle</b></p><br>
	<p>500 points</p><br>
  </div><div class="column">
   <img src="images/toaster.jpeg" alt="Snow" width=250px height=200px>
	<p><b>Toaster</b></p><br>
	<p>600 points</p><br>
  </div>
<div class="column">
  <img src="images/mixer.jpeg" width=250px height=200px>
	<p><b>Mixer Grinder</b></p><br>
	<p>700 points</p><br>
		
  </div>
	<div class="column">
   <img src="images/set.jpg" width=250px height=200px>
	<p><b>Peigon Non-stick Set</b></p><br>
	<p>800 points</p><br>
		
  </div>
	<div class="column">
   <img src="images/mi.jpg" width=250px height=200px>
	<p><b>MI Powerbank (20,000 mAh)</b></p><br>
	<p>900 points</p><br>
		
  </div>
	

</div>
</center>
	<p>* T&C Applied</p>
</body>
</html>

		<?php include 'footer.php' ?>