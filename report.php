<?php

    session_start();
    $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=vaatchitdb','root','');
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    // $msg = $_POST['msg'];
    $sender = $_SESSION['name']; 
	$reported_person = $_SESSION['pname'];
	/* 
	$sql = "SELECT * FROM report where reported_person = '$reported_person' ";
	$result = $dbhandler->query($sql);
				
	if($result->rowCount() > 0)
	{
		   
	}
	else
	{ */
		    $sql1 = "SELECT * FROM report where reported_person = '$reported_person'";
			$result1 = $dbhandler->query($sql1);
			if($result1->rowCount() > 0)
			{
				$sql2 = "update report set report_count = report_count + 1 where reported_person = '$reported_person'";
				$dbhandler->query($sql2);
			}
			else
			{
				$sql2 = "insert into report(reported_person,report_count) values('$reported_person',1)";
				$dbhandler->query($sql2);
			}
    //}
		echo "You reported ".$reported_person;
    header("location:search.php");
	

?>
