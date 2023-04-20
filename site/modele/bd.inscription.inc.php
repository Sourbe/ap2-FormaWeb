<?php
include_once "connect.php";

function inscriptionForma($idform, $nums, $login) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("INSERT INTO participer (IDFORM, NUMS, LOGINS) VALUES ('$idform', '$nums', '$login');");
        $req->execute();

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    print_r($resultat);
}

function DesinscriptionForma($idform, $nums, $login) {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("DELETE FROM participer WHERE IDFORM = $idform AND NUMS = $nums AND LOGINS ='$login'");
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    
    }
}

function estInscritSession($idform, $nums, $login) {

    $inscrit = false;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM participer WHERE IDFORM = $idform AND NUMS = $nums AND LOGINS ='$login'");
        $req->execute();
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $inscrit = true;
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $inscrit;
}

function estInscritFormation($idform, $login) {

    $inscrit = false;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM participer WHERE IDFORM = $idform AND LOGINS ='$login'");
        $req->execute();
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $inscrit = true;
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $inscrit;
}
?>