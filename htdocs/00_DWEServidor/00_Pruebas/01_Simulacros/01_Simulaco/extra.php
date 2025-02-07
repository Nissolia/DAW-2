<?php
  if (session_status() == PHP_SESSION_NONE) session_start();
  if (isset($_REQUEST['extra'])) {
    $_SESSION['coches'][$_REQUEST['matricula']]['extras'][]=$_REQUEST['extra'];
    setcookie('coches',base64_encode(serialize($_SESSION['coches'])),strtotime('+1 years'));
  }
  header('location:index.php');
?>