<?php

include_once "connect.php";

function getAssoc(){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select IDAS, NOMAS from association");
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

?>