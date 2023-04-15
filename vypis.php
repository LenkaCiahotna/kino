<?php
require_once("komponenty/vypisTabulky.php");
require_once("Db.php");
Db::connect("localhost", "kino","root", "");
session_start();
$druh = $_POST["druh"];
$_SESSION["druh"] = $druh;
$kategorie = Db::queryAll("select * from $druh");


?>
<html>
<head>
<title><?=$druh?></title>
</head>
<body>
    <h1><?= $druh?></h1>
<?php


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

?>
<a href="index.php"><button>zpět</button></a>
<a href="pridavani.php"><button>přidat</button></a>

</body>
</html>