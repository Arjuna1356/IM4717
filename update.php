<?php
@ $db = new mysqli('localhost', 'f37ee', 'f37ee', 'f37ee');
  if (mysqli_connect_errno()){
    echo "Error: Could not connect to database. Please try again later.";
    exit;
  }

  $query = $db->prepare("SELECT MAX(orderID) FROM orders");
  $query->bind_result($orderID);
  $query->execute();
  $query->fetch();
  $query->close();

  $movieName = $_POST['movieName'];
  $movieDate = $_POST['movieDate'];
  $movieTime = $_POST['movieTime'];
  $email = $_POST['email'];
  $movieID = $_POST['movieID'];

  $amount = 0;


  if (isset($_POST['seatID'])){
    foreach ($_POST['seatID'] as $seatID) {

      $stmt = "INSERT into order_items values ('$movieID', '$seatID')";

      $result = mysqli_query($db, $stmt);

      $stmt2 = "INSERT into orders (customerEmail, movieID, bookingDate, amount) values ('$email', '$movieID', '$date', '$amount')";
      $result2 = mysqli_query($db, $stmt2);
    }
  }

// $date = CURDATE();

?>

<!-- <script type="text/javascript">
window.location.href = "thankyou.php";
</script> -->
