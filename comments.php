<?php

session_start();
if(!isset($_SESSION['username'])){
   header("Location:jawshome.php");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<style>
html { font-family:Cooper Black, Helvetica, sans-serif;}
body {margin:0;}
h1 { margin: 0; font-size: 350%;}
#container { width 1000px; margin:0 auto; background:#006400;}
#top {color:#A9A9A9;}
#link {font-size:150%}
</style>
</head>

<body link="#B8860B" vlink="red">
<div id="container">
	<center>
		<div id="top"> <h1>Concerns and Comments Submitted</h1></div>
		
	
	
	<div id="content_area">
	<div id="link"><a href='menuchange.php'>Back</a> &emsp; <a href='logout.php'>Log Out</a>
	</div>
	</center>
<?php
/* 

	
*/

	// connect to the database
	include('connect-db.php');

	// get results from database
	$result = mysql_query("SELECT * FROM contact")
		or die(mysql_error());  
		
	// display data in table
	
	
	echo "<table align='center' border='0' cellpadding='30' style='color:#F0F8FF'>";
	echo "<tr> <th><h2>ContactID</h2></th> <th><h2>Name</h2></th> <th><h2>Email</h2></th> <th><h2>Message</h2></th>  </tr>";

	// loop through results of database query, displaying them in the table
	while($row = mysql_fetch_array( $result )) {
	
		// echo out the contents of each row into a table
		echo "<tr>";
		echo '<td>' . $row['contactID'] . '</td>';
		echo '<td>' . $row['name'] . '</td>';
		echo '<td>' . $row['email'] . '</td>';
		echo '<td>' . $row['message'] . '</td>';
		echo "</tr>"; 
	} 

	
	echo "</table>";
?>

		
		
	</div>
	</div>




</body>

</html>