<!DOCTYPE html>
<html lang="en">

<?php
  if(isset($_POST['submit']))
  {
    @ $db = new mysqli('localhost', 'f37im', 'f37im', 'f37im');

    $userEmail = $_POST['email_input'];
    
    $query = "SELECT movies.movieName, movies.movieDate, movies.movieTime,
                order_items.seatNo, orders.amount, orders.bookingDate
                  FROM customers, movies, orders, order_items
                    WHERE customers.email=$userEmail
                      AND orders.customerID=customers.customerID
                      AND order_items.orderID=orders.orderID
                      AND movies.movieID=orders.movieID";
    
    $result = $db->query($query);
    
    $db->close();
    
    if($result)
    {
      
    }
    else
    {
      
    }
  }
?>

<head>
<title>Lunar Theatre</title>
<meta charset="utf-8">

<link rel="stylesheet" href="css/template_styles.css">
<link rel="stylesheet" href="css/check_booking.css">

<style>

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
    <div id="breadcrumbs">
      <a href="index.html">Home</a> <p>>></p> <p>Check Bookings</p>
    </div>
    
    <form action="get_booking" method="post" id="email_form">
      <label for="email_input">Email: </label>
      <input type="text" name="email_input" id="email_input" required>
      <br> <br>
      <input type="submit" value="Check Bookings">
    </firm>
  </div>
  
  <footer>Copyright &copy; 2014 Lunar Theatre, All Rights Reserved
  </footer>
</body>
</html>


