
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
				$query=$dbhandler->prepare("select su_name from super_user where su_name=? and su_password=? ");
				$query->execute(array($username,$password));
				$count = $query->rowcount();
			
					if($count > 0)
					{	
						
						$_SESSION['name'] = $username;
						$_SESSION['superuser']=$_SESSION['name'];
						header("Location:search.php");
					}
					else
					{
						//echo "Developer not found!";
						$mesg='Developer not found! Try again!';
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
    <body style="background-image:url(Photos/developer1.png);">
	<center><h1 style='color:black; background-color:white;'><?php echo $mesg; ?></h1></center>
        
       <div class="modal">
  
            <form class="modal-content animate" action="su_login.php" method="post">
                <div class="imgcontainer">
                    <span onclick="myHome()" class="close" title="Close Modal">&times;</span>
                    <img src="Photos/man.png" alt="Avatar" class="avatar">
                </div>

                <div class="container">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Developer Name" name="uname" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Master Control key" name="psw" required>
        
                    <button type="submit" name="submit">Login As Developer</button>
                    <!--<label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                </div>-->

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="myHome()" class="cancelbtn" name="submit">Cancel</button>
                    <!--<span class="psw">Forgot <a href="https://www.google.com">password?</a></span>-->
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


