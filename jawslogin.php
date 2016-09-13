<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<title>Login</title>
<div id="title">	<h1>Welcome, Jaws Employee</h1>	</div>
	
<style>
html { background: #4169E1;}
#login { padding-left: 500px; padding-top: 50px;}
#title {font-size:200%; color: #B8860B; padding-left: 350px; padding-top: 150px;}

</style>
</head>
<body>

<div id="login">
 	<form action="" method="post">
		<label>Employee Password</label>
		<input type="password" placeholder="Password" name="password"<br><br>

		<input type="submit" name="submit" id="submit" value="Log in" class="btn btn-default">
	</form> 
</div>
</body>	
</html>
<?php
	 if (isset($_POST['submit']))
 { 
	include('connect-db.php');
	$query = mysql_query("SELECT emp_password FROM user WHERE userID = 'jaws'");
	$row = mysql_fetch_array($query);
    $password = $_POST['password'];
    
	if (password_verify( $password, $row['emp_password'])) {
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://cgi.soic.indiana.edu/~rwjawors/jawshome.html\">";
	} 		else {
		echo 'Password Incorrect';
	}
 }
?>
	




