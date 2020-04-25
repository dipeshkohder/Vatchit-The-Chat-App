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
				
		$sql = "delete from block_list where blocked_by = '$rec' and blocked_person = '$sen'";
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
				
						$sql = "select distinct blocked_person from block_list where blocked_by = '$rec'";
						$result = $dbhandler->query($sql);
						
						if($result->rowCount() > 0)
						{
							while($row = $result->fetch())
							{
								?><form class = "" action="unblock.php" method="post"><?php
								echo "<div class='form-box'>";
								echo "".$row['blocked_person'];
								echo "</div>&nbsp;&nbsp;&nbsp";?>
								<input type="hidden" name="sender" value="<?php echo $row['blocked_person']; ?>">
								<input class = 'search_btn' type='submit' name='insubmit' value = 'Unblock'>
								</form><?php
								
							}
						}
						else
						{
								echo "Your Block List is Empty!";
						}
					?>
				</h1>
                
            
        </div>
        
       
    </body>
</html>
<?php
	include("footer.php");
?>