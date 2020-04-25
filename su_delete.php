<?php
	session_start();
	$_SESSION['supername'] = $_SESSION['name'];
	if(isset($_POST['insubmit']))
	{
		$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=vaatchitdb','root','');
		//echo "Connection is established...<br/>";
		
		$rec = $_SESSION['name'];
		
		$rep_per = $_POST['sender'];
		$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				
		$sql = "delete from users where username = '$rep_per'";
		$result = $dbhandler->query($sql);
		
		$sql1 = "delete from userdetails where full_name = '$rep_per'";
		$result = $dbhandler->query($sql1);
		
		$sql2 = "delete from report where reported_person = '$rep_per'";
		$result = $dbhandler->query($sql2);
		
		$sql3 = "delete from request_handler where request_sender = '$rep_per' or request_receiver = '$rep_per'";
		$result = $dbhandler->query($sql3);
		
		
		
	}
	
    include("headerwithlogin.php");
?>
<html>
    <head>
        <link rel="stylesheet" href="searchGUI.css" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    </head>
    <body>
        <div class = "header">
            
				<h1>
					<?php 
					
					    $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=vaatchitdb','root','');
						//echo "Connection is established...<br/>";
						$rec = $_SESSION['name'];
						$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				
						$sql = "select distinct * from report";
						$result = $dbhandler->query($sql);
						
						if($result->rowCount() > 0)
						{
							while($row = $result->fetch())
							{
								?><form class = "" action="su_delete.php" method="post"><?php
								echo "<div class='form-box'>";
								echo "".$row['reported_person']." was reported ".$row['report_count']." times.";
								echo "</div>&nbsp;&nbsp;&nbsp";?>
								<input type="hidden" name="sender" value="<?php echo $row['reported_person']; ?>">
								<input class = 'search_btn' type='submit' name='insubmit' value = 'Delete this Account'>
								</form><?php
								
							}
						}
						else
						{
								echo "There are no reported users till date!";
						}
					?>
				</h1>
                
            
        </div>
        
       
    </body>
</html>
<?php
	include("footer.php");
?>