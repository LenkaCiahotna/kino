
<html>


<head>
<title>Grand Cinemax</title>
<meta charset='utf-8'>
<meta name='description' content='Kino Grand Cinemax je jedno nejvýjimečnějších kin na celém světě. Grand Cinemax je místem, kde se filmové sny stávají skutečností.'>
<meta name='keywords' content='Grand Cinemax, Cinemax, IMAX, 2D, 3D, 4DX, kino, film, zážitky'>
<meta name='author' content='Lenka Ciahotná'>
<meta name='robots' content='all'>
<meta name="viewport" content="width=device-width, viewport-fit=cover">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="style.css" type="text/css">
<link rel="icon" type="image/x-icon" href="ikona1.png">
</head>

<body >  
<?php 
require_once("komponenty/vypisTabulky.php");
Tabulka::$stranka = "domu";
include_once("header.php");
?>
<div id="baner"> 
   <div id="nadpis" class="container">
   <h1>Grand Cinemax</h1>
   <h2>Nejlepší kino nenajdete</h2>
   <h4>2D | 3D | 4DX | IMAX</h4>
   </div>
</div>
<div class="container">
<div class="telo">
Vítáme vás v Grand Cinemax, jednom z nejvýjimečnějších kin na celém světě. Toto kino přináší nejen nejnovější filmy, ale také zážitek, který zanechává diváky bez dechu. S inovativními technologiemi, pohodlnými sedadly a nádherným designem je Grand Cinemax místem, kde se filmové sny stávají skutečností.
<br><br>
<h3>O historii:</h3>
Grand Cinemax se pyšní dlouhou tradicí, která sahá až do roku 1950, kdy bylo otevřeno jako malé kino se dvěma sály. Během let se však proměnilo v ikonický kulturní bod města, který si získal srdce filmových nadšenců. Díky neustálé modernizaci a závazku k vynikajícímu filmovému zážitku se Grand Cinemax stal synonymem pro kvalitu a inovace ve filmovém průmyslu.
<br><br>
<h3>Technologické inovace:</h3>
Grand Cinemax je vybaven nejmodernějšími technologiemi, které posouvají hranice filmového zážitku. Obrazová kvalita je zaručena nejnovějšími projekčními systémy, které přinášejí ostrý obraz a živé barvy na velké plátno. Pro opravdové ponoření do děje jsou v sálech instalovány ozvučovací systémy nejvyšší kvality, které divákům přinášejí křišťálově čistý zvuk ve všech jeho nuancích.
<br><br>
<h3>Komfort a pohodlí:</h3>
Ve snaze poskytnout divákům nejlepší možný zážitek je v Grand Cinemaxu kladen důraz na pohodlí. Každé sedadlo je ergonomicky navrženo a vybaveno polohovatelnými opěrkami nohou, které umožňují relaxaci a komfort po celou dobu promítání. Navíc, elegantní interiér a prostorné prostory ve foyeru přispívají k příjemné atmosféře a pocitu luxusu.
<br>
<br>
<h3>Galerie:</h3>
<div class="carousel">
   <img src="obrazky\obr7.jpg">
   <img src="obrazky\obr1.jpg">
   <img src="obrazky\obr10.jpg">
   <img src="obrazky\obr13.jpg">
   <img src="obrazky\obr11.jpg">
   <img src="obrazky\obr2.jpg">
   <img src="obrazky\obr3.jpg">
   <img src="obrazky\obr4.jpg">
   <img src="obrazky\obr12.jpg">
   <img src="obrazky\obr5.jpg">
   <img src="obrazky\obr14.jpg">
</div>
</div>
</div>

<?php 
include_once("footer.php");
?>
</body>

</html>
