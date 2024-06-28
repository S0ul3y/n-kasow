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




    // session_start();
    // require "connexion.php";
    // $btnChange='';
    // $href='';
    // $btnconnect='';
    // $Id='';
    // if(isset($_SESSION['id'])){
    //     $Id=$_SESSION['id'];
    // }
    // if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
    //     $btnChange='Mon profil';
    //     $href='InfoBien.php';
    //     $btnconnect='Profil.php?IdU='.$Id;
    // }else{
    //     if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    //         $btnChange='Dashboard';
    //     }else{
    //         $btnChange='Connexion';
    //     }
    //     $href='Login.php';
    //     $btnconnect='Login.php';
    //  }
     

     $requete = $bd->query("SELECT COUNT(*) AS Nmaison FROM maison WHERE statut='A louer'");
	$row = $requete->fetch(PDO::FETCH_ASSOC);
	$Alouer = $row['Nmaison'];

	$requete = $bd->query("SELECT COUNT(*) AS Nmaison FROM maison WHERE statut='A vendre'");
	$row = $requete->fetch(PDO::FETCH_ASSOC);
	$Avendre = $row['Nmaison'];

	$requete = $bd->query("SELECT COUNT(*) AS Nmaison FROM client");
	$row = $requete->fetch(PDO::FETCH_ASSOC);
	$Nuser = $row['Nmaison'];

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fontAwesome/css/all.min.css">
    <link rel="stylesheet" href="style/Apropos.css">
    <link rel="stylesheet" href="style/navResponsive.css">
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
                    <li><a href="NosPropriete.php">Propriétés</a></li>
                    <!-- <li><a href="#">propriétés</a></li> -->
                    <li><a href="Apropos.php" style="color: #f35525;">A propos</a></li>
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
<!--  -->

<div class="entete"></div>

<!--  -->

<div class="corps">
    <div class="description">
        <span>BIENVENUE</span><br>
        <h1>
            Qui nous sommes
        </h1>
        <p>
            Bienvenue sur <strong>N'KA SOW</strong>, la plateforme immobilière de référence au Mali. 
            Nous sommes une équipe dédiée à la facilitation de l'accès à la propriété et à la 
            location de biens immobiliers pour tous les Maliens. Notre mission est de connecter 
            les acheteurs et les locataires potentiels aux meilleures agences immobilières du pays
            <br><br>
            Nous avons établi des partenariats avec plusieurs agences immobilières de confiance à travers le pays. 
            Cela nous permet de proposer une large gamme de propriétés, répondant aux différents besoins et budgets de 
            nos utilisateurs. Que vous cherchiez à acheter votre première maison, à louer un appartement ou à investir 
            dans l'immobilier, <strong>N'KA SOW</strong> est là pour vous aider.

        </p>
    </div>
    <div class="img"><div class="font"><img src="images/featured-icon.png" alt=""></div></div>
</div>

<div class="vuevideo">
    <span>VUE VIDEO</span>
    <h1>Obtenez Une Vue Plus Rapprochée Et Des Sensations Différentes</h1>
    <!-- <img src="images/video-frame.jpg" alt=""> -->
    <div class="img"><span><i class="fa-solid fa-play"></i></span></div>
</div>

<div class="Blocinfo">
    <div class="info">
        <H1><?php echo $Alouer ;?></H1><p>Proprietés <br> à louer</p><span></span>
    </div>
    
    <div class="info">
        <H1><?php echo $Avendre ;?></H1><p>Appartement <br> à vendre</p><span></span>
    </div>
    <div class="info">
        <H1><?php echo $Nuser ;?></H1><p>Utilisateurs</p><span></span>
    </div>
    <!-- <div class="info">
        <H1>31</H1><p>Agences <br> Immobilières</p><span></span>
    </div> -->

</div><br>
<?php require "texte.php"; ?>
<script src="Nav.js"></script>
</body>
</html>