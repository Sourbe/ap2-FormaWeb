<?php

function controleurPrincipal($action) {
    $lesActions = array();
    $lesActions["defaut"] = "connexion.php";
    $lesActions["recherche"] = "rechercheFormation.php";
    $lesActions["cgu"] = "cgu.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["detail"] = "detailFormation.php";
    $lesActions["Inscription"] = "inscriptionFormation.php";
    $lesActions["profil"] = "profil.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["listeForm"] = "listeFormation.php";
    $lesActions["accueil"] = "accueilAdmin.php";
    $lesActions["modifForm"] = "modifForm.php";
    $lesActions["aModifForm"] = "apliquerModifForma.php";
    $lesActions["supprForm"] = "supprForm.php";
    $lesActions["listeStagiaire"] = "listStagiaire.php";
    $lesActions["supprStagiaire"] = "supprStagiaire.php";
    $lesActions["supprInscription"] = "supprInscription.php";
    $lesActions["addStagiaire"] = "addStagiaire.php";
    $lesActions["aAddStagiaire"] = "appliquerAddStagiaire.php";
    $lesActions["ajoutForm"] = "ajoutForm.php";
    $lesActions["aAjoutForm"] = "apliquerAjoutForm.php";
    $lesActions["listeInscr"] = "listeInscr.php";
    $lesActions["addInsciption"] = "addInsciption.php";

    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } 
    else {
        return $lesActions["defaut"];
    }
}

?>