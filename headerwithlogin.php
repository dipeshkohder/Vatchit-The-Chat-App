<?php 
@session_start(); 
if(!(isset($_SESSION['name'])))
{
?>


<html>

    <head>
	<style>
	div.new{
		text-align:right;
		font-size:22px;
		font-family:"Montserrat"
	}
	</style>
	 <title>Vatchit</title>
        <link rel="stylesheet" href="headerGUI.css" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body >


        
        <div class="companybar" style="background-color:black;">
            <div class="logo">
                <h1 style="color:white;">&nbsp;&nbsp;&nbsp;<i class="fa fa-comments-o"></i>&nbsp;VAAT<span>CHIT</span></h1>
            </div>
            <div class="tagline" style="color:white;float:right;">
                <h1 style="color:white;" >&nbsp;T&nbsp;A&nbsp;L&nbsp;K&nbsp;&nbsp;&nbsp;W&nbsp;H&nbsp;I&nbsp;L&nbsp;E&nbsp;&nbsp;&nbsp;Y&nbsp;O&nbsp;U&nbsp;&nbsp;&nbsp;W&nbsp;A&nbsp;L&nbsp;K&nbsp;!!</h1>
            </div>
        </div>
        <div class="navbar">
            
                <a href="home.php"><i class="fa fa-fw fa-home"></i> Home &nbsp;&nbsp;</a> 
                <a href="contactus.php"><i class="fa fa-address-book-o"></i> Contact Us &nbsp;&nbsp;</a> 
                <a href="MeetOurTeam.php"><i class="fa fa-fw fa-envelope"></i> About Us </a> 
                <!--<a href="inbox.php"><i class="fa fa-fw fa-envelope"></i> Inbox </a>
                <a href="search.php"><i class="fa fa-fw fa-search"></i> Find Friends </a>
				<a href="req.php"><i class="fa fa-fw fa-search"></i> Request </a>
				<a href="unblock.php"><i class="fas fa-unlock-alt"></i> Block-List </a>
				<a href="su_delete.php"><i class="fas fa-unlock-alt"></i> Reported Users </a>
				-->
                <button class="button" name="signup" onclick="mySignup()"><i class="fa fa-sign-in"></i>&nbsp;Sign up </button>
                <button class="button" name="login" onclick="myLogin()"><i class = "fa fa-user"></i>&nbsp;Login </button>
				<button class="button" name="su_login" onclick="mySu_Login()"><i class = "fa fa-user"></i>&nbsp;Developer Login</button>
        </div>
        <script>
            function myLogin() {
                location.replace("login.php");
            }
            function mySignup() {
                location.replace("signup1.php");
            }
			function mySu_Login() {
                location.replace("su_login.php");
            }
        </script>
        
    </body>
    
</html>


<?php 
}
else
{
	?>

<html>

    <head>
        <title>Vatchit</title>
        <link rel="stylesheet" href="headerGUI.css" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>


        
        <div class="companybar" style="background-color:black;">
            <div class="logo">
                <h1 style="color:white;">&nbsp;&nbsp;&nbsp;<i class="fa fa-comments-o"></i>&nbsp;VAAT<span>CHIT</span></h1>
            </div>
            <div class="tagline" style="color:white;float:right;">
                <h1 style="color:white;"><pre>&nbsp;T&nbsp;A&nbsp;L&nbsp;K&nbsp;&nbsp;&nbsp;W&nbsp;H&nbsp;I&nbsp;L&nbsp;E&nbsp;&nbsp;&nbsp;Y&nbsp;O&nbsp;U&nbsp;&nbsp;&nbsp;W&nbsp;A&nbsp;L&nbsp;K&nbsp;!!</pre></h1>
            </div>
        </div>
        <div class="navbar">
            
                <a href="home.php"><i class="fa fa-fw fa-home"></i> Home &nbsp;&nbsp;</a> 
                <a href="contactus.php"><i class="fa fa-address-book-o"></i> Contact Us &nbsp;&nbsp;</a> 
                <a href="MeetOurTeam.php"><i class="fa fa-fw fa-envelope"></i> About Us </a> 
                <a href="inbox.php"><i class="fa fa-fw fa-envelope"></i> Inbox </a>
                <a href="search.php"><i class="fa fa-fw fa-search"></i> Find Friends </a>
				<a href="req.php"><i class="fa fa-fw fa-search"></i> Request </a>
				<a href="unblock.php"><i class="fas fa-unlock-alt"></i> Block-List </a>
				<a href="registereduser.php"><i class="fas fa-unlock-alt"></i> Users </a>

				<?php if(isset($_SESSION['superuser'])){ ?>
				<a href="su_delete.php"><i class="fas fa-unlock-alt"></i> Reported Users </a>
				<a href="feedback.php"><i class="fas fa-unlock-alt"></i> Feedback </a>

				<?php } ?>
                <button class="button" name="login" onclick="myLogout()"><i class = "fa fa-user"></i>&nbsp;Logout </button>
			   

        </div>
        <script>
            function myLogout() {
                
                location.replace("logout.php");
            }
           
        </script>
    </body>
    
</html>


<?php
}
?>


