<!DOCTYPE html>
<html lang="en">

<?php
  if(isset($_POST['submit']))
  {
    @ $db = new mysqli('localhost', 'f37ee', 'f37ee', 'f37ee');

    $userEmail = $_POST['email_input'];

    $query = "SELECT DISTINCT orderID, movieID from orders WHERE customerEmail='$userEmail'";

    $result = $db->query($query);

    $orders = array();
    $movies = array();

    $bookingFound = ($result->num_rows > 0);

    if($bookingFound)
    {
      while($row = $result->fetch_assoc())
      {
        $orders[] = $row['orderID'];
        $movies[] = $row['movieID'];
      }
    }
    else
    {
      echo '<script language="javascript">';
      echo 'alert("No bookings made under '.$userEmail.' were found.")';
      echo '</script>';
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
      <li><a href="contactus.php">Contact Us</a></li>
    </ul>
  </nav>

  <div id="content">
    <div id="breadcrumbs">
      <a href="index.html">Home</a> <p>>></p> <p><b>Check Bookings</b></p>
    </div>

    <div id="content_box">
      <form action="" method="post" id="email_form">
        <label for="email_input">Email: </label>
        <input type="text" name="email_input" id="email_input" required>
        <br> <br>
        <input type="submit" name="submit" value="Check Bookings">
      </form>

    <?php
      if($bookingFound)
      {
        echo "<table border=\"1\">";
        echo "  <tr>";
        echo "    <th>Order No.</th>";
        echo "    <th>Movie Name</th>";
        echo "    <th>Date</th>";
        echo "    <th>Time</th>";
        echo "    <th>Seats</th>";
        echo "    <th>Total Cost</th>";
        echo "    <th>Booking Date</th>";
        echo "  </tr>";

        for($i = 0; $i < sizeof($orders); $i++)
        {
          $query = "SELECT movieName, movieDate, movieTime from movies WHERE movieID='$movies[$i]'";

          $result = $db->query($query);

          while($row = $result->fetch_assoc())
          {
            $movieName = $row['movieName'];
            $movieDate = $row['movieDate'];
            $movieTime = $row['movieTime'];
          }

          $query = "SELECT seatID from order_items WHERE orderID='$orders[$i]'";

          $result = $db->query($query);

          $seats = array();

          while($row = $result->fetch_assoc())
          {
            $seats[] = $row['seatID'];
          }

          echo "<tr>";
          echo "  <td>$orders[$i]</td>";
          echo "  <td>$movieName</td>";
          echo "  <td>$movieDate</td>";
          echo "  <td>$movieTime</td>";
          echo "  <td>";

          for($j = 0; $j < sizeof($seats); $j++)
          {
            echo "$seats[$j]";

            if($j != (sizeof($seats) - 1))
            {
              echo ", ";
            }
          }

          echo "  </td>";

          echo "    <td>Total Cost</td>";
          echo "    <td>Booking Date</td>";
          echo "</tr>";
        }

        echo "</table>";
      }
    ?>
    </div>
  </div>

  <footer>Copyright &copy; 2014 Lunar Theatre, All Rights Reserved
  </footer>
</body>
</html>
