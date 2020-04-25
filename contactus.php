<?php
   session_start();
    $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=vaatchitdb','root','');
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	include('headerwithlogin.php');
   if(isset($_POST['name']) && isset($_POST['company']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['message']))
   {
	            $name = $_POST['name'];
				$company = $_POST['company'];
				$email = $_POST['email'];
				$phone = $_POST['phone'];
				$message = $_POST['message'];
	   
	   
	   
	            $sql2 = "insert into feedback(name,company,email,phone,message) values('$name','$company','$email','$phone','$message')";
				$dbhandler->query($sql2);
   }

?>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="contactusGUI.css">
	</head>
	<body>
		<div class="container">

	<h1 class="brand"><span>Fruit Salad Pvt. Ltd.</span></h1>

	<div class="wrapper">

		<!-- COMPANY INFORMATION -->
		<div class="company-info">
			<h3>Fruit Salad Pvt. Ltd.</h3>

			<ul>
				<li><i class="fa fa-road"></i>Silicon Valley, California, United States</li>
				<li><i class="fa fa-phone"></i>(+91)8490071219</li>
				<li><i class="fa fa-envelope"></i> fruitsalad.com</li>
			</ul>
		</div>
		<!-- End .company-info -->

		<!-- CONTACT FORM -->
		<div class="contact">
			<h3>E-mail Us</h3>

			<form id="contact-form" action="contactus.php" method="post">

				<p>
					<label>Name</label>
					<input type="text" name="name" id="name" required>
				</p>

				<p>
					<label>Company</label>
					<input type="text" name="company" id="company">
				</p>

				<p>
					<label>E-mail Address</label>
					<input type="email" name="email" id="email" required>
				</p>

				<p>
					<label>Phone Number</label>
					<input type="text" name="phone" id="phone">
				</p>

				<p class="full">
					<label>Message</label>
					<textarea name="message" rows="5" id="message"></textarea>
				</p>

				<p class="full">
					<button type="submit">Submit</button>
				</p>

			</form>
			<!-- End #contact-form -->
		</div>
		<!-- End .contact -->

	</div>
	<!-- End .wrapper -->
</div>
<!-- End .container -->
	
	</body>

</html>
