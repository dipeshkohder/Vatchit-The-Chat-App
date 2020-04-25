<?php

    session_start();
    $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=vaatchitdb','root','');
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $msg = $_POST['msg'];
    $sender = $_SESSION['name'];
	$rec = $_SESSION['pname'];
	
	$sql = "SELECT * FROM online_users where on_user = '$rec' ";
	$result = $dbhandler->query($sql);
				
	if($result->rowCount() > 0)
	{
		   
	}
	else
	{
		    $sql1 = "select * from unread_msg where sender = '$sender' and receiver = '$rec'";
			$result1 = $dbhandler->query($sql1);
			if($result1->rowCount() > 0)
			{
				$sql2 = "update unread_msg set count = count + 1 where sender = '$sender' and receiver = '$rec'";
				$dbhandler->query($sql2);
			}
			else
			{
				$sql2 = "insert into unread_msg(sender,receiver,count) values('$sender','$rec',1)";
				$dbhandler->query($sql2);
			}
    }
	$sql = "insert into posts(msg,sender,receiver) values('$msg','$sender','$rec')";
    $dbhandler->query($sql);

    header("location:ChatApp.php");
	

?>
