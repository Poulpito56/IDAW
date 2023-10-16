<!DOCTYPE html>
<html>

<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
</head>

<body>
  <?php
  // Définissez une variable pour stocker le nom du fichier CSS par défaut
  $selectedStyle = 'style1';

  // Vérifiez si un cookie "selectedStyle" existe
  if (isset($_COOKIE['selectedStyle'])) {
    $selectedStyle = $_COOKIE['selectedStyle'];
  }

  // Si le formulaire a été soumis, mettez à jour le style sélectionné
  if (isset($_GET['css'])) {
    $selectedStyle = $_GET['css'];
    setcookie('selectedStyle', $selectedStyle, time() + 3600, '/'); // Enregistrez le choix dans un cookie
  }

  echo "<link rel=\"stylesheet\" href=\"" . $selectedStyle . ".css\" type=\"text/css\"media=\"screen\" title=\"default\" charset=\"utf-8\" />";
  ?>

  <form id="style_form" action="index.php" method="GET">
    <select name="css">
      <option value="style1">style1</option>
      <option value="style2">style2</option>
    </select>
    <input type="submit" value="Appliquer" />
  </form>
</body>

</html>