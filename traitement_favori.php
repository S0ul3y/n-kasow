<?php
// require "connexion.php";
// session_start();
// // Connexion à la base de données (assure-toi que $bd est défini correctement)
// // ...

// if(isset($_POST['idMaison']) && isset($_POST['isFavori'])) {
//     $idMaison = $_POST['idMaison'];
//     $isFavori = $_POST['isFavori'];

//     // Effectue les opérations nécessaires dans la base de données en fonction de $isFavori
//     if ($isFavori == "1") {
//         // Supprimer la maison des favoris
//         $favorie = $bd->prepare("DELETE FROM favorie WHERE idUser = ? AND idMaison = ?");
//         $favorie->bindValue(1, $idUser, PDO::PARAM_INT);
//         $favorie->bindValue(2, $idMaison, PDO::PARAM_INT);
//         $favorie->execute();
//     } else {
//         // Ajouter la maison aux favoris
//         $favorie = $bd->prepare("INSERT INTO favorie (idUser, idMaison) VALUES (?, ?)");
//         $favorie->bindValue(1, $idUser, PDO::PARAM_INT);
//         $favorie->bindValue(2, $idMaison, PDO::PARAM_INT);
//         $favorie->execute();
//     }

//     // Répondre à la demande AJAX (peut être personnalisé en fonction de tes besoins)
//     echo "Success"; 
// } else {
//     // Répondre à la demande AJAX en cas d'erreurs
//     echo "Error";
// }
?>
