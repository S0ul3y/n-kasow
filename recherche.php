<?php
if (isset($_POST['rechercher'])) {

    $type = $_POST['type'];
    $statut = $_POST['statut'];
    $quartier = $_POST['quartier'];

    if(
        !empty($_POST['type']) || 
        !empty($_POST['statut']) || 
        !empty($_POST['quartier'])
    ){
        $req = $bd->prepare("SELECT * FROM maison WHERE 
        (type = ?) OR 
        (statut = ?) OR 
        (quartier = ?) ");

            $req->bindValue(1, $type);
            $req->bindValue(2, $statut);
            $req->bindValue(3, $quartier);
            $req->execute();

            if (!$req->rowCount()) {
                $msg = '<h1 style="text-align: center; "><span style="font-size: 3rem; ">🙁</span> <br> Aucune maison trouvée </h1>';
            }
    }
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++==
    
    if(
        (
            !empty($_POST['type']) && !empty($_POST['statut']) && !empty($_POST['quartier'])
        )
    ){
        $req = $bd->prepare("SELECT * FROM maison WHERE 
        (type = ? AND statut = ? AND quartier = ?)");

            $req->bindValue(1, $type);
            $req->bindValue(2, $statut);
            $req->bindValue(3, $quartier);
            $req->execute();

            if (!$req->rowCount()) {
                $msg = '<h1 style="text-align: center; "><span style="font-size: 3rem; ">🙁</span> <br> Aucune maison trouvée </h1>';
            }
    }
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++==
    

    if(
        (
            !empty($_POST['type']) && !empty($_POST['statut'])
        )
    ){
        $req = $bd->prepare("SELECT * FROM maison WHERE 
        (type = ? AND statut = ?)");

            $req->bindValue(1, $type);
            $req->bindValue(2, $statut);
            $req->execute();

            if (!$req->rowCount()) {
                $msg = '<h1 style="text-align: center; "><span style="font-size: 3rem; ">🙁</span> <br> Aucune maison trouvée </h1>';
            }
    }
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++==
    
    if(
        (
            !empty($_POST['statut']) && !empty($_POST['quartier'])
        )
    ){
        $req = $bd->prepare("SELECT * FROM maison WHERE 
        (statut = ? AND quartier = ?)");

            $req->bindValue(1, $statut);
            $req->bindValue(2, $quartier);
            $req->execute();

            if (!$req->rowCount()) {
                $msg = '<h1 style="text-align: center; "><span style="font-size: 3rem; ">🙁</span> <br> Aucune maison trouvée </h1>';
            }
    }
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++==
    
    if(
        (
            !empty($_POST['type']) && !empty($_POST['quartier'])
        ) 
    ){
        $req = $bd->prepare("SELECT * FROM maison WHERE 
        (type = ? AND quartier = ?)");

            $req->bindValue(1, $type);
            $req->bindValue(2, $quartier);
            $req->execute();

            if (!$req->rowCount()) {
                $msg = '<h1 style="text-align: center; "><span style="font-size: 3rem; ">🙁</span> <br> Aucune maison trouvée </h1>';
            }
    }

}
?>