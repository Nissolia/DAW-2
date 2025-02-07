<?php
  session_start();
  session_destroy();
  setcookie('coches',"",-1);
  header('location:index.php');
?>