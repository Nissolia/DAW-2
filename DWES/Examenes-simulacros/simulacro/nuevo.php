<?php
  if (session_status() == PHP_SESSION_NONE) session_start();
  if (isset($_REQUEST['nuevo'])) {
    $letras=strtoupper(substr($_REQUEST['nuevo']['marca'],-3));
    do {
      $matricula=rand(100,999).'-'.$letras;
    // } while (array_key_exists($matricula,$_SESSION['coches']));
    } while (isset($_SESSION['coches'][$matricula]));
    $_SESSION['coches'][$matricula]= $_REQUEST['nuevo'];
    setcookie('coches',base64_encode(serialize($_SESSION['coches'])),strtotime('+1 years'));
  }
  header('Location: index.php');