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
<meta charset='utf-8'>
<meta name='description' content='Možné přidávání položek do databáze světoznámého kina Grand Cinemax.'>
<meta name='keywords' content='přidávání, kino, seznam, Grand Cinemax, Cinemax'>
<meta name='author' content='Lenka Ciahotná'>
<meta name='robots' content='all'>
<meta name="viewport" content="width=device-width, viewport-fit=cover">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="style.css" type="text/css">
<link rel="icon" type="image/x-icon" href="ikona1.png">
</head>
<body>  
<?php 
include_once("header.php");
?>
<div class="telo container">
    <form method="POST">
      <table>
        <tr>
    <td>Vyber tabulku:</td>
      <td>    
        <select name="druh" onchange="submit()">
        <option value="filmy" <?= ($druh=="filmy" ?  'selected' : '') ?>>Filmy</option>
        <option value="promitani" <?= ($druh=="promitani" ?  'selected' : '') ?>>Promítání</option>
        <option value="saly" <?= ($druh=="saly" ?  'selected' : '') ?>>Sály</option>
    </select>
  </td>
</tr>
      </table>
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
?>
</div>
<?php
include_once("footer.php");

