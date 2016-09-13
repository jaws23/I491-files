<?php
/* 
 NEWMENU.PHP
 Allows user to create a new entry in the database
*/

 // since this form is used multiple times in this file, I have made it a function that is easily reusable
 function renderForm($item_name, $category, $price, $description, $display_status, $error)
 {
 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
 <head>
 <title>New Menu Item</title>
 <style>
 html { font-family:Arial, Helvetica, sans-serif; color:#EEE8AA; background:#00008B; }
 </style>
 
 </head>
 <body>
 <?php 
 // if there are any errors, display them
 if ($error != '')
 {
 echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 
 
 <form action="" method="post">
 <div>
 <strong>Item Name: *</strong> <input type="text" name="item_name" value="<?php echo $item_name; ?>" /><br/>
 <strong>Category: *</strong> <input type="text" name="category" value="<?php echo $category; ?>" /><br/>
 <strong>Price: *</strong> <input type="text" name="price" value="<?php echo $price; ?>" /><br/>
 <strong>Description: *</strong> <input type="text" name="description" value="<?php echo $description; ?>" /><br/>
 <strong>Display Status: *</strong> <input type="text" name="display_status" value="<?php echo $display_status; ?>" /><br/>
 <p>* required</p>
 <input type="submit" name="submit" value="Submit">
 </div>
 </form> 
 </body>
 </html>
 <?php 
 }
 
 
 

 // connect to the database
 include('connect-db.php');
 
 // check if the form has been submitted. If it has, start to process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // get form data, making sure it is valid
 $item_name = mysql_real_escape_string(htmlspecialchars($_POST['item_name']));
 $category = mysql_real_escape_string(htmlspecialchars($_POST['category']));
 $price = mysql_real_escape_string(htmlspecialchars($_POST['price']));
 $description = mysql_real_escape_string(htmlspecialchars($_POST['description']));
 $display_status = mysql_real_escape_string(htmlspecialchars($_POST['display_status']));
 
 // check to make sure both fields are entered
 if ($item_name == '' || $category == '' || $price == '' || $description == '' || $display_status == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 // if either field is blank, display the form again
 renderForm($item_name, $category, $price, $description, $display_status, $error);
 }
 else
 {
 // save the data to the database
 mysql_query("INSERT menu_items SET item_name='$item_name', category='$category', price='$price', description='$description', display_status='$display_status'")
 or die(mysql_error()); 
 
 // once saved, redirect back to the view page
 header("Location: menuview.php"); 
 }
 }
 else
 // if the form hasn't been submitted, display the form
 {
 renderForm('','','','','','');
 }
?>