<?php
include_once 'Coche.php';
if (session_status() == PHP_SESSION_NONE) session_start();



if (!isset($_SESSION['cocheJuan'])) {
    $_SESSION['cocheJuan'] = new Coche("Toyota", "Avensis");

    $_SESSION['cocheJuan']->recorre(60);
    $_SESSION['cocheJuan']->recorre(150);
    $_SESSION['cocheJuan']->recorre(90);
}
if (!isset($_SESSION['cocheLuis'])) {
    $_SESSION['cocheLuis'] = new Coche("Saab", "93");

    $_SESSION['cocheLuis']->recorre(30);
    $_SESSION['cocheLuis']->recorre(40);
    $_SESSION['cocheLuis']->recorre(220);
}

if (isset($_REQUEST['coche'])) {
    if ($_REQUEST['coche'] == "juan") {
        $_SESSION['cocheJuan']->recorre($_REQUEST['km']);
    } else {
        $_SESSION['cocheLuis']->recorre($_REQUEST['km']);
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    
    <?php
    echo "El coche de Luis ha recorrido " . $_SESSION['cocheLuis']->getKilometraje() . "Km<br>";
    echo
    "El coche de Juan Carlos ha recorrido " . $_SESSION['cocheJuan']->getKilometraje() . "Km<br>";
    echo "El kilometraje total ha sido de " . Coche::getKilometrajeTotal() . "Km";
    ?>
   <hr>
   <form action="" method="post">
        <select name="coche" id="coche">
            <option value="luis">Coche de luis</option>
            <option value="juan">Coche de juan</option>
        </select><br>
        Cuantos kilometros ha recorrido:
        <input type="number" name="km">
        <input type="submit" value="Enviar">
    </form>
</body>

</html>