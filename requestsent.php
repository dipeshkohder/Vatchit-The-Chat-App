<?php
  session_start();
  include("headerwithlogin.php");
  
   
      $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=vaatchitdb', 'root', '');
      $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     

if($_POST['request'])
	  {
		  //echo"Send is pressed";
		  $reqsender = $_SESSION['name'];
		  $reqreceiver = $_SESSION['pname'];
		  $sql2 = "insert into request_handler(request_sender,request_receiver,mod_bit) values('$reqsender','$reqreceiver',0)";
		  $dbhandler->query($sql2);
		  
	  }
?>
<html>
    <head>
        <link rel="stylesheet" href="searchGUI.css" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    </head>
    <body>
        <div class = "header">
            
					<h1><?php echo "Request Sent Successfully!"; ?></h1>
     
					
        </div>
    </body>
</html>
<?php
	include("footer.php");
?>