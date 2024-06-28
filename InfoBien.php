<!-- <?php
    session_start();
    if (empty($_SESSION['id']) && empty($_SESSION['email'])) {
        header('Location: Login.php');
        exit;
    }
    
?> -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fontAwesome/css/all.min.css">
    <link rel="stylesheet" href="style/InfoBien.css">
    <title>InfoSup</title>
</head>
<body>
    <a href="#" onclick="window.history.back()" class="retour">
        <i class="fa-solid fa-arrow-left"></i>


<!-- <button onclick="window.location.replace(document.referrer);" class="retour">Retour</button> -->
    </a>

    <div class="main">
    
    <?php
        // session_start();
        require "connexion.php";

        // if (isset($_GET['type'],$_GET['statut'],$_GET['quartier']));

        if (isset($_GET['id'])) {
            $ID = $_GET['id'];
        

        $req = $bd->query("SELECT * FROM maison WHERE id=$ID");
        $i = 1;
        while ($ligne = $req->fetch()) {

            $message = "Bonjour, je suis intéressé par votre " .$ligne['type']. "de " .$ligne['prix']. "
        /" .$ligne['par']. "à " .$ligne['quartier']. " que j'ai vu sur votre site. Pouvez-vous me donner plus d'informations ?";
        $message = urlencode($message);


            echo '<div id="image-container">
            <img src="images-Maison/'.$ligne['image0'].'" class="active" id="image1">
            <img src="images-Maison/'.$ligne['image1'].'" id="image2">
            <img src="images-Maison/'.$ligne['image2'].'" id="image3">
            <img src="images-Maison/'.$ligne['image3'].'" id="image4">
            <img src="images-Maison/'.$ligne['image4'].'" alt="">
            <img src="images-Maison/'.$ligne['image5'].'" alt="">
            <img src="images-Maison/'.$ligne['image6'].'" alt="">

            <button id="prev"><i class="fa-solid fa-backward"></i></button>
            <button id="next"><i class="fa-solid fa-forward"></i></button>
        </div>
        <div class="infozone">
            <H1>'.$ligne['titre'].'</H1>
            <div class="section1">
                <span>'.$ligne['statut'].'</span>
                <h3 style="color: #f35525;">'.$ligne['prix'].' FCFA <sapn style="color: black;">/'.$ligne['par'].'</span> </h3>
            </div>
            <div class="caracteristique">
                <span>Salon : '.$ligne['nbreSalon'].'</span>
                <span>Toilette : '.$ligne['nbreToilette'].'</span>
                <span>Chambre : '.$ligne['nbreChambre'].'</span>
                <span>Cuisine : '.$ligne['nbreCuisine'].'</span>
            </div>
            
                <ul>
                    <strong>Information suplémentaire</strong>
                    <dd>
                        <li>'.$ligne['meuble'].'</li>
                        <li>électricité '.$ligne['electricite'].'</li>
                        <li>piscine '.$ligne['piscine'].'</li>
                        <li>Eau '.$ligne['eau'].'</li>
                    </dd>
                </ul><hr>
                <div class="position">
                    <span><i class="fa-solid fa-location-dot"></i></span><h3> <i style="color: #f35525;">\</i> '.$ligne['quartier'].'</h3>
                    <span class="favorie"><i class="fa-solid fa-heart" style="color:white;"></i></span>
                </div>
                <div class="call">
                    <a href="tel:+22350568506">
                        <span class="tel"><i class="fa-solid fa-phone"></i>Telephone</span>
                    </a>
                        <a href="https://wa.me/22398101237?
                    text=Bonjour, je suis intéressé par votre '.$ligne['type'].' de '.$ligne['prix'].'/'.$ligne['par'].' à '.$ligne['quartier'].' que j ai vu sur votre site web. Pouvez-vous me donner plus d informations?"; 
                    target="_blank">
                        <span class="WhatsApp"><i class="fa-brands fa-whatsapp"></i>WhatsApp</span>
                    </a>
                </div><br>
        </div>';
    }
    }
    ?>
    </div>





    <script>
        // Récupérer les éléments du DOM
        var images = document.getElementsByTagName("img"); // Le tableau des images
        var prev = document.getElementById("prev"); // Le bouton précédent
        var next = document.getElementById("next"); // Le bouton suivant
        var index = 0; // L'index de l'image active
        
        // Ajouter un écouteur d'événement au bouton précédent
        prev.addEventListener("click", function() {
          // Cacher l'image active
          images[index].classList.remove("active");
          
          // Décrémenter l'index
          index--;
          
          // Si l'index est inférieur à zéro, revenir à la dernière image
          if (index < 0) {
            index = images.length - 1;
          }
          
          // Afficher la nouvelle image active
          images[index].classList.add("active");
        });
        
        // Ajouter un écouteur d'événement au bouton suivant
        next.addEventListener("click", function() {
          // Cacher l'image active
          images[index].classList.remove("active");
          
          // Incrémenter l'index
          index++;
          
          // Si l'index est supérieur ou égal au nombre d'images, revenir à la première image
          if (index >= images.length) {
            index = 0;
          }
          
          // Afficher la nouvelle image active
          images[index].classList.add("active");
        });
        
        document.getElementById('bouton-retour').addEventListener('click', function(event) {
        event.preventDefault();
        window.location.replace(document.referrer);
    });
        </script>
</body>
</html>