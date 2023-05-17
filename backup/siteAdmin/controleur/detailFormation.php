<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.formation.inc.php";

// recuperation des donnees GET, POST, et SESSION
$idForm = $_GET["id"];

if(isset($_GET["nums"])){
    $nums = $_GET["nums"];
}


// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$formation = getFormation($idForm);
$listeSessions = getSessions($idForm);

if(isset($_GET["nums"])){
    $currentSession = getSession($idForm, $nums);
}

// traitement si necessaire des donnees recuperees


// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Liste des formations répertoriés";
include "$racine/vue/head.php";
 include "$racine/vue/vueDetailFormation.php";
include "$racine/vue/pied.php";
?>