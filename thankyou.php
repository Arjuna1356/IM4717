<?php
@ $db = new mysqli('localhost', 'f37ee', 'f37ee', 'f37ee');
  if (mysqli_connect_errno()){
    echo "Error: Could not connect to database. Please try again later.";
    exit;
  }
?>

<html lang="en">

<head>
<title>Lunar Theatre</title>
<meta charset="utf-8">

<link rel="stylesheet" href="css/template_styles.css">

<style>
  #innerbox {
  margin: 20px;
  height: 425px;
  position: relative;
  background-color: #bbd2e4;
  }

  h1{
    padding-left: 10px;
    color: #869dc7;
  }

  h3{
    padding-left: 10px;
    padding-top: 5px;
    color: #ffffff;
  }

td{
  padding: 10px 10px;
  font-family: arial, sans-serif;
}

</style>

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
      <li><a href="contactus.html">Contact Us</a></li>
    </ul>
  </nav>

  <div id="content">
    <h1><b>Thank you!</b></h1>
    <h3>Your booking has been confirmed.</h3>

    <div id="innerbox">
      <h3>Your booking details:</h3>
        <table>
          <tr>
            <td>Movie Title:</td>
            <td><?php echo $movieName;?></td>
          </tr>
          <tr>
            <td>Movie Time:</td>
            <td><?php echo $movieTime; ?></td>
          </tr>
          <tr>
            <td>Your Email:</td>
            <td><?php echo $email; ?></td>
          </tr>
          <tr>
            <td>Seats Selected:</td>
            <td><?php echo $seatID; ?></td>
          </tr>
          <tr>
            <td>Total Amount (S$):</td>
            <td><?php echo $amount*10; ?></td>
          </tr>
        </table>

  </div>
  </div>

  <footer>Copyright &copy; 2014 Lunar Theatre, All Rights Reserved
  </footer>
</body>
</html>
