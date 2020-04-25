<?php
	session_start();
	if(isset($_SESSION['name']) && isset($_SESSION['pname'])){
	$url=$_SERVER['REQUEST_URI'];
    header("Refresh: 10; URL=$url");
	include("headerwithlogin.php");
?>



<html>
    <head>
        <title>
		    <meta http-equiv="refresh" content="10"/>
            Home
        </title>
        <link rel="stylesheet" type="text/css" href="ChatAppGUI.css">
    </head>
    <body onload=”javascript:setTimeout(“location.reload(true);”,10000);” >
        <div id="main"  style="background-image:url('Photos/textured_light.jpg')">
            <h1 style="background-color: #6495ed; color: white;">
			<?php 
			
			        $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=vaatchitdb','root','');
				    $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
					$rec = $_SESSION['pname']; 
					$sql = "SELECT * FROM online_users where on_user = '$rec' ";
					$result = $dbhandler->query($sql);
					echo " <center>";
					if($result->rowCount() > 0)
					{
		                 echo $rec . " - " . "online";
					}
					else
					{
						 echo $rec . " - " . "offline";
					}					
					echo "	<input type='file' name='Attachfile' style='float:right;' value='Attach File'>";
					echo " </center>";
			?>
			
			</h1>
            <div class="output" style="background-image:url('Photos/textured_light.jpg')">
			
			<?php
			    $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=vaatchitdb','root','');
					//echo "Connection is established...<br/>";
		        $sen = $_SESSION['name'];
				$rec = $_SESSION['pname'];
				$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				
				$sql = "SELECT * FROM posts where (sender = '$sen' and receiver = '$rec' ) or ( receiver = '$sen' and sender = '$rec') ";
				$result = $dbhandler->query($sql);
				
				if($result->rowCount() > 0)
				{
					while($row = $result->fetch())
					{
						if($row['sender'] == $sen){
							echo "<div align='right'>";   
							echo "\t "."\t\t<b style='background-color:#80ff80; color:black; font-size:20px;padding:5px;'>".$row['msg']." -- \t\t<i style='font-size:10px;'>".$row['date']."</i></b>";
							echo "</div>"; }
						
						else{
							echo "<div align='left' >";
							echo "\t "."\t\t<b style='background-color:#80dfff; color:black; font-size:20px; padding:5px;'>".$row['msg']." -- \t\t<i style='font-size:10px;'>".$row['date']."</i></b>";
							
							echo "</div>"; 
						}
					}
				}
				else
			    {
					echo "0 results";
				}
			
			    
			?>
               
                
            </div>
			<center>
            <form method="post" action="send.php">
                <textarea name="msg" placeholder="Type to send message..." class="form-control"></textarea><br><br>
                <input type="submit" value="Send">
            </form>
			</center>
            <br>
            
        </div>
    </body>
</html>
<?php
	include("footer.php");

	}else{
	header("Location:search.php");}
?>

