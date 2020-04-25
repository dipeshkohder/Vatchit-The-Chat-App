<?php $mesg='';?>
<?php
	if(isset($_POST['submit']))
	{
		
		try{
	
	$name=$_POST['uname'];
	$cno=$_POST['contact'];
	$email=$_POST['email'];
	$date=$_POST['date'];
	$gender=$_POST['gend'];
	$paas=$_POST['psw'];
	$repaas=$_POST['rpsw'];
	
	if($paas == $repaas)
	{	
	echo $name . $cno;
	$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=vaatchitdb','root','');
	//echo "Connection is established...<br/>";
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$sql="insert into userdetails (full_name,birth_date,gender,email,mob_no) values ('$name','$date','$gender','$email','$cno')";
	$query=$dbhandler->query($sql);
	$sql2="insert into users (username,password) values ('$name','$paas')";
	$query=$dbhandler->query($sql2);
	echo "Data is inserted successfully";
	header("Location:home.php");
	}
	else{
	
	$mesg='The passwords do not match. Try Again!';
	}
}
	
catch(PDOException $e){
	echo $e->getMessage();
	die();
}
	}

?>

<!DOCTYPE html>

<html>

    <head>
        <title>Signup Page</title>
        <link rel="stylesheet" href="loginGUI.css" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
    </head>
	<style>
	body{
		background-image:url(Photos/login_back.jpg);
	}
	</style>
    <body>
        
       <div >
		<center><h1 style='color:red; background-color:#ffb3b3;'><?php echo $mesg; ?></h1></center>
            <form class="modal-content animate" action="signup1.php" method="POST">
			
                <div class="imgcontainer">
                    <span onclick="myHome()" class="close" title="Close Modal">&times;</span>
                    <img src="photos/man.png"  alt="Avatar" class="avatar">
                </div>

                <div class="container">
                    <label for="uname"><b>UserName</b></label>
                    <input type="text" placeholder="Enter Username(E.g.Rajnikant)" name="uname" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>
					
					<label for="rpsw"><b>Re-Enter New Password</b></label>
                    <input type="password" placeholder="Enter Re-Enter New Password" name="rpsw" required>
					
					
					<label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email" name="email" required>
					
					<label for="contact"><b>Mobile NO.</b></label>
                    <input type="text" placeholder="Enter Mobile no." name="contact" required>
					
					<label for="gend"><b>Gender</b></label>
                    <input type="text" placeholder="Enter Gender" name="gend" required>
					
					
					<label for="date"><b>Date Of Birth</b></label>
					<input type="date" name="date" required>
                    
					
					<button type="submit" name="submit">SIGN UP</button>
					
                </div>    
                
                

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="myHome()" class="cancelbtn">Cancel</button>
                    
                </div>
                
                
                <script>
                      function myHome() {
                            location.replace("home.php");
                      }
            
                </script>
                </form>	
       </div>
    </body>
</html>
