 <?php

    header('Content-Type: text/html; charset=utf-8');

    if ($_REQUEST['cod'] == 'craneo') {
        echo "<p>Cráneo.</p>";
        echo "<p>Estructura ósea que protege el cerebro y da forma al rostro.</p>";
    }
    if ($_REQUEST['cod'] == 'pelvis') {
        echo "<p>Pelvis.</p>";
        echo "<p>Conjunto óseo que conecta la columna con las extremidades inferiores.</p>";
    }
    if ($_REQUEST['cod'] == 'perone')
        echo "<p>Hueso largo y delgado de la pierna, ubicado junto a la tibia..</p>";

    if ($_REQUEST['cod'] == 'c4')
        echo "<p>Cuarto tooltip.</p>";

    ?>
      