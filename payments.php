<?php
@ $db = new mysqli('localhost', 'f37ee', 'f37ee', 'f37ee');
  if (mysqli_connect_errno()){
    echo "Error: Could not connect to database. Please try again later.";
    exit;
  }

  $movieID = $_GET["movieID"];
  echo $movieID;
  $query = $db->prepare("SELECT movieName, movieDate, movieTime from movies where movieID= '$movieID'");
  $query->bind_result($movieName, $movieDate, $movieTime);
  $query->execute();
  $query->fetch();
  $query->close();

  if(isset($_GET["checkFailed"]))
  {
    echo '<script language="javascript">';
    echo 'alert("The credit card provided was invalid! Please try again.")';
    echo '</script>';
  }

// Parsing seatIDs into an array
 $check= $db->prepare("SELECT seatID from order_items where movieID='$movieID'");
 $check->bind_result($n);
 $check -> execute();

while($check->fetch()){
  $taken[]=$n;
}
$check->close();
  $db->close();
?>

<html lang="en">

<head>
<title>Lunar Theatre</title>
<meta charset="utf-8">

<link rel="stylesheet" href="css/template_styles.css">
<link rel="stylesheet" href="css/payment.css">

<style>

input[type=checkbox]:disabled+label{
  background: rgb(208, 27, 27);
}
</style>

<script>

  function seatNA() {
    var seatsTaken = <?php echo json_encode($taken); ?>

    for (var i = 0; i < 29; i++) {
      if (seatsTaken.indexOf(document.getElementById(i).value) !=-1) {
        document.getElementById(i).disabled = true;
      }
    }


}
</script>

</head>

<body onload="seatNA();">
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
    <div id="innerbox">
      <h1><b><u>Payment</u></b></h1>
      <form name="bookingform" action="update.php" method="post">
        <table>
          <tr>
            <td><b>Movie Details</b></td>
            <td><input type="text" name="movieName" value="<?php echo $movieName; ?>" readonly id="details"></td>
            <td><input type="text" name="movieDate" value="<?php echo $movieDate; ?>" readonly id="details"></td>
            <td><input type="text" name="movieTime" value="<?php echo $movieTime; ?>" readonly id="details"></td>
            <td><input type="hidden" name="movieID" value="<?php echo $movieID; ?>"></td>
          </tr>

          <tr>
            <td><b>Email:</b></td>
            <td><input type="email" name="email" required></td>
          </tr>

          <tr>
            <td><b>Seat Selection:</b></td>
          </tr>

          <tr>
            <td colspan="4" style="text-align: center;">
              <h3>S c r e e n</h3>

              <div class="selectionBlock">
                <ol class="theatre">
                  <li>
                    <ol class="seatrow" type="A">
                      <li class="seat">
                        <input type="checkbox" name="seatID[]" value="1A" id="0"/>
                        <label for="0">1A</label>
                      </li>
                      <li class="seat">
                        <input type="checkbox" name="seatID[]" value="1B" id="1"/>
                        <label for="1">1B</label>
                      </li>
                      <li class="seat">
                        <input type="checkbox" name="seatID[]" value="1C" id="2"/>
                        <label for="2">1C</label>
                      </li>
                      <li class="seat">
                        <input type="checkbox" name="seatID[]" value="1D" id="3"/>
                        <label for="3">1D</label>
                      </li>
                      <li class="seat">
                        <input type="checkbox" name="seatID[]" value="1E" id="4"/>
                        <label for="4">1E</label>
                      </li>
                      <li class="seat">
                        <input type="checkbox" name="seatID[]" value="1F" id="5"/>
                        <label for="5">1F</label>
                      </li>
                    </ol>
                  </li>

                  <li>
                    <ol class="seatrow" type="A">
                      <li class="seat">
                        <input type="checkbox" name="seatID[]" value="2A" id="6"/>
                        <label for="6">2A</label>
                      </li>
                      <li class="seat">
                        <input type="checkbox" name="seatID[]" value="2B" id="7"/>
                        <label for="7">2B</label>
                      </li>
                      <li class="seat">
                        <input type="checkbox" name="seatID[]" value="2C" id="8"/>
                        <label for="8">2C</label>
                      </li>
                      <li class="seat">
                        <input type="checkbox" name="seatID[]" value="2D" id="9"/>
                        <label for="9">2D</label>
                      </li>
                      <li class="seat">
                        <input type="checkbox" name="seatID[]" value="2E" id="10"/>
                        <label for="10">2E</label>
                      </li>
                      <li class="seat">
                        <input type="checkbox" name="seatID[]" value="2F" id="11"/>
                        <label for="11">2F</label>
                      </li>
                    </ol>
                  </li>

                  <li>
                    <ol class="seatrow" type="A">
                      <li class="seat">
                        <input type="checkbox" name="seatID[]" value="3A" id="12"/>
                        <label for="12">3A</label>
                      </li>
                      <li class="seat">
                        <input type="checkbox" name="seatID[]" value="3B" id="13"/>
                        <label for="13">3B</label>
                      </li>
                      <li class="seat">
                        <input type="checkbox" name="seatID[]" value="3C" id="14"/>
                        <label for="14">3C</label>
                      </li>
                      <li class="seat">
                        <input type="checkbox" name="seatID[]" value="3D" id="15"/>
                        <label for="15">3D</label>
                      </li>
                      <li class="seat">
                        <input type="checkbox" name="seatID[]" value="3E" id="16"/>
                        <label for="16">3E</label>
                      </li>
                      <li class="seat">
                        <input type="checkbox" name="seatID[]" value="3F" id="17"/>
                        <label for="17">3F</label>
                      </li>
                    </ol>
                  </li>

                  <li>
                    <ol class="seatrow" type="A">
                      <li class="seat">
                        <input type="checkbox" name="seatID[]" value="4A" id="18"/>
                        <label for="18">4A</label>
                      </li>
                      <li class="seat">
                        <input type="checkbox" name="seatID[]" value="4B" id="19"/>
                        <label for="19">4B</label>
                      </li>
                      <li class="seat">
                        <input type="checkbox" name="seatID[]" value="4C" id="20"/>
                        <label for="20">4C</label>
                      </li>
                      <li class="seat">
                        <input type="checkbox" name="seatID[]" value="4D" id="21"/>
                        <label for="21">4D</label>
                      </li>
                      <li class="seat">
                        <input type="checkbox" name="seatID[]" value="4E" id="22"/>
                        <label for="22">4E</label>
                      </li>
                      <li class="seat">
                        <input type="checkbox" name="seatID[]" value="4F" id="23"/>
                        <label for="23">4F</label>
                      </li>
                    </ol>
                  </li>

                  <li>
                    <ol class="seatrow" type="A">
                      <li class="seat">
                        <input type="checkbox" name="seatID[]" value="5A" id="24"/>
                        <label for="24">5A</label>
                      </li>
                      <li class="seat">
                        <input type="checkbox" name="seatID[]" value="5B" id="25"/>
                        <label for="25">5B</label>
                      </li>
                      <li class="seat">
                        <input type="checkbox" name="seatID[]" value="5C" id="26"/>
                        <label for="26">5C</label>
                      </li>
                      <li class="seat">
                        <input type="checkbox" name="seatID[]" value="5D" id="27"/>
                        <label for="27">5D</label>
                      </li>
                      <li class="seat">
                        <input type="checkbox" name="seatID[]" value="5E" id="28"/>
                        <label for="28">5E</label>
                      </li>
                      <li class="seat">
                        <input type="checkbox" name="seatID[]" value="5F" id="29"/>
                        <label for="29">5F</label>
                      </li>
                    </ol>
                  </li>
                </ol>
              </div>
            </td>
          </tr>

          <tr>
            <td><b>Cardholder Name: </b></td>
            <td><input type="text" name="card_name" required></td>
          </tr>

          <tr>
            <td><b>Card No.:</b></td>
            <td><input type="text" name="card_no" size="4" maxlength="4" required></td>
          </tr>

          <tr>
            <td><b>Expiry Date: </b></td>
            <td>
              <input type="text" name="card_exp_mth" size="2" maxlength="2" required>
              /
              <input type="text" name="card_exp_yr" size="2" maxlength="2" required>
            </td>
          </tr>

          <tr>
            <td><input type="submit" name="submit" value="Make Booking"></td>
          </tr>
        </table>
      </form>
    </div>
  </div>

  <footer>Copyright &copy; 2014 Lunar Theatre, All Rights Reserved
  </footer>
</body>
</html>
