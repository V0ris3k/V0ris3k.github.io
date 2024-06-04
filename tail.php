    <?php
    $acc = $_GET["akce"];
    if ($acc=="odhlaseni") $_SESSION["prihlaseni"] = false;
    if ($_SESSION["prihlaseni"] == true) {
    ?>
    <a href="#?acc=odhlaseni">Odlásit</a>
    <?php
    }
    ?>

    </body>
</html>
