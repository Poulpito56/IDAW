<!DOCTYPE html>
<html>
    <head>
        <title>Test date</title>
        <meta charset="utf-8">
    </head>
    
    <body>
        <h1>Affichage date</h1>
        <?php
          setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
          echo strftime('%A %d %B %Y');
        ?>
        <p>Est la date du jour</p>
        <?php
        $utilisateurs = [
          ['nom' => 'Mathilde', 'mail' => 'math@gmail.com'],
          ['nom' => 'Pierre', 'mail' => 'pierre.giraud@edhec.com'],
          ['nom' => 'Amandine', 'mail' => 'amandine@lp.fr']
        ];
        foreach($utilisateurs as $nb => $infos){
          echo 'Utilisateur n°' .($nb + 1). ' :<br>';
          foreach ($infos as $c => $v){
              echo $c. ' : ' .$v. '<br>';
          }
          echo '<br>';
        }
        ?>
    </body>
</html>