<?php

use function PHPSTORM_META\type;

require_once('generate_pdo.php');
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

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
  case 'POST':
    $data = json_decode(file_get_contents('php://input'));

    if (!isset($data->name) || !isset($data->email)) {
      http_response_code(400);
      echo json_encode(["message" => "Les champs 'name' et 'email' sont obligatoires."]);
    } else {
      $request = $pdo->prepare("INSERT INTO `users` (name, email) VALUES ('{$data->name}', '{$data->email}')");
      if ($request->execute()) {
        http_response_code(201);
        echo json_encode(["message" => "Utilisateur créé avec succès.", "id" => $pdo->lastInsertId()]);
      } else {
        http_response_code(500);
        echo json_encode(["message" => "Erreur lors de la création de l'utilisateur."]);
      }
    }
    break;
  case 'PUT':
    $data = json_decode(file_get_contents('php://input'));

    if (!isset($data->name) || !isset($data->email) || !isset($data->id)) {
      http_response_code(400);
      echo json_encode(["message" => "Les champs 'name', 'email' et 'id' sont obligatoires."]);
    } else {
      $request = $pdo->prepare("UPDATE users SET name = '{$data->name}', email = '{$data->email}' WHERE id = '{$data->id}'");
      if ($request->execute()) {
        http_response_code(200);
        echo json_encode(["message" => "Utilisateur modifié avec succès."]);
      } else {
        http_response_code(500);
        echo json_encode(["message" => "Erreur lors de la modification de l'utilisateur."]);
      }
    }
    break;
  case 'DELETE':
    $data = json_decode(file_get_contents('php://input'));

    if (!isset($data->id)) {
      http_response_code(400);
      echo json_encode(["message" => "Le champ 'id' sont obligatoires."]);
    } else {
      $request = $pdo->prepare("DELETE FROM users WHERE id = {$data->id}");
      if ($request->execute()) {
        http_response_code(200);
        echo json_encode(["message" => "Utilisateur supprimé avec succès."]);
      } else {
        http_response_code(500);
        echo json_encode(["message" => "Erreur lors de la suppression de l'utilisateur."]);
      }
    }
    break;
}
/*** close the database connection ***/
$pdo = null;
