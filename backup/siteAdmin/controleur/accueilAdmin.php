<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/connexion.inc.php";

// recuperation des donnees GET, POST, et SESSION


// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 

if (isLoggedOn()){
    $login = getLoginLoggedOn();
    $util = getUtilisateurByLogin($login);
    
    // traitement si necessaire des donnees recuperees


    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Liste des formations répertoriés";
    include "$racine/vue/head.php";
    include "$racine/vue/vueAccueilAdmin.php";
    include "$racine/vue/pied.php";
}
else{
    $titre = "Mon profil";
    include "$racine/vue/head.php";
    include "$racine/vue/vueConnexion.php";
    include "$racine/vue/pied.php";
}

?>