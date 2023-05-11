<?php
require_once("komponenty/vypisTabulky.php");
?>
<header>
<nav>
    <ul class="odkazy">
      <li class=" <?= Tabulka::$stranka == "domu" ? "nav-vybrany" : "" ?>"><a href="index.php" class="nav-polozka">Grand cinemax</a></li>
        <li class=" <?= Tabulka::$stranka == "vypis" ? "nav-vybrany" : "" ?>"><a href="vypis.php" class="nav-polozka">Výpis</a></li>
        <li class=" <?= Tabulka::$stranka == "pridavani" ? "nav-vybrany" : "" ?>"><a href="pridavani.php" class="nav-polozka">Přidávání</a></li>
        <li class=" <?= Tabulka::$stranka == "razeni" ? "nav-vybrany" : "" ?>"><a href="razeni.php" class="nav-polozka">Řazení</a></li>
        <li class=" <?= Tabulka::$stranka == "vyber" ? "nav-vybrany" : "" ?>"><a href="vyber.php" class="nav-polozka">Výběr</a></li>
    </ul>

  </nav>
</header>