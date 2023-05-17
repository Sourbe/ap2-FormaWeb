<?php

//formulaire ajouter une inscription

include_once "$racine/modele/bd.stagiaire.php";
include_once "$racine/modele/bd.formation.inc.php";
include_once "$racine/modele/bd.participer.php";
include_once "$racine/modele/bd.participer.php";

//$_get Formations 
if(isset($_GET["formation"])){
    $idF = $_GET["formation"];
}



//recuperer les utilisateurs
$utilisateurs = getStagiaires();
//recuperer les formations et les sessions
$formations = getFormations();
if(isset($idF)){
    $sessions = getSessions($idF);
}

//afficher la vue 
$titre = "Ajouter une inscription";
include "$racine/vue/head.php";
include "$racine/vue/vueAjoutInscription.php";
include "$racine/vue/pied.php";

?>