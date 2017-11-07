<?php
  if (isset($_POST["submit"])) {
    $to = 'f37ee@localhost';
    $subject = $_POST['name'];
    $message = $_POST['comments'];
    $from = $_POST['emailadd'];
    $headers = "From:".$from;

    mail($to, $subject, $message, $headers, '-f37ee@localhost');
    echo "<script>alert('Your enquiry/feedback has been sent!'); </script>";
  }
 ?>
<html lang="en">

<head>
<title>Lunar Theatre</title>
<meta charset="utf-8">

<link rel="stylesheet" href="css/template_styles.css">
<link rel="stylesheet" href="css/contactform.css">

<style>

</style>
<script>
function checkEmail(){
var formEmail = document.getElementById("email");
var letters = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

if (formEmail.value.match(letters)) {
  return true;
}
else {
  alert('Please enter a valid email.');
  return false;
}
}

</script>

</head>

<body>
  <header>
    <div id="logo">
      <a href="index.html">
        <img src="images/logo.png"
          alt="Lunar Theatre">
      </a>
    </div>

    <div id="location-details">
      <h1>Lunar Theatre at Kino Place</h1>
      <h2>357 North Ave., Kino Place SG 357246</h2>
      <p>Email: customersvc@lunartheatre.com.sg</p>
      <p>Hotline: (+65) 6234-1234</p>
    </div>
  </header>

  <nav>
    <ul>
      <li><a href="index.html">Home</a></li>
      <li><a href="movies.html">Movies</a></li>
      <li><a href="buytickets.html">Buy Tickets</a></li>
      <li><a href="checkbooking.php">Check Booking</a></li>
      <li><a href="contactus.php">Contact Us</a></li>
    </ul>
  </nav>
<div id="content">
  <div id="breadcrumbs">
    <a href="index.html">Home</a> <p>>></p> <p><b>Contact Us</b></p>
  </div>

  <div id="formbox">
    <h1><b>Contact Us</b></h1>
    <p><b>Lunar Theatre at Kino Place <br>
    357 North Ave., Kino Place SG 357246 <br></b>
    Email: <a href="customersvc@lunartheatre.com.sg">customersvc@lunartheatre.com.sg</a><br>
    Hotline: (+65) 6234-1234</p>

    <form action="" method="post" onsubmit="return checkEmail();">
      <label>*Name:</label><input type="text" name="name" id="input" required><br>
      <label>*Email:</label><input type="email" name="emailadd" id="input" required><br>
      <label>*Feedback/Comments:</label><textarea name="comments" rows="8" cols="40" id="input" required></textarea><br>
      <input type="submit" name="submit" value="Submit"><input type="reset" name="clear" value="Clear">
    </form>


    </div>
  </div>

  <footer>Copyright &copy; 2014 Lunar Theatre, All Rights Reserved
  </footer>
</body>
</html>
