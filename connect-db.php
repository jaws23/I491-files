<?php
/* 
 CONNECT-DB.PHP
 Allows PHP to connect to your database
*/

 // Database Variables
 $server = 'db.soic.indiana.edu';
 $user = 'i491u16_rwjawors';
 $pass = 'my+sql=i491u16_rwjawors';
 $db = 'i491u16_rwjawors';
 
 // Connect to Database
 $connection = mysql_connect($server, $user, $pass)
	or die ("Could not connect to server ... \n" . mysql_error ());
 mysql_select_db($db) 
	or die ("Could not connect to database ... \n" . mysql_error ());


?>