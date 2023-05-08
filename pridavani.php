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
Tabulka::$stranka = "pridavani";
?>
<html>
<head>
<title>Přidávání</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>  
<?php 
include_once("header.php");
?>
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
