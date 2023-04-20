<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/connexion.inc.php";
include_once "$racine/modele/bd.stagiaire.php";

// recuperation des donnees GET, POST, et SESSION


// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 

if (isLoggedOn()){
    $loginS = "";
    $nomS = "";
    $prenomS = "";
    $mdpS = "";
    $adresseS = "";
    $cpS = "";
    $villeS = "";
    $emailS = "";
    $statuts = "";
    $fonctionS = "";
    $idaS = 0;
    
    if (isset($_POST["loginS"])){
        $loginS = $_POST["loginS"];
    }

    if (isset($_POST["nomS"])){
        $nomS = $_POST["nomS"];
    }
    
    if (isset($_POST["prenomS"])){
        $prenomS = $_POST["prenomS"];
    }
    
    if (isset($_POST["mdpS"])){
        $mdpS = $_POST["mdpS"];
    }

    if (isset($_POST["adresseS"])){
        $adresseS = $_POST["adresseS"];
    }

    if (isset($_POST["cpS"])){
        $cpS = $_POST["cpS"];
    }

    if (isset($_POST["villeS"])){
        $villeS = $_POST["villeS"];
    }

    if (isset($_POST["emailS"])){
        $emailS = $_POST["emailS"];
    }

    if (isset($_POST["statutS"])){
        $statuts = $_POST["statutS"];
    }

    if (isset($_POST["fonctionS"])){
        $fonctionS = $_POST["fonctionS"];
    }

    if (isset($_POST["assoc"]) && $_POST["assoc"] != 0 ){
        $idaS = $_POST["assoc"];
    }

    addStagiaire($loginS, $idaS, $mdpS, $nomS, $prenomS, $adresseS, $cpS, $villeS, $emailS, $statutS, $fonctionS);

    // traitement si necessaire des donnees recuperees


    //redirection a la page d'accueil action=defaut

    header("Location: index.php?action=listeStagiaire");


}
else{
    header("Location: index.php?action=default");
}

?>

