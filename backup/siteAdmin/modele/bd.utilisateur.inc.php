<?php

include_once "connect.php";

function getUtilisateurs() {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from administrateur");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur getUtilisateurs !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getUtilisateurByLogin($login) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select LOGINA, MDPA, NOMA, PRENOMA, FONCTIONA from administrateur where LOGINA=:login");
        $req->bindValue(':login', $login, PDO::PARAM_STR);
        $req->execute();
        
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur getUtilisateurByLogin !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addUtilisateur($logins, $mdps, $idAssoc, $noms, $prenoms, $adresses, $cps, $villes, $emails, $statuts, $fonctions) {
    try {
        $cnx = connexionPDO();

        $mdpUCrypt = crypt($mdpU, "sel");
        $req = $cnx->prepare("insert into stagiaire values(logins, idAssoc, mdps, noms, prenoms, adresses, cps, villes, emails, statuts, fonctions)");
        $req->bindValue(':logins', $logins, PDO::PARAM_STR);
        $req->bindValue(':idAssoc', $idAssoc, PDO::PARAM_STR);
        $req->bindValue(':mdps', $mdps, PDO::PARAM_STR);
        $req->bindValue(':noms', $noms, PDO::PARAM_STR);
        $req->bindValue(':prenoms', $prenoms, PDO::PARAM_STR);
        $req->bindValue(':adresses', $adresses, PDO::PARAM_STR);
        $req->bindValue(':cps', $cps, PDO::PARAM_STR);
        $req->bindValue(':villes', $villes, PDO::PARAM_STR);
        $req->bindValue(':emails', $emails, PDO::PARAM_STR);
        $req->bindValue(':statuts', $statuts, PDO::PARAM_STR);
        $req->bindValue(':fonctions', $fonctions, PDO::PARAM_STR);
        
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur addUtilisateur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}



if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');

    echo "getUtilisateurs() : \n";
    print_r(getUtilisateurs());

    echo "getUtilisateurByMailU(\"mathieu.capliez@gmail.com\") : \n";
    print_r(getUtilisateurByMailU("mathieu.capliez@gmail.com"));

    echo "addUtilisateur('mathieu.capliez3@gmail.com', 'azerty', 'mat') : \n";
    addUtilisateur("mathieu.capliez3@gmail.com", "azerty", "mat");
}
?>