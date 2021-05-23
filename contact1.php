  <?php include'header.php'?>
  <!-- Bootstrap CSS -->
  
   <!-- Site CSS -->
   <link rel="stylesheet" href="css/style.css">
   <!-- Colors CSS -->
   <link rel="stylesheet" href="css/css/colors.css">
   <!-- ALL VERSION CSS -->
   <link rel="stylesheet" href="css/css/versions.css">
   <!-- Responsive CSS -->
   <link rel="stylesheet" href="css/css/responsive.css">
   <!-- building CSS -->
   <link rel="stylesheet" href="css/css/building.css">
  
  <?php
if (isset($_POST['submit'])){
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$subjectfor = $_POST['subjectfor'];
$message = $_POST['message'];

$to = 'grocers.ind@gmail.com';
$subject = "Enqury For Website";
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
                <th>Subject:</th><td>'.$subjectfor.'</td>
            </tr>
            <tr style="background-color: #e0e0e0;">
                <th>Message:</th><td>'.$message.'</td>
            </tr>
        </table>
    </body>
    </html>';

// Set content-type header for sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers
$headers .= 'From: Dream Maker<'.$email.'>' . "\r\n";
//$headers .= 'Cc: welcome@example.com' . "\r\n";
//$headers .= 'Bcc: welcome2@example.com' . "\r\n";

// Send email
if (mail($to, $subject, $htmlContent, $headers)):
    //$successMsg = 'Email has sent successfully.';
    echo '<script>alert("Our executive will contact you soon! Have a good day.")</script>';
else:
    //$errorMsg = 'Email sending fail.';
     echo '<script>alert("Unable to send mail.Please try again.")</script>';
endif;
}
?>
  <div id="contact" class="section wb">
         <div class="container">
            <div class="section-title row text-center">
               <div class="col-md-8 col-md-offset-2">
                  
				  
					<h3>Contact Us</h3>
					
					
				
				  <hr width="50%" style=" border:1px solid #e8aa00;">
				  
                  <p class="lead" style="color:black">welcome to Grocer's</p>
               </div>
               <!-- end col -->
            </div>
            <!-- end title -->
            <div class="row">
               <div class="col-lg-4 col-md-4">
                  <div class="contant-info">
                     <ul class="item-display-block">
                        <li>
                           <div class="info-shape accent-color background fs-23">
						   <a href="http://maps.google.com?q=23°59'36.2,85°21'39.3">
                              <div class="icon"><i class="fa fa-home"></i></div>
                           </div>
                           <div class="info-content">
                              <h6 class="uppercase"> Address:</h6>
                               <p> Bansilal chowk,Hazaribag</p></a>
                           </div>
                        </li>
                        <li>
						 
                           <div class="info-shape accent-color background fs-23">
						   <a href="tel:07461970960">
                              <div class="icon"><i class="fa fa-volume-control-phone"></i></div>
                           </div>
						  
                           <div class="info-content">
                              <h6 class="uppercase"> Phone No:</h6>
                              <p> +91-7461970960
</p></a>
                           </div>
                        </li>
                        <li>
                           <div class="info-shape accent-color background fs-23">
						   <a href="www.gmail.com">
                              <div class="icon"><i class="fa fa-envelope-o"></i></div>
                           </div>
						     
                           <div class="info-content">
                              <h6 class="uppercase"> Email Address:</h6>
                            <p>grocers.ind@gmail.com</p></a>
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="col-md-8" >
                  <div class="contact_form">
                     <div id="message"></div>
                     <form id="contactform" class="row" action="contact1.php" name="contactform" method="post" required>
                        <fieldset class="row-fluid">
                           <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12" style="margin:2px 12px">
                              <input type="text" name="name"  class="form-control" placeholder="Name" required>
                           </div>
                           <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12" style="margin:2px 12px">
                              <input type="email" name="email"  class="form-control" placeholder="Your Email" required>
                           </div>
                           <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12" style="margin:2px 12px">
                              <input type="number" name="mobile"  class="form-control" placeholder="Mobile" required>
                           </div>
                           <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12" style="margin:2px 12px">
                              <input type="text" name="message"  class="form-control" placeholder="Message" required>
                           </div>
                         <!--  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <label class="sr-only">Select Department</label>
                              <select name="subjectfor" id="" class="selectpicker form-control" data-style="btn-white">
                                 <option value="12">Select Service</option>
                                 <option value="Building Service">Building Service</option>
                                 <option value="Tover Design">Tover Design</option>
                                 <option value="Others">Others</option>
                              </select>
                           </div>-->
                         <!--  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <textarea class="form-control" name="comments" id="comments" rows="6" placeholder="Give us more details.."></textarea>
                           </div>-->
						   <p>
                           <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 text-center" style="margin:10px 4px 2px 10px">
                              <button type="submit" name="submit" value="SEND" id="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block">Get support</button>
                           </div>
						   </p>
                        </fieldset>
                     </form>
                  </div>
               </div>
               <!-- end col -->
            </div>
            <!-- end row -->
         </div>
         <!-- end container -->
      </div>
	  
	  <?php include'footer.php'?>