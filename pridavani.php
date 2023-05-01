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
  else
  {
    if(isset($_GET['druh']))
  {
    $druh = $_GET["druh"];
  }
  }

  switch($druh)
  {
      case "filmy":
          $vypis = new Filmy();
          break;
  
      case "promitani":
          $vypis = new Promitani();
          break;
  
      case "saly":
          $vypis = new Saly();
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
 <li><a href="razeni.php">Řazení</a></li>
  <li><a href="vyber.php">Výběr</a></li>
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
$vypis->FormularPridavani();
//insert into TABULKA (NAZVY SLOUPCU) values (HODNOTY)



    ?>
     <input type="submit" value="ulož" name="uloz">
    </form>
  
<?php
if (isset($_POST["uloz"]))
{
  $vypis->pridej();
}

$vypis->nactidata();
$vypis->vykresli();
