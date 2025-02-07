<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
include_once 'Menu.php';

    $menu = new Menu("Google", "google.es");
    $menu = new Menu("Yahoo", "Yahoo.es");
    $menu = new Menu("Youtube", "youtube.com");
  

    echo "<h2>Menú Vertical:</h2>";
    echo $menu->vertical();
    $menu->vertical();

    echo "<h2>Menú Horizontal:</h2>";
   echo  $menu->horizontal();


    ?>
</body>

</html>