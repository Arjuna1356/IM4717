<?php
@ $db = new mysqli('localhost', 'f37ee', 'f37ee', 'f37ee');
  if (mysqli_connect_errno()){
    echo "Error: Could not connect to database. Please try again later.";
    exit;
  }
  
  $cardName = $_POST['card_name'];
  $cardNo = $_POST['card_no'];
  $cardExpMth = $_POST['card_exp_mth'];
  $cardExpYr = $_POST['card_exp_yr'];
  
  $query = "SELECT * FROM card_auth 
              WHERE cardName = LOWER('$cardName')
              AND cardNum = '$cardNo'
              AND cardExpMth = '$cardExpMth'
              AND cardExpYr = '$cardExpYr'";
  
  $result = $db->query($query);
  
  $movieName = $_POST['movieName'];
  $movieDate = $_POST['movieDate'];
  $movieTime = $_POST['movieTime'];
  $email = $_POST['email'];
  $movieID = $_POST['movieID'];
  
  if ($result->num_rows > 0) 
  {
    $query = "SELECT MAX(orderID) FROM orders";
    $result = $db->query($query);
    
    $orderID;
    
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $orderID = $row['MAX(orderID)'];
      }
    }
    
    if(isset($orderID)) 
    {
      $orderID += 1;
    }
    else
    {
      $orderID = 0;
    }
    
    $amount = 0;

    if (isset($_POST['seatID']))
    {
      foreach ($_POST['seatID'] as $seatID) 
      {
        $stmt = "INSERT into order_items values ('$orderID', '$movieID', '$seatID')";

        $result = mysqli_query($db, $stmt);
      }
      
      $stmt2 = "INSERT into orders values ('$orderID', '$movieID', '$email', '$date', '$amount')";
      $result2 = mysqli_query($db, $stmt2);
    }
  }
  else 
  {
    header("Location: payments.php?movieID=$movieID&checkFailed=true");
  }
  
  $db->close();
  
// $date = CURDATE();

?>

<!-- <script type="text/javascript">
window.location.href = "thankyou.php";
</script> -->
