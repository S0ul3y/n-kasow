
<?php
session_start();
if (isset($_SESSION['nom_utilisateur'])) {
    $nom = $_SESSION['nom_utilisateur'];
}

require 'connexion.php';
$message = '';

// EDITION
if (isset($_GET['idm'])) {
    $idUser = $_GET['idm'];
}

if (isset($_POST['modifier'])) {
    if (isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['telephone'], $_POST['adresse'])
        && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email'])
    ) {
        // Récupérer l'email actuel de l'utilisateur
        $stmt = $bd->prepare('SELECT email FROM client WHERE id = ?');
        $stmt->bindValue(1, $idUser, PDO::PARAM_INT);
        $stmt->execute();
        $ancienEmail = $stmt->fetchColumn();

        // Vérifier si le nouvel email est différent de l'ancien
        if ($_POST['email'] !== $ancienEmail) {
            // Vérifier si le nouvel email existe déjà dans la base de données
            $stmt = $bd->prepare('SELECT COUNT(*) FROM client WHERE email = ?');
            $stmt->bindValue(1, $_POST['email']);
            $stmt->execute();
            $count = $stmt->fetchColumn();

            if ($count == 0) {
                // Le nouvel email n'existe pas encore, procéder à la mise à jour
                $req = $bd->prepare('UPDATE client SET nom=?, prenom=?, email=?, telephone=?, adresse=? WHERE id=?');
                $req->bindValue(1, $_POST['nom']);
                $req->bindValue(2, $_POST['prenom']);
                $req->bindValue(3, $_POST['email']);
                $req->bindValue(4, $_POST['telephone']);
                $req->bindValue(5, $_POST['adresse']);
                $req->bindValue(6, $idUser, PDO::PARAM_INT);
                $req->execute();
                header('Location: NosPropriete.php');
            } else {
                // Le nouvel email existe déjà dans la base de données
                $message = '<p style="color:red">L\'email existe déjà pour un autre utilisateur.</p>';
                // $message = "'<p style="color:red;">' L'email existe déjà pour un autre utilisateur.</p>";
            }
        } else {
            // Le nouvel email est identique à l'ancien, pas besoin de mise à jour
            $req = $bd->prepare('UPDATE client SET nom=?, prenom=?, email=?, telephone=?, adresse=? WHERE id=?');
                $req->bindValue(1, $_POST['nom']);
                $req->bindValue(2, $_POST['prenom']);
                $req->bindValue(3, $_POST['email']);
                $req->bindValue(4, $_POST['telephone']);
                $req->bindValue(5, $_POST['adresse']);
                $req->bindValue(6, $idUser, PDO::PARAM_INT);
                $req->execute();
                header('Location:NosPropriete.php ');
                end;
        }
    }
}

 


if (isset($_GET['idm'])) {
    $idUser = $_GET['idm'];

    // Utilisation de la requête préparée pour éviter les injections SQL
    $stmt = $bd->prepare('SELECT * FROM client WHERE id = ?');
    $stmt->bindParam(1, $idUser, PDO::PARAM_INT);
    $stmt->execute();

    if ($ligne = $stmt->fetch()) {
        $_POST['nom'] = $ligne['nom'];
        $_POST['prenom'] = $ligne['prenom'];
        $_POST['email'] = $ligne['email'];
        $_POST['telephone'] = $ligne['telephone'];
        $_POST['adresse'] = $ligne['adresse'];
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
    <link rel="stylesheet" href="style/ModifierCompte.css">
    <title>connexion</title>
</head>
<body>

    <div class="bull A"></div>
    <div class="bull B"></div>
<div class="contenaire">
    <div class="main">

<!-- ************************************************************************************************************************************** -->
        <h4><?php echo $message; ?></h4>
        <form action="" method="POST" enctype="multipart/form-data"  id="register-form">
            <img src="images/Nkaso.png" alt="">
            <!-- <label for="">Email</label> -->
            <input type="text"  placeholder="Nom" name="nom" 
            value="<?php if (isset($_POST['nom'])) echo $_POST['nom'] ?>">

            <input type="text"  placeholder="Prénom" name="prenom"
            value="<?php if (isset($_POST['prenom'])) echo $_POST['prenom'] ?>">

            <input type="email"  placeholder="email" name="email"
            value="<?php if (isset($_POST['email'])) echo $_POST['email'] ?>">

            <input type="number"  placeholder="Télephone" name="telephone"
            value="<?php if (isset($_POST['telephone'])) echo $_POST['telephone'] ?>">

            <input type="text"  placeholder="Adresse" name="adresse"
            value="<?php if (isset($_POST['adresse'])) echo $_POST['adresse'] ?>">
            <div class="btn">
            <a href="#" onclick="window.history.back()">Annuler</a>
            <input type="submit" value="Modifier" name="modifier">
            </div>
            
        </form>

    </div>
    </div>



    <script>
        // var passwordField = document.getElementById('password');
        // var togglePasswordButton = document.getElementById('togglePassword');

        // togglePasswordButton.addEventListener('click', function() {
        //     if (passwordField.type === 'password') {
        //         passwordField.type = 'text';
        //         togglePasswordButton.textContent = '🫢';
        //     } else {
        //         passwordField.type = 'password';
        //         togglePasswordButton.textContent = '🫣';
        //     }
        // });


        var EngMdp = document.getElementById('password2');
        var Switchbtn = document.getElementById('togglePassword2');

        Switchbtn.addEventListener('click', function() {
            if (EngMdp.type === 'password') {
                EngMdp.type = 'text';
                Switchbtn.textContent = '🫢';
            } else {
                EngMdp.type = 'password';
                Switchbtn.textContent = '🫣';
            }
        });




        // var loginForm = document.getElementById('login-form');
        // var registerForm = document.getElementById('register-form');
        // var switchFormButton = document.getElementById('switch-form');
        // var btnconnect = document.getElementById('connecterVous');

        // switchFormButton.addEventListener('click', function() {
        //     if (loginForm.classList.contains('hidden')) {
        //         loginForm.classList.remove('hidden');
        //         // registerForm.classList.add('hidden');
        //         // switchFormButton.textContent = 'Créer un compte';
        //     } else {
        //         loginForm.classList.add('hidden');
        //         registerForm.classList.remove('hidden');
        //         // switchFormButton.textContent = 'Se connecter';
        //     }
        // });

        // btnconnect.addEventListener('click', function() {
        //     if (registerForm.classList.contains('hidden')) {
        //         registerForm.classList.remove('hidden');
        //         // loginForm.classList.add('hidden');
        //         // switchFormButton.textContent = 'Créer un compte';
        //         togglePasswordButton();
        //     } else {
        //         registerForm.classList.add('hidden');
        //         loginForm.classList.remove('hidden');
        //         // switchFormButton.textContent = 'Se connecter';
        //         togglePasswordButton();
        //     }
        // });


    </script>
</body>
</html>