
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
Tabulka::$stranka = "vypis";

?>
<html>
<head>
<title>Výpis</title>
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
    </form>
  
<?php

//$kategorie = Db::queryAll("select * from $druh");

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

 
$vypis->nactidata();
$vypis->vykresli();
/*
echo "<table border=2>";
switch($druh)
{
    case "filmy":
        echo "<tr><td>id filmu</td><td>název</td><td>žánr</td><td>délka v minutách</td><td>popis</td></tr>";
        foreach($kategorie as $d)
        {
            echo "<tr><td>".$d["id_filmu"]."</td><td>".$d["nazev"]."</td><td>".$d["zanr"]."</td><td>".$d["delkaVMinutach"]."</td><td>".$d["popis"]."</td></tr>";
        }
        break;
    case "promitani":
        echo "<tr><td>id promítání</td><td>id filmu</td><td>id sálu</td><td>termín</td></tr>";   
        foreach($kategorie as $d)
        {
            echo "<tr><td>".$d["id_promitani"]."</td><td>".$d["id_filmu"]."</td><td>".$d["id_saly"]."</td><td>".$d["termin"]."</td></tr>";   
        }
        break;
    case "saly":
        echo "<tr><td>id sálu</td><td>kapacita</td></tr>";   
        foreach($kategorie as $d)
        {
            echo "<tr><td>".$d["id_saly"]."</td><td>".$d["kapacita"]."</td></tr>";   
        }
        break;
}

echo "</table>";
*/
?>
<a href="index.php"><button>zpět</button></a>

</body>
</html>