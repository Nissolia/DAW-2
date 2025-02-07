<?php
// Incluir las clases necesarias
include_once 'Animal.php';
include_once 'Mamifero.php';
include_once 'Ave.php';
include_once 'Gato.php';
include_once 'Perro.php';
include_once 'Canario.php';
include_once 'Pinguino.php';
include_once 'Lagarto.php';

// Crear objetos de los animales
$gato = new Gato("Delinux");
$perro = new Perro("Dante");
$canario = new Canario("Kiko");
$pinguino = new Pinguino("Pingu");
$lagarto = new Lagarto("Zolejito");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animales</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Bienvenidos al Mundo de los Animales</h1>
    <div class="animal-container">
        <!-- Gato -->
        <div class="animal">
            <img src="gato.jpg" alt="Gato">
            <p><?php echo $gato->caminar(); ?></p>
            <p><?php echo $gato->maullar(); ?></p>
            <p><?php echo $gato->ronronear(); ?></p>
        </div>

        <!-- Perro -->
        <div class="animal">
            <img src="perro.jpg" alt="Perro">
            <p><?php echo $perro->ladrar(); ?></p>
            <p><?php echo $perro->correr(); ?></p>
            <p><?php echo $perro->buscar(); ?></p>
        </div>

        <!-- Canario -->
        <div class="animal">
            <img src="canario.jpg" alt="Canario">
            <p><?php echo $canario->cantar(); ?></p>
            <p><?php echo $canario->saltar(); ?></p>
            <p><?php echo $canario->ponerHuevos(); ?></p>
        </div>

        <!-- Pinguino -->
        <div class="animal">
            <img src="pinguino.jpg" alt="Pinguino">
            <p><?php echo $pinguino->nadar(); ?></p>
            <p><?php echo $pinguino->deslizarse(); ?></p>
            <p><?php echo $pinguino->hacerSonido(); ?></p>
        </div>

        <!-- Lagarto -->
        <div class="animal">
            <img src="lagarto.jpg" alt="Lagarto">
            <p><?php echo $lagarto->reptar(); ?></p>
            <p><?php echo $lagarto->tomarSol(); ?></p>
            <p><?php echo $lagarto->mudarPiel(); ?></p>
        </div>
    </div>
</body>
</html>
