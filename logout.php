<?php
session_start();

// Détruire la session
session_destroy();

// Rediriger vers la page de connexion (ou autre page)
header("Location:NosPropriete.php");
exit;
?>
