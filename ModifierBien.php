<?php
require 'connexion.php';
$idMaison ='';

if (isset($_GET['idm'])) {
  $idMaison = $_GET['idm'];
}

if (isset($_POST['modifier'])) {
  if (
      !empty($_POST['titre']) && !empty($_POST['type']) && !empty($_POST['statut']) &&
      !empty($_POST['prix']) && !empty($_POST['par']) && !empty($_POST['quartier']) &&
      !empty($_POST['dateAjout']) && 
      // !empty($_POST['nbreSalon']) && !empty($_POST['nbreToilette']) &&
      // !empty($_POST['nbreChambre']) && !empty($_POST['nbreCuisine']) && 
      !empty($_POST['meuble']) &&
      !empty($_POST['electricite']) && !empty($_POST['piscine']) && !empty($_POST['eau'])
  ) {
      // Utilisez une requête préparée pour améliorer la sécurité
      $req = $bd->prepare('UPDATE maison SET 
          titre=?, type=?, statut=?, prix=?, par=?, quartier=?, dateAjout=?, nbreSalon=?, nbreToilette=?, 
          nbreChambre=?, nbreCuisine=?, meuble=?, electricite=?, piscine=?, eau=? WHERE id= ?');
      $req->bindValue(1, $_POST['titre']);
      $req->bindValue(2, $_POST['type']);
      $req->bindValue(3, $_POST['statut']);
      $req->bindValue(4, $_POST['prix']);
      $req->bindValue(5, $_POST['par']);
      $req->bindValue(6, $_POST['quartier']);
      $req->bindValue(7, $_POST['dateAjout']);
      $req->bindValue(8, $_POST['nbreSalon']);
      $req->bindValue(9, $_POST['nbreToilette']);
      $req->bindValue(10, $_POST['nbreChambre']);
      $req->bindValue(11, $_POST['nbreCuisine']);
      $req->bindValue(12, $_POST['meuble']);
      $req->bindValue(13, $_POST['electricite']);
      $req->bindValue(14, $_POST['piscine']);
      $req->bindValue(15, $_POST['eau']);
      $req->bindValue(16, $idMaison, PDO::PARAM_INT);
      $req->execute();
      header('Location: Admin.php');
      exit;
  }
//   else {
//     echo "Erreur lors de la mise à jour : ";
// }
}

if (isset($_GET['idm'])) {
  // $idMaison = $_GET['idm'];
  $req = $bd->query('select * from maison where id=' . $_GET['idm']);
  
  if ($ligne = $req->fetch()) {
      $_POST['titre'] = $ligne['titre'];
      $_POST['type'] = $ligne['type'];
      $_POST['statut'] = $ligne['statut'];
      $_POST['prix'] = $ligne['prix'];
      $_POST['par'] = $ligne['par'];
      $_POST['quartier'] = $ligne['quartier'];
      $_POST['dateAjout'] = $ligne['dateAjout'];
      $_POST['nbreSalon'] = $ligne['nbreSalon'];
      $_POST['nbreToilette'] = $ligne['nbreToilette'];
      $_POST['nbreChambre'] = $ligne['nbreChambre'];
      $_POST['nbreCuisine'] = $ligne['nbreCuisine'];
      $_POST['meuble'] = $ligne['meuble'];
      $_POST['electricite'] = $ligne['electricite'];
      $_POST['piscine'] = $ligne['piscine'];
      $_POST['eau'] = $ligne['eau'];
      
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fontAwesome/css/all.min.css">
    <link rel="stylesheet" href="style/AjouterBien.css">
  <title>Modifier un bien</title>
</head>
<body>
  <h1>Modification</h1>
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="formulaire">
      <div>
        <label for="">Titre</label>
        <input type="text" name="titre" value="<?php if (isset($_POST['titre'])) echo $_POST['titre'] ?>">

        <label for="">Type</label>
        <select name="type" id="">
        <option><?php 
          if (isset($_POST['type'])){
            echo $_POST['type'];
            }else { echo 'Selectionner le type';
            }  ?></option>
          <option value="villa">Villa</option>
          <option value="Appartement">Appartement</option>
          <option value="Boutique">Boutique</option>
          <option value="immeuble">immeuble</option>
        </select>

        <label for="">statut</label>
        <select name="statut" id="">
          <option><?php 
          if (isset($_POST['statut'])){
            echo $_POST['statut'];
            }else { echo 'Selectionner le Statut';
            }  ?></option>
          <!-- <option value="">Selectionner le Statut</option> -->
          <option value="A vendre">A vendre</option>
          <option value="A louer">A louer</option>
          <option value="Vendu">Vendu</option>
          <option value="Loué">Loué</option>
        </select>

        <label for="">Prix</label>
        <input type="number" min="0" name="prix" value="<?php if (isset($_POST['prix'])) echo $_POST['prix'] ?>">

        <label for="">Par jour/mois/vide</label>
        <select name="par" id="" >
        <option><?php 
          if (isset($_POST['par'])){
            echo $_POST['par'];
            }else { echo 'Selectionner un';
            }  ?></option>
          <option value="Jour">Jour</option>
          <option value="Mois">Mois</option>
      </select>
      </div>

      <!-- ********************************************************************************************************* -->
      
      <div class="second-child">
        <label for="">Quartier</label>
        <input type="text"  name="quartier" value="<?php if (isset($_POST['quartier'])) echo $_POST['quartier'] ?>">
        
        <label for="">Nombre de Salon</label>
        <input type="number" min="0" name="nbreSalon" value="<?php if (isset($_POST['nbreSalon'])) echo $_POST['nbreSalon'] ?>">

        <label for="">Nombre de toilette</label>
        <input type="number" min="0" name="nbreToilette" value="<?php if (isset($_POST['nbreToilette'])) echo $_POST['nbreToilette'] ?>">

        <label for="">Nombre de chambre</label>
        <input type="number" min="0" name="nbreChambre" value="<?php if (isset($_POST['nbreChambre'])) echo $_POST['nbreChambre'] ?>">

        <label for="">Nombre de cuisine</label>
        <input type="number" min="0" name="nbreCuisine" value="<?php if (isset($_POST['nbreCuisine'])) echo $_POST['nbreCuisine'] ?>">

        </div>

      <!-- ************************************************************************************************** -->
      
      <div class="second-child">
        <label for="">Date d'ajout</label>
        <input type="date" min="0" name="dateAjout" value="<?php if (isset($_POST['dateAjout'])) echo $_POST['dateAjout'] ?>">
      
        <label for="">Meuble</label>
        <select name="meuble" id="meuble" >
        <option><?php 
          if (isset($_POST['meuble'])){
            echo $_POST['meuble'];
            }else { echo 'Selectionner';
            }  ?></option>
          <option value="Non meublé">Non meublé</option>
          <option value="Meublé">Meublé</option>
        </select>

        <label for="">électricité</label>
        <select name="electricite" id="electricite">
        <option><?php 
          if (isset($_POST['electricite'])){
            echo $_POST['electricite'];
            }else { echo 'Selectionner';
            }  ?></option>
          <option value="disponible">disponible</option>
          <option value="indisponible">indisponible</option>
        </select>

        <label for="">Piscine</label>
        <select name="piscine" id="piscine">
        <option><?php 
          if (isset($_POST['piscine'])){
            echo $_POST['piscine'];
            }else { echo 'Selectionner';
            }  ?></option>
          <option value="disponible">disponible</option>
          <option value="indisponible">indisponible</option>
        </select>

        <label for="">Eau</label>
        <select name="eau" id="eau">
          <<option><?php 
          if (isset($_POST['eau'])){
            echo $_POST['eau'];
            }else { echo 'Selectionner';
            }  ?></option>
          <option value="disponible">disponible</option>
          <option value="indisponible">indisponible</option>
        </select>
      </div>

      <!-- **************************************************************************************************************** -->
      
      
  </div>
  <input type="submit" value="Modifier" name="modifier">
  

      
    </form>
</body>
</html>