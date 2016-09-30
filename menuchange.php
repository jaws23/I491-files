<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd>
<?php
session_start();
if(!isset($_SESSION['username'])){
   header("Location:jawshome.php");
}
?>
<html>
<head>
	<title>View Menu</title>

<style>	
html { font-family:Cooper Black, Helvetica, sans-serif;}
body {margin:0;}
h1 { margin: 0; font-size: 350%;}
#container { width 1000px; margin:0 auto; background-image: url("sandy.png"); background-size:cover;}
// #header { width:100%; height:80px; background-image: url("sandy.png"); background-size:cover; }
#top { color: #FFD700;}
#home { font-size: 150%; }
// #menu {border=1; cellpadding:15; clear:both; width: 600px; background: #00008B; color: #F4A460; padding-left: 300px; padding-top: 150px;}

</style>	
</head>
<body link="#D2691E" vlink="red">
<div id="container">
	<center>
		<div id="top"> <h1>Jaws Restaurant Menu</h1></div>
	</center>	
	
	<div id="content_area">
 	<center>
 <div id="home"><a href='logout.php'>Log Out</a></div>
	</center>	 
<?php
/* 
	MENUVIEW.PHP
	
*/

	// connect to the database
	include('connect-db.php');

	// get results from database
	$result = mysql_query("SELECT * FROM menu_items ORDER BY FIELD(category,'salads','starters','sandwiches','entrees','dessert','drinks')")
		or die(mysql_error());  
		
	// display data in table
	
	
	echo "<table align='center' border='0' cellpadding='30' style='color:#8B4513'>";
	echo "<tr> <th><h2>Item Name</h2></th> <th><h2>Category</h2></th> <th><h2>Price</h2></th> <th><h2>Description</h2></th>  </tr>";

	// loop through results of database query, displaying them in the table
	while($row = mysql_fetch_array( $result )) {
	
		// echo out the contents of each row into a table
		echo "<tr>";
		//echo '<td>' . $row['itemID'] . '</td>';
		echo '<td>' . $row['item_name'] . '</td>';
		echo '<td>' . $row['category'] . '</td>';
		echo '<td>' . $row['price'] . '</td>';
		echo "<td width='500px'>" . $row['description'] . '</td>';
		//echo '<td>' . $row['display_status'] . '</td>';
		echo '<td><a href="editmenu.php?itemID=' . $row['itemID'] . '">Edit</a></td>';
		echo '<td><a href="deletemenu.php?itemID=' . $row['itemID'] . '">Delete</a></td>';
		echo "</tr>"; 
	} 

	
	echo "</table>";
?>
<p><a href="newmenu.php">Add a new record</a></p>
		
		
	</div>
</div>
</body>
</html>	