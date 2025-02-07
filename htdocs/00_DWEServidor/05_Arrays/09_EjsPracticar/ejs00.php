<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio X</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  $num1 = 345673;
  $num2 = 2345432;
  $base = 5;
  $exponente = 3;
  $digito = 7;
  $quitar = 2;
  $inicio = 2;
  $fin = 5;
  $numExtra = 123;
  ?>
  <h1>Funcion voltea</h1>
  <h2>Número sin voltear</h2>
  <p><?= $num1 ?></p>
  <h2>Volteado</h2>
  <p><?php echo voltea($num1); ?></p>
  <hr>

  <h1>Funcion esCapicua</h1>
  <h2>Número <?= $num2 ?></h2>
  <p><?php echo (esCapicua($num2)) ? "Es capicua" : "No es capicua"; ?></p>
  <h2>Número <?= $num1 ?></h2>
  <p><?php echo (esCapicua($num1)) ? "Es capicua" : "No es capicua"; ?></p>
  <hr>

  <h1>Funcion esPrimo</h1>
  <h2>Número <?= $num1 ?></h2>
  <p><?php echo (esPrimo($num1)) ? "Es primo" : "No es primo"; ?></p>
  <h2>Número <?= $num2 ?></h2>
  <p><?php echo (esPrimo($num2)) ? "Es primo" : "No es primo"; ?></p>
  <hr>

  <h1>Funcion siguientePrimo</h1>
  <p>Del número <?= $num1 ?> su siguiente primo es <?= siguientePrimo($num1) ?></p>
  <p>Del número <?= $num2 ?> su siguiente primo es <?= siguientePrimo($num2) ?></p>
  <hr>

  <h1>Funcion potencia</h1>
  <p>La potencia de <?= $base ?> elevado a <?= $exponente ?> es <?= potencia($base, $exponente) ?></p>
  <hr>

  <h1>Funcion digitos</h1>
  <p>El número <?= $num1 ?> tiene <?= digitos($num1) ?> dígitos</p>
  <p>El número <?= $num2 ?> tiene <?= digitos($num2) ?> dígitos</p>
  <hr>

  <h1>Funcion digitoN</h1>
  <p>El dígito en la posición 3 de <?= $num1 ?> es <?= digitoN($num1, 3) ?></p>
  <hr>

  <h1>Funcion quitaPorDetras</h1>
  <p>Quitando <?= $quitar ?> dígitos por detrás a <?= $num1 ?>: <?= quitaPorDetras($num1, $quitar) ?></p>
  <hr>

  <h1>Funcion quitaPorDelante</h1>
  <p>Quitando <?= $quitar ?> dígitos por delante a <?= $num1 ?>: <?= quitaPorDelante($num1, $quitar) ?></p>
  <hr>

  <h1>Funcion pegaPorDetras</h1>
  <p>Pegando el dígito <?= $digito ?> por detrás a <?= $num1 ?>: <?= pegaPorDetras($num1, $digito) ?></p>
  <hr>

  <h1>Funcion pegaPorDelante</h1>
  <p>Pegando el dígito <?= $digito ?> por delante a <?= $num1 ?>: <?= pegaPorDelante($num1, $digito) ?></p>
  <hr>

  <h1>Funcion trozoDeNumero</h1>
  <p>El trozo de <?= $num1 ?> entre las posiciones <?= $inicio ?> y <?= $fin ?> es <?= trozoDeNumero($num1, $inicio, $fin) ?></p>
  <hr>

  <h1>Funcion juntaNumeros</h1>
  <p>El número formado por <?= $num1 ?> y <?= $numExtra ?> es <?= juntaNumeros($num1, $numExtra) ?></p>

  <?php
  //no se hace con arrays :)
  /////////////////////////////////////////////////////////////////////////////// Funciones
  // 1. esCapicua: Devuelve verdadero si el número que se pasa como parámetro es capicúa
  // y falso en caso contrario.
  function esCapicua($num)
  {
    $numVolteado = voltea($num);
    return $num == $numVolteado;
  }
  // 2. esPrimo: Devuelve verdadero si el número que se pasa como parámetro
  // es primo y falso en caso contrario.
  function esPrimo($num)
  {
    if ($num < 2) return false;  // Los números menores que 2 no son primos
    for ($i = 2; $i <= $num / 2; $i++) {  // Revisar hasta la mitad del número
      if ($num % $i == 0) return false;  // Si es divisible por cualquier número, no es primo
    }
    return true;  // Si no se encontró divisor, es primo
  }
  // 3. siguientePrimo: Devuelve el menor primo que es mayor al
  //número que se pasa como parámetro.
  function siguientePrimo($num)
  {
    $num++;
    // Iniciar búsqueda desde el siguiente número
    while (!esPrimo($num)) {
      $num++;
    }
    return $num;
  }

  // 4. potencia: Dada una base y un exponente devuelve la potencia.
  function potencia($base, $exponente)
  {
    if ($exponente == 0) return 1;

    $resultado = 1;
    for ($i = 0; $i < $exponente; $i++) {
      $resultado *= $base;
    }

    return $resultado;
  }
  // 5. digitos: Cuenta el número de dígitos de un número entero.
  function digitos($num)
  {
    $contador = 0;
    while ($num != 0) {
      $num = (int)($num / 10);
      $contador++;
    }
    return $contador;
  }
  // 7. digitoN: Devuelve el dígito que está en la posición n de un número entero.
  // Se empieza contando por el 0 y de izquierda a derecha.
  function digitoN($num, $posicion)
  {
    $num = voltea($num);
    for ($i = 0; $i < $posicion; $i++) {
      $num = (int)($num / 10);
    }
    return $num % 10;
  }
  // 8. posicionDeDigito: Da la posición de la primera ocurrencia de un dígito
  // dentro de un número entero. Si no se encuentra, devuelve -1.
  function posicionDeDigito($num, $digito)
  {
    $posicion = 0;

    while ($num > 0) {
      if ($num % 10 == $digito) {
        return $posicion;
      }
      $num = (int)($num / 10);
      $posicion++;
    }

    return -1;
  }


  // 9. quitaPorDetras: Le quita a un número n dígitos por detrás (por la derecha).
  function quitaPorDetras($num, $quitar)
  {
    for ($i = 0; $i < $quitar; $i++) {
      $num = (int)($num / 10);
    }
    return $num;
  }
  // 10. quitaPorDelante: Le quita a un número n dígitos por delante (por la izquierda).
  function quitaPorDelante($num, $quitar)
  {
    $num = voltea($num);
    for ($i = 0; $i < $quitar; $i++) {
      $num = (int)($num / 10);
    }
    return voltea($num);
  }

  // 11. pegaPorDetras: Añade un dígito a un número por detrás.
  function pegaPorDetras($num, $digito)
  {
    return $num * 10 + $digito;
  }

  // 12. pegaPorDelante: Añade un dígito a un número por delante.
  function pegaPorDelante($num, $digito)
  {
    $multiplicador = 1;
    while ($num >= $multiplicador) {
      $multiplicador *= 10;
    }
    return $digito * $multiplicador + $num;
  }
  // 13. trozoDeNumero: Toma como parámetros las posiciones inicial y
  // final dentro de un número y devuelve el trozo correspondiente.
  function trozoDeNumero($num, $inicio, $fin)
  {
    $num = quitaPorDetras($num, digitos($num) - $fin - 1);
    return quitaPorDelante($num, $inicio);
  }
  // 14. juntaNumeros: Pega dos números para formar uno
  function juntaNumeros($num1, $num2)
  {
    $multiplicador = 1;
    while ($num2 >= $multiplicador) {
      $multiplicador *= 10;
    }
    return $num1 * $multiplicador + $num2;
  }


  // mayor o igual a 1 - se hace division entre 10 y nos vamos quedando con el mod
  // luego 5 *1 = 5*0 > 5 * 10 = 50+4 = 54 ...
  // 6. voltea: Le da la vuelta a un número.
  function voltea($num)
  {
    $volteado = 0;

    while ($num >= 1) {
      $digito = $num % 10;
      $volteado = $volteado * 10 + $digito;
      $num = (int) $num / 10;
    }

    return $volteado;
  }

  ?>

</body>

</html>