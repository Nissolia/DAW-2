<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <?php
    // include_once 'Animal.php'; // no es necesario incluirla
    // include_once 'Ave.php'; // no es necesario incluirla
    include_once 'Pinguino.php';
    include_once 'Gato.php';
    $garfield = new Gato("macho", "romano");
    $tom = new Gato("macho", "belga");
    $lisa = new Gato("hembra", "siamés");
    $silvestre = new Gato("macho");
    echo "$garfield<hr>";
    echo "$tom<hr>";
    echo "$lisa<hr>";
    echo "$silvestre<hr>";
    $miLoro = new Ave("macho");
    echo $miLoro->aseate();
    echo $miLoro->vuela();
    $pingu = new Pinguino("hembra");
    echo $pingu->aseate();
    echo $pingu->vuela();
    ?>
</body