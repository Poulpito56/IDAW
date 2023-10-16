<!DOCTYPE html>
<html>

<body>
  <a href="connected.php">page</a>
  <?php
  session_start();
  print_r($_SESSION);
  if (isset($_SESSION['login'])) {
    echo $_SESSION['login'];
  }
  ?>
</body>

</html>