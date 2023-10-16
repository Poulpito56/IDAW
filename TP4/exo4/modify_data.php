<?php
$name = $_POST['name'];
$email = $_POST['email'];
$record_id = $_POST['id'];
?>
<!DOCTYPE html>
<html>

<head>
  <title>Modifier une valeur</title>
  <link rel="stylesheet" href="./css/styles.css">
</head>

<body>

  <form class="adding-form" action="modify_script.php" method="POST">
    <div>
      <label for="name">Name :</label>
      <?php
      echo "<input type=\"text\" id=\"name\" name=\"name\" value=\"" . $_POST['name'] . "\" />";
      ?>
    </div>
    <div>
      <label for="email">Email :</label>
      <?php
      echo "<input type=\"text\" id=\"email\" name=\"email\" value=\"" . $_POST['email'] . "\" />";
      ?>
    </div>
    <?php
    echo "<input type=\"hidden\" id=\"id\" name=\"id\" value=\"" . $_POST['id'] . "\" />";
    ?>
    <div>
      <button type="submit">Modifier</button>
    </div>
  </form>
</body>

</html>