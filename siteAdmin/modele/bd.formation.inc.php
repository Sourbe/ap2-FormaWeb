<?php
include_once "connect.php";

function getFormations() {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select F.IDFORM, NOMF, OBJECTIFF, COUTF from formation AS F");
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

function getFormation($idForma) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select IDFORM, NOMF, PUBLICF, OBJECTIFF, CONTENUF, COUTF, LIEUF from formation AS F WHERE IDFORM = $idForma");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        $resultat = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
    print_r($resultat);
}

function getSessions($idForma) {
    $resultat = [];
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from session AS S WHERE IDFORM = $idForma and DATES > NOW() ORDER BY DATES ASC");
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

function getSession($idForma, $nums) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from session AS S WHERE IDFORM = $idForma AND NUMS = $nums");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        $resultat = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
    print_r($resultat);
}

function supprForm($idF){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("delete from formation where idform = :idF");
        $req->bindValue(':idF', $idF, PDO::PARAM_INT);
        $req->execute();

    } catch (PDOException $e) {
        print "Erreur supprform !: " . $e->getMessage();
        die();
    }
}

function supprSession($idF){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("delete from session where idform = :idF");
        $req->bindValue(':idF', $idF, PDO::PARAM_INT);
        $req->execute();

    } catch (PDOException $e) {
        print "Erreur supprSession !: " . $e->getMessage();
        die();
    }
}

//fonction pour modifier toute les variables d'une formation

function modifForm($idF, $nomF, $publicF, $objectifF, $contenuF, $coutF, $lieuF){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("update formation set nomf = :nomF, publicf = :publicF, objectiff = :objectifF, contenuf = :contenuF, coutf = :coutF, lieuf = :lieuF where idform = :idF");
        $req->bindValue(':idF', $idF, PDO::PARAM_INT);
        $req->bindValue(':nomF', $nomF, PDO::PARAM_STR);
        $req->bindValue(':publicF', $publicF, PDO::PARAM_STR);
        $req->bindValue(':objectifF', $objectifF, PDO::PARAM_STR);
        $req->bindValue(':contenuF', $contenuF, PDO::PARAM_STR);
        $req->bindValue(':coutF', $coutF, PDO::PARAM_INT);
        $req->bindValue(':lieuF', $lieuF, PDO::PARAM_STR);
        $req->execute();

    } catch (PDOException $e) {
        print "Erreur modifForm !: " . $e->getMessage();
        die();
    }
}

//fonction pour ajouter une formation

function ajoutForm($nomF, $publicF, $objectifF, $contenuF, $coutF, $lieuF){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("insert into formation (nomf, publicf, objectiff, contenuf, coutf, lieuf) values (:nomF, :publicF, :objectifF, :contenuF, :coutF, :lieuF)");
        $req->bindValue(':nomF', $nomF, PDO::PARAM_STR);
        $req->bindValue(':publicF', $publicF, PDO::PARAM_STR);
        $req->bindValue(':objectifF', $objectifF, PDO::PARAM_STR);
        $req->bindValue(':contenuF', $contenuF, PDO::PARAM_STR);
        $req->bindValue(':coutF', $coutF, PDO::PARAM_INT);
        $req->bindValue(':lieuF', $lieuF, PDO::PARAM_STR);
        $req->execute();

    } catch (PDOException $e) {
        print "Erreur ajoutForm !: " . $e->getMessage();
        die();
    }
}

?>