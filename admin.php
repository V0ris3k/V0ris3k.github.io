
<link rel="stylesheet" href="3D.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<body >
    <main>
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
<form action="admin.php" method=POST>
    <label for="jmn"> Jméno </label>
    <input type=text name="jmn"><br>
    <label for="prj"> Příjmení </label>
    <input type=text name="prj"><br>
    <label for="li"> Login </label>
    <input type=text name="li" required><br>
    <label for="h"> Heslo </label>
    <input type=password name="h" required><br>
    <label for="eml"> Email </label>
    <input type=text name="eml" required><br>
    <input type=submit name="tlc" value="Vlož uživatele">
</form>
<hr>
<?php

include "lilo.php";

$j = $_POST["jmn"];
$p = $_POST["prj"];
$l = $_POST["li"];
$h = $_POST["h"];
$e = $_POST["eml"];

require "prihlaseniDBE3.php";

if ($j != "" || $p != ""){
$sql = "INSERT INTO uzivatele VALUES (null,'".$j."','".$p."','".$l."','".md5($h)."','".$e."',curdate());"; //Odkaz (Vytvoření dotazu v jazyce MySQL)
$result = mysqli_query($conn, $sql); //Odkaz (Odeslání a zpracování dotazu serverem)
}

//mazání
$acc = $_GET["akce"];
$id = $_GET["id"];
if($acc=="sm"){
$sql = "delete from uzivatele where idUzivatele=$id"; //Odkaz (Vytvoření dotazu v jazyce MySQL)
$result = mysqli_query($conn, $sql); //Odkaz (Odeslání a zpracování dotazu serverem)
}


//vypis dat z DB
$sql = "SELECT * FROM uzivatele order by idUzivatele desc;"; //Odkaz (Vytvoření dotazu v jazyce MySQL)
$result = mysqli_query($conn, $sql); //Odkaz (Odeslání a zpracování dotazu serverem)
 
//zpracovani $result
echo "<table border=1>";
while($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo  "<td>".$row["Jmeno"] ."</td>";
  echo  "<td>".$row["Prijmeni"] ."</td>";
  echo  "<td>".$row["Login"] ."</td>";
  echo  "<td>".$row["Heslo"] ."</td>";
  echo  "<td>".$row["Email"] ."</td>";
  echo  "<td>".$row["lastLogin"]."</td>";
  echo  '<td><a href="admin.php?id='.$row["idUzivatele"].'&akce=sm">smazat</a></td>';
  echo "</tr>";
}
  echo"</table>";
 
 
  $conn->close(); //Odkaz (Uzavření spojení)

include "tail.php";
?>