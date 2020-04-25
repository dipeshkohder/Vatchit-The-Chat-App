<?php
	session_start();
	$_SESSION['nname'] = $_SESSION['name'];
	if(isset($_POST['insubmit']))
	{
		$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=vaatchitdb','root','');
		//echo "Connection is established...<br/>";
		$rec = $_SESSION['name'];
		$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				
		$sql = "delete from unread_msg where receiver = '$rec'";
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
            <form class = "" action="inbox.php" method="post">
				<h1>
					<?php 
					
					    $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=vaatchitdb','root','');
						//echo "Connection is established...<br/>";
						$rec = $_SESSION['name'];
						$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				
						$sql = "select * from unread_msg where receiver = '$rec'";
						$result = $dbhandler->query($sql);
						
						if($result->rowCount() > 0)
						{
							while($row = $result->fetch())
							{
								echo "<div class='form-box'>";
								echo "".$row['count']." unread messages from ".$row['sender'];
								echo "</div>";
								echo "<br>";
							}
						}
						else
						{
								echo "you don't have new messages!";
						}
					?>
				</h1>
                <div class="form-box">
                    <center><input class = "search_btn" type="submit" name="insubmit" value = "Drop Messages"></center>
                </div>
            </form>
        </div>
        
       
    </body>
</html>
<?php
	include("footer.php");
?>