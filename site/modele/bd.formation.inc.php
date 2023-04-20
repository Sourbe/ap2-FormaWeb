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

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from session AS S WHERE IDFORM = $idForma");
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

//fonction pour suprimer une formation
function supprimerFormation($idForma) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("DELETE FROM formation WHERE IDFORM = $idForma");
        $req->execute();

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    print_r($resultat);
}

//fonction pour recuperer le nombre de stagiaire inscrit a une session
function getNbInscrit($idForma, $nums) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select count(*) as nb from participer AS P WHERE IDFORM = $idForma AND NUMS = $nums");
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
?>