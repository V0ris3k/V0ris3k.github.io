<?php
//session
session_start();

$_SESSION["animal"] = "pes";
$_SESSION["time"] = time();
$_SESSION["LoggedIn"] = true;
//definice promenne
$text = "";
$cislo = 0;
$text2 = "pane!";
$cislo2 = 4;

//soucet cisel
echo($cislo+$cislo2);
//scitani stringu
echo($text.$text2);
?>
<br>

<a href="Untitled-1.php?id=poslaneData">sem klikni</a>
<a href="testDataSession.php">vypis data ze session</a>

<?php
//prijmu data co mi prisli v URL
$prislo = $_GET["id"];
//kontorlni vypis
echo("<br>".$prislo);
?>