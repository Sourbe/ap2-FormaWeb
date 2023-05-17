<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.stagiaire.php";

// recuperation des donnees GET, POST, et SESSION


// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$listeStagiaire = getStagiaires();

// traitement si necessaire des donnees recuperees


// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Liste des formations répertoriés";
include "$racine/vue/head.php";
include "$racine/vue/vueListeStagiaire.php";
include "$racine/vue/pied.php";

?>