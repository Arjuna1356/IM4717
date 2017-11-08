<?php
@ $db = new mysqli('localhost', 'f37ee', 'f37ee', 'f37ee');
  if (mysqli_connect_errno()){
    echo "Error: Could not connect to database. Please try again later.";
    exit;
  }

  $to = 'f37ee@localhost';
  $message = $_POST['comments'];
  $from = $_POST['emailadd'];
  $headers = "From:".$from;

  mail($to, $message, $headers);

?>

<script type="text/javascript">
window.location.href = "contactus.html";
</script>
