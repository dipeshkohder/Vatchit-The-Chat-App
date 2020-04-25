<?php include('headerwithlogin.php') ?>

<html>
     <head>

     </head>	 
					
				<body style="background-color:powderblue;">
					<center><h1>User's Feedback</h1>
					
					<?php
						$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=vaatchitdb','root','');
						$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

						$sql = "select * from feedback";
		                $result = $dbhandler->query($sql);
     
	 
                   

                        if ($result->rowcount() > 0) {
							
                        echo "<center><table border = '1' style='width:100%; '><tr><th style='height:100px;' >Name</th><th style='height:100px;'>Company</th><th style='height:100px;'>E-mail</th><th style='height:100px;'>Phone no.</th><th style='height:100px;'>Message</th></tr>";
   
						while($row = $result->fetch()) {
								echo "<tr><td style='height:50px;'>" . $row["name"]. "</td><td style='height:50px;'>" . $row["company"]. "</td><td style='height:50px;'>" . $row["email"]. "</td><td style='height:50px;'>". $row["phone"]. "</td><td style='height:50px;'>" . $row["message"]. "</td></tr>";
						}
								echo "</table></center>";
						} else {
								echo "No feedbacks yet!";
						}


					?>
					</center>
				</body>
				
		</html>		
		<?php
	//include("footer.php");
?>