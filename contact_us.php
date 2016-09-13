 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
 <head>
 <title>Contact Us</title>
 <style>
 html { font-family:Arial, Helvetica, sans-serif; color:#EEE8AA; background:#DEB887;  }
 h2 {font-size: 250%;}
 h3 {font-size: 150%}
 #map { width: 60%; height: 600px; background-color: grey; }
 #footer {padding: 40px;}
 </style>
 
 <a  href="http://cgi.soic.indiana.edu/~rwjawors/jawshome.html"  style="float:right;"><font size="5"> Home</font></a>
 </head>
 <body link="#D2691E" vlink="red">
 <?php 
 // if there are any errors, display them
 if ($error != '')
 {
 echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 
 <center>
 <h2>Any Comments or Concerns?</h2>
 <form action="" method="post">

 <strong>Name: *</strong> <input type="text" name="name" /><br/>
 <strong>Email: *</strong> <input type="text" name="email" /><br/>
 <strong>Leave A Message: *</strong> <input type="text" name="message" style="height:50px;width:300px"/><br/>
 <p>* Required</p>
 <input type="submit" name="submit" value="Submit">

 </form> 

 <h3>Need Directions? We are located at 403 N Walnut St. Bloomington, IN 47404</h3>
    <div id="map"></div>
    <script>

      function initMap() {
        var myLatLng = {lat: 	39.1696922, lng: -86.53395160000002};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 18,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
        
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBv3mw4QrCPdTCFl4J2VMIJ-2sWxcl5Tvg&callback=initMap">
    </script>

</center>
<div id="footer">
</div>
 </body>

</html>
 <?php
 



 // connect to the database
 include('connect-db.php');
 
 // check if the form has been submitted. If it has, process the form and save it to the database
 if (isset($_POST['submit']))
 { 

 // get form data, making sure it is valid
 $name = mysql_real_escape_string(htmlspecialchars($_POST['name']));
 $email = mysql_real_escape_string(htmlspecialchars($_POST['email']));
 $message = mysql_real_escape_string(htmlspecialchars($_POST['message']));

 
 // check that all	 fields are both filled in
 if ($name == '' || $email == '' || $message == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';

 //error, display form
 renderForm($name, $email, $message, $error);
 }
 else
 {
 // save the data to the database
 mysql_query("INSERT contact SET name='$name', email='$email', message='$message'")
 or die(mysql_error()); 
 
 // once saved, redirect back to the menuview page
 header("Location: thanks.html"); 
 }
 }
  else
 // if the form hasn't been submitted, display the form
 {
 renderForm('','','','','','');
 }
 ?>
 
 
 
 
 
 
 