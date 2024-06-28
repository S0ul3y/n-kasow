<?php
session_start();
require 'connexion.php';
$_SESSION['id'] ='';
$msg = '';
$Role = '';
$Nom = '';
// $SessionEmail='';
// $IdUser = '';

// Vérifiez d'abord si l'utilisateur est déjà connecté
if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
        header('Location: NosPropriete.php');
    exit;
}
if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        header('Location: Admin.php');
    exit;
}

if (isset($_POST['connexion'])) {
    if (!empty($_POST['email']) && !empty($_POST['mdp'])){
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];

        $stmt = $bd->prepare('SELECT COUNT(*) FROM client WHERE email = ?');
        $stmt->bindParam(1, $email);
        $stmt->execute();
        // $row = $stmt->fetch();
        // $Nom=$row['nom']; 
        $result = $stmt->fetchColumn();

    if ($result > 0) {
        // $Role=$row['role'];  

        $stmt = $bd->prepare('SELECT role FROM client WHERE email = :email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $row = $stmt->fetch();
        $Role=$row['role'];
        if($Role=='admin'){

            $stmt = $bd->prepare('SELECT mdp,id FROM client WHERE email = :email');
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $row = $stmt->fetch();
            if ($row && password_verify($mdp, $row['mdp'])) {
                // Connexion réussie, enregistrez l'e-mail dans la session
                // $_SESSION['email'] = $email;
                $_SESSION['id'] = $row['id'];
                header('Location: Admin.php');
                exit;
            } else {
                $msg = '<p style="color:red">Email ou Mot de Passe Incorrect.</p>';
            }

        } else if($Role=='user'){

        // Récupération du hachage du mot de passe depuis la base de données
        $stmt = $bd->prepare('SELECT mdp,id FROM client WHERE email = :email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $row = $stmt->fetch();
        // $IdUser=$row['id'];
        if ($row && password_verify($mdp, $row['mdp'])) {
            // Connexion réussie, enregistrez l'e-mail dans la session
            $_SESSION['email'] = $email;
            // $_SESSION['id'] = $row['id'];
            header('Location: NosPropriete.php');
            exit;
        } else {
            $msg = '<p style="color:red">Email ou Mot de Passe Incorrect.</p>';
        }

    }
    }else{
        $msg = '<p style="color:red">Ce utilisateur n\'existe pas.</p>';
    } 
    }else {
        $msg = '<p style="color:red">Remplissez les champs s\'il vous plaît.</p>';
    }
    

    }
    ?>
<!-- Votre formulaire de connexion ici -->




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

    <a href="#" onclick="window.location.replace(document.referrer);" class="retour">
            <span><i class="fa-solid fa-arrow-left"></i></span>
    </a>

    <div class="main">

        <h4><?php echo $msg; ?></h4>
        <form action="" method="POST" enctype="multipart/form-data"  id="login-form">
            <img src="images/Nkaso.png" alt="">
            <!-- <label for="">Email</label> -->
            <input type="email"  placeholder="email" name="email">
            <!-- <label for="">Mot de passe</label> -->
            <div class="blocmdp">
                <input type="password" id="password" name="mdp" placeholder="password">
                <span id="togglePassword">🫣</span></input>
            </div>
            
            <input type="submit" value="Connexion" name="connexion">
            <a href="CreerCompte.php">créer un compte</a>
        </form>


    </div>
    </div>


    <script>
        var passwordField = document.getElementById('password');
        var togglePasswordButton = document.getElementById('togglePassword');

        togglePasswordButton.addEventListener('click', function() {
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                togglePasswordButton.textContent = '🫢';
            } else {
                passwordField.type = 'password';
                togglePasswordButton.textContent = '🫣';
            }
        });


    </script>
</body>
</html>