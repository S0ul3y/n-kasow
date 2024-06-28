
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fontAwesome/css/all.min.css">
    <link rel="stylesheet" href="style/Profil.css">
    <title>Profil</title>
</head>
<body>
    <div class="bull A"></div>
    <div class="bull B"></div>
    <!-- <div class="bull C"></div> -->
    <?php
        require "connexion.php";

        if (isset($_GET['IdU'])) {
            $ID = $_GET['IdU'];
            
        }
        if (isset($_GET['modifie'])) {
            $ID2 = $_GET['modifie'];
        }
            $stmt = $bd->prepare("SELECT * FROM client WHERE id = :ID OR id = :ID2");
            $stmt->bindParam(':ID', $ID, PDO::PARAM_INT);
            $stmt->bindParam(':ID2', $ID2, PDO::PARAM_INT);
            $stmt->execute();
            
            
            while ($ligne = $stmt->fetch()) {
                $LettreP = substr($ligne['prenom'], 0, 1);
                $LettreN = substr($ligne['nom'], 0, 1);
        echo '
        <div class="contenaire">
            <a href="#" onclick="window.location.replace(document.referrer);">
            <span><i class="fa-solid fa-arrow-left"></i></span></a>
            <div class="block">
                <span>'.$LettreP.''.$LettreN.'</span><br>

                <strong>prénom:</strong><br>'.$ligne['prenom'].'<hr>
                <strong>Nom</strong><br>'.$ligne['nom'].'<hr>
                <strong>Email:</strong>  <br>'.$ligne['email'].'<hr>
                <strong>Télephone:</strong>  <br>+223 '.$ligne['telephone'].'<hr>
                <strong>Adresse:</strong>  <br>-'.$ligne['adresse'].' <hr>
                <strong></strong>  <br><a href=""><i class="fa-solid fa-heart"></i>Mes Likes</a> 
                <div class="btn">
                    <a href="ModifierCompte.php?idm=' . $ligne['id'] . '">Modifier</a>
                    <a href="logout.php">Déconnexion</a>
                </div>
            </div>
        </div>';
        }
    
    ?>
</body>
</html>