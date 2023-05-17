<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.formation.inc.php";
//include_once "$racine/modele/bd.resto.inc.php";
//include_once "$racine/modele/bd.photo.inc.php";

// recuperation des donnees GET, POST, et SESSION
;

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
//$listeRestos = getRestos();
$listeFormations = getFormations();

// traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Liste des formations répertoriés";
include "$racine/vue/head.php";
include "$racine/vue/vueListeFormation.php";
include "$racine/vue/pied.php";


?>