<?php
  function renderMenuToHTML($currentPageId) {
    $mymenu = array(
    'accueil' => 'Accueil',
    'cv' => 'Cv',
    'hobbies' => 'Hobbies',
    'contact' => 'Contact',
    'projets' => 'Mes Projets'
    );
    $lang = 'fr';
    if(isset($_GET['lang'])) {
      $lang = $_GET['lang'];
    }
    echo "<header>
    <nav class=\"navigation-bar\">";
    foreach($mymenu as $pageId => $pageParameters) {
      if($currentPageId == $pageId){
        echo "<a class=\"navigate-link active\" href=\"index.php?page=${pageId}&lang=${lang}\">${pageParameters}</a>";
      }
      else{
        echo "<a class=\"navigate-link\" href=\"index.php?page=${pageId}&lang=${lang}\">${pageParameters}</a>";
      }
    }
    echo "\n<img class=\"profil-image\" src=\"./ressources/cam.jpg\" alt=\"Remsss\">
    </nav>
  </header>";
  }
?>