<?php 
    session_start();
    $name = $_SESSION['name'];
    $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=vaatchitdb','root','');
			//echo "Connection is established...<br/>";
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$sql = "delete from online_users where on_user = '$name'";
    $result = $dbhandler->query($sql);
	
	session_destroy();
	
	
	
	header("Location:home.php");

?>