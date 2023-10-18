<?php
require_once('generate_pdo.php');
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

switch ($_SERVER['REQUEST_METHOD']) {

  case 'GET':
    $request = $pdo->prepare("select * from users ORDER BY id ASC");

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
}
/*** close the database connection ***/
$pdo = null;
