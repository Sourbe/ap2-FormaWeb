<?php

include_once "connect.php";

function getParticiper(){
    $resultat = [];
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select p.*, NOMF, DATES, NOMS from participer p, formation f, session s, stagiaire st where f.IDFORM = p.IDFORM and p.NUMS = s.NUMS and p.LOGINS = st.LOGINS ORDER BY Dates desc");
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

//remove Participant
function removeParticipant($idForm, $idS, $idSt){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("DELETE FROM participer WHERE IDFORM = $idForm and NUMS = $idS and LOGINS = '$idSt'");
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

//ajouter Participant
function addParticipant($idForm, $idS, $idSt){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("INSERT INTO participer (IDFORM, NUMS, LOGINS) VALUES ($idForm, $idS, '$idSt')");
        $req->execute();
    } catch (PDOException $e) {
        print "ce stagiaire est déjà inscrit à cette formation !";
        die();
    }
}

?>