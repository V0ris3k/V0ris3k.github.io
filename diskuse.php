
<link rel="stylesheet" href="3D.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


    <div class="justify-content-center shadow">
        <nav class="navbar py-0 shadow">
            <a href="index.php"><img src="fotka.png" alt="fotka" style="height: 45px; width: 45px;"></a>
            <a href="index.php">Domů</a>
            <a href="galerie.php">Galerie</a>
            <a style="float: right;" href="form.php">Nezávazná poptávka</a>
            <a href="admin.php">Registrace</a>
            <a href="diskuse.php">Diskuse</a>
        </nav>
      </div>


<form action="diskuse.php" method="POST">
    <label for="aut">Autor:</label>
    <input type="text" name="aut" required> <br>
    <label for="txt">Text:</label> <br>
    <textarea name="txt">
    </textarea> <br>
    <label for="eml">Email:</label>
    <input type="text" name="eml" required> <br>
    <input type="checkbox" name="rbt" required> <label for ="rbt">Robot?</label>
    <input type="submit" name="tlc" value="Odešli dotaz">
</form>
<hr>

<?php

$a = $_POST["aut"];
$t = $_POST["txt"];
$e = $_POST["eml"];
$chckbx = $_POST["rbt"];

echo ($a.$t.$e.$chckbx);

require "prihlaseniDBE3.php";



//vkladani

if ($a != "" || $t != ""|| $e != ""){
$sql = "INSERT INTO diskuse VALUES (null,'".$a."','".$t."','".$e."', curdate(), curtime());"; //Odkaz (Vytvoření dotazu v jazyce MySQL)
$result = mysqli_query($conn, $sql);} //Odkaz (Odeslání a zpracování dotazu serverem)

//výpis
//vypis dat z DB
$sql = "SELECT * FROM diskuse order by iddiskuse desc limit 20;"; //Odkaz (Vytvoření dotazu v jazyce MySQL)
$result = mysqli_query($conn, $sql); //Odkaz (Odeslání a zpracování dotazu serverem)

//zpracovani $result
while($row = $result->fetch_assoc()) {
  echo "Autor: " . $row["autor"]. " text příspěvku: <br> " . $row["text"]. "<br>"; } //Odkaz (Výpis všech řádků - výsledku dotazu)
$conn->close(); //Odkaz (Uzavření spojení)



include "tail.php"
?>