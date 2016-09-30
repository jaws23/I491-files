<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

 <head>
 <title>Jaws Restaurant Home Page</title>
 <style>
 html { font-family:Arial, Helvetica, sans-serif; color:#333; }
 body { background:#ccc; magin:0; }
 #container { width 1000px; margin:0 auto; background:#fff;}
 #header { width:100%; height:220px; border-bottom:1px solid #c7c7c7; background:#4169E1; }
 #logo {float:left; padding-left:210px; width:500px; height:300px; top:1px;}
 #navbar { height: 40px; position:absolute; top:250px;}
 #navbar ul {margin:0; padding-left:200px; list-style-type:none; }
 #navbar ul li {padding-left:50px; padding-right:50px; float:left; }
 #navbar ul li a {font-size:18px; float:left; float:left; padding:0 0 0 20px; display:block;}
 #banner {background:#87CEEB; height:150px; clear:both; }
 #tweets { background-image: url("jaws.png"); width: 600px, height: 1000px, clear:both; padding-left:400px; padding-top:100px;}
 </style>
 

 </head>

 <body>
<div id="container">
	<div id="header">
		<div id="logo"> <img src="jawslogo.png"></div>
	</div>
	
	<div id="conent_area">
		<div id="banner">
		<center>
			<div id="login">
				<form action="" method="post">
		
				<input type="text" placeholder="Username" name="username"<br><br>
				<input type="password" placeholder="Password" name="password"<br><br>

				<input type="submit" name="submit" id="submit" value="Log in" class="btn btn-default">
				</form> 
		
			
		
		
<?php
	session_start();

	 if (isset($_POST['submit']))
 { 
	include('connect-db.php');
	$username = $_POST['username'];
	$query = mysql_query("SELECT emp_password FROM user WHERE userID = '$username'");
	$row = mysql_fetch_array($query);
    $password = $_POST['password'];
	$_SESSION['username']=$username;
	$_SESSION['password']=$password;
    
	if (password_verify( $password, $row['emp_password'])) {
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://cgi.soic.indiana.edu/~rwjawors/menuchange.php\">";
	} 		else {
		echo 'Credentials Incorrect';
	}
 }
?>
		</center>		
			</div>
		</div>
		
		
		
		<div id="navbar">
			<ul>
				<li><a href="http://cgi.soic.indiana.edu/~rwjawors/about_us.html">About Us</a</li>
				<li><a href="http://cgi.soic.indiana.edu/~rwjawors/news.html">News</a</li>
				<li><a href="http://cgi.soic.indiana.edu/~rwjawors/events.html">Events</a</li>
				<li><a href="http://cgi.soic.indiana.edu/~rwjawors/menuview.php">Menu</a</li>
				<li><a href="http://cgi.soic.indiana.edu/~rwjawors/contact_us.php">Contact Us</a</li>
			</ul>
		</div>
		<div id="tweets">
		 <a class="twitter-timeline" data-width="500" data-height="500" data-buttom="1em"
href="https://twitter.com/JawsRestaurant"
data-tweet-limit="4">
Tweets by JawsRestaurant</a> 
<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
		
		
		</div>
	</div>	
	
	<div id="footer"></div>
</div>
 </body>
 
 </html>

