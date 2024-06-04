<?php
session_start();

echo("<h1>co je uloženo v session:</h1>");
echo($_SESSION["animal"]."<br>");
echo($_SESSION["time"]."<br>");
echo($_SESSION["LoggedIn"]."<br>");

//timestamp to date & time
//&dateTime = date('Y-m-d H:i:s', &timestamp)

?>

<!-- action - soubor který zpracovává poslaná data-->
<!-- method - POST, nebo GET-->
<!-- name - atribut každého prvku - jak bude přijmutá proměnná pojmenována-->
<form action="testDataSession.php" method=POST>
  <label for="li">Login:</label><br>
  <input type="text" name="li"><br>

  <label for="psw">Heslo:</label><br>
  <input type="password" name="psw"><br>

  <input type="checkbox" name="robot">
  <label for="robot">nejsem robot</label><br>
  <br>
  <input type="submit" value="Odeslat data!">
</form> 

<?php
//přijímám data POSTem (důležitý atribut je NAME položky ve formuláři)
$login = $_POST["li"];
$heslo = $_POST["psw"];
$chkbx = $_POST["robot"];

//kontrolní výpis
echo($login. "<br>");
echo($heslo. "<br>");
echo($chkbx. "<br>");

//prace s databazi
require "prihlaseniDBE3.php";
if ($login != "" || $heslo != ""){
$conn = new mysqli($servername, $username, $password, $dbname); //Odkaz (Vytvoření spojení)

$sql = "INSERT INTO tabulkalogin (`idTabulkaLogin`, `login`, `heslo`) VALUES (null,'".$login."','".$heslo."');"; //Odkaz (Vytvoření dotazu v jazyce MySQL)
$result = mysqli_query($conn, $sql); //Odkaz (Odeslání a zpracování dotazu serverem)
}
//vypis dat z DB
$sql = "SELECT * FROM tabulkalogin"; //Odkaz (Vytvoření dotazu v jazyce MySQL)
$result = mysqli_query($conn, $sql); //Odkaz (Odeslání a zpracování dotazu serverem)

//zpracovani $result
while($row = $result->fetch_assoc()) {
  echo "id: " . $row["idTabulkaLogin"]. " - Login: " . $row["login"]. " s heslem:  " . $row["heslo"]. "<br>"; } //Odkaz (Výpis všech řádků - výsledku dotazu)
$conn->close(); //Odkaz (Uzavření spojení)


?>