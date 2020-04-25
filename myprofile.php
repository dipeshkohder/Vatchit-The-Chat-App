<?php
  session_start();
  if(!empty($_POST['pname'])){
  try {
      
      
      $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=vaatchitdb', 'root', '');
      $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      if(isset($_POST['pname']) || isset($_SESSION['pname']))
      {
          $loggeduser = $_SESSION['name'];
		  $personname = $_POST['pname'];
		  
		  //echo $personname."*****".$loggeduser;
		  
          if(!empty($_POST['pname']))
          {
              $query = $dbhandler->prepare("select * from userdetails where full_name = ? and full_name not in(select blocked_by from block_list where blocked_person ='$loggeduser' and blocked_by='$personname' )");                           
              $query->execute(array($personname));
              //$r = $query->fetchAll(PDO::FETCH_ASSOC);
			  
              $count = $query->rowCount();
			 if($count > 0)
			 {				 
              while($r = $query->fetch())
			  {
				  $date = $r['birth_date'];
			      $email = $r['email'];
                  $mobno = $r['mob_no'];
                  $gender = $r['gender'];
			   
			      $msg = "";
				  $_SESSION['msg'] = $msg;
			   
			   }
			  $_SESSION['pname'] = $personname;
			 }else
			 {
				
				 $msg = "No Match Found! Try again";
				 $_SESSION['msg'] = $msg;
				 header("location:search.php");
			 }
			 echo $email;
            
          }
         
      }
	  
       
  } catch (Exception $ex) {
      
}
        $_SESSION['pname'] = $personname;
	    include("headerwithlogin.php");

?>
<html>
    <head>
	
        <link rel="stylesheet" href="searchGUI.css" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    </head>
    <body>
        
					<?php
					    $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=vaatchitdb','root','');
						//echo "Connection is established...<br/>";
						$request_receiver = $_SESSION['pname'];
						$request_sender = $_SESSION['name'];
						$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				
						$sql = "select * from request_handler where (request_receiver = '$request_receiver' and request_sender = '$request_sender' and mod_bit = 1) or (request_sender = '$request_receiver' and request_receiver = '$request_sender' and mod_bit = 1)";
						$result = $dbhandler->query($sql);
						
						if($result->rowCount() > 0)
						{
							//$filename = "ChatApp.php";
							?>
							
							
							<div class = "header">
            <form class = "" action="ChatApp.php" method="post">

					<h1><?php echo $personname; ?></h1>
     
					<table border = "2" style="width:1000px; border: 4px solid white;">
						<tr>
							<td style="color:white; border: 2px solid white; height:60px;"><b>E-mail:</b></td>
							<td class = "title" style="color:white; border: 2px solid white;"><?php echo $email; ?></td>
						</tr>
						<tr>
							<td style="color:white; border: 2px solid white; height:60px;"><b>Date Of Birth:</b></td>
							<td class = "title" style="color:white; border: 2px solid white;"><?php echo $date; ?></td>
						</tr>
						<tr>
							<td style="color:white; border: 2px solid white; height:60px;"><b>Gender:</b></td>
							<td class = "title" style="color:white; border: 2px solid white;"><?php echo $gender; ?></td>
						</tr>
						<tr>
							<td style="color:white; border: 2px solid white; height:60px; width:70px;"><b>Contact No.:</b></td>
							<td class = "title" style="color:white; border: 2px solid white; height:50px"><?php echo $mobno; ?></td>
						</tr>
        
        
					</table>
					<div style="margin: 24px 0;">
						<a href="#"><i class="fa fa-dribbble"></i></a> 
						<a href="#"><i class="fa fa-twitter"></i></a>  
						<a href="#"><i class="fa fa-linkedin"></i></a>  
						<a href="#"><i class="fa fa-facebook"></i></a> 
					</div>
					
							
							
							
							
							
							<div class='form-box'>
							<input class = 'search_btn' type='submit' value = 'Message' name = 'message'>
							</div>
							<div class='form-box'>
							<input class = 'search_btn' type='button' value = 'Block' name = 'block_btn' onclick='myBlock()'>
							</div>
							<div class='form-box'>
							<input class = 'search_btn' type='button' value = 'Report' name = 'report_btn' onclick='myReport()'>
							</div>
							
							</form>
							</div>
						<?php 
						}
						else
						{
							//$filename = "requestsent.php";
							?>
							
							
							<div class = "header">
            <form class = "" action="requestsent.php" method="post">

					<h1><?php echo $personname; ?></h1>
     
					<table border = "2" style="width:1000px; border: 4px solid white;">
						<tr>
							<td style="color:white; border: 2px solid white; height:60px;"><b>E-mail:</b></td>
							<td class = "title" style="color:white; border: 2px solid white;"><?php echo $email; ?></td>
						</tr>
						<tr>
							<td style="color:white; border: 2px solid white; height:60px;"><b>Date Of Birth:</b></td>
							<td class = "title" style="color:white; border: 2px solid white;"><?php echo $date; ?></td>
						</tr>
						<tr>
							<td style="color:white; border: 2px solid white; height:60px;"><b>Gender:</b></td>
							<td class = "title" style="color:white; border: 2px solid white;"><?php echo $gender; ?></td>
						</tr>
						<tr>
							<td style="color:white; border: 2px solid white; height:60px; width:70px;"><b>Contact No.:</b></td>
							<td class = "title" style="color:white; border: 2px solid white; height:50px"><?php echo $mobno; ?></td>
						</tr>
        
        
					</table>
					<div style="margin: 24px 0;">
						<a href="www.google.com"><i class="fa fa-dribbble"></i></a> 
						<a href="www.twitter.com"><i class="fa fa-twitter"></i></a>  
						<a href="www.google.com"><i class="fa fa-linkedin"></i></a>  
						<a href="www.facebook.com"><i class="fa fa-facebook"></i></a> 
					</div>
					
							
							<div class='form-box'>
							<input class = 'search_btn' type='submit' value = 'Send Request' name='request'>
							</div>
							
							<div class='form-box'>
							<input class = 'search_btn' type='button' value = 'Block' name = 'block_btn' onclick='myBlock()'>
							</div>
							<div class='form-box'>
							<input class = 'search_btn' type='button' value = 'Report' name = 'report_btn' onclick='myReport()'>
							</div>
							</form>
							</div>
							
						
						<?php	
						}
						
							
			        ?>
		<script>
			function myBlock(){
				var result = confirm("Are you sure you want to block this user? \nOnce you block any user, he/she will not be able to view your profile, nor they can send you any messages.\nYou will not receive any requests or notifications from the blocked user. Also, Your name will not appear on his/her search list. ");
				if(result == true){
				location.replace("block.php");
				}
			}
			function myReport(){
				var result = confirm("By reporting a user, you notify the developer that this account is either inappropriate or spam and needs to be taken care of.");
				if(result == true){
				location.replace("report.php");
				}
			}
		</script>
    </body>
</html>
<?php
	include("footer.php");
  }else{
	  header("Location:search.php");
  }
?>