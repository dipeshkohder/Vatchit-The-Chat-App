<?php 
	session_start();
	
	include("headerwithlogin.php");
    $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=vaatchitdb','root','');
	
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
	$blocked_by = $_SESSION['name'];
	$blocked_per = $_SESSION['pname'];
	
	$sql = "insert into block_list(blocked_by,blocked_person) values('$blocked_by','$blocked_per')";
	$dbhandler->query($sql);
?>	

<html>
    <head>
        <link rel="stylesheet" href="searchGUI.css" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    </head>
    <body>
        <div class = "header">
            
					<h1><?php echo $blocked_per." is blocked by ".$blocked_by; ?></h1>
					<h2 style="color:white;"><b> Bolcked user will not be able to find you on VaatChit and hence he/she will not be capable of sending you messages!</b></h2>
     
					
        </div>
    </body>
</html>


	<?php
	
	include("footer.php");
	
	
?>