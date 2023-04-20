<?php
include_once "connect.php";

function getStagiaires() {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select LOGINS, NOMAS, NOMS, PRENOMS, ADRESSES, CPS, VILLES, EMAILS, STATUTS, FONCTIONS from stagiaire s, association a where s.IDAS = a.IDAS");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
    print_r($resultat);
}

function delStagiaire($logins){
    try{
        $cnx = connexionPDO();
        $req = $cnx -> prepare("delete from stagiaire where LOGINS = :logins");
        $req->bindValue(':logins', $logins, PDO::PARAM_STR);
        $req -> execute();
    } catch (PDOException $e) {
        print "Erreur supprStagiaire !: " . $e->getMessage();
        die();
    }
}

function addStagiaire($logins, $idas, $mdps, $noms, $prenoms, $adresses, $cps, $villes, $emails, $statuts, $fonctions){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("INSERT INTO stagiaire VALUES (:logins, :idas, :mdps, :noms, :prenoms, :adresses, :cps, :villes, :emails, :statuts, :fonctions)");
        $req->bindValue(':logins', $logins, PDO::PARAM_STR);
        $req->bindValue(':idas', $idas, PDO::PARAM_INT);
        $req->bindValue(':mdps', $mdps, PDO::PARAM_STR);
        $req->bindValue(':noms', $noms, PDO::PARAM_STR);
        $req->bindValue(':prenoms', $prenoms, PDO::PARAM_STR);
        $req->bindValue(':adresses', $adresses, PDO::PARAM_STR);
        $req->bindValue(':cps', $cps, PDO::PARAM_INT);
        $req->bindValue(':villes', $villes, PDO::PARAM_STR);
        $req->bindValue(':emails', $emails, PDO::PARAM_STR);
        $req->bindValue(':statuts', $statuts, PDO::PARAM_STR);
        $req->bindValue(':fonctions', $fonctions, PDO::PARAM_STR);
        $req->execute();
       
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    
}
?>