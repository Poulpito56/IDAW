<!DOCTYPE html>
<html>
  <?php
    require_once("template_header.php");
  ?>
  <body>
    <?php
      require_once("template_menu.php");
      $currentPageId = 'accueil';
      if(isset($_GET['page'])) {
        $currentPageId = $_GET['page'];
      }
      $lang = 'fr';
      if(isset($_GET['lang'])) {
        $lang = $_GET['lang'];
      }
      if($lang=="fr"){
        echo "<a class=\"navigate-link\" href=\"index.php?page=${currentPageId}&lang=en\">Click to switch to english</a>";
      }
      if($lang=="en"){
        echo "<a class=\"navigate-link\" href=\"index.php?page=${currentPageId}&lang=fr\">Cliquez pour passer en français</a>";
      }
    ?>
    <header class="bandeau_haut">
      <h1 class="titre">Evan DENIS</h1>
    </header>
    <?php
      renderMenuToHTML($currentPageId);
    ?>
    <section class="corps">
      <?php
        $pageToInclude = $currentPageId . $lang . ".php";
        if(is_readable($pageToInclude)) {
          require_once($pageToInclude);
        }
        else {
          require_once("error.php");
        }
      ?>
    </section>
    <?php
      require_once("template_footer" . $lang . ".php");
    ?>
  <body>
</html>