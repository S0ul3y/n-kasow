
<?php
session_start();
// if (isset($_SESSION['nom_utilisateur'])) {
//     $nom = $_SESSION['nom_utilisateur'];
// }

require 'connexion.php';
$message='';

if (isset($_POST['enregistrer'])) {
    if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['pass'])){
    // if (isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['pass'])) {
        $email = $_POST['email'];

        // Vérifier si l'utilisateur existe déjà dans la base de données
        $stmt = $bd->prepare('SELECT COUNT(*) FROM client WHERE email = ?');
        $stmt->bindParam(1, $email);
        $stmt->execute();
        $result = $stmt->fetchColumn();

        if ($result > 0) {
            // L'utilisateur existe déjà, vous pouvez gérer l'erreur ici
            // $msg='L\'utilisateur avec cette adresse e-mail existe déjà.';
            $message = '<p style="color:red">Cette adresse e-mail existe déjà.</p>';
        } else {
            // L'utilisateur n'existe pas, vous pouvez procéder à l'enregistrement
            $mdp = $_POST['pass'];
            $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);

            $req = $bd->prepare('INSERT INTO client (nom, prenom, email, mdp) VALUES (?, ?, ?, ?)');
            $req->bindValue(1, $_POST['nom']);
            $req->bindValue(2, $_POST['prenom']);
            $req->bindValue(3, $email);
            $req->bindValue(4, $mdpHash);

            $req->execute();
            // $msg='Utilisateur enregistré avec succès.';
            // $message = '<p style="color:green">Utilisateur enregistré avec succès.</p>';
            header('Location: Login.php');
            // Vous pouvez ajouter une redirection ici si nécessaire
        }
    }else{
        $message = '<p style="color:red">Remplissez tout les champs s\'il vous plaît.</p>';
    }
}
// }

    // header('Location: utilisateur_list.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fontAwesome/css/all.min.css">
    <link rel="stylesheet" href="style/login.css">
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
            <input type="text"  placeholder="Nom" name="nom">
            <input type="text"  placeholder="Prénom" name="prenom">
            <input type="email"  placeholder="email" name="email">
            <!-- <label for="">Mot de passe</label> -->
            <div class="blocmdp">
                <input type="password" id="password2" name="pass" placeholder="password">
                <span id="togglePassword2">🫣</span>
            </div>
            
            <input type="submit" value="Enregistrer" name="enregistrer">
            <a href="Login.php">connecter-vous</a>
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