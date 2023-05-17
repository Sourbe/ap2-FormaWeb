<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/connexion.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";

// creation du menu burger
$menuBurger = array();
$menuBurger[] = Array("url"=>"./?action=profil","label"=>"Consulter mon profil");
$menuBurger[] = Array("url"=>"./?action=updProfil","label"=>"Modifier mon profil");


// recuperation des donnees GET, POST, et SESSION

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
if (isLoggedOn()){
    $login = getLoginLoggedOn();
    $util = getUtilisateurByLogin($login);
    echo $login.$util["NOMS"];
    
    // traitement si necessaire des donnees recuperees


    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Mon profil";
    include "$racine/vue/head.php";
    include "$racine/vue/vueMonProfil.php";
    include "$racine/vue/pied.php";
}
else{
    $titre = "Mon profil";
    include "$racine/vue/head.php";
    include "$racine/vue/pied.php";
}

?>