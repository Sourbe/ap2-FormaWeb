<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/connexion.inc.php";
include_once "$racine/modele/bd.formation.inc.php";

// recuperation des donnees GET, POST, et SESSION


// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 

if (isLoggedOn()){
    $idForm = $_GET["id"];
    $nomF = "";
    $publicF = "";
    $objectifF = "";
    $contenuF = "";
    $coutF = "";
    $lieuF = "";

    if (isset($_POST["nomF"])){
        $nomF = $_POST["nomF"];
    }

    if (isset($_POST["publicF"])){
        $publicF = $_POST["publicF"];
    }
    
    if (isset($_POST["objF"])){
        $objectifF = $_POST["objF"];
    }
    
    if (isset($_POST["contenuF"])){
        $contenuF = $_POST["contenuF"];
    }

    if (isset($_POST["tarifF"])){
        $coutF = $_POST["tarifF"];
    }

    if (isset($_POST["lieuF"])){
        $lieuF = $_POST["lieuF"];
    }

    ajoutForm($nomF, $publicF, $objectifF, $contenuF, $coutF, $lieuF);

    // traitement si necessaire des donnees recuperees


    //redirection a la page d'accueil action=defaut

    header("Location: index.php?action=listeForm");


}
else{
    header("Location: index.php?action=default");
}

?>

