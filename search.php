<?php
	session_start();
    if(isset($_SESSION['name'])){
	$url=$_SERVER['REQUEST_URI'];
    header("Refresh: 10; URL=$url"); 
	$msg='';
    include("headerwithlogin.php");
?>
<html>
    <head>
	<style>
		#abc{
			
		}
	</style>
	    <meta http-equiv="refresh" content="10"/>
        <link rel="stylesheet" href="searchGUI.css" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    </head>
    <body onload=”javascript:setTimeout(“location.reload(true),10000);”>
        <div class = "header">
			<center>
			<div align = "center" >
		   <form class = "" action="myprofile.php" method="post">
                <h1 style="margin-bottom:30px; font-size: 40px;">Welcome to VaatChit Mr.<?php echo $_SESSION['name']; ?>! </h1><h2 style="color:white; margin-bottom:30px; font-size: 25px;" class="form-box">Find Your Chat Partner here </h2>
				<h2 style="color:red; background-color:#ffb3b3; margin-bottom:30px; font-size: 20px;">
					<?php 
						if(isset($_SESSION['msg']))
						{
							echo $_SESSION['msg'];
						}
						else
						{
							
						}
					?>
				</h2>
                <div class="form-box">
                    <input type = "text" class="search-feild friend" placeholder="Search..." name = "pname">
                    <input class = "search_btn" type="submit" value = "Search">
                </div>
				<br>
				<h1 style="margin-bottom:15px; font-size: 40px;">Online Users : </h1>

				<div class="form-box">
                    <?php
						$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=vaatchitdb','root','');
						//echo "Connection is established...<br/>";
						
						$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
						$name  = $_SESSION['name'];
						
						$sql = "SELECT distinct * FROM online_users where on_user != '$name' and on_user not in (select blocked_by from block_list where blocked_person='$name') ";
						$result = $dbhandler->query($sql); 
				
						if($result->rowCount() > 0)
						{
							while($row = $result->fetch())
							{
								
								echo "<h2 style='color:white; font-size:160%; margin-bottom:15px;'><b>".$row['on_user']."</b></h2>";
								echo "  ";
								
							}
						}
						else
						{
								echo "<h2 style='color:white; font-size:160%;'><b>No one is online right now!</b></h2>";
						}
				
			    
					?>
					</div>
					</center>
                </div>
            </form>
			
			
			
        </div>
        
       
    </body>
</html>
<?php


	include("footer.php");

	}else{
	header("Location:login.php");}
?>