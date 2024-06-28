<?php
    session_start();
    require "connexion.php";
    // include "favorie.php";
    $message = '';
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
    // $message='';
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


     if (isset($_POST['envoyer'])) {
        if(!empty($_POST['nomprenom']) && !empty($_POST['email']) && !empty($_POST['tel']) && !empty($_POST['message'])){
            // $email = $_POST['email'];            
    
                $req = $bd->prepare('INSERT INTO commentaire (nomprenom, email, tel, message) VALUES (?, ?, ?, ?)');
                $req->bindValue(1, $_POST['nomprenom']);
                $req->bindValue(2, $_POST['email']);
                $req->bindValue(3, $_POST['tel']);
                $req->bindValue(4, $_POST['message']);
    
                $req->execute();
                header('Location: contacte.php');
                
                $message='<h3 style="color:green"> votre message à été envoyer </h3>';
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
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/navResponsive.css">
    <title>Page de Contact</title>
</head>
<body>

    <div class="afternav">
        <div class="Contenaire">
                
            <div class="info">
                <span><i class="fa-solid fa-envelope"></i> maigasouleymane244@gmail.com</span>
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
                    <li><a href="NosPropriete.php" >Propriétés</a></li>
                    <!-- <li><a href="#">propriétés</a></li> -->
                    <li><a href="Apropos.php">A propos</a></li>
                    <li><a href="contacte.html" style="color: #f35525;">contact</a></li>
                    <li><a href="<?php echo $btnconnect; ?>"><i class="fa-solid fa-user"></i><a href="<?php echo $btnconnect; ?>"><?php echo $btnChange; ?></a></a></li>
                </ul>
            </nav>
            
        </div>
        <div class="amburgeur">
            <i class="fa-solid fa-bars" id="menu"></i>
            <i class="fa-solid fa-xmark" id="retour"></i>
        </div>
    </div>


    <div class="main">
        <div class="un">
            <div class="sp">
                <span><a href="#">  Acceuil</a> / Contact  </span>
            </div>
            <h3>Nous Contacte</h3>
        </div>
        <div class="form">
            <div class="gauche">
                <div class="section">
                    <h6>| Veuillez Remplire</h6>
                    <h2>Des information sur Notre Agence</h2>
                </div>
                <p>
                    Nous Somme une Entreprise de Developpement Logiceil,<br>
                    site Web et Application de Bureaux ou Web, <br>
                    Le but de cette logiciel est d'aide les Agence Immobilier<br>
                    a faire face a ces demende Croissant du XXI Siecle..
                </p>
                <div class="msg">
                    <div class="tel">
                        <img src="images/phone-icon.png" alt="" style="max-width: 50px;">
                        <h6>
                            <a href="#">(+223)50 00 00 00</a><br><span>Numero de Telephone</span>
                        </h6>
                    </div>
                    <div class="mail">
                        <img src="images/email-icon.png" alt="" style="max-width: 50px;">
                        <h6>
                            <a href="#">nkasow@gmail.com</a><br><span>Notre Adresse E-mail</span>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="droite">
                <form action="" method="post">
                    <?php echo $message; ?>
                    <fieldset>
                        <label for="nom">Prenom et Nom</label>
                        <input type="name" name="nomprenom" id="name" placeholder="Votre Nom Complet..." autocomplete="on" required>
                    </fieldset>
                    <fieldset>
                        <label for="email">Addresse Email</label>
                        <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Votre Adresse E-mail..." required="">
                      </fieldset>
                      <fieldset>
                        <label for="subject">Telephone</label>
                        <input type="tel" name="tel" id="tel" placeholder="Votre Numero de Telephone..."  >
                      </fieldset>
                      <!-- <fieldset>
                        <label for="subject">Suijet</label>
                        <input type="subject" name="suijet" id="suijet" placeholder="Le Suijet..." autocomplete="on" >
                      </fieldset> -->
                      <fieldset>
                        <label for="message">Message</label>
                        <textarea name="message" id="message" placeholder="Votre Message"></textarea>
                      </fieldset>
                      <fieldset>
                        <input type="submit" name="envoyer" value="Envoyer">
                      </fieldset>
                </form>
            </div>
        </div>
        <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12469.776493332698!2d-80.14036379941481!3d25.907788681148624!2m3!1f357.26927939317244!2f20.870722720054623!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x88d9add4b4ac788f%3A0xe77469d09480fcdb!2sSunny%20Isles%20Beach!5e1!3m2!1sen!2sth!4v1642869952544!5m2!1sen!2sth" width="100%" height="400px" frameborder="0" style="border:0; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);" allowfullscreen=""></iframe>
        </div>
    </div>
    <?php require "texte.php"; ?>
    <script src="Nav.js"></script>
</body>
</html>