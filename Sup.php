<?php
    require 'connexion.php';
    session_start();

    if (isset($_GET['ids'])) {
        $req = $bd->query('delete from maison where id=' . $_GET['ids']);
        header('Location: Admin.php');
      }
?>