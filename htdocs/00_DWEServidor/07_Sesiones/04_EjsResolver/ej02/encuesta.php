<!-- Crear una página que simula una encuesta. Se realizará una pregunta, con dos botones para responder, cada
vez que se pulse un botón se irán contabilizando (usa sesiones) los votos y actualizando una barra que muestre
el número de votos de cada respuesta. Este resultado se irá almacenando también en una cookie, de manera que
si se cierra el navegador, al abrir la página de nuevo se mostrarán los resultados hasta el momento en que se
cerró. Crear la cookie para 3 meses. -->
<?php
session_start();
if (isset($_REQUEST['reiniciar'])) {
    session_destroy();
    setcookie('amigos',"",-1);
    setcookie('oro',"",-1);
    header("refresh:0;");
}

// 
if (isset($_SESSION['amigos'])) {
    if (isset($_REQUEST['amigos'])) {
        $_SESSION['amigos']++;
        $amigos = $_SESSION['amigos'];
        setcookie("amigos", $amigos, strtotime('+3 months'));
    } else {
        $amigos = isset($_COOKIE["amigos"]) ? $_COOKIE["amigos"] : $_SESSION['amigos'];
    }
} else {
    if (isset($_COOKIE["amigos"])) {
        $_SESSION['amigos'] = $_COOKIE["amigos"];
    }else{
        $_SESSION['amigos'] = 0;
       
    }
    $amigos = $_SESSION['amigos'];
}

if (isset($_SESSION['oro'])) {
    if (isset($_REQUEST['oro'])) {
        $_SESSION['oro']++;
        $oro = $_SESSION['oro'];
        setcookie("oro", $oro, strtotime('+3 months'));
    } else {
        $oro = isset($_COOKIE["oro"]) ? $_COOKIE["oro"] : $_SESSION['oro'];
    }
} else {
    if (isset($_COOKIE["oro"])) {
        $_SESSION['oro'] = $_COOKIE["oro"];
    }else{
        $_SESSION['oro'] = 0;
    }
    $oro = $_SESSION['oro'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta</title>
    <style>
        .verde {
            padding-right: 12px;
            color: green;
        }
        .rojo {
            color: red;
        }
    </style>
</head>
<body>
    <?php
    $verde = "<td class='verde'> ➤ </td>";
    $rojo = "<td class='rojo'> ➤ </td>";
    ?>
    <h2>¿Qué es el One piece?</h2>
    <table>
        <tr>
            <td><h1>Amigos</h1></td>
            <?php
            if (isset($amigos)) {
                for ($i = 0; $i < $amigos; $i++) {
                    echo $verde;
                }
            }
            ?>
        </tr>
        <tr>
            <td><h1>Un tesoro</h1></td>
            <?php
            if (isset($oro)) {
                for ($i = 0; $i < $oro; $i++) {
                    echo $rojo;
                }
            }
            ?>
        </tr>
    </table>
    <form action="" method="post">
        <input type="hidden" name="amigos" value="true">
        <input type="submit" value="Amigos">
    </form>
    <form action="" method="post">
        <input type="hidden" name="oro" value="true">
        <input type="submit" value="Tesoro">
    </form>
    <form action="" method="post">
        <input type="hidden" name="reiniciar" value="reiniciar">
        <input type="submit" value="Reiniciar votacion">
    </form>
</body>
</html>
