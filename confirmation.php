<?php
	session_start();
	/* $url=$_SERVER['REQUEST_URI'];
    header("Refresh: 10; URL=$url");
     */include("headerwithlogin.php");
?>
<html>
    <head>
	    <meta http-equiv="refresh" content="10"/>
        <link rel="stylesheet" href="searchGUI.css" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    </head>
    <body><!-- onload=”javascript:setTimeout(“location.reload(true);”,10000);”>-->
        <div class = "header">
            <form class = "" action="block.php" method="post">
                <h1>Are you sure you want to block this user?  </h1>
				<h2>
					Once you block any user, he/she will not be able to view your profile, nor they can send you any messages.
					You will not receive any requests or notifications from the blocked user. Also, You will not appear on his/her search list. 
				</h2>
                <div class="form-box">
                    
                    <input class = "search_btn" type="submit" value = "Block">
                </div>
				
            </form>
			<form class = "" action="myprofile.php" method="post">
			<div class='form-box'>
							<input class = 'search_btn' type='submit' value = 'Cancel' name = 'cancel_btn'>
							</div>
			</form>
			
        </div>
        
       
    </body>
</html>
<?php
	include("footer.php");
?>