
<?php
//$username=$_POST["uname"];
//$password=$_POST["psw"];
	session_start(); 
	$mesg='';
	if(isset($_POST['submit']))
	{
		
		try
		{
			$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=vaatchitdb','root','');
			//echo "Connection is established...<br/>";
			$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		if(isset($_POST['uname']) && isset($_POST['psw']))
		{
		
			$username=$_POST['uname'];
			$password=$_POST['psw'];
			if(!empty($_POST['uname']) && !empty($_POST['psw']))
			{
				/*$query=$dbhandler->query("select username from users where username='$_GET['uname']' and password='$_GET['psw']'");
				$count = $query->rowcount();
				echo '$count';*/
				$query=$dbhandler->prepare("select username from users where username=? and password=? ");
				$query->execute(array($username,$password));
				$count = $query->rowcount();
			
					if($count > 0)
					{	
						
						$_SESSION['name'] = $username;
						$sql = "insert into online_users(on_user) values('$username')";
						$result = $dbhandler->query($sql);
						
						header("Location:search.php");
					}
					else
					{
						//echo "<center><h1 style='color:black'>Incorrect username or password. Try Again!</h1></center>";
						$mesg='Incorrect username or password. Try Again!';
					}
			}
			else
			{
				echo "Something went wrong...";
			}
		}

	}
		catch(PDOException $e)
		{
			echo $e->getMessage();
			die();
		}
	}
?>
<html>

    <head>
        <title>Login Page</title>
        <link rel="stylesheet" href="loginGUI.css" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body style="background-image:url(Photos/login_back.jpg)">
        
       <div class="modal" >
		<center><h1 style='color:red; background-color:#ffb3b3;'><?php echo $mesg; ?></h1></center>
            <form class="modal-content animate" action="login.php" method="post">
                <div class="imgcontainer">
                    <span onclick="myHome()" class="close" title="Close Modal">&times;</span>
                    <img src="Photos/man.png" alt="Avatar" class="avatar">
                </div>

                <div class="container">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>
        
                    <button type="submit" name="submit">Login</button>
                    <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="myHome()" class="cancelbtn" name="submit">Cancel</button>
                    <span class="psw">Forgot <a href="https://www.google.com">password?</a></span>
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


