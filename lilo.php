<form action="admin.php" method=POST>
    <label for="lin"> Login </label>
    <input type=text name="lin" required><br>
    <label for="hin"> Heslo </label>
    <input type=text name="hin" required><br>
    <input type=submit name="tlc" value="Přihlásit">
</form>
<hr>
<?php
$lin = $_post["lin"];
$hin = $_post["hin"];
$tlc = $_post["tlc"];

require "prihlaseniDBE3.php";

//vypis dat z DB
$sql = "SELECT * FROM uzivatele WHERE (login='".$lin."');"; //Odkaz (Vytvoření dotazu v jazyce MySQL)
$result = mysqli_query($conn, $sql); //Odkaz (Odeslání a zpracování dotazu serverem)

if ($result != false)
    {
        $row = $result->fetch_assoc();
        if ($row["heslo"]==$hin)
        //if ($row["heslo"]==md5($hin))
        {

            $_SESSION["prihlasen"] = true;
            //$_SESSION["prava"] = ;
            echo "Příhlášení proběhlo úspěšně. <br>";
        }
        else echo "Heslo není správně. <br>";
    }
    else echo "Uživatel neexistuje. <br>";

$conn->close(); //Odkaz (Uzavření spojení)
?>