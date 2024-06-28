<?php
	session_start();
	require "connexion.php";
	

if (empty($_SESSION['id'])) {
	header('Location: Login.php');
    exit;
}
    
?>
<!--  -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="fontAwesome/css/all.min.css">
	<link rel="stylesheet" href="style/AdminStyle.css">
	<link rel="stylesheet" href="style/Newstyle.css">

	<title>Dashboard</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Dashboard</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#" id="linkA">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="#" id="linkB">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Propriétés</span>
				</a>
			</li>
			<li>
				<a href="#" id="linkC">
					<i class='bx bxs-group' ></i>
					<span class="text">Utilisateurs</span>
				</a>
			</li>
			<li>
				<a href="#" id="linkD">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Message</span>
				</a>
			</li>
			<li>
			</li>
		</ul>
		<ul class="side-menu">
		
			<li>
				<a href="Logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text"><a href="Logout.php">Logout</a></span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<!-- <label for="switch-mode" class="switch-mode"></label> -->
			<!-- <a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a> -->
			<a href="Profil.php" class="profile">
			<i class="fa-solid fa-user"></i>
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main id="container">
			
			
		</main>
		<!-- MAIN -->

		<div class="main" id="divA">
		<div class="head-title">
		<div class="left">
			<h1>Dashboard</h1>
			<ul class="breadcrumb">
				<li>
					<a href="#">Dashboard</a>
				</li>
				<li><i class='bx bx-chevron-right' ></i></li>
				<li>
					<a class="active" href="NosPropriete.php">Home</a>
				</li>
			</ul>
		</div>
		<!-- <a href="#" class="btn-download">
			<i class='bx bxs-cloud-download' ></i>
			<span class="text">Download PDF</span>
		</a> -->
	</div>



<?php

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

	<ul class="box-info">
		<li>
			<!-- <i class='bx bxs-calendar-check' ></i> -->
			<i class="fa-solid fa-building-user" style="color:white;"></i>
			<span class="text">
				<h3><?php echo $Alouer ;?></h3>
				<p>Proprietés à louer</p>
			</span>
		</li>
		<li>
			<!-- <i class='bx bxs-group' ></i> -->
			<i class="fa-solid fa-hand-holding-dollar" style="color:white;"></i>
			<span class="text">
				<h3><?php echo $Avendre ;?></h3>
				<p>Proprietés à vendre</p>
			</span>
		</li>
		<li>
			<i class='bx bxs-group' style="color:white;"></i>
			<!-- <i class='bx bxs-dollar-circle' ></i> -->
			<span class="text">
				<h3><?php echo $Nuser ;?></h3>
				<p>Utilisateurs</p>
			</span>
		</li>
	</ul>


<br><br>
	<div class="count" >
			<table>
					<thead>
					  <tr>
						<th>id</th>
						<th>Nom</th>
						<th>Prénom</th>
						<th>Email</th>
						<th>Telephone</th>
						<th>Adresse</th>
						<th>Rôle</th>
						<!-- <th colspan="2">Action</th> -->
					  </tr>
					</thead>
				<tbody>
					  <!-- Example row -->
					  
				<?php
					
					$req = $bd->query("SELECT * FROM client WHERE role='user' LIMIT 7");
					$i = 1;
					while ($ligne = $req->fetch()) {
					echo ' <tr style="
					  border-bottom:2px solid #f35525;
					  
					  ">
						<td data-column="id">'.$i.'</td>
						<td data-column="titre">'. $ligne['nom'] .'</td>
						<td data-column="type">'. $ligne['prenom'] .'</td>
						<td data-column="statu">'. $ligne['email'] .'</td>
						<td data-column="prix">+223 '. $ligne['telephone'] .'</td>
						<td data-column="par">'. $ligne['adresse'] .'</td>
						<td data-column="par">'. $ligne['role'] .'</td></div>
						</div>
					  </tr>';
					  $i++;
					  }
					  ?>
					</tbody>
				  </table>
		</div>
</div>




<div class="ListeBien" id="divB" >
	<div class="title">
		<h1>Liste des maisons</h1> <a href="AjouterBien.php">Ajouter un bien</a>
	</div>
		<div class="count">
			<table>
					<thead>
					  <tr>
						<th>id</th>
						<th>titre</th>
						<th>type</th>
						<th>statu</th>
						<th>prix</th>
						<th>par</th>
						<th>quartier</th>
						<th>dateAjout</th>
						<th>N_Salon</th>
						<th>N_Toilette</th>
						<th>N_Chambre</th>
						<th>N_Cuisine</th>
						<th>meuble</th>
						<th>electricite</th>
						<th>piscine</th>
						<th>eau</th>
						<th colspan="2">Action</th>
					  </tr>
					</thead>
				<tbody>
					  <!-- Example row -->
					  
				<?php
					require "connexion.php";
					$req = $bd->query("SELECT * FROM maison");
					$i = 1;
					while ($ligne = $req->fetch()) {
					echo ' <tr style="
					  border-bottom:2px solid #f35525;
					  
					  ">
						<td data-column="id">'.$i.'</td>
						<td data-column="titre">'. $ligne['titre'] .'</td>
						<td data-column="type">'. $ligne['type'] .'</td>
						<td data-column="statu">'. $ligne['statut'] .'</td>
						<td data-column="prix">'. $ligne['prix'] .' FCFA</td>
						<td data-column="par">'. $ligne['par'] .'</td>
						<td data-column="par">'. $ligne['quartier'] .'</td>
						<td data-column="dateAjout">'. $ligne['dateAjout'] .'</td>
						<td data-column="nbreSalon">'. $ligne['nbreSalon'] .'</td>
						<td data-column="nbreToilette">'. $ligne['nbreToilette'] .'</td>
						<td data-column="nbreChambre">'. $ligne['nbreChambre'] .'</td>
						<td data-column="nbreCuisine">'. $ligne['nbreCuisine'] .'</td>
						<td data-column="meuble">'. $ligne['meuble'] .'</td>
						<td data-column="electricite">'. $ligne['electricite'] .'</td>
						<td data-column="piscine">'. $ligne['piscine'] .'</td>
						<td data-column="eau">'. $ligne['eau'] .'</td></div>
						<td data-column="action" class="action">
							<a href="ModifierBien.php?idm=' . $ligne['id'] . '"><i class="fa-regular fa-pen-to-square"></i></a>
							<a href="Sup.php?ids=' . $ligne['id'] . '"></i><i class="fa-solid fa-trash" style="color: red;"></i></a>
						</td></div>
					  </tr>';
					  $i++;
					  }
					  ?>
					</tbody>
				  </table>
		</div>
		
	
		
</div>





<div class="ListeBien" id="divC" >
	<div class="title">
		<h1>Liste des utilisateurs</h1> <a href="AjouterAdmin.php">Ajouter un admin</a>
	</div>
	

		
		
		<div class="count">
			<table>
					<thead>
					  <tr>
						<th>id</th>
						<th>Nom</th>
						<th>Prénom</th>
						<th>Email</th>
						<th>Telephone</th>
						<th>Adresse</th>
						<th>Rôle</th>
						<th colspan="2">Action</th>
					  </tr>
					</thead>
				<tbody>
					  <!-- Example row -->
					  
				<?php
					require "connexion.php";
					$req = $bd->query("SELECT * FROM client");
					$i = 1;
					while ($ligne = $req->fetch()) {
					echo ' <tr style="
					  border-bottom:2px solid #f35525;
					  
					  ">
						<td data-column="id">'.$i.'</td>
						<td data-column="titre">'. $ligne['nom'] .'</td>
						<td data-column="type">'. $ligne['prenom'] .'</td>
						<td data-column="statu">'. $ligne['email'] .'</td>
						<td data-column="prix">+223 '. $ligne['telephone'] .'</td>
						<td data-column="par">'. $ligne['adresse'] .'</td>
						<td data-column="par">'. $ligne['role'] .'</td></div>
						<td data-column="action" class="action">
							
							<a href=""></i><i class="fa-solid fa-trash" style="color: red;"></i></a>
						</td></div>
					  </tr>';
					  $i++;
					  }
					  ?>
					</tbody>
				  </table>
		</div>




</div>



<div class="ListeBien" id="divD" >
	<div class="title">
		<h1>Les Commentaires</h1>
	</div>
	
		<div class="count">
			<table>
					<thead>
					  <tr>
						<th>Id</th>
						<th>Nom et prénom</th>
						<th>Email</th>
						<th>Télephone</th>
						<th>Message</th>
						<!-- <th colspan="2">Action</th> -->
					  </tr>
					</thead>
				<tbody>

				<?php
					require "connexion.php";
					$req = $bd->query("SELECT * FROM commentaire");
					$i = 1;
					while ($ligne = $req->fetch()) {
					echo ' <tr style=" border-bottom:2px solid #f35525; ">
						<td data-column="id">'.$i.'</td>
						<td data-column="titre">'. $ligne['nomprenom'] .'</td>
						<td data-column="type">'. $ligne['email'] .'</td>
						<td data-column="statu">+223 '. $ligne['tel'] .'</td>
						<td data-column="prix">'. $ligne['message'] .'</td>
						
						</div>
					  </tr>';
					  $i++;
					  }
					  ?>
					</tbody>
				  </table>
		</div>
</div>











</section>

	
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>
</html>