<?php
	session_start();
	$_SESSION['nname'] = $_SESSION['name'];
	if(isset($_POST['insubmit']))
	{
		$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=vaatchitdb','root','');
		//echo "Connection is established...<br/>";
		$rec = $_SESSION['name'];
		$sen = $_POST['sender'];
		$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				
		$sql = "update request_handler set mod_bit=1 where request_receiver = '$rec' and request_sender = '$sen' and mod_bit = 0";
		$result = $dbhandler->query($sql);
		
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
				
						$sql = "select distinct request_sender from request_handler where request_receiver = '$rec' and mod_bit = 0";
						$result = $dbhandler->query($sql);
						
						if($result->rowCount() > 0)
						{
							while($row = $result->fetch())
							{
								?><form class = "" action="req.php" method="post"><?php
								echo "<div class='form-box'>";
								echo ""."Request from ".$row['request_sender'];
								echo "</div>&nbsp;&nbsp;&nbsp";?>
								<input type="hidden" name="sender" value="<?php echo $row['request_sender']; ?>">
								<input class = 'search_btn' type='submit' name='insubmit' value = 'Accept'>
								</form><?php
								
							}
						}
						else
						{
								echo "you don't have any new requests!";
						}
					?>
				</h1>
                
            
        </div>
        
       
    </body>
</html>
<?php
	include("footer.php");
?>