<?php
require 'connexion.php';

if (isset($_POST['ajouter'])) {
    $titre = $_POST['titre'];
    $type = $_POST['type'];
    $statut = $_POST['statut'];
    $prix = $_POST['prix'];
    $par = $_POST['par'];
    $quartier = $_POST['quartier'];
    $dateAjout = $_POST['dateAjout'];
    $nbreSalon = $_POST['nbreSalon'];
    $nbreToilette = $_POST['nbreToilette'];
    $nbreChambre = $_POST['nbreChambre'];
    $nbreCuisine = $_POST['nbreCuisine'];
    $meuble = $_POST['meuble'];
    $electricite =$_POST['electricite'];
    $piscine = $_POST['piscine'];
    $eau = $_POST['eau'];
    
    if (isset ($_POST['titre'],$_POST['type'],$_POST['statut'],$_POST['prix'],$_POST['par'],
    $_POST['quartier'], $_POST['dateAjout'],$_POST['nbreSalon'],$_POST['nbreToilette'],
    $_POST['nbreChambre'],$_POST['nbreCuisine'],$_POST['meuble'],$_POST['electricite'],
    $_POST['piscine'],$_POST['eau'])) {

        $noms_images = array();

        // Traitez les 7 images
        for ($i = 0; $i < 7; $i++) {
            $nom_champ_image = "image" . $i;
            if (isset($_FILES[$nom_champ_image])) {
                $img_nom = $_FILES[$nom_champ_image]['name'];
                $tmp_nom = $_FILES[$nom_champ_image]['tmp_name'];
                $time = time();
                $nouveau_nom_img = $time . $img_nom;

                $deplacer_image = move_uploaded_file($tmp_nom, "images-Maison/" . $nouveau_nom_img);

                if ($deplacer_image) {
                    $noms_images[] = $nouveau_nom_img;
                } else {
                    // Si le déplacement de l'image a échoué, affichez un message d'erreur
                    $message = '<p style="color:red">Erreur lors du déplacement de l\'image ' . $i . '</p>';
                    // Vous pouvez également arrêter le traitement ici si une image échoue.
                }
            }
        }
        
        // Assurez-vous que toutes les images ont été correctement téléchargées
        if (count($noms_images) == 7) {
            // Toutes les images sont présentes, vous pouvez exécuter la requête SQL
            $req = $bd->prepare("INSERT INTO maison (titre, type, statut, prix, par, quartier, dateAjout, nbreSalon, 
            nbreToilette, nbreChambre, nbreCuisine, meuble, electricite, piscine, eau, image0, image1, 
            image2, image3, image4, image5, image6) 
            VALUES (:titre, :type, :statut, :prix, :par, :quartier, :dateAjout, :nbreSalon, :nbreToilette, 
            :nbreChambre, :nbreCuisine, :meuble, :electricite, :piscine, :eau, :image0, :image1, :image2, :image3, 
            :image4, :image5, :image6)");
    
            $req->bindParam(':titre', $titre);
            $req->bindParam(':type', $type);
            $req->bindParam(':statut', $statut);
            $req->bindParam(':prix', $prix);
            $req->bindParam(':par', $par);
            $req->bindParam(':quartier', $quartier);
            $req->bindParam(':dateAjout', $dateAjout);
            $req->bindParam(':nbreSalon', $nbreSalon);
            $req->bindParam(':nbreToilette', $nbreToilette);
            $req->bindParam(':nbreChambre', $nbreChambre);
            $req->bindParam(':nbreCuisine', $nbreCuisine);
            $req->bindParam(':meuble', $meuble);
            $req->bindParam(':electricite', $electricite);
            $req->bindParam(':piscine', $piscine);
            $req->bindParam(':eau', $eau);
            $req->bindParam(':image0', $noms_images[0]);
            $req->bindParam(':image1', $noms_images[1]);
            $req->bindParam(':image2', $noms_images[2]);
            $req->bindParam(':image3', $noms_images[3]);
            $req->bindParam(':image4', $noms_images[4]);
            $req->bindParam(':image5', $noms_images[5]);
            $req->bindParam(':image6', $noms_images[6]);
            $req->execute();

        } else {
            $message = '<p style="color:red">Erreur lors du déplacement de certaines images</p>';
        }
    } else{
      $message = '<p style="color:red">Un champs est vide</p>';
    }
    header('Location:NosPropriete.php');
  }

// ====================================================================================================================================

if (isset($_GET['idm'])) {
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
      $_FILES['image0'] = $ligne['image0'];
      $_POST['image1'] = $ligne['image1'];
      $_POST['image2'] = $ligne['image2'];
      $_POST['image3'] = $ligne['image3'];
      $_POST['image4'] = $ligne['image4'];
      $_POST['image5'] = $ligne['image5'];
      $_POST['image6'] = $ligne['image6'];
      
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
  <title>Ajouter un bien</title>
</head>
<body>
  <h1>Ajouter votre propriété</h1>
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
          <option value="">Aucun</option>
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
      
      <div>
        <!-- <h3>Les images</h3> -->
        <label for="">Image principale</label>
        <input type="file" name="image0" value="<?php if (isset($_POST['image0'])) echo $_POST['image0'] ?>">

        <label for="">Image 1</label>
        <input type="file" name="image1" value="<?php if (isset($_POST['image1'])) echo $_POST['image1'] ?>">

        <label for="">Image 2</label>
        <input type="file" name="image2" value="<?php if (isset($_POST['image2'])) echo $_POST['image2'] ?>">

        <label for="">Image 3</label>
        <input type="file" name="image3" value="<?php if (isset($_POST['image3'])) echo $_POST['image3'] ?>">

        <label for="">Image 4</label>
        <input type="file" name="image4" value="<?php if (isset($_POST['image4'])) echo $_POST['image4'] ?>">

        <label for="">Image 5</label>
        <input type="file" name="image5" value="<?php if (isset($_POST['image5'])) echo $_POST['image5'] ?>">

        <label for="">Image 6</label>
        <input type="file" name="image6" value="<?php if (isset($_POST['image6'])) echo $_POST['image6'] ?>">

        
      </div>
  </div>

  <?php if (isset($_GET['idm'])) { ?>
                <div>
                    <label for="">&nbsp;</label>
                    <input type="hidden" name="id" value="<?php if (isset($_POST['id'])) echo $_POST['id'] ?>">
                    <input type="submit" value="Modifier" name="modifier">
                </div>
            <?php } else { ?>
                <div>
                    <label for="">&nbsp;</label>
                    <input type="submit" value="Ajouter" name="ajouter">
                </div>
            <?php } ?>

      
    </form>
</body>
</html>