<form action="hodnotytest.php" method=POST>
  <label for="li">Hodnota:</label><br>
  <input type="text" name="li"><br>

  <input type="submit" value="Odeslat data!">
</form>

----------------------------------------------
<?php
$hodnoty = $_POST["li"];
echo($hodnoty. "<br>");

require "neco.php";
if ($hodnoty != ""){
$conn = new mysqli($servername, $username, $password, $dbname); //Odkaz (Vytvoření spojení)

$sql = "INSERT INTO hodnoty (`idHodnoty`, `hodn`, `PK`) VALUES (null,null ,'".$hodnoty."');"; //Odkaz (Vytvoření dotazu v jazyce MySQL)
$result = mysqli_query($conn, $sql); //Odkaz (Odeslání a zpracování dotazu serverem)
}


$sql = "SELECT * FROM hodnoty"; //Odkaz (Vytvoření dotazu v jazyce MySQL)
$result = mysqli_query($conn, $sql);



?>