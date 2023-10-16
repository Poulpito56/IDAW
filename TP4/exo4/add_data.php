<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $name = $_POST['name'];
    $email = $_POST['email'];

    try {
      // Connexion à la base de données
      require_once('config.php');
      $connectionString = "mysql:host=" . _MYSQL_HOST;
      if (defined('_MYSQL_PORT'))
        $connectionString .= ";port=" . _MYSQL_PORT;
      $connectionString .= ";dbname=" . _MYSQL_DBNAME;
      $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
      $pdo = NULL;
      try {
        $pdo = new PDO($connectionString, _MYSQL_USER, _MYSQL_PASSWORD, $options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $erreur) {
        echo 'Erreur : ' . $erreur->getMessage();
      }

      // Préparer et exécuter la requête d'insertion
      $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
      $stmt->bindParam(':name', $name);
      $stmt->bindParam(':email', $email);
      $stmt->execute();

      echo "Données ajoutées avec succès.";
    } catch (PDOException $e) {
      echo "Erreur : " . $e->getMessage();
    }
  } else {
    echo "Méthode non autorisée.";
  }
  ?>
  <br>
  <a href="users.php">Retourner à la BDD</a>
</body>

</html>