<?php
/* 
 EDITMENU.PHP
 Allows user to edit specific entry in database
*/

 // creates the edit menu_item form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable
 function renderForm($itemID, $item_name, $category, $price, $description, $display_status, $error)
 {
 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
 <head>
 <title>Edit Menu</title>
 <style>
 html { font-family:Arial, Helvetica, sans-serif; color:#EEE8AA; background:#00008B; }
 h1 {color:red; font-size:400%;}
 </style>
 </head>
 <body>
 <?php 
 // if there are any errors, display them
 if ($error != '')
 {
 echo '<div style="padding:8px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 
 
 <form action="" method="post">
 <input type="hidden" name="itemID" value="<?php echo $itemID; ?>"/>
 <div>
 <p><strong>Item ID:</strong> <?php echo $itemID; ?></p>
 <strong>Item Name: *</strong> <input type="text" name="item_name" value="<?php echo $item_name; ?>"/><br/>
 <strong>Category: *</strong> <input type="text" name="category" value="<?php echo $category; ?>"/><br/>
 <strong>Price: *</strong> <input type="text" name="price" value="<?php echo $price; ?>"/><br/>
 <strong>Description: *</strong> <input type="text" name="description" style="height:50px;width:600px;" value="<?php echo $description; ?>"/><br/>
 <strong>Display Status: *</strong> <input type="text" name="display_status" value="<?php echo $display_status; ?>"/><br/>
 <p>* Required</p>
 <input type="submit" name="submit" value="Submit">
 </div>
 </form> 
 <h1>Jaws Restaurant</h1>
 </body>
 </html> 
 <?php
 } 



 // connect to the database
 include('connect-db.php');
 
 // check if the form has been submitted. If it has, process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // confirm that the 'id' value is a valid integer before getting the form data
 if (is_numeric($_POST['itemID']))
 {
 // get form data, making sure it is valid
 $itemID = $_POST['itemID'];
 $item_name = mysql_real_escape_string(htmlspecialchars($_POST['item_name']));
 $category = mysql_real_escape_string(htmlspecialchars($_POST['category']));
 $price = mysql_real_escape_string(htmlspecialchars($_POST['price']));
 $description = mysql_real_escape_string(htmlspecialchars($_POST['description']));
 $display_status = mysql_real_escape_string(htmlspecialchars($_POST['display_status']));
 
 // check that all	 fields are both filled in
 if ($item_name == '' || $category == '' || $price == '' || $description == '' || $display_status == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 //error, display form
 renderForm($itemID, $item_name, $category, $price, $description, $display_status, $error);
 }
 else
 {
 // save the data to the database
 mysql_query("UPDATE menu_items SET item_name='$item_name', category='$category', price='$price', description='$description', display_status='$display_status' WHERE itemID='$itemID'")
 or die(mysql_error()); 
 
 // once saved, redirect back to the menuview page
 header("Location: menuview.php"); 
 }
 }
 else
 {
 // if the 'id' isn't valid, display an error
 echo 'Error!';
 }
 }
 else
 // if the form hasn't been submitted, get the data from the db and display the form
 {
 
 // get the 'itemID' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
 if (isset($_GET['itemID']) && is_numeric($_GET['itemID']) && $_GET['itemID'] > 0)
 {
 // query db
 $itemID = $_GET['itemID'];
 $result = mysql_query("SELECT * FROM menu_items WHERE itemID=$itemID")
 or die(mysql_error()); 
 $row = mysql_fetch_array($result);
 
 // check that the 'itemID' matches up with a row in the databse
 if($row)
 {
 
 // get data from db
 $item_name = $row['item_name'];
 $category = $row['category'];
 $price = $row['price'];
 $description = $row['description'];
 $display_status = $row['display_status'];
 
 // show form
 renderForm($itemID, $item_name, $category, $price, $description, $display_status, '');
 }
 else
 // if no match, display result
 {
 echo "No results!";
 }
 }
 else
 // if the 'itemID' in the URL isn't valid, or if there is no 'itemID' value, display an error
 {
 echo 'Error!';
 }
 }
?>