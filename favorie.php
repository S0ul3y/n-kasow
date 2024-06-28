<?php
    if (isset($_POST['favorie'])) {
    $req = $bd->prepare("SELECT idMaison FROM favorie where idUser = ?");
            $req->bindValue(1, $idUser, PDO::PARAM_INT);
            $req->execute(); 
            // $result = $req->fetchColumn();
    
            if ($req->rowCount()) {
                $color='red';
                }else{
                    $color='white';
            }
        }
?>