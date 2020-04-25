<html>

    <head>
        <title>SignUp Page</title>
        <link rel="stylesheet" href="signupGUI.css" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        
       <div class="modal">
  
            <form class="modal-content animate" action="">

                <div class="container">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>
        
                    <label for="rpsw"><b>Reenter Password</b></label>
                    <input type="password" placeholder="Reenter Password" name="rpsw" required>
                    
                    <button type="submit" >Sign up</button>
                    <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="myHome()" class="cancelbtn">Cancel</button>
                    <span class="psw">Forgot <a href="https://www.google.com">password?</a></span>
                </div>
                <script>
                      function myHome() {
                            location.replace("header.php");
                      }
            
                </script>
            </form>
       </div>
    </body>
</html>
<?php
try{
	$name=$_POST["uname"];
	$cno=$_POST["contact"];
	$email=$_POST["email"];
	$date=$_POST["date"];
	$gender=$_POST["gend"];
	$paas=$_POST["psw"];
	
	$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=vaatchitdb','root','');
	//echo "Connection is established...<br/>";
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$sql="insert into userdetails (full_name,birth_date,gender,email,mob_no) values ('$name','$date','$gend','$email','$cno')";
	$query=$dbhandler->query($sql);
	$sql2="insert into users (username,password) values ('$name','$paas')";
	$query=$dbhandler->query($sql2);
	echo "Data is inserted successfully";
	header("Location: ");
}
catch(PDOException $e){
	echo $e->POSTMessage();
	die();
}


?>