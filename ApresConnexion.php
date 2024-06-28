
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
        <div class="logo"><img src="images/logo.png" alt=""></div>
        <div class="pages">
           <nav id="nav" class="cacher"> 
                <ul>
                    <li><a href="NosPropriete.php" style="color: #f35525;">Propriétés</a></li>
                    <!-- <li><a href="#">propriétés</a></li> -->
                    <li><a href="Apropos.html">A propos</a></li>
                    <li><a href="contacte.html">contact</a></li>
                    <li><a href="Login.php"><i class="fa-solid fa-user"></i><a href="Login.php">Mon profil</a></a></li>
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
    <form action="">
        <select name="" id="">
            <option value="Appartement">Selectionner un type</option>
            <option value="appartement">Appartement</option>
            <option value="villa">Villa</option>
            <option value="immeuble">Immeuble</option>
        </select>

        <select name="" id="">
            <option value="Appartement">Selectionner le statu</option>
            <option value="louer">Louer</option>
            <option value="vendre">Vendre</option>
        </select>

        <input type="text" placeholder="--Le quartier--" list="parfum">
        <datalist id="parfum">
            <option value="Kalaban coura"></option>
            <option value="Faladiè"></option>
            <option value="Sirakoro"></option>
            <option value=""></option>
        </datalist>

        <!-- <input type="text" placeholder="--quartier--"> -->
        <input type="submit" value="Rechercher">
    </form>
</div>
<!-- <div class="troisboutton">
    <button>Tout</button>
    <button>A Louer</button>
    <button>A Vendre</button>
</div> -->

<!-- Bloc Maison -->

<div class="lesMaison">
    <?php
    session_start();

    if (isset($_SESSION['nom_utilisateur'])) {
        $nom = $_SESSION['nom_utilisateur'];
    }
        // session_start();
        require "connexion.php";

        $req = $bd->query("SELECT * FROM maison");
        $i = 1;
        while ($ligne = $req->fetch()) {
            echo '<div class="contenaire">
        <span class="favorie"><i class="fa-sharp fa-solid fa-star"></i></span>
        
        <a href=" InfoBien.php?id='. $ligne['id'] .'">
            <div class="img"><img src="images-Maison/'.$ligne['image0'].'" alt=""></div>
        </a>
        <div class="info">
            <div class="section1">
                <span>'. $ligne['statut'] .'</span>
                <h3 style="color: #f35525;">'. $ligne['prix'] .' FCFA <sapn style="color: black;">/'. $ligne['par'] .'</span> </h3>
            </div>

            <div class="caracteristique">
                <span><i class="fa-sharp fa-solid fa-couch"></i>: '. $ligne['nbreSalon'] .'</span>
                <span><i class="fa-sharp fa-solid fa-bath"></i>: '. $ligne['nbreToilette'] .'</span>
                <span><i class="fa-sharp fa-solid fa-bed"></i>: '. $ligne['nbreChambre'] .'</span>
                <span><i class="fa-sharp fa-solid fa-kitchen-set"></i>: '. $ligne['nbreCuisine'] .'</span>
            </div>
            <div class="position">
                <span><i class="fa-solid fa-location-dot"></i></span><h3> <i>\</i>'. $ligne['quartier'] .'</h3>
            </div>
                
        </div><hr>
        <a href=" InfoBien.php?id='. $ligne['id'] .'" class="Savoirplus">En savoir plus</a>
    </div>';
    }
    
    ?>

    
    
    

    
    



</div>




<script src="Nav.js"></script>
</body>
</html>