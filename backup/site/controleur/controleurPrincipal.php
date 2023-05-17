<?php

function controleurPrincipal($action) {
    $lesActions = array();
    $lesActions["defaut"] = "listeFomation.php";
    $lesActions["recherche"] = "rechercheFormation.php";
    $lesActions["cgu"] = "cgu.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["detail"] = "detailFormation.php";
    $lesActions["Inscription"] = "inscriptionFormation.php";
    $lesActions["profil"] = "profil.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["inscriptionFormation"] = "inscriptionFormation.php";
    $lesActions["desinscriptionFormation"] = "desinscriptionFormation.php";


    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } 
    else {
        return $lesActions["defaut"];
    }
}

?>