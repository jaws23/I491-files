<?php
/* 
 DELETEMENU.PHP
 Deletes a specific entry from the 'menu_item' table
*/

 // connect to the database
 include('connect-db.php');
 
 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['itemID']) && is_numeric($_GET['itemID']))
 {
 // get id value
 $itemID = $_GET['itemID'];
 
 // delete the entry
 $result = mysql_query("DELETE FROM menu_items WHERE itemID=$itemID")
 or die(mysql_error()); 
 
 // redirect back to the view page
 header("Location: menuchange.php");
 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
 header("Location: menuchange.php");
 }
 
?>