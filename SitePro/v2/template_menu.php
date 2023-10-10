<head>
  <title>Hector Durand</title>
  <link rel="stylesheet" href="styles.css" type="text/css"
  media="screen" title="default" charset="utf-8" />
</head>
<body>
  <?php
    function renderMenuToHTML($currentPageId) {
      $mymenu = array(
      'index' => 'Accueil',
      'cv' => 'Cv',
      'hobbies' => 'Hobbies',
      'projets' => 'Mes Projets'
      );
      echo "<header>
      <nav class=\"navigation-bar\">";
      foreach($mymenu as $pageId => $pageParameters) {
        if($currentPageId == $pageId){
          echo "<a class=\"navigate-link active\" href=\"${pageId}.php\">${pageParameters}</a>";
        }
        else{
          echo "<a class=\"navigate-link\" href=\"${pageId}.php\">${pageParameters}</a>";
        }
      }
      echo "\n<img class=\"profil-image\" src=\"./ressources/cam.jpg\" alt=\"Remsss\">
      </nav>
    </header>";
    }
  ?>