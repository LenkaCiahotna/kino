<?php
session_start();
if($_SESSION["druh"])
{

}
?>
    <form action="vypis.php" method="POST">
    <button name="druh" value=<?=$_SESSION["druh"] ?>>zpět</button>
    </form>

