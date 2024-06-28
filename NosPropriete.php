<?php
    session_start();
    require "connexion.php";
    // include "favorie.php";
    $msg = '';
    $btnChange='Connexion';
    $href='Login.php';
    $btnconnect='Login.php';
    $Id='';
    $userRole ='';
    $idHouse = '';
    $idUser = '';
    $color='white';

    
    // if(isset($_SESSION['id'])){
    //     $Id=$_SESSION['id'];
    //     $idUser = $_SESSION['id'];
    //     // $btnChange='Mon profil';
    // }

    if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
        // $btnconnect = isset($Id) ? 'Profil.php?IdU=' . $Id : 'Login.php';
        // $btnChange='Mon profil';
        $email = $_SESSION['email'];
        $stmt = $bd->prepare('SELECT id FROM client WHERE email = :email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $row = $stmt->fetch();
        $Id=$row['id'];


        $href='InfoBien.php';
        $btnconnect='Profil.php?IdU='.$Id;
        $btnChange='Mon compte';
        // $href='InfoBien.php';
    }

     if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        $btnChange='Mon compte';
        $href='InfoBien.php';
        $btnconnect='Admin.php';
    }

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

$req = $bd->query("SELECT * FROM maison");
// while ($list = $req->fetch()) {
//     $idHouse=$list['id'];
// }
    // $row = $req->fetch();
    // $idHouse=$row['id'];
// RECHERCHE PARTIE
require "recherche.php";

?>
<?php


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fontAwesome/css/all.min.css">
    <link rel="stylesheet" href="style/NosPropriete.css">
    <link rel="stylesheet" href="style/navResponsive.css">
    <link rel="stylesheet" href="style/responsive.css">
    <title>Mémoire</title>
</head>
<body>
    <div class="afternav">
        <div class="Contenaire">
                
            <div class="info">
                <span><i class="fa-solid fa-envelope"></i> maigasouleymane2440gmail.com</span>
                <div class="barre"></div>
                <span><i class="fa-solid fa-map"></i> Bamako,Mali</span>
            </div>
            <div class="reseausociaux">
                <div class="iconReseau"><i class="fa-brands fa-facebook"></i></div>
                <div class="iconReseau"><i class="fa-brands fa-twitter"></i></div>
                <div class="iconReseau"><i class="fa-brands fa-linkedin"></i></div>
                <div class="iconReseau"><i class="fa-brands fa-instagram"></i></div>
            </div>
        </div>
    </div>
<!-- Nav barre -->

    <div class="Navbarre" id="Myheader">
        <a href="NosPropriete.php"><div class="logo"><img src="images/logo.png" alt=""></div></a>
        <div class="pages">
           <nav id="nav" class="cacher"> 
                <ul>
                    <li><a href="NosPropriete.php" style="color: #f35525;">Propriétés</a></li>
                    <!-- <li><a href="#">propriétés</a></li> -->
                    <li><a href="Apropos.php">A propos</a></li>
                    <li><a href="contacte.php">contact</a></li>
                    <li><a href="<?php echo $btnconnect; ?>"><i class="fa-solid fa-user"></i><a href="<?php echo $btnconnect; ?>"><?php echo $btnChange; ?></a></a></li>
                </ul>
            </nav>
            
        </div>
        <div class="amburgeur">
            <i class="fa-solid fa-bars" id="menu"></i>
            <i class="fa-solid fa-xmark" id="retour"></i>
        </div>
    </div>
<!-- Titre -->
<div class="titre">
    <!-- <span> Laissez-nous <br> Vous guider vers votre maison</span><br> -->
    
    <h1 class="titreTexte">
        <div style="color: #f35525;">Laissez-nous</div>
        <div>vous guidez chez vous 🥰</div> 
    </h1>
    <form action="" method="POST" enctype="multipart/form-data" >
        <select name="type" id="">
            <option value="">Selectionner un type</option>
            <option value="appartement">Appartement</option>
            <option value="villa">Villa</option>
            <option value="immeuble">Immeuble</option>
            <option value="Boutique">Boutique</option>
        </select>

        <select name="statut" id="">
            <option value="">Selectionner le statu</option>
            <option value="A louer">A louer</option>
            <option value="A vendre">A vendre</option>
        </select>

        <input type="text" placeholder="--Le quartier--" list="parfum" name="quartier">
        <datalist id="parfum">
            <option value="Kalaban coura"></option>
            <option value="Faladiè"></option>
            <option value="Sirakoro"></option>
            <!-- <option value=""></option> -->
        </datalist>

        <!-- <input type="text" placeholder="--quartier--"> -->
        <input type="submit" value="Rechercher" name="rechercher">
    </form>
</div>
<!-- <div class="troisboutton">
    <button>Tout</button>
    <button>A Louer</button>
    <button>A Vendre</button>
</div> -->

<!-- Bloc Maison -->

<div class="lesMaison">
    <?php echo $msg; ?>
<?php


if (isset($_POST['favorie'])) {
    $idHouse=$_POST['favorie'];

    if (isset($_SESSION['email']) && !empty($_SESSION['email']) || isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        $favorie = $bd->prepare("SELECT COUNT(*) FROM favorie where idUser = ? and idMaison = ?");
        $favorie->bindValue(1, $idUser, PDO::PARAM_INT);
        $favorie->bindValue(2, $idHouse, PDO::PARAM_INT);   
        $favorie->execute(); 
            $result = $favorie->fetchColumn();
        if ($result < 1) {
            // $color='red';
                $favorie = $bd->prepare('INSERT INTO favorie (idUser, idMaison) VALUES (?, ?)');
                $favorie->bindValue(1, $idUser, PDO::PARAM_INT);
                $favorie->bindValue(2, $idHouse, PDO::PARAM_INT);
                $favorie->execute();
                $color='red';
            // echo"Bonjour";
            }else{
                // $color='white';
                $favorie = $bd->prepare("Delete from favorie where idUser = ? and idMaison = ?");
            // $req = $bd->prepare('INSERT INTO favorie (idUser, idMaison) VALUES (?, ?)');
                $favorie->bindValue(1, $idUser, PDO::PARAM_INT);
                $favorie->bindValue(2, $idHouse, PDO::PARAM_INT);
                $favorie->execute();
                $color='white';
            }
        }else{
            header('Location: login.php');
        }
}
        $i = 1;
        while ($ligne = $req->fetch()) {
            // $idHouse=$ligne['id'];

            $favorie = $bd->prepare("SELECT COUNT(*) FROM favorie WHERE idUser = ? AND idMaison = ?");
        $favorie->bindValue(1, $idUser, PDO::PARAM_INT);
        $favorie->bindValue(2, $ligne['id'], PDO::PARAM_INT);
        $favorie->execute();
        $result = $favorie->fetchColumn();
            
        // Détermine la couleur du cœur en fonction de la présence dans les favoris
        $color = ($result > 0) ? 'red' : 'white';

            echo '<div class="contenaire">
        <form action="" method="POST" enctype="multipart/form-data" > 

        
           <span class="favorie">
           <button type="submit" name="favorie"  value="'.$ligne['id'].'">
                <i class="fa-solid fa-heart" style="color:'.$color.';"></i>
           </button>
           </span>
        
            
        
        </form>
        <a href="'.$href.'?id='. $ligne['id'] .'">
            <div class="img"><img src="images-Maison/'.$ligne['image0'].'" alt=""></div>
        </a>
        <div class="info">
            <div class="section1">
                <h2>'. $ligne['type'] .' </h2>
                <span>'. $ligne['statut'] .'</span>
            </div>

            <div class="caracteristique">
                <span><i class="fa-sharp fa-solid fa-couch"></i> : '. $ligne['nbreSalon'] .'</span>
                <span><i class="fa-sharp fa-solid fa-bath"></i> : '. $ligne['nbreToilette'] .'</span>
                <span><i class="fa-sharp fa-solid fa-bed"></i> : '. $ligne['nbreChambre'] .'</span>
                <span><i class="fa-sharp fa-solid fa-kitchen-set"></i> : '. $ligne['nbreCuisine'] .'</span>
            </div>
            <div class="position">
                <span><i class="fa-solid fa-location-dot"></i></span><h3> <i>\</i>'. $ligne['quartier'] .'</h3>
            </div>
                
        </div><hr>
        <a href="'.$href.'?id='. $ligne['id'] .'" class="Savoirplus">En savoir plus</a>
    </div>';
    }
 
    ?>


</div>



<?php require "texte.php"; ?>
<script src="Nav.js"></script>

</body>
</html>