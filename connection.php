<?php
$con = mysqli_connect("182.50.133.80:3306","ph18037225141","Grocers@123","grocer");
if(! $con ) 
{           
die('Could not connect: ' . mysql_error());
         
}
        // echo 'Connected successfully';
      //   mysqli_close($con);

?>