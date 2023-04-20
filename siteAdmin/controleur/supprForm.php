<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/connexion.inc.php";
include_once "$racine/modele/bd.formation.inc.php";

// recuperation des donnees GET, POST, et SESSION


// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 

if (isLoggedOn()){
    $login = getLoginLoggedOn();
    $util = getUtilisateurByLogin($login);
    supprForm($_GET["id"]);
    supprSession($_GET["id"]);
    // traitement si necessaire des donnees recuperees


    //redirection a la page d'accueil action=defaut

    header("Location: index.php?action=listeForm");


}
else{
    header("Location: index.php?action=default");
}

?>