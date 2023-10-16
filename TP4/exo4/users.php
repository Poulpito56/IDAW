<!DOCTYPE html>
<html>

<head>
  <title>Cours PHP / MySQL</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
  <h1>Bases de données MySQL</h1>
  <?php
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
  $request = $pdo->prepare("select * from users");
  $request->execute();

  // Récupérer les résultats
  $users = $request->fetchAll(PDO::FETCH_OBJ);
  // Afficher les données
  if (count($users) > 0) {
    echo "<table>";
    echo "<tr><th>Name</th><th>Email</th></tr>";
    foreach ($users as $user) {
      echo "<tr><td class=\"data-field\">" . $user->name . "</td><td class=\"data-field\">" . $user->email . "</td>";
      echo "
      <td>
        <form class=\"image-form\" action=\"delete_data.php\" method=\"POST\">
          <button type=\"submit\">
            <img class=\"logo\" src=\"images/logo_delete.png\" alt=\"delete\">
          </button>
          <input type=\"hidden\" id=\"id\" name=\"id\" value=\"" . $user->id . "\" />
        </form>
      </td>
      <td>
        <form class=\"image-form\" action=\"modify_data.php\" method=\"POST\">
          <button type=\"submit\">
            <img class=\"logo\" src=\"images/logo_modify.png\" alt=\"modify\">
          </button>
          <input type=\"hidden\" id=\"id\" name=\"id\" value=\"" . $user->id . "\" />
          <input type=\"hidden\" id=\"name\" name=\"name\" value=\"" . $user->name . "\" />
          <input type=\"hidden\" id=\"email\" name=\"email\" value=\"" . $user->email . "\" />
        </form>
      </td></tr>";
    }
    echo "</table>";
  } else {
    echo "Aucun résultat trouvé.";
  }
  $pdo = null;

  ?>
  <form class="adding-form" action="add_data.php" method="POST">
    <div>
      <label for="name">Name :</label>
      <input type="text" id="name" name="name" placeholder="Add new name" />
    </div>
    <div>
      <label for="email">Email :</label>
      <input type="text" id="email" name="email" placeholder="Add new email" />
    </div>
    <div>
      <button type="submit">Ajouter</button>
    </div>
  </form>
</body>

</html>