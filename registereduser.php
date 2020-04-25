<?php
include('headerwithlogin.php')
?>

<html>
     <head>

     </head>	 
					
				<body style="background-color:powderblue;">
				<center>
					<h1>Registered User's</h1>
					
					<?php
						$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=vaatchitdb','root','');
						$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

						$sql = "select * from userdetails";
		                $result = $dbhandler->query($sql);
     
	 
                   

                        if ($result->rowcount() > 0) {
							
                        echo "<center><table border = '1' style='width:100%'><tr><th>Name</th style='width:100%'><th>Birth-date</th><th style='height:70px'>E-mail</th><th style='height:70px'>Phone no.</th><th style='height:70px'>Gender</th></tr>";
   
						while($row = $result->fetch()) {
								echo "<tr><td style='height:50px'>" . $row["full_name"]. "</td><td style='height:50px'>" . $row["birth_date"]. "</td><td style='height:50px'>" . $row["email"]. "</td><td style='height:50px'>". $row["mob_no"]. "</td><td style='height:50px'>" . $row["gender"]. "</td></tr>";
						}
								echo "</table></center>";
						} else {
								echo "0 results";
						}


					?>
					</center>
				</body>
				
		</html>		