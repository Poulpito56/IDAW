<?php

use function PHPSTORM_META\type;

require_once('generate_pdo.php');
header('Content-Type: application/json');

switch ($_SERVER['REQUEST_METHOD']) {

  case 'GET':
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
    } else {
      http_response_code(422);
      echo json_encode(["message" => "erreur parametre id manquant"]);
      $pdo = null;
      exit;
    }

    $request = $pdo->prepare("select name, email from users WHERE id = '" . $id . "'");

    if (!$request->execute()) {
      http_response_code(500);
      echo json_encode(["message" => "erreur lors de la lecture des utilisateurs."]);
    } else {
      // retrieve data from database using fetch(PDO::FETCH_OBJ) and
      $reponse = $request->fetchAll(PDO::FETCH_OBJ);

      http_response_code(200);
      echo json_encode($reponse);
    }
    break;
}
/*** close the database connection ***/
$pdo = null;
