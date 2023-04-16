<?php
require_once("komponenty/vypisTabulky.php");
require_once("komponenty/sloupec.php");
require_once("Db.php");
Db::connect("localhost", "kino","root", "");
$druh = "filmy";
  if(isset($_POST['druh']))
  {
    $druh = $_POST["druh"];
  }

  $kategorie=null;
  switch($druh)
  {
      case "filmy":
          $vypis = new Filmy($kategorie);
          break;
  
      case "promitani":
          $vypis = new Promitani($kategorie);
          break;
  
      case "saly":
          $vypis = new Saly($kategorie);
          break;
  }


?>
<html>
<head>
<title>Přidávání</title>
</head>

<body>  
<h1>Přidávání</h1>
<nav>
  <ul id="navigace">
 <li><a href="vypis.php">Výpis</a></li>
  <li><a href="pridavani.php">Přidávání</a></li>
 <li><a href="mesto.html">Řazení</a></li>
  <li><a href="skola.html">Výběr</a></li>
  </ul>
  </nav>
    <form method="POST">
    Vyber tabulku: 
    <select name="druh" onchange="submit()">
        <option value="filmy" <?= ($druh=="filmy" ?  'selected' : '') ?>>Filmy</option>
        <option value="promitani" <?= ($druh=="promitani" ?  'selected' : '') ?>>Promítání</option>
        <option value="saly" <?= ($druh=="saly" ?  'selected' : '') ?>>Sály</option>
    </select>
    <?php
$vypis->uprava();

    ?>
    </form>
  
<?php
